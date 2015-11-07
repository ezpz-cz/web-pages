<?php
//include "getServerInfo.php";

echo '<table class="items table table-accordion table-condensed table-hover">
<thead>
<tr>
    <th class="icon" >';
if ($lang = "cz") {
    echo "Hra";
} else {
    echo "Game";
}
echo '</th>
    <th class="ServerQuery_VAC icon" >VAC</th>
    <th class="ServerQuery_hostname">';
if ($lang = "cz") {
    echo "Název";
} else {
    echo "Name";
}
echo '</th>
    <th class="ServerQuery_players">';
if ($lang = "cz") {
    echo "Hráči";
} else {
    echo "Players";
}
echo '</th>
    <th class="ServerQuery_map">';
if ($lang = "cz") {
    echo "Mapa";
} else {
    echo "Maps";
}
echo '</th>
</tr>
</thead>
<tbody>';

//TEAMSPEAK
echo '<tr  class="server">
    <td class="icon"><img title="TeamSpeak" width="16" height="16" src="/images/ts-logo80.png" /></td>
    <td class="ServerQuery_VAC icon">
    </td>
    <td class="ServerQuery_hostname">';
echo '<a href="ts3server://ts.ezpz.cz">EzPz.cz TeamSpeak / ts.ezpz.cz</a>';
echo '</td><td class="ServerQuery_players"></td><td class="ServerQuery_map">';
echo '</td></tr>';

echo '</tbody >
</table >';

//echo '<h2 class="pages-title" >';
//if ($lang = "cz") {
//    echo "Streameri";
//} else {
//    echo "Streamers";
//}
//echo '</h2 >
//
//<div class="hellk-mobile" >
//    <a href = "http://www.twitch.tv/hellkevilk?tt_medium=live_embed&tt_content=text_link" style = "padding:2px 0px 4px; display:block; width:345px; font-weight:normal; font-size:10px;text-decoration:underline;" >
//        Stream Hellkevilk
//    </a ><br />
//    <a href = "http://www.twitch.tv/hllava?tt_medium=live_embed&tt_content=text_link" style = "padding:2px 0px 4px; display:block; width:345px; font-weight:normal; font-size:10px;text-decoration:underline;" >
//
//        Stream TM
//    </a >
//</div >
//
//<div class="tmWrapper" >
//    <div class="tm" >
//        <iframe src = "http://www.twitch.tv/hellkevilk/embed" frameborder = "0" scrolling = "no" height = "264" width = "434" ></iframe >
//        <a href = "http://www.twitch.tv/hellkevilk?tt_medium=live_embed&tt_content=text_link" style = "padding:2px 0px 4px; display:block; width:345px; font-weight:normal; font-size:10px;text-decoration:underline;" >
//            Watch live video from hellkevilk on www . twitch . tv
//        </a >
//    </div >
//    <div class="tm" style = "margin-left: 1em;float: right;" >
//        <iframe src = "http://www.twitch.tv/hllava/embed" frameborder = "0" scrolling = "no" height = "264" width = "434" ></iframe >
//        <a href = "http://www.twitch.tv/hllava?tt_medium=live_embed&tt_content=text_link" style = "padding:2px 0px 4px; display:block; width:345px; font-weight:normal; font-size:10px;text-decoration:underline;" > Watch live video from hllava on www . twitch . tv </a >
//    </div >
//    <div class="tm" >
//        <iframe src = "http://www.twitch.tv/officialcylo/embed" frameborder = "0" scrolling = "no" height = "264" width = "434" ></iframe ><a href = "http://www.twitch.tv/officialcylo?tt_medium=live_embed&tt_content=text_link" style = "padding:2px 0px 4px; display:block; width:345px; font-weight:normal; font-size:10px;text-decoration:underline;" > Watch live video from officialcylo on www . twitch . tv </a >
//    </div >';
