<?php
function getHtmlDowload($text, $link, $download)
{
    $result = "<h2 class=\"pages-title\">";
    $result .= $text;
    $result .= "</h2><div id=\"page-content\" class=\"content pages-content\"><a href=\"";
    $result .= $link;
    $result .= "\">";
    $result .=  $download . " " . $text;
    $result .= "</a></div>";
    return $result;
}

