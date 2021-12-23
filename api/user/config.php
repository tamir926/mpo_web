<?
ob_start();
@date_default_timezone_set("Asia/Ulaanbaatar");

$dbhost = 'localhost';

// $dbuser = 'townmn_mpo';
// $dbpass = '6tfIve4}x4&Y';
// $dbname = 'townmn_mpo';


$dbuser = 'root';
$dbpass = 'sw01b116';
$dbname = 'mpo';




$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
mysqli_set_charset($conn,'utf8');
mysqli_select_db($conn,$dbname);// (($dbname,$conn);

//GLOBAL VARIABLES
$g_title="Бүртгэл";
?>
