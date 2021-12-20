<?php
ob_start();
@date_default_timezone_set("Asia/Ulaanbaatar");


$dbhost = 'localhost';

$dbuser = 'townmn_volunteers';
$dbpass = '5JBZ%jHw#Nt,';
$dbname = 'townmn_volunteers';

$dbuser = 'root';
$dbpass = 'sw01b116';
$dbname = 'volunteers';


$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
mysqli_set_charset($conn,'utf8');
mysqli_select_db($conn,$dbname);// (($dbname,$conn);

//GLOBAL VARIABLES
$g_title="Volunteers.mn";
$g_icon="app-assets/images/ico/favicon.png";

?>
