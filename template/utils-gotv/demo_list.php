<?php

include_once(dirname(__FILE__)."/../scripts-generic/servers.php");
include_once(dirname(__FILE__)."/config/translation_gotv.php");

if(!isset($_GET["server_id"]))
    die("ERROR: server_id is not set!");

if (!isset($_GET["lang"]))
    die("ERROR: lang is not set!");

function demStringToTime($format, $strdate) {
    $y=substr($strdate, 0, 4);
    $m=substr($strdate, 4, 2);
    $d=substr($strdate, 6, 2);
    $h=substr($strdate, 9, 2);
    $mi=substr($strdate, 11, 2);

    $strdate2 = "$m/$d/$y $h:$mi";
    return strftime($format,strtotime($strdate2));
}

try
{
    $server = GetServers()[$_GET["server_id"]];
    if (!($conn_id = ftp_connect($server["host"], $server["port"]))) throw new Exception("Couldn't connect to " . $server["host"] . ":" . $server["port"]);
    if (!ftp_login($conn_id, $server["username"], $server["password"])) throw new Exception("Couldn't login to " . $server["host"] . ":" . $server["port"]);
    ftp_pasv($conn_id, true);
    if(!($files = ftp_nlist($conn_id, $server["path"]))) throw new Exception("Couldn't get directory from " . $server["host"] . ":" . $server["port"]);

    $files = array_filter($files, function ($f) {
        return strpos($f, ".dem") !== false;
    });
    $files = array_reverse($files);

    $translation = getGotvTranslation($_GET["lang"]);

    $tableHeader = "
        <th>" . $translation["table_headers"]["datetime"] . "</th>
        <th>" . $translation["table_headers"]["server"] . "</th>
        <th>" . $translation["table_headers"]["map"] . "</th>
        <th>" . $translation["table_headers"]["download"] . "</th>";

    $table = "  <table id='table-gotv' class='row-border hover'>
            <thead>" . $tableHeader . "</thead>
        <tbody id='table-body'>";

    $isMap = (isset($_GET["map"]) && $_GET["map"] != "") ? true : false;
    $dlPath = "http://ezpz.cz/ext/phpbb/pages/styles/pbtech/template/utils-gotv/download.php?server_id=" . $_GET["server_id"] . "&file=";
    $pattern = "/auto-(\d{8}-\d{6})-[^-]*-([^-]+)-.*\.dem/i";
    $hasFound = false;

    foreach ($files as $id => $file) {
        if (preg_match($pattern, $file, $matches)) {
            $map = $matches[2];
            $time = $matches[1];

            if ($isMap && strpos($map, $_GET["map"]) === false) {
                continue;
            }

            $table .=
                "<tr>
                <td>" . demStringToTime('%Y-%m-%d &nbsp; %H:%M', $time) . "</td>
                <td>" . $server["name"] . "</td>
                <td>" . $map . "</td>
                <td><a href='" . $dlPath . $file . "'>" . $translation["table_headers"]["download"] . "</a></td>
            </tr>";
            $hasFound = true;
        }
    }

    $table .=
        "   </tbody>
        </table>";

    header('Content-Type: application/json');

    echo json_encode(array(
        "success" => true,
        "data" => $table
    ));
}
catch(Exception $ex)
{
    header('Content-Type: application/json');

    echo json_encode(array(
        "success" => false,
        "data" => $ex->getMessage()
    ));
}

?>