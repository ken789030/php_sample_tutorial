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
	<script type="text/javascript" src="js/jquery.js" ></script>
</head>
<body>
	<form>
		帳號<input type="text" name="account" id="account" value=''><BR>
		密碼<input type="password" name="password" id="password" value=''><BR>
		<input type="button" id="login" value="登入">
	</form>
	<button><a href="register.php">註冊</a></button>
	<div id='error_text' ></div>
	<script>
		console.log($('#account').val());
		$(document).ready(function(){
			$('input#login').click(function(){
				
				if ($('#account').val() == '' || $('#password').val() == '') {
					// alert('請輸入帳號密碼');
					$('div#error_text').text('請輸入帳號密碼');
				} else {
					
					$.ajax({
						type :"POST",
						url : "api/login.php",
						dataType:"json",
						data : "account="+$('#account').val()
								+"&password="+$('#password').val(),
						success: function(msg)
						{
							console.log(msg);
							if (msg.result == true) {
								location.href ="index.php";
							} else {
								alert(msg.msg);
							}
							
						},error: function()
						{
							alert('系統錯誤，請稍候登入');
						}
					});

				}

			});
			
		})
	</script>
</body>

</html>