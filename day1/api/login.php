<?php

include_once '../config/session.php';

$result = ['result' => false , 'msg' => '請確認傳送參數是否正確'];



if (isset($_SESSION['account']) && $_SESSION['account'] != '') {
	$result['msg'] = '已登入，請確認是否重複登入。';

	die(json_encode($result));
}

if (isset($_POST['account']) && $_POST['account'] != '' &&
	isset($_POST['password']) && $_POST['password'] != '') {

	$_SESSION['account'] = $_POST['account'];

	$result['result'] = true;
	$result['msg'] = '登入成功';


	die(json_encode($result));
}


?>