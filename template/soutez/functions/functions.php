<?php
function getKills($host, $port, $login, $pass, $name, $from, $to)
{
    $options = array(
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    );
    $conn = new PDO("mysql:host=$host;port=$port;dbname=$name", $login, $pass, $options);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//    $sql = "SELECT SUM(s.kills) as kills, p.lastName, flag, country FROM `soe-hlstats`.`hlstats_Events_Statsme` as s
//                INNER JOIN hlstats_Players as p ON p.playerId = s.playerId
//                where (weapon like 'ak47' OR weapon like 'm4a1')
//                   AND (s.serverId = 3 OR serverId = 6)
//
//                ";
 $sql = "SELECT COUNT(id) as kills, lastName, flag, country, playerId FROM `hlstats_Events_Frags` as s
INNER JOIN hlstats_Players as p ON p.playerId = s.killerId
where `weapon` IN ('m4a1%', 'ak47')
AND serverId IN (3, 6)";

    if ($from !== '' AND $from !== NULL) {
        $sql .= "AND s.eventTime >= '" . $from . "'";
    }
    if ($to !== '' AND $to !== NULL) {
        $sql .= "AND s.eventTime <= '" . $to . "'";
    }

    $sql .= " GROUP BY killerId
ORDER BY `kills` DESC";
//    $sql .= " GROUP by s.playerId
//                ORDER BY `kills` DESC";



    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    return $stmt->fetchAll();
}

function getActivityHtml($kills, $translation)
{
    $result = "";

    $result .= getHeader($translation);

    $result .= "<tbody>";
    $poradie = 0;
    foreach ($kills as $kill) {
        $poradie += 1;
        $result .= getBody($kill,$poradie);
    }
    $result .= "</tbody>";
    $result .= "</table>";
    return $result;
}

function getHeader($translation)
{
    $result = "<table id=\"contest\" class=\"display\" cellspacing=\"0\" width=\"100%\"><thead>";
    $result .=getHeaderRow($translation);
    $result .= "</thead><tfoot>";
    $result .=getHeaderRow($translation);
    $result .= "</tfoot>";
    return $result;
}

function getHeaderRow($translation)
{
    $result = "<tr><th>";
    $result .= "#";
    $result .= "</th><th>";
    $result .= $translation['table_headers']['nick'];
    $result .= "</th><th>";
    $result .= $translation['table_headers']['kills'];
    $result .= "</th></tr>";
    return $result;
}
function getBody($kill,$poradie)
{
    $result = "<tr><th>";
    $result .= $poradie;
    $result .= "</th><th>";

    $result .= "<img src=\"http://stats.ezpz.cz/hlstatsimg/flags/";

    if($kill['flag'] === ''){
        $result .= "0";
    }else{
        $result .= strtolower ($kill['flag']);
    }
    $result .= ".gif\" style=\"margin-right: 5px;\" alt=\"". strtolower ($kill['country']) ."\" title=\"". strtolower ($kill['country']) ."\">";



    $result .= $kill['lastName'];
    $result .= "</th><th>";
    $result .= $kill['kills'];
    $result .= "</th></tr>";
    return $result;
}
