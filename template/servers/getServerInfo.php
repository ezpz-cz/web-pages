<?php
$server_id = filter_input(INPUT_GET, 'server_id', FILTER_SANITIZE_SPECIAL_CHARS);
$from = filter_input(INPUT_GET, 'from', FILTER_SANITIZE_SPECIAL_CHARS);
$to = filter_input(INPUT_GET, 'to', FILTER_SANITIZE_SPECIAL_CHARS);
IF ($server_id !== NULL && $server_id !== '') {
    IF ($server_id === "unique") {
        echo json_encode(getServerStatsUnique($db_ip, $db_port, $db_login, $db_pass, 'soe-hlstats', $from, $to));
    } elseif ($server_id === "notunique") {
        echo json_encode(getServerStatsNotUnique($db_ip, $db_port, $db_login, $db_pass, 'soe-hlstats', $from, $to));
    } else {
        echo json_encode(getServerStats($db_ip, $db_port, $db_login, $db_pass, 'soe-hlstats', $from, $to, $server_id));
    }
} else {
//$ip   = filter_input(INPUT_GET, 'ip', FILTER_SANITIZE_SPECIAL_CHARS);
//$port = filter_input(INPUT_GET, 'port', FILTER_SANITIZE_SPECIAL_CHARS);
//$out  = "";
//$out  = getServerInfo($ip, $port);
////Classic #1 – csgo.ezpz.cz:27016
//$out = getServerInfo("csgo.ezpz.cz", 27016);
//Classic #1 – csgo.ezpz.cz:27015
//$out .= getServerInfo("csgo.ezpz.cz", "27015");
//Dust2 ONLY – csgo2.ezpz.cz:27015
//$out .= getServerInfo("csgo2.ezpz.cz", 27015);
////AIM+AWP – csgo.ezpz.cz:27018
//$out .= getServerInfo("csgo.ezpz.cz", "27018");
//AIM+AWP DM – csgo2.ezpz.cz:27020
//$out .= getServerInfo("csgo2.ezpz.cz", 27020);
//ARENA 1vs1 – csgo2.ezpz.cz:27030
//$out .= getServerInfo("csgo2.ezpz.cz", 27030);
////IDLE #1 – csgo.ezpz.cz:30016
    $out = "";

    for ($i = 30015; $i <= 30024; $i++) {
//for ($i = 30024; $i >= 30015; $i--) {
        $out .= getServerInfo('csgo.ezpz.cz', $i, $translation);
    }

//echo ($out);
    echo json_encode($out);


}
