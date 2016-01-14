<style>
    input[type="date"], input[type="text"] {
        height: 20px;
    }
    form{
        margin-bottom: 1em;;
    }
    .glyphicon.glyphicon-one-fine-dot:before {
        content: "\25cf";
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

    if ($from === NULL OR $from === NULL) {
        $from = (new DateTime('first day of this month'))->format('Y-m-d');
    }
    if ($to === NULL OR $to === NULL) {
        $to = date('Y-m-d');
    }

    $url_host =  filter_input(INPUT_SERVER, 'HTTP_HOST', FILTER_SANITIZE_SPECIAL_CHARS);
    $url_uri =  filter_input(INPUT_SERVER, 'REQUEST_URI', FILTER_SANITIZE_SPECIAL_CHARS);

        $actual_link = "http://$url_host/page/activity?from=$from&to=$to";
    ?>
    <!-- Datum od do-->
    <form class="" method="post">
        <div class="form-group form-inline">
            <label for="input-date-from"><?php echo $translation["page"]["from"] ?></label>
            <input class="form-control datepicker" name="from" id="input-date-from" type="date" value="<?php echo $from;?>"/>

            <label for="input-date-to"><?php echo $translation["page"]["to"] ?></label>
            <input class="form-control datepicker" name="to" id="input-date-to" type="date" value="<?php echo $to;?>"/>
            <div class="btn-group">
                <button type="button" id="month_left" class="btn btn-default">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                </button>
                <button type="button" id="month_this" class="btn btn-default">
                    <span class="glyphicon glyphicon-one-fine-dot" aria-hidden="true"></span>
                </button>
                <button type="button" id="month_right" class="btn btn-default">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                </button>
            </div>

            <button class="btn btn-default" id="button-search"><?php echo $translation["page"]["button_search"] ?></button>
        </div>

        <label for="filter-link"><?php echo $translation["page"]["filter-link"] ?></label>
        <input class="form-control" id="filter-link" onClick="this.select();" type="text" value="<?php echo $actual_link?>" readonly/>

    </form>
    <script>
        $(document).ready(function () {
            function getFormattedString(d){
                var m = (d.getMonth()+1) < 10 ? '0' + (d.getMonth()+1) : (d.getMonth()+1);
                var day = d.getDate() < 10 ? '0' + d.getDate() : d.getDate();
                return d.getFullYear() + "-"+ m +"-"+day;
            }

            function getDatesToInputs(type){
                var from_input = $('input[name=from]').val();
                var now = new Date();
                if(type === 'this'){
                    var date = new Date(now);
                }else{
                    var date = new Date(from_input);
                }
                if (type === 'prev')
                    date.setMonth(date.getMonth() - 1, 1);
                else if (type === 'next')
                    date.setMonth(date.getMonth() + 1, 1);

                var lastDay;
                if (now.getMonth() === date.getMonth() && now.getYear() === date.getYear()){
                    lastDay = now;
                }else{
                    lastDay = new Date(date.getFullYear(), date.getMonth() + 1, 0);
                }

                var firstDay = new Date(date.getFullYear(), date.getMonth(), 1);

                $('input[name=from]').val(getFormattedString(firstDay));
                $('input[name=to]').val(getFormattedString(lastDay));
            }

            $("#month_left").click(function() {
                getDatesToInputs('prev');
            });

            $("#month_this").click(function() {
                getDatesToInputs('this');
            });

            $("#month_right").click(function() {
                getDatesToInputs('next');
            });
        });
    </script>
    <?php

    $activity = getActivity($db_ip, $db_port, $db_login, $db_pass, "soe-csgo", $from, $to);
    echo getActivityHtml($activity, $translation);
    ?>
</div>

