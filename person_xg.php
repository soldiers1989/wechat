<?php
include("Dbconn.php");
$uname = $_SESSION['user_name'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$passwordLast = md5($_POST['passwordLast']);
	$passwordnew =md5($_POST['passwordnew1']);
	$sql = "select * from user where user_name='$uname' AND user_pass = '$passwordLast'";
	$query = $conn->query($sql);
	while($rs=$query->fetch_assoc()){
		$uid=$rs['user_id'];
	}
	echo "uid:".$uid;
	if(0<$uid){
		$sql = "update user set user_pass = '$passwordnew' WHERE user_name = '$uname'";
		$query = $conn ->query($sql);
	}else{
		echo "<script>alert('密码输入错误！')</script>";
		header("Location:person_xg.php");
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="keywords" content="DueApe留学生辅导平台">
	<meta name="description" content="DueApe留学生辅导平台">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black" />
	<meta name="app-mobile-web-app-capable" content="yes">
	<meta name="app-itunes-app" content="app-id=599473996">
	<title>登录</title>
	<link rel="stylesheet" type="text/css" href="css/basic.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/index.js"></script>
	<script language="javascript">
		function checkForm(form) {
			if (form.passwordLast.value == "" ) {
				alert("原密码不能为空！");
				form.passwordLast.focus();
				return false;
			}

			if (form.passwordnew1.value != form.passwordnew2.value) {
				alert("两次密码不一致！");
				form.passwordnew1.focus();
				return false;
			}
		}
	</script>
</head>
<body>
<div id="wrap">
	<div class="wszl login">
		<form action="" method="post" onSubmit="return checkForm(this);">
			<div class="input clearfix">
				<span class="fl"><font color="red">*</font>原密码</span>
				<input type="text" name="passwordLast" class="fl">
			</div>
			<div class="input clearfix">
				<span class="fl"><font color="red">*</font>新密码</span>
				<input type="text" name="passwordnew1" class="fl">
			</div>
			<div class="input clearfix">
				<span class="fl"><font color="red">*</font>确认密码</span>
				<input type="text" name="passwordnew2" class="fl">
			</div>
			<div class="submit"><input type="submit" value="保存"></div>
		</form>
	</div>
</div>
</body>
</html>