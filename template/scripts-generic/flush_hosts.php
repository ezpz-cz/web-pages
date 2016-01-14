<?php

include_once(dirname(__FILE__)."/getPDO.php");
include_once(dirname(__FILE__)."/PDOQuery.php");

$pdo = getPDOConnection();
$query = "FLUSH HOSTS;";

PDOExecQuery($pdo, $query, __FILE__, __LINE__);