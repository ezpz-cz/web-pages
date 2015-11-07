<?php
session_start();

if ($_SESSION['ezpz_sb_admin'] != "1")
{
    die("You are not admin!");
}

include("../getPDO.php");
include("../PDOQuery.php");

$pdo = getPDOConnection();

$query = "INSERT INTO `sb_bans` (
                    `type`,
                    `steam`,
                    `ip`,
                    `name`,
                    `reason`,
                    `length`,
                    `admin_id`,
                    `create_time`)
                VALUES (
                    '0',
                    :steamid,
                    :ip,
                    :nickname,
                    :reason,
                    :length,
                    :admin_id,
                    UNIX_TIMESTAMP(NOW()))";

//echo $query;

$parameters = array(":steamid" => $_POST['steamid'], ":ip" => $_POST['ip'],
    ":nickname" => $_POST['nickname'], ":reason" => $_POST['reason'],
    ":length" => intval($_POST['length']), ":admin_id" => intval($_SESSION['ezpz_sb_admin_id']));

if (PDOExecParametrizedQuery($pdo, $query, $parameters, __FILE__, __LINE__))
{
    echo "Ban byl úspěšně přidán!";
}
else
{
    echo "Při přidávání banu nastala chyba, zkus to prosím později, případně kontaktuj technika.";
}
?>