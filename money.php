<?php
require_once 'Dbconn.php';
if (!isset($_SESSION["uid"])) {
	header("Location:login.php");
}
$name=$_SESSION['uemail'];
$sql = "select * from user where email='$name'";
$query=$conn->query($sql);
$point=0;
while($rs=$query->fetch_assoc()){
	$point=$rs['point'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="keywords" content="我的钱包">
	<meta name="description" content="我的钱包">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black" />
	<meta name="app-mobile-web-app-capable" content="yes">
	<meta name="app-itunes-app" content="app-id=599473996">
	<title>我的钱包</title>
	<link rel="stylesheet" type="text/css" href="css/basic.css">
	<link rel="stylesheet" type="text/css" href="css/money.css">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/index.js"></script>
</head>
<body>
<div id="wrap">
	<div class="money_top">
<!--		<div class="jilu"><a href="">交易记录</a></div>-->
		<div class="money_top1">
			<h3><?php echo $point?></h3>
			<span>钱包剩余积分</span>
		</div>
	</div>
	<div class="money_b">
		<span>1积分 = 1元（人民币）</span>
		<a href="zhifu.php">充值</a>
	</div>
</div>
</body>
</html>