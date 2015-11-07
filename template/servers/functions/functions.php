<?php
function debug_to_console($data)
{
    if (is_array($data))
        $output = "<script>console.log( 'Debug Objects: " . implode(',', $data) . "' );</script>";
    else
        $output = "<script>console.log( 'Debug Objects: " . $data . "' );</script>";

    echo $output;
}

function getServerInfo($ip, $port, $translation)
{
    $SQ_SERVER_ADDR = $ip;
    $SQ_SERVER_PORT = $port;
    $SQ_TIMEOUT = 5;
    $SQ_ENGINE = SourceQuery :: SOURCE;

    $Query = new SourceQuery();

    $connect = $translation['table_headers']['connect'];
    $nick = $translation['table_headers']['nick'];
    $score = $translation['table_headers']['score'];
    $time = $translation['table_headers']['time'];

    try {
        $Query->Connect($SQ_SERVER_ADDR, $SQ_SERVER_PORT, $SQ_TIMEOUT, $SQ_ENGINE);

        $ip = $SQ_SERVER_ADDR . ':' . $SQ_SERVER_PORT;
        $server_info = $Query->GetInfo();
        if ($server_info !== false) {
            $server_name = $server_info['HostName'];

            $server_map = $server_info['Map'];
            $server_port = $server_info['GamePort'];

            $server_max = $server_info['MaxPlayers'];
            $server_players = $server_info['Players'];
            $players = $Query->GetPlayers();


            $result = '<tr  class="server"  data-key="' . $server_info['ServerID'] . '" data-game-folder="csgo">
    <td class="icon"><img src="./..//images/games/csgo.png" alt="Counter-Strike: Global Offensive" title="Counter-Strike: Global Offensive"></td>
    <td class="ServerQuery_VAC icon"><img src="./../images/secure.png" alt="Valve Anti-Cheat"></td>
    <td class="ServerQuery_hostname">';
            $result .= '<a href="steam://connect/' . $ip . '" title="';
            $result .= $connect;
            $result .= '">';
            $result .= $server_name;
            $result .= '</a>';
            $result .= '</td>
    <td class="ServerQuery_players">';
            $result .= $server_players . '/' . $server_max;
            $result .= '</td>
    <td class="ServerQuery_map">';
            $result .= $server_map;
            $result .= '</td>
</tr>';

            $result .= '<tr class="section" id="server-section-' . $server_info['ServerID'] . '">
    <td colspan="6">
        <div>
            <table class="table table-condensed table-hover pull-left" style="max-width: 430px">
                <thead>
                <tr>
                    <th>';


            $result .= $nick;

            $result .= '</th>
                    <th class="nowrap text-right">';

            $result .= $score;
            $result .= '</th>
                    <th class="nowrap">';
            $result .= $time;
            $result .= '</th>
                </tr>
                </thead>
                <tbody>';
            foreach ($players as $player) {
                if ($player['Name'] !== '') {
                    $result .= '<tr class="player" >
                    <td>';
                    $result .= $player['Name'];
                    $result .= '</td>
                    <td class="text-right">';
                    $result .= $player['Frags'];
                    $result .= '</td>
                    <td class="nowrap text-right">';
                    $result .= $player['TimeF'];
                    $result .= '</td></tr>';
                }
            }

            $result .= '</tbody>
            </table>
            <div class="pull-right">';
            if (@getimagesize('http://ezpz.cz/images/maps/csgo/' . $server_map . '.jpg') === false) {
                $result .= '<img alt="' . $server_map . '" class="map-image img-rounded" width="340px" height="255px"
                           src="./../images/maps/unknown.jpg">';
            } else {
                $result .= '<img alt="' . $server_map . '" class="map-image img-rounded" width="340px" height="255px"
                           src="./../images/maps/csgo/' . $server_map . '.jpg">';
            }
            $result .= '<div class="well text-center"><p>' .
                $ip
                . '</p>
                    <a class="btn btn-success" href="steam://connect/' . $ip . '">';

            $result .= $connect;
            $result .= '</a>

                </div>
            </div>
        </div>
    </td>
</tr>';
        }
    } catch (Exception $e) {
        $result .= $e;
    }

    return $result;
}

function get_head_table($translation, $id = "")
{
    $temp = '<table class="items table table-accordion table-condensed table-hover ">
    <thead>
    <tr>
        <th class="icon" >';
    $temp .= $translation["table_headers"]["game"];
    $temp .= '</th>
        <th class="ServerQuery_VAC icon" >' . $translation["table_headers"]["vac"] . '</th>
        <th class="ServerQuery_hostname">';
    $temp .= $translation["table_headers"]["name"];
    $temp .= '</th>
        <th class="ServerQuery_players">';
    $temp .= $translation["table_headers"]["players"];
    $temp .= '</th>
        <th class="ServerQuery_map">';
    $temp .= $translation["table_headers"]["map"];
    $temp .= '</th>
    </tr>
    </thead>
    <tbody id="'. $id .'">';
    return $temp;
}

function getServerStats($host, $port, $login, $pass, $name, $from, $to, $serverid)
{
        $options = array(
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        );
        $conn = new PDO("mysql:host=$host;port=$port;dbname=$name", $login, $pass, $options);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT COUNT(id) as pocet, DATE(eventTime) as eventTime FROM `hlstats_Events_Entries` as e
            WHERE  serverId LIKE " . $serverid ;
        if ($from !== '' AND $from !== NULL) {
            $sql .= " AND eventTime >= '" . $from . "'";
        }
        if ($to !== '' AND $to !== NULL) {
            $sql .= " AND eventTime <= '" . $to . "'";
        }
        $sql .= " GROUP By DATE(eventTime)";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        foreach ($stmt->fetchAll() as $rec) {
            $results[] = array(strtotime($rec['eventTime']) * 1000,intval($rec['pocet']));
        };
        return $results;
}

function getServerStatsUnique($host, $port, $login, $pass, $name, $from, $to)
{
    $options = array(
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    );
    $conn = new PDO("mysql:host=$host;port=$port;dbname=$name", $login, $pass, $options);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT COUNT(playerId) as pocet, eventTime
FROM `hlstats_Players_History` as h
WHERE game LIKE 'csgo' ";
    if ($from !== '' AND $from !== NULL) {
        $sql .= "AND h.eventTime >= '" . $from . "'";
    }
    if ($to !== '' AND $to !== NULL) {
        $sql .= "AND h.eventTime <= '" . $to . "'";
    }
    $sql .= " group by h.eventTime";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    foreach ($stmt->fetchAll() as $rec) {
        $results[] = array(strtotime($rec['eventTime']) * 1000,intval($rec['pocet']));
    };
    return $results;

}
function getServerStatsNotUnique($host, $port, $login, $pass, $name, $from, $to)
{
    $options = array(
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    );
    $conn = new PDO("mysql:host=$host;port=$port;dbname=$name", $login, $pass, $options);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT COUNT(id) as pocet, DATE(eventTime) as eventTime FROM `hlstats_Events_Entries` as e
            INNER JOIN hlstats_Servers as s on s.serverId = e.serverId
            WHERE e.serverId != -1 ";
    if ($from !== '' AND $from !== NULL) {
        $sql .= "AND eventTime >= '" . $from . "'";
    }
    if ($to !== '' AND $to !== NULL) {
        $sql .= "AND eventTime <= '" . $to . "'";
    }
    $sql .= " GROUP By DATE(eventTime)";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    foreach ($stmt->fetchAll() as $rec) {
        $results[] = array(strtotime($rec['eventTime']) * 1000,intval($rec['pocet']));
    };
    return $results;

}
