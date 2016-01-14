<?php
function getActivity($host, $port, $login, $pass, $name, $from, $to)
{
    $options = array(
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    );
    $conn = new PDO("mysql:host=$host;port=$port;dbname=$name", $login, $pass, $options);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



//    $sql = "SELECT a.name as name, h.playerid, u.playerId, minDate, maxDate, connection_time, seconds
//            FROM `soe-csgo`.`sb_admins` as a
//            INNER JOIN  `soe-hlstats`.`hlstats_PlayerUniqueIds`as u ON u.uniqueId = SUBSTRING(a.identity,9)
//            LEFT JOIN (
//                SELECT h.playerid, DATE_FORMAT(MIN(h.eventTime),'%d.%m.%Y') as minDate, DATE_FORMAT(MAX(h.eventTime),'%d.%m.%Y') as maxDate,
//                       TIME_FORMAT(SEC_TO_TIME(SUM(h.connection_time)),'%H:%i:%s') as connection_time, SUM(h.connection_time) as seconds
//                    FROM `soe-hlstats`.`hlstats_Players_History` as h
//                    where h.game LIKE 'csgo'";
//    if ($from !== '' AND $from !== NULL) {
//        $sql .= "AND h.eventTime >= '" . $from . "'";
//    }
//    if ($to !== '' AND $to !== NULL) {
//        $sql .= "AND h.eventTime <= '" . $to . "'";
//    }
//    $sql .= " GROUP BY h.playerId
//        ) as h ON h.playerId = u.playerId
//     WHERE a.group_id <> 'NULL'
//       AND u.game LIKE 'csgo'
//     ORDER BY  `seconds`  DESC";


    $sql = "SELECT a.name as name, h.playerid, u.playerId, minDate, maxDate, connection_time, seconds,spolu, vyriesenych, nevyriesenych
            FROM `soe-csgo`.`sb_admins` as a
            INNER JOIN  `soe-hlstats`.`hlstats_PlayerUniqueIds`as u ON u.uniqueId = SUBSTRING(a.identity,9)
            LEFT JOIN ( SELECT h.playerid, DATE_FORMAT(MIN(h.eventTime),'%d.%m.%Y') as minDate, DATE_FORMAT(MAX(h.eventTime),'%d.%m.%Y') as maxDate,
                       		   TIME_FORMAT(SEC_TO_TIME(SUM(h.connection_time)),'%H:%i:%s') as connection_time, SUM(h.connection_time) as seconds
                    	FROM `soe-hlstats`.`hlstats_Players_History` as h
                    	where h.game LIKE 'csgo'";
    if ($from !== '' AND $from !== NULL) {
        $sql .= " AND h.eventTime >= '" . $from . "'";
    }
    if ($to !== '' AND $to !== NULL) {
        $sql .= " AND h.eventTime <= '" . $to . "'";
    }
    $sql .= " GROUP BY h.playerId
        			  ) as h ON h.playerId = u.playerId
        	LEFT JOIN(SELECT r.admin_id, COUNT(r.id) as spolu, vyriesenych, nevyriesenych
                      FROM `ezpz-report-g`.`report_report` as r
                      LEFT JOIN ( select COUNT(r1.id) as nevyriesenych, r1.admin_id
                                 FROM`ezpz-report-g`.`report_report` as r1
                                 WHERE r1.status_id IN (1,2)";
    if ($from !== '' AND $from !== NULL) {
        $sql .= " AND r1.`time_create` >= '" . $from . "'";
    }
    if ($to !== '' AND $to !== NULL) {
        $sql .= " AND r1.`time_create` <= '" . $to . " 23:59:59'";
    }
    $sql .= " group by r1.admin_id
                                ) as r1
                      on r.admin_id = r1.admin_id
                      LEFT JOIN ( select COUNT(r2.id) as vyriesenych, r2.admin_id
                                 FROM`ezpz-report-g`.`report_report` as r2
                                 WHERE r2.status_id IN (3,4,5)";
    if ($from !== '' AND $from !== NULL) {
        $sql .= " AND r2.`time_create` >= '" . $from . "'";
    }
    if ($to !== '' AND $to !== NULL) {
        $sql .= " AND r2.`time_create` <= '" . $to . " 23:59:59'";
    }
    $sql .= " group by r2.admin_id
                                ) as r2
                      on r.admin_id = r2.admin_id
               WHERE r.id > 0";
    if ($from !== '' AND $from !== NULL) {
        $sql .= " AND r.`time_create` >= '" . $from . "'";
    }
    if ($to !== '' AND $to !== NULL) {
        $sql .=" AND r.`time_create` <= '" . $to . " 23:59:59'";
    }
    $sql .= " GROUP BY r.admin_id
                      ORDER BY r.admin_id) as report on report.admin_id = a.id
     WHERE a.group_id <> 'NULL'
       AND u.game LIKE 'csgo'
     ORDER BY  `seconds`  DESC";
//    echo '<pre>';
//    var_dump($sql);
//    echo '</pre>';
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
    $result .= "</th><th>";
    $result .= $translation['table_headers']['sum'];
    $result .= "</th><th>";
    $result .= $translation['table_headers']['solved'];
    $result .= "</th><th>";
    $result .= $translation['table_headers']['unsolved'];
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
    if($admin['connection_time'] === NULL)
        $result .= "00:00:00";
    else
        $result .= $admin['connection_time'];
    $result .= "</th><th>";
    if($admin['spolu'] === NULL)
        $result .= "0";
    else
        $result .= $admin['spolu'];
    $result .= "</th><th>";
    if($admin['vyriesenych'] === NULL)
        $result .= "0";
    else
        $result .= $admin['vyriesenych'];
    $result .= "</th><th>";
    if($admin['nevyriesenych'] === NULL)
        $result .= "0";
    else
        $result .= $admin['nevyriesenych'];

    $result .= "</th></tr>";
    return $result;
}
