<style>
    input[type="date"], input[type="text"] {
        height: 20px;
    }
    form{
        margin-bottom: 1em;;
    }

</style>

<h2 class="pages-title">
    <?php
    echo $translation["page"]["activity"];
    ?>
</h2>

<div id="page-content" class="content pages-content">
    <?php
        $from = filter_input(INPUT_POST, 'from', FILTER_SANITIZE_SPECIAL_CHARS);
        $to  = filter_input(INPUT_POST, 'to', FILTER_SANITIZE_SPECIAL_CHARS);

    if ($from === NULL OR $from === NULL){
        $from = filter_input(INPUT_GET, 'from', FILTER_SANITIZE_SPECIAL_CHARS);
    }
    if ($to === NULL OR $to === NULL){
        $to = filter_input(INPUT_GET, 'to', FILTER_SANITIZE_SPECIAL_CHARS);
    }
    $url_host =  filter_input(INPUT_SERVER, 'HTTP_HOST', FILTER_SANITIZE_SPECIAL_CHARS);
    $url_uri =  filter_input(INPUT_SERVER, 'REQUEST_URI', FILTER_SANITIZE_SPECIAL_CHARS);

        $actual_link = "http://$url_host/activity?from=$from&to=$to";
    ?>
    <!-- Datum od do-->
    <form class="" method="post">
        <div class="form-group form-inline">
            <label for="input-date-from"><?php echo $translation["page"]["from"] ?></label>
            <input class="form-control datepicker" name="from" id="input-date-from" type="date" value="<?php echo $from;?>"/>

            <label for="input-date-to"><?php echo $translation["page"]["to"] ?></label>
            <input class="form-control datepicker" name="to" id="input-date-to" type="date" value="<?php echo $to;?>"/>


            <button class="btn btn-default" id="button-search"><?php echo $translation["page"]["button_search"] ?></button>
        </div>

        <label for="filter-link"><?php echo $translation["page"]["filter-link"] ?></label>
        <input class="form-control" id="filter-link" onClick="this.select();" type="text" value="<?php echo $actual_link?>" readonly/>

    </form>

    <?php

    $activity = getActivity($db_ip, $db_port, $db_login, $db_pass, "soe-csgo", $from, $to);
    echo getActivityHtml($activity, $translation);
    ?>
</div>

