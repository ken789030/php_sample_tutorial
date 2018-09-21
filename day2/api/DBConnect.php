<?php

	$dsn = "mysql:dbname=test;host=127.0.0.1;charset=utf8";
	$user = '';
	$password = '';


	$dbConnection = new PDO($dsn, $user, $password);

	$tsql = " SELECT * FROM `member` ";

	$sth = $dbConnection->prepare($tsql);
	// var_dump($sth);
	$sth->execute();
	$data = $sth->fetchall(PDO::FETCH_ASSOC);

?>