<?php
function getPDOConnection()
{
    try
    {
        $opt = array(
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        );
        include(dirname(__FILE__)."/../config/config.php");
        return new PDO("mysql:host=$db_ip;port=$db_port;dbname=soe-csgo;charset=utf8", $db_login, $db_pass, $opt);
    }
    catch(PDOException $ex)
    {
        echo $ex->getMessage();
    }
}