<?php

if (!isset($_SESSION)) {
	session_start();
}

if (!isset($_SESSION['account']) && $_SEESION['account'] == '') {
	header("Location:login.php");
}


?>