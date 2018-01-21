<?php
require_once 'Dbconn.php';
$uid = $_SESSION["uid"];
$sqlPoint = "select * from pointChangeRecord where user_id = '$uid'";
$sqlTrading = "select * from tradingRecord where user_id = '$uid'";

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="keywords" content="交易记录">
	<meta name="description" content="交易记录">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black" />
	<meta name="app-mobile-web-app-capable" content="yes">
	<meta name="app-itunes-app" content="app-id=599473996">
	<meta http-equiv="content-type" content="text/html;charset=utf-8">
	<title>交易记录</title>
	<link rel="stylesheet" type="text/css" href="css/basic.css">
	<link rel="stylesheet" type="text/css" href="css/money.css">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/index.js"></script>
	<script>
		function changeClick(e){
			var arrayA = $("#titleDiv").children("a");
			var arrayUl = $("#titleDivAll").children("ul");
			for(var i=0;i<arrayA.length;i++){
				arrayA[i].className='';
				arrayUl[i].style.display='none';
				if(e==arrayA[i]){
					e.className = 'on';
					arrayUl[i].style.display='block';
				}
			}
		}
	</script>
</head>
<body style="background: #f5f5f5;">
<div id="wrap">
	<div class="jiaoyi" id="titleDivAll">
		<div class="jiaoyi_top clearfix" id="titleDiv">
			<a href="javascript:void(0)" class="on" onclick="changeClick(this)">积分变动记录</a>
			<a href="javascript:void(0)"  onclick="changeClick(this)">订单交易记录</a>
		</div>
		<ul id="pointDiv">
			<?php
			$queryPoint = $conn->query($sqlPoint);
			while($rsPoint = $queryPoint->fetch_assoc()){ ?>
				<li class="clearfix">
					<h3 class="fl"><?php echo $rsPoint['sign']==1?'充值积分':'支付积分' ?><?php echo $rsPoint['point'] ?></h3>
					<span class="fr"><?php echo date('Y-m-d',$rsPoint['creat_time']) ?></span>
				</li>
			<?php } ?>

		</ul>
		<ul id="tradingDiv" style="display:none">
			<?php
			$queryTrading = $conn->query($sqlTrading);
			while($rsTrading = $queryTrading->fetch_assoc()){ ?>
				<li class="clearfix">
					<h3 class="fl">交易名称<?php echo $rsTrading['project_name'] ?></h3>
					<span class="fr"><?php echo date('Y-m-d',$rsTrading['creat_time']) ?></span>
				</li>
			<?php } ?>

		</ul>
	</div>	
</div>
</body>
</html>