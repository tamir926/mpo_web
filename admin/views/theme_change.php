<?php
ob_start();
session_start();
require_once("../config.php");

if ($_SESSION['admin_logged'] && $_SESSION['admin_name']!="" && $_SESSION['admin_timestamp']!="")
{
    $sql = "SELECT *FROM settings WHERE shortname='admin_theme'";
    $result = mysqli_query($conn,$sql);
    if (mysqli_num_rows($result)==1)
    {
        $data = mysqli_fetch_array($result);
        $value = $data["value"];
        if ($value==0) $sql = "UPDATE settings SET value=1 WHERE shortname='admin_theme'";
        if ($value==1) $sql = "UPDATE settings SET value=0 WHERE shortname='admin_theme'";
        mysqli_query($conn,$sql);
    }

}
?>