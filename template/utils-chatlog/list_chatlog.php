<?php
    //$start = microtime(true);

    session_start();

    if (!isset($_GET["serverid"]))
        die("serverid is not set!");
    
    if (!isset($_GET["lang"]))
        die("lang is not set!");
        
    /*if (!isset($_GET["username"]))
        die("username is not set!");*/

    try
    {
        include_once(dirname(__FILE__)."/../scripts-generic/servers.php");
        include_once(dirname(__FILE__)."/../scripts-generic/getPDO.php");
        include_once(dirname(__FILE__)."/../scripts-generic/PDOQuery.php");

        if ($_GET["serverid"] == "-1")
        {
            $server = NULL;
        }
        else
        {
            $server = GetServers()[$_GET["serverid"]];
        }

        $lang = $_GET["lang"];

        $pdo = getPDOConnection();

        $by_nickname = $_GET['nickname'];
        $by_steamid = preg_replace("/STEAM_.:/", "", $_GET['steamid']);
        $by_ip = $_GET['ip'];
        $by_msg = $_GET['msg'];

        if ($by_nickname == "" AND $by_steamid == "" AND $by_ip == "" AND $by_msg == "")
        {
            $no_filter = True;
        }
        else
        {
            $no_filter = False;
        }

        $conditions = array();
        $parameters = array();
    
        if($server != NULL)
        {
            if ($no_filter)
            {
                $conditions[] = " AND servers.serverId = :server_id";
            }
            else
            {
                $conditions[] = " servers.serverId = :server_id";
            }
            $parameters[":server_id"] = intval($server["hlstats_id"]);
        }

        if($by_nickname != "")
        {
            $conditions[] = " players.lastName LIKE :nickname";
            $parameters[":nickname"] = "%$by_nickname%";
        }

        if($by_steamid != "")
        {
            $conditions[] = " ids.uniqueId = :steamid";
            $parameters[":steamid"] = $by_steamid;
        }

        if($by_ip != "")
        {
            $conditions[] = " players.lastAddress = :ip";
            $parameters[":ip"] = $by_ip;
        }

        if($by_msg != "")
        {
            $conditions[] = " chat.message LIKE :msg";
            $parameters[":msg"] = "%$by_msg%";
        }

        $where = "";

        if (count($conditions) > 0)
        {
            //$where = " WHERE " . implode(' AND ', $conditions);
            $where = implode(' AND ', $conditions);
        }

        /*$query = "
            SELECT
                Time,
                Map,
                Nickname,
                SteamID,
                IP,
                Server,
                Msgtype,
                Msg,
                playerID
            FROM (
                SELECT
                    chat.eventTime AS Time,
                    chat.id AS MsgId,
                    chat.map AS Map,
                    chat.message_mode AS Msgtype,
                    chat.message AS Msg,
                    players.lastName AS Nickname,
                    players.lastAddress AS IP,
                    players.playerId AS playerID,
                    ids.uniqueId AS SteamID,
                    servers.name AS Server,
                    servers.serverId AS ServerHLStatsID
                FROM hlstats_Events_Chat AS chat
                JOIN hlstats_Players AS players ON players.playerId = chat.playerId
                JOIN hlstats_PlayerUniqueIds AS ids ON ids.playerId = chat.playerId
                JOIN hlstats_Servers AS servers ON servers.serverId = chat.serverId
                ORDER BY MsgId DESC) AS result"
            . $where .
            (($by_nickname == "" AND $by_steamid == "" AND $by_ip == "") ? " LIMIT 0, 5000;" : ";");*/

        $query = "SELECT
                      chat.eventTime AS Time,
                      chat.map AS Map,
                      players.lastName AS Nickname,
                      ids.uniqueId AS SteamID,
                      players.lastAddress AS IP,
                      servers.name AS Server,
                      servers.serverId AS ServerHLStatsID,
                      chat.message_mode AS Msgtype,
                      chat.message AS Msg,
                      players.playerId AS playerID
                    FROM
                      `soe-hlstats`.hlstats_Events_Chat AS chat
                    JOIN
                      `soe-hlstats`.hlstats_Players AS players ON players.playerId = chat.playerId
                    JOIN
                      `soe-hlstats`.hlstats_PlayerUniqueIds AS ids ON ids.playerId = chat.playerId
                    JOIN
                      `soe-hlstats`.hlstats_Servers AS servers ON servers.serverId = chat.serverId
                    WHERE " .
                        ($no_filter
                        ? " chat.id >= (SELECT MAX(id) FROM `soe-hlstats`.hlstats_Events_Chat) - 5000 "
                        : "")
                    . $where;
            //(($by_nickname == "" AND $by_steamid == "" AND $by_ip == "") ? " LIMIT 0, 5000;" : ";");
        //echo $query;

        $result = getPDOParametrizedQueryResult($pdo, $query, $parameters, __FILE__, __LINE__);
        if (!$result and !empty($result))
        {
            throw new Exception("Cannot get the query result!");
        }

        if ($_SESSION['ezpz_sb_admin'] == "1")
        {
            $isAdmin = TRUE;
        }
        else
        {
            $isAdmin = FALSE;
        }
        
        if ($lang == "cz")
        {
            $tableHeader = '
                <th>Datum a čas</th>
                <th>Typ</th>
                <th>Zpráva</th>
                <th>Nickname</th>
                <th>SteamID</th>
                <th>IP</th>
                <th>Server</th>
                <th>Mapa</th>' .
                ($isAdmin ? "<th>Akce</th>" : "");
        }
        else
        {
            $tableHeader = '
                <th>Date & Time</th>
                <th>Type</th>
                <th>Message</th>
                <th>Nickname</th>
                <th>SteamID</th>
                <th>IP</th>
                <th>Server</th>
                <th>Map</th>' .
                ($isAdmin ? "<th>Action</th>" : "");
        }
        
        $table = '
                <table id="table-chatlog" class="row-border hover">
                    <thead>'
                        . $tableHeader .
                    '</thead>
                    <tbody id="table-body">';
        
        foreach($result as $row)
        {
          $table .=
            "<tr>\n
                <td>" . $row['Time'] . "</td>\n
                <td>" . ($row['Msgtype'] == 1 ? "All" : "Team") . "</td>\n
                <td style='text-align: left; font-weight: bold;'>" . $row['Msg'] . "</td>\n
                <td style='font-weight: bold;'><a class='nickname' href='http://sourcebans.ezpz.cz/subdom/sourcebans/index.php?SBBan[name]=" . $row['Nickname'] . "' playerid='" . $row["playerID"] . "'>" . $row['Nickname'] . "</a></td>\n
                <td><a href='http://sourcebans.ezpz.cz/subdom/sourcebans/index.php?SBBan[steam]=" . $row['SteamID'] . "'>STEAM_1:" . $row['SteamID'] . "</a></td>\n
                <td><a href='http://sourcebans.ezpz.cz/subdom/sourcebans/index.php?SBBan[ip]=" . $row['IP'] . "'>" . $row['IP'] . "</a></td>\n
                <td>" . $row['Server'] . "</td>\n
                <td>" . $row['Map'] . "</td>\n" .
                ($isAdmin ? "
                <td>
                    <a class='ban fancybox.iframe' href='http://ezpz.cz/ext/phpbb/pages/styles/pbtech/template/scripts-generic/addban/addban.html?nickname=" . rawurlencode($row['Nickname']) . 
                    "&steamid=STEAM_1:" . rawurlencode($row['SteamID']) . 
                    "&ip=" . rawurlencode($row['IP']) . 
                    "&server=" . rawurlencode($row['Server']) . "'>
                        BAN
                    </a>
                </td>\n" : "") .
            "</tr>\n";
        }
                
        $table .= "   </tbody>
                </table>";
        
        echo $table;
    }
    catch(Exception $ex)
    {
        echo $ex->getMessage();
    }

//echo "php execution time: " . (microtime(true) - $start);
?>