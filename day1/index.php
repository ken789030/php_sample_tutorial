<?php
include 'checkLogin.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>首頁</title>
</head>
<body>
	您好，<?php echo $_SESSION['account'];?>
	<form action="logout.php" method="get">
		<input type="submit" value="登出">
	</form>
</body>
</html>