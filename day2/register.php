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
	<title>註冊頁</title>
	<script type="text/javascript" src="js/jquery.js" ></script>
</head>
<body>
	<form>
		姓名<input type="text" name="name" id="name" value="劉建宏" required><br>
		帳號<input type="text" name="account" id="account" value="ken@com.tw" required><br>
		密碼<input type="password" name="password" id="password" value="" required><br>
		確認密碼<input type="password" name="password_check" id="password_check" value="" required><br>
		<input type="button" value="註冊" id="register" >
	</form>
	<div id='error_text' ></div>
	<script>
		$(document).ready(function(){
			$('input#register').click(function(){
				if ($('#password_check').val() == "" || $('#name').val() == "" || 
					$('#account').val() == "" || $('#password').val() == "") {
					$('div#error_text').text('請確認所有欄位是否已填入');
				} else {
					if ($('#password_check').val() == $('#password').val()) {
						
						$.ajax({
							type :"POST",
							url : "api/register.php",
							dataType:"json",
							data : "account="+$('#account').val()
									+"&password="+$('#password').val()
									+"&password_check="+$('#password_check').val()
									+"&name="+$('#name').val(),
							success: function(msg)
							{
								console.log(msg);
								if (msg.result == true) {
									alert(msg.msg);
									location.href ="login.php";
								} else {
									alert(msg.msg);
								}
								
							},error: function()
							{
								alert('系統錯誤，請稍候登入');
							}
						});




					} else {
						$('div#error_text').text('請確認密碼跟確認密碼是否一致');
					}
				}
				
				

			});
			
		})
	</script>
</body>
</html>