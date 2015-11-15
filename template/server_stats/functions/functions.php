<?php
function getActivity($host, $port, $login, $pass, $name, $from, $to)
{
    $options = array(
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    );
    $conn = new PDO("mysql:host=$host;port=$port;dbname=$name", $login, $pass, $options);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT h.playerid, DATE_FORMAT(MIN(h.eventTime),'%d.%m.%Y') as minDate, DATE_FORMAT(MAX(h.eventTime),'%d.%m.%Y') as maxDate, TIME_FORMAT(SEC_TO_TIME(SUM(h.connection_time)),'%H:%i:%s') as connection_time, SUM(h.connection_time) as seconds, a.name
            FROM `soe-csgo`.`sb_admins` as a
            LEFT JOIN `soe-hlstats`.`hlstats_PlayerUniqueIds`as u ON u.uniqueId = SUBSTRING(a.identity,9)
            LEFT JOIN `soe-hlstats`.`hlstats_Players_History` as h ON h.playerId = u.playerId
            WHERE a.group_id <> 'NULL'
              AND h.game LIKE 'csgo'
            ";
    if ($from !== '' AND $from !== NULL) {
        $sql .= "AND h.eventTime >= '" . $from . "'";
    }
    if ($to !== '' AND $to !== NULL) {
        $sql .= "AND h.eventTime <= '" . $to . "'";
    }
    $sql .= " GROUP BY h.playerId
            ORDER BY `seconds`  DESC";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    return $stmt->fetchAll();
}

function getActivityHtml($activity, $translation)
{
    $result = "";

    $result .= getHeader($translation);

    $result .= "<tbody>";
    foreach ($activity as $admin) {
        $result .= getBody($admin);
//        echo '<pre>';
//        var_dump($admin);
//        echo '</pre>';

    }
    $result .= "</tbody>";
    $result .= "</table>";
    return $result;
}

function getHeader($translation)
{
    $result = "<table id=\"activityTable\" class=\"display\" cellspacing=\"0\" width=\"100%\"><thead>";
    $result .=getHeaderRow($translation);
    $result .= "</thead><tfoot>";
    $result .=getHeaderRow($translation);
    $result .= "</tfoot>";
    return $result;
}

function getHeaderRow($translation)
{
    $result = "<tr><th>";
    $result .= $translation['table_headers']['nick'];
    $result .= "</th><th>";
    $result .= $translation['table_headers']['interval'];
    $result .= "</th><th>";
    $result .= $translation['table_headers']['played'];
    $result .= "</th></tr>";
    return $result;
}
function getBody($admin)
{
    $result = "<tr><td>";
    $result .= $admin['name'];
    $result .= "</th><th>";
    $result .= $admin['minDate'] ."-". $admin['maxDate'];
    $result .= "</th><th>";
    $result .= $admin['connection_time'];
    $result .= "</th></tr>";
    return $result;
}
