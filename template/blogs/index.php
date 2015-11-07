<style>
    .h1 {
        line-height: 64px !important;
        font-size: 2em !important;
        font-weight: bold;
        margin: 0;
        display: inline-block;
    }

    .col-md-1 {
        display: inline !important;
    }

    i {
        margin-right: 5px;
    }

    .entry-meta span {
        margin-right: 10px;
    }

    .list-group-item {

        padding: 0;
    }

    .list-group-item div.content {
        margin: 10px 15px;;
    }

    .panel-default a:hover h2, .panel-default a:hover span.more {
        text-decoration: underline;
    }

    .panel-heading {
        padding: 10px 15px;
        background-color: #f5f5f5;
        border-top: 1px solid #ddd;
        border-bottom: 1px solid #ddd;
        border-top-right-radius: 3px;
        border-top-left-radius: 3px;
    }

    .panel-default {
        padding: 0;
    }
    span.more{
        font-style: italic;
    }
</style>

<h2 class="pages-title">
    <?php
    echo $translation["page"]["blogs"];
    ?>
</h2>

<div id="page-content" class="content pages-content">
    <?php
    $blogy = getBlogs("cz", $db_web_host, $db_web_port, $db_web_login, $db_web_pass, $db_web_name);
    echo getBlogsHtml($blogy, $translation);

    ?>
</div>

<h2 class="pages-title">
    <?php
    echo $translation["page"]["blogs_en"];
    ?>
</h2>

<div id="page-content" class="content pages-content">
    <?php
    $blogy = getBlogs("en", $db_web_host, $db_web_port, $db_web_login, $db_web_pass, $db_web_name);
    echo getBlogsHtml($blogy, $translation);
    ?>
</div>

