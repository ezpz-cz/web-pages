<?php
include_once(dirname(__FILE__)."/../../scripts-generic/servers.php");
include_once(dirname(__FILE__)."/../config/translation_gotv.php");
?>

<div id="page-content" class="content pages-content">
    <div class="input-container">
        <label for="select-server"><?php echo $translation["page"]["server"] ?>:</label>
        <select id="select-server" name="select-server">
            <?php
                foreach (GetServers() as $id => $row)
                {
                    echo '<option class="option-server" server_id="' . $row["server_id"] . '">' . $row["name"] . '</option>';
                }
            ?>
        </select>

        <label for="input-map"><?php echo $translation["page"]["map"] ?>:</label>
        <input type="search" class="input-text" id="input-map" name="input-map"/>

        <button type="button" id="button-search" class="button-search">
            <?php echo $translation["page"]["search"] ?>
        </button>
    </div>

    <div id="div-loader" style="display: none;">
        <img src="http://ezpz.cz/ext/phpbb/pages/styles/pbtech/theme/gears.gif" alt="Loading..." style="display: block; margin-left: auto; margin-right: auto;" />
    </div>

    <div id="div-table"></div>
</div>