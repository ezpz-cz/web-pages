<?php
    // Returns assoc array of names with values:
    // [server_id] => x
    // [name] => server name
    // [host] => host
    // [port] => server port
    // [username] => username
    // [password] => password
    // [order_priority] => x
    // [hlstats_id] => x
    function GetServers()
    {
        include_once(dirname(__FILE__)."/getPDO.php");
        include_once(dirname(__FILE__)."/PDOQuery.php");

        $pdo = getPDOConnection();

        $query = "SELECT * FROM `soe-csgo`.`utils_servers` ORDER BY order_priority;";
        $result = getPDOQueryResult($pdo, $query, __FILE__, __LINE__);
        $res = array();

        foreach ($result as $row)
        {
          $res[$row["server_id"]] = $row;
        }

        return $res;
    }

?>