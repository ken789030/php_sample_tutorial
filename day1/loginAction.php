<?php

include 'checkLogin.php';

if (isset($_SESSION['account']) && $_SEESION['account'] != '') {
	header("Location:index.php");
}

if (isset($_POST['account']) && $_POST['account'] != '' &&
	isset($_POST['password']) && $_POST['password'] != '') {

	$_SESSION['account'] = $_POST['account'];
	
	header("Location:index.php");

}

?>