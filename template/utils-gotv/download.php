<?php

include_once(dirname(__FILE__)."/../scripts-generic/servers.php");

if(!isset($_GET["server_id"]))
    die("ERROR: No server specified!");
if(!isset($_GET["file"]))
    die("ERROR: No file specified!");

try {
    $pattern = "/auto-(\d{8}-\d{6})-[^-]*-([^-]+)-.*\.dem/i";
    //$pattern = "auto-\d{8}-\d{6}--.+-\.(dem\.zip|dem)/i";
    if (!preg_match($pattern, $_GET['file']))
        throw new Exception("ERROR: Wrong demo format!");

    $filePath = $_GET['file'];
    $fileName = basename($_GET['file']);

    if (!file_exists($fileName))
    {
        $server = GetServers()[$_GET["server_id"]];
        if (!($conn_id = ftp_connect($server["host"], $server["port"]))) throw new Exception("Couldn't connect to " . $server["host"] . ":" . $server["port"]);
        if (!ftp_login($conn_id, $server["username"], $server["password"])) throw new Exception("Couldn't login to " . $server["host"] . ":" . $server["port"]);
        ftp_pasv($conn_id, true);
        if(!($files = ftp_nlist($conn_id, $server["path"]))) throw new Exception("Couldn't get directory from " . $server["host"] . ":" . $server["port"]);

        //echo $filePath;
        //print_r($files);

        if (!in_array($filePath, $files))
        {
            $filePath = $filePath . ".zip";
            $fileName = $fileName . ".zip";

            if (!in_array($filePath, $files)) throw new Exception("ERROR: File is not on the remote server!");
        }

        ftp_get($conn_id, $fileName, $filePath, FTP_BINARY);
    }

    if (file_exists($fileName))
    {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($fileName));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($fileName));
        readfile($fileName);
    }
    else
    {
        throw new Exception("ERROR: File was not downloaded to server!");
    }
}
catch (Exception $ex)
{
    echo $ex->getMessage();
}