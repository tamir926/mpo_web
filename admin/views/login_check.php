<?php
ob_start();
session_start();

if (!$_SESSION['admin_logged'] || $_SESSION['admin_name']=="" || $_SESSION['admin_timestamp']=="")
header('Location: login');
?>
