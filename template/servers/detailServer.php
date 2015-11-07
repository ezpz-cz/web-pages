<?php


echo get_head_table($translation);


$start = microtime(true);
//Classic #1 – csgo.ezpz.cz:27016
echo getServerInfo('csgo.ezpz.cz', '27016', $translation);
//Classic #2 – csgo.ezpz.cz:27015
echo getServerInfo('csgo.ezpz.cz', '27015', $translation);
//Dust2 ONLY #1 – csgo2.ezpz.cz:27015
echo getServerInfo('csgo2.ezpz.cz', '27015', $translation);
//Dust2 ONLY #2 – csgo2.ezpz.cz:27015
echo getServerInfo('csgo.ezpz.cz', '40015', $translation);
//AIM+AWP #1 – csgo.ezpz.cz:27018
echo getServerInfo('csgo.ezpz.cz', '27018', $translation);
//AIM+AWP #2 – csgo.ezpz.cz:27018
echo getServerInfo('csgo.ezpz.cz', '40016', $translation);
//AWP – csgo2.ezpz.cz:27020
echo getServerInfo('csgo2.ezpz.cz', '27020', $translation);
//ARENA 1vs1 – csgo2.ezpz.cz:27030
echo getServerInfo('csgo2.ezpz.cz', '27030', $translation);
$time_elapsed_secs = microtime(true) - $start;
debug_to_console("Servery cez query -  " . $time_elapsed_secs);

$start = microtime(true);

//}
//$conn = null;


//MINECRAFT
//$port= '25915';
//$host= 'mc.ezpz.cz';
//$status = new MinecraftServerStatus();
//$response = $status->getStatus($host,$port, '1.7.*');
//if ($response) {
//    echo '<tr  class="server">
//    <td class="icon"><img title="Minecraft" width="16" height="16" src="';
//    echo $response['favicon'];
//    echo '" /></td>
//    <td class="ServerQuery_VAC icon">
//    </td>
//    <td class="ServerQuery_hostname">';
//    echo '<a href="">';
//    echo $response['motd'] . ' [' . $host . ':' . $port . ']';
//    echo '</a>';
//
//    echo '</td><td class="ServerQuery_players">';
//    echo $response['players'] . '/' . $response['maxplayers'];
//    echo '</td><td class="ServerQuery_map">';
//    echo '</td></tr>';
//}

//TEAMSPEAK
echo '<tr  class="server">
    <td class="icon"><img title="TeamSpeak" width="16px" height="16px" style="width: 16px !important;" src="/images/ts-logo80.png" /></td>
    <td class="ServerQuery_VAC icon">
    </td>
    <td class="ServerQuery_hostname">';
echo '<a href="ts3server://ts.ezpz.cz">'. $translation['page']['ts'] .'</a>';
echo '</td><td class="ServerQuery_players"></td><td class="ServerQuery_map">';
echo '</td></tr>';

echo '</tbody >
</table >';

echo "<h2>". $translation['page']['idle_servers'] . "</h2>";

echo get_head_table($translation,"idle");

//IDLE SERVER
//for ($i = 30015; $i <= 30024; $i++) {
//    echo getServerInfo('csgo.ezpz.cz', $i, $translation);
//
//
//}

echo '  <div id="div-loader">
            <img src="http://ezpz.cz/ext/phpbb/pages/styles/pbtech/theme/gears.gif" alt="Loading..." style="display: block; margin-left: auto; margin-right: auto; cursor: wait;" />
        </div>
    </tbody >
</table >';

$time_elapsed_secs = microtime(true) - $start;
debug_to_console("idle " . $time_elapsed_secs);
$start = microtime(true);

echo '<h2>';
    echo $translation['page']['streamers'];
echo '</h2 >

<div class="hellk-mobile" >
    <a href = "http://www.twitch.tv/hellkevilk?tt_medium=live_embed&tt_content=text_link" style = "padding:2px 0px 4px; display:block; width:345px; font-weight:normal; font-size:10px;text-decoration:underline;" >
        Stream Hellkevilk
    </a ><br />
    <a href = "http://www.twitch.tv/hllava?tt_medium=live_embed&tt_content=text_link" style = "padding:2px 0px 4px; display:block; width:345px; font-weight:normal; font-size:10px;text-decoration:underline;" >
        Stream TM
    </a >
    <a href = " http://www.twitch.tv/thecylo?tt_medium=live_embed&tt_content=text_link" style = "padding:2px 0px 4px; display:block; width:345px; font-weight:normal; font-size:10px;text-decoration:underline;" >
        Strem Cylo
    </a >

</div >

<div class="tmWrapper" >
    <div class="tm" >
        <iframe src = "http://www.twitch.tv/hellkevilk/embed" frameborder = "0" scrolling = "no" height = "264" width = "434" ></iframe >
        <a href = "http://www.twitch.tv/hellkevilk?tt_medium=live_embed&tt_content=text_link" style = "padding:2px 0px 4px; display:block; width:345px; font-weight:normal; font-size:10px;text-decoration:underline;" >
            Watch live video from hellkevilk on www . twitch . tv
        </a >
    </div >
    <div class="tm" style = "margin-left: 1em;float: right;" >
        <iframe src = "http://www.twitch.tv/hllava/embed" frameborder = "0" scrolling = "no" height = "264" width = "434" ></iframe >
        <a href = "http://www.twitch.tv/hllava?tt_medium=live_embed&tt_content=text_link" style = "padding:2px 0px 4px; display:block; width:345px; font-weight:normal; font-size:10px;text-decoration:underline;" > Watch live video from hllava on www . twitch . tv </a >
    </div >
    <div class="tm" >
         <iframe src = " http://www.twitch.tv/thecylo/embed" frameborder = "0" scrolling = "no" height = "264" width = "434" ></iframe >
         <a href = " http://www.twitch.tv/thecylo?tt_medium=live_embed&tt_content=text_link" style = "padding:2px 0px 4px; display:block; width:345px; font-weight:normal; font-size:10px;text-decoration:underline;" > Watch live video from thecylo on www . twitch . tv </a >
    </div >';
$time_elapsed_secs = microtime(true) - $start;
debug_to_console("twitch " . $time_elapsed_secs);
