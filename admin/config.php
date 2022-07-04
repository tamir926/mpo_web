<?php
ob_start();
@date_default_timezone_set("Asia/Ulaanbaatar");



$dbhost = 'localhost';

$dbuser = 'townmn_m';
$dbpass = '2xolX15GP#86';
$dbname = 'townmn_m';



$dbuser = 'root';
$dbpass = '';
$dbname = 'mpo';


$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
mysqli_set_charset($conn,'utf8');
mysqli_select_db($conn,$dbname);// (($dbname,$conn);

//GLOBAL VARIABLES
$g_title="mpo-org.mn";
$g_icon="app-assets/images/ico/favicon.png";

?>
