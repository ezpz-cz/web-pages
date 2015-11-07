<?php

include_once(dirname(__FILE__)."/getPDO.php");
include_once(dirname(__FILE__)."/PDOQuery.php");

function checkAdminByUsername($username)
{
    $pdo = getPDOConnection();
    $query = "SELECT id FROM `soe-csgo`.`sb_admins` WHERE name = :username";

    $num_rows = getPDOParametrizedQueryResult($pdo, $query, array(":username" => $username), __FILE__, __LINE__, True);

    if ($num_rows > 0)
    {
        return TRUE;
    }
    else
    {
        return FALSE;
    }
}

function checkAdminBySession()
{
    if ($_SESSION['ezpz_sb_admin'] == "1")
    {
        return TRUE;
    }
    else
    {
        return FALSE;
    }
}

function getAdminIdByUsername($username)
{
    $pdo = getPDOConnection();

    $query = "SELECT id FROM `soe-csgo`.`sb_admins` WHERE name = :username";

    $result = getPDOParametrizedQueryScalarValue($pdo, $query, array(":username" => $username), __FILE__, __LINE__);
    
    if (!$result) throw new Exception("Cannot get the admin id!");

    return $result;
}

function checkAdminForReportByReportId($report_id)
{
    session_start();

    $pdo = getPDOConnection();
    $query = "SELECT admin_id FROM `ezpz-report-g`.`report_report` WHERE id = :report_id";

    $admin_id = getPDOParametrizedQueryScalarValue($pdo, $query, array(":report_id" => $report_id), __FILE__, __LINE__);

    if (!$admin_id)
    {
        throw new Exception("Cannot get the admin_id!");
    }

    if ($_SESSION['ezpz_sb_admin_id'] == $admin_id)
    {
        return True;
    }
    else
    {
        return False;
    }
}

function checkAdminForReportByAdminId($admin_id)
{
    if ($_SESSION['ezpz_sb_admin_id'] == $admin_id)
    {
        return True;
    }
    else
    {
        return False;
    }
}

function checkMainAdmin()
{
    session_start();

    if ($_SESSION['ezpz_report_permission'] == "1")
    {
        return True;
    }
    else
    {
        return False;
    }
}
?>