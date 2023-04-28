<?php
	ob_start();
	session_start();
	unset($_SESSION['admin_logged']);	
	unset($_SESSION['admin_avatar']);
	unset($_SESSION['rights']);
	unset($_SESSION['admin_timestamp']);
	unset($_SESSION['admin_logged']);

	unset($_SESSION['logged_user_id']);	
	unset($_SESSION['logged_user_name']);
	unset($_SESSION['logged_user_rights']);
	unset($_SESSION['logged_user_avatar']);
	unset($_SESSION['logged_user_timestamp']);
	unset($_SESSION['logged']);

	header('Location: login');
?>