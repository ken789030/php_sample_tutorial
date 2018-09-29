<?php

include_once '../config/session.php';

$dsn = "mysql:dbname=test;host=127.0.0.1;charset=utf8";
$user = 'root';
$password = '15315322';


$dbConnection = new PDO($dsn, $user, $password);


$result = ['result' => false , 'msg' => '請確認傳送參數是否正確'];


if (isset($_POST['account']) && $_POST['account'] != '' &&
	isset($_POST['password']) && $_POST['password'] != '' && 
	isset($_POST['name']) && $_POST['name'] != '' &&
	isset($_POST['password_check']) && $_POST['password_check'] != '' &&
	$_POST['password_check'] == $_POST['password']) {

	$tsql = " SELECT COUNT(*) AS count FROM `member` WHERE `account`=:account ";

	$sth = $dbConnection->prepare($tsql);
	
	$sth->execute(['account' => $_POST['account'] ]);

	$data = $sth->fetch(PDO::FETCH_ASSOC);
	
	if ($data['count'] == '1') {
		$result['msg'] = '帳號重複，請重新確認';
	} else {
		
		$insertSQL = "INSERT INTO member (`account` , `password` , `name` , `insert_at`) VALUES (:account , :password , :name  , NOW() )";
		$insertSth = $dbConnection->prepare($insertSQL);

		$insertSth->execute(['account' => $_POST['account'] , 'password' => md5($_POST['password']) , 'name' => $_POST['name']]);
		$id = $dbConnection->lastInsertId();

		if ($id) {
			$result['result'] = true;
			$result['msg'] = '註冊成功';
		} else {
			$result['msg'] = '註冊失敗，請聯絡系統管理員';
		}
		
	}


	die(json_encode($result));
} else {
	die(json_encode($result));
}

?>