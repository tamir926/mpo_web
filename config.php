<?php
ob_start();
@date_default_timezone_set("Asia/Ulaanbaatar");

$dbhost = 'localhost';

$dbuser = 'townmn_volunteers';
$dbpass = '5JBZ%jHw#Nt,';
$dbname = 'townmn_volunteers';

$dbuser = 'root';
$dbpass = 'sw01b116';
$dbname = 'mpo';


$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
mysqli_set_charset($conn,'utf8');
mysqli_select_db($conn,$dbname);// (($dbname,$conn);

//GLOBAL VARIABLES
$g_title="Монголын Бүтээмжийн Төв";
$g_author="MaGnatE @ MindSymbol";
$g_icon = "assets/images/favicon.png";
$g_color = "#0a1a73";

?>