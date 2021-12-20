<?php
	ob_start();
	session_start();
	unset($_SESSION['admin_logged']);	
	unset($_SESSION['admin_avatar']);
	unset($_SESSION['rights']);
	unset($_SESSION['admin_timestamp']);
	unset($_SESSION['admin_logged']);
	header('Location: login');
?>