<?php
include 'checkLogin.php';

if (isset($_SESSION['account']) && $_SESSION['account'] != '') {
	session_destroy();
	header("Location:login.php");
}

?>