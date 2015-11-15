<style>
    input[type="date"], input[type="text"] {
        height: 20px;
    }

    .pure-g form {
        margin-bottom: 1em;;
    }

    .pure-g h3 {
        color: red !important;
        font-size: 150% !important;
        font-weight: bold !important;
        margin: 1em 0 !important;
    }
    .pure-g p {
        text-align: justify !important;
        margin: 1em 0 !important;
    }
    .pure-g li {
        display: list-item !important;
        text-align: -webkit-match-parent !important;
    }
    .pure-g a {
        color: red !important;
        font-weight: bold !important;
    }
    .pure-g{
        width: 70% !important;
        margin: 1em auto !important;
    }
    .pure-g p{
        font-size: 150% !important;
    }


</style>

<h2 class="pages-title">
    <?php
    echo $translation["page"]["soutez"];
    ?>
</h2>

<div id="page-content" class="content pages-content">
    <?php
    $from = '2015-11-02 00:00:00';
    $to = '2015-12-01 23:59:59';

    $kills = getKills($db_ip, $db_port, $db_login, $db_pass, "soe-hlstats", $from, $to);


    echo $translation["page"]["text"];
    ?>


    <?

    echo getActivityHtml($kills, $translation);
    ?>
</div>

