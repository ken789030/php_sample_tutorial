<?php

include_once '../config/session.php';

$dsn = "mysql:dbname=test;host=127.0.0.1;charset=utf8";
$user = 'root';
$password = '15315322';


$dbConnection = new PDO($dsn, $user, $password);




$result = ['result' => false , 'msg' => '請確認傳送參數是否正確'];



if (isset($_SESSION['account']) && $_SESSION['account'] != '') {
	$result['msg'] = '已登入，請確認是否重複登入。';

	die(json_encode($result));
}

if (isset($_POST['account']) && $_POST['account'] != '' &&
	isset($_POST['password']) && $_POST['password'] != '') {

	$tsql = " SELECT COUNT(*) AS count FROM `member` WHERE `account`=:account AND `password`=:password";

	$sth = $dbConnection->prepare($tsql);
	
	$sth->execute(['account' => $_POST['account'] , 'password' => $_POST['password']]);

	$data = $sth->fetch(PDO::FETCH_ASSOC);
	
	if ($data['count'] == '1') {
		$_SESSION['account'] = $_POST['account'];
		$result['result'] = true;
		$result['msg'] = '登入成功';
	} else {
		$result['msg'] = '登入失敗，請查明帳號密碼';
	}


	die(json_encode($result));
} else {
	die(json_encode($result));
}

?>