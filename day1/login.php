<?php
include_once 'config/session.php';

if (isset($_SESSION['account']) && $_SESSION['account'] != '') {
	header('Location:index.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>登入頁</title>
</head>
<body>
	<form action="loginAction.php" method="post" >
		帳號<input type="text" name="account" required><BR>
		密碼<input type="password" name="password" required><BR>
		<input type="submit" value="登入">
	</form>
</body>
</html>