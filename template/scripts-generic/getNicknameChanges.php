<?php

if (!isset($_GET["playerid"]))
{
    die("playerid is not set!");
}
else
{
    $playerId = $_GET["playerid"];
}

include_once(dirname(__FILE__)."/getPDO.php");
include_once(dirname(__FILE__)."/PDOQuery.php");

$pdo = getPDOConnection();

$query = "
    SELECT oldName, newName, eventTime
    FROM `soe-hlstats`.hlstats_Events_ChangeName
    WHERE playerId = :playerId";

$result = getPDOParametrizedQueryResult($pdo, $query, array(":playerId" => $playerId), __FILE__, __LINE__);

if (!$result or empty($result))
{
    echo "Žádná změna nicků / No nickname changes";
}
else
{
    $nicknames = "";

    foreach($result as $row)
    {
        $nicknames .= "<br /><i>" . $row["eventTime"]. "</i><br />" . $row["oldName"] . " <b>→</b> " . $row["newName"] . "<br />";
    }

    echo $nicknames;
}

?>