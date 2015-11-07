<?php
function getBlogs($lang, $db_web_host, $db_web_port, $db_web_login, $db_web_pass, $db_web_name)
{
    $options = array(
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    );
    $conn = new PDO("mysql:host=$db_web_host;port=$db_web_port;dbname=$db_web_name", $db_web_login, $db_web_pass, $options);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $results = array();

    $sql = "SELECT  `f`.`parent_id` ,  `f`.`forum_id` ,  `f`.`forum_name` ,
                    `f`.`forum_desc` ,  `f`.`forum_image` ,`t`.`topic_id`,
                    `t`.`topic_title` ,  `t`.`topic_views`, `t`.`topic_first_poster_name`,
                     FROM_UNIXTIME(`t`.`topic_time`, '%d.%m.%Y %H:%i:%s') as `topic_time`,
                    `p`.`post_text`
            FROM  `phpbbnew_forums` AS f
            INNER JOIN  `phpbbnew_topics` AS t ON `t`.`forum_id` =  `f`.`forum_id`
            LEFT JOIN `phpbbnew_posts`  as p ON `p`.`post_id` = `t`.`topic_first_post_id`
            WHERE ";
    if ($lang === 'en') {
        $sql .= "`f`.`parent_id` LIKE 29 ";
    } elseif ($lang === 'cz') {
        $sql .= "`f`.`parent_id` LIKE 28 ";
    }
    $sql .= "AND  `t`.`topic_visibility` LIKE 1
            ORDER BY  `f`.`parent_id` ASC ,  `t`.`forum_id` ASC ,  `t`.`topic_views` DESC";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    foreach ($stmt->fetchAll() as $blogs => $blog) {
        $results[$blog['forum_name']][] = array('topic_title' => $blog['topic_title'],
            'topic_views' => $blog['topic_views'],
            'author' => $blog['topic_first_poster_name'],
            'topic_time' => $blog['topic_time'],
            'forum_desc' => $blog['forum_desc'],
            'forum_image' => $blog['forum_image'],
            'forum_id' => $blog['forum_id'],
            'topic_id' => $blog['topic_id'],
            'post_text' => $blog['post_text'],
        );
    };

    return $results;
}

function getBlogsHtml($blogy, $translation )
{
    $result = "";
    foreach ($blogy as $key => $blog) {

        $result .= "<div class=\"row\">";
        $result .= "<div class=\"col-md-1\">";
        $result .= "<img src=\"http://ezpz.cz/";
        $result .= $blog[0]['forum_image'];
        $result .= "\" alt=\"";
        $result .= $key;
        $result .= "\" height=\"64\" width=\"64\">";
        $result .= "</div>";
        $result .= "<div class=\"col-md-7 h1\"style=\"line-height: 64px;font-size: 2em;\">";
        $result .= $key;
        $result .= "</div>";

        if ($blog[0]['forum_desc'] !== "") {
            $result .= "<small>";
            $result .= $blog['forum_desc'];
            $result .= "</small>";
        }
        $result .= "</div>";

        foreach ($blog as $topic) {
            $result .= "<div class=\"panel panel-default\">";
            $result .= "<a href=\"http://ezpz.cz/viewtopic.php?f=";
            $result .= $topic['forum_id'];
            $result .= "&t=";
            $result .= $topic['topic_id'];
            $result .= "\" class=\"list-group-item\">";

            $result .= "<div class=\"panel-heading\"><h2 class=\"list-group-item-heading\">";
            $result .= $topic['topic_title'];
            $result .= "</h2></div>";
            $result .= "<div class='panel-body'><p class=\"list-group-item-text\">";
            $html_code = $topic['post_text'];

            $html_code = bbcode_meverik::removebbcode($html_code);
            $html_code = bbcode_meverik::tohtml($html_code,TRUE,'UTF-8');
            $html_code = preg_replace("#(<br>[\n\s\r]*)+#","<br>", $html_code);

            $html_code = AbstractHTMLContents($html_code, 500);
            $result .= $html_code;
            $result .= "...<span class=\"more\">";
            $result .= $translation['page']['more'];
            $result .= "</span></p>";
            $result .= "</div>";
            $result .= "<div class=\"entry-meta panel-footer\">
                    <span class=\"posted-on\">
                        <i class=\"fa fa-calendar\"></i>";
            $result .= $topic['topic_time'];
            $result .="</span>
                <span class=\"byline\">
                    <i class=\"fa fa-user\"></i>
                   <span class=\"author vcard\">";
            $result .= $topic['author'];
            $result .= "</span>
                </span>
                <span class=\"comments-link\">
                    <i class=\"fa fa-eye\"></i>";
            $result .= $topic['topic_views'];
            $result .= "</span>
                        </div>";
            $result .= "</a>";
            $result .= "</div>";

        }
    }
    if ($result === "")
        $result .= $translation['page']['empty'];
    return $result;
}



function AbstractHTMLContents($html, $maxLength=100){
    mb_internal_encoding("UTF-8");
    $printedLength = 0;
    $position = 0;
    $tags = array();
    $newContent = '';

    $html = $content = preg_replace("/<img[^>]+\>/i", "", $html);

    while ($printedLength < $maxLength && preg_match('{</?([a-z]+)[^>]*>|&#?[a-zA-Z0-9]+;}', $html, $match, PREG_OFFSET_CAPTURE, $position))
    {
        list($tag, $tagPosition) = $match[0];
        // Print text leading up to the tag.
        $str = mb_strcut($html, $position, $tagPosition - $position);
        if ($printedLength + mb_strlen($str) > $maxLength){
            $newstr = mb_strcut($str, 0, $maxLength - $printedLength);
            $newstr = preg_replace('~\s+\S+$~', '', $newstr);
            $newContent .= $newstr;
            $printedLength = $maxLength;
            break;
        }
        $newContent .= $str;
        $printedLength += mb_strlen($str);
        if ($tag[0] == '&') {
            // Handle the entity.
            $newContent .= $tag;
            $printedLength++;
        } else {
            // Handle the tag.
            $tagName = $match[1][0];
            if ($tag[1] == '/') {
                // This is a closing tag.
                $openingTag = array_pop($tags);
                assert($openingTag == $tagName); // check that tags are properly nested.
                $newContent .= $tag;
            } else if ($tag[mb_strlen($tag) - 2] == '/'){
                // Self-closing tag.
                $newContent .= $tag;
            } else {
                // Opening tag.
                $newContent .= $tag;
                $tags[] = $tagName;
            }
        }

        // Continue after the tag.
        $position = $tagPosition + mb_strlen($tag);
    }

    // Print any remaining text.
    if ($printedLength < $maxLength && $position < mb_strlen($html))
    {
        $newstr = mb_strcut($html, $position, $maxLength - $printedLength);
        $newstr = preg_replace('~\s+\S+$~', '', $newstr);
        $newContent .= $newstr;
    }

    // Close any open tags.
    while (!empty($tags))
    {
        $newContent .= sprintf('</%s>', array_pop($tags));
    }

    return $newContent;
}