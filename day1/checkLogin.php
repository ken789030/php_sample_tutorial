<?php

include_once 'config/session.php';

if (!isset($_SESSION['account']) && $_SEESION['account'] == '') {
	header("Location:login.php");
}


?>