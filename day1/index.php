<?php
include 'checkLogin.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>首頁</title>
	<script type="text/javascript" src="js/jquery.js" ></script>
</head>
<body>
	<form>
		您好，<?php echo $_SESSION['account'];?>
		<input type="button" id="logout" value="登出">
	</form>

	<script>
		$(document).ready(function(){
			$('input#logout').click(function(){
				$.ajax({
					type :"GET",
					url : "api/logout.php",
					dataType:"json",
					success: function(msg)
					{
						console.log(msg);
						if (msg.result == true) {
							location.href ="login.php";
						} else {
							alert(msg.msg);
						}
						
					},error: function()
					{
						alert('系統錯誤，請稍候登入');
					}
				});
			});
		});
	</script>
</body>
</html>