<?php
include_once '../config/session.php';

if (isset($_SESSION['account']) && $_SESSION['account'] != '') {
	session_destroy();
	$result = ['result' => true , 'msg' => '登出成功'];
	die(json_encode($result));
}

?>