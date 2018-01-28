<?php
require_once 'Dbconn.php';
$userid=0;
$emalPost=0;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$name=$_POST['username'];
	$password =md5($_POST['password']);
	$sql = "select * from user where email='$name' AND user_pass='$password'";
	$query=$conn->query($sql);
	$id=0;
	$emalPost=$name;
	while($rs=$query->fetch_assoc()){
		$userid=$rs['user_id'];
	}
	if(0<$userid){
		$_SESSION['uid']=$userid;
		$_SESSION['uemail']=$emalPost;
		$_SESSION['user_name']=$emalPost;
		echo "<script> window.location.href = 'person.php' ;</script>";
	}else{
		echo "<script>alert('用户名或密码不正确!')</script>";
		echo "<script> window.location.href = 'login.php' ;</script>";
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
	
</head>
<body>
<div id="wrap">
	<div class="login">
		<form action="" method="post">
			<div class="input"><input type="text" name="username" placeholder="请输入邮箱/账户"></div>
			<div class="input input1"><input type="password" name="password" placeholder="输入密码"></div>
			<div class="wangji"><a href="">忘记密码？</a></div>
			<div class="submit"><input type="submit" value="登录"></div>
			<div class="submit"><input type="button" onclick="registerClick()" value="免费注册"></div>
		</form>
	</div>
</div>
<script>
	function registerClick(){
		window.location.href="register.php";
	}
</script>
</body>
</html>