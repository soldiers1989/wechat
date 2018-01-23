<?php
include('Dbconn.php');
if (!isset($_SESSION["uid"])) {
	header("Location:login.php");
}
$uemail = $_SESSION['uemail'];
$uname = $_SESSION['user_name'];
$fabuon='';
$personon="on";
$indexon="";
$money =0;
$payNum = 0;
$sql="select * from user WHERE email='$uemail'";
$query=$conn->query($sql);
while($rs=$query->fetch_assoc()){
	$money = $rs['point'];
}
$sql="select * from tradingrecord WHERE user_name='$uname'";
$query=$conn->query($sql);
$payNum=mysqli_num_rows($query);

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
	<title>个人中心</title>
	<link rel="stylesheet" type="text/css" href="css/basic.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/index.js"></script>
</head>
<body style="background: #ededed;">
<div id="wrap">
	<div class="person">
		<div class="person_t clearfix">
			<a href="person_zl.php">
				<div class="img fl"><img src="images/pic1.jpg"></div>
				<h3 class="fl">头像</h3>
				<span class="fr"><img src="images/jt.jpg"></span>
			</a>
		</div>
		<div class="person_c clearfix">
			<a href="money.php" class="fl">
				<span><?php echo $money?></span>
				<em>钱包余额</em>
			</a>
			<a href="" class="fl">
				<span><?php echo $payNum?></span>
				<em>交易记录</em>
			</a>
		</div>
		<div class="person_b">
			<ul>
				<li class="clearfix">
					<a href="person_qbdd.php">
						<h3 class="fl">我的订单</h3>
						<span class="fr"><img src="images/jt.jpg"></span>
					</a>
				</li>
				<li class="clearfix">
					<a href="mima.php">
					<h3 class="fl">支付密码设置</h3>
					<span class="fr"><img src="images/jt.jpg"></span>
					</a>
				</li>
				<li class="clearfix">
					<a href="person_xg.php">
						<h3 class="fl">修改登录密码</h3>
						<span class="fr"><img src="images/jt.jpg"></span>
					</a>
				</li>
			</ul>
			<div class="exit">
				<a href="loginOut.php">退出登录</a>
			</div>
		</div>
	</div>
	<!-- footer star -->
	<div style="height: 62px;"></div>
	<?php include("footer.php") ?>
	<!-- footer end -->
</div>
</body>
</html>