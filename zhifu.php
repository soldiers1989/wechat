<?php
require_once('/path/to/pingpp-php/init.php');

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="keywords" content="充值支付">
	<meta name="description" content="充值支付">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black" />
	<meta name="app-mobile-web-app-capable" content="yes">
	<meta name="app-itunes-app" content="app-id=599473996">
	<title>充值支付</title>
	<link rel="stylesheet" type="text/css" href="css/basic.css">
	<link rel="stylesheet" type="text/css" href="css/money.css">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/index.js"></script>
</head>
<body style="background: #ededed;">
<div id="wrap">
	<form action="" method="post">
		<div class="zc_pay_1">充值积分<input type="text" name="money"></div>
		<div class="zc_pay_4 clearfix">
			<h3>微信支付</h3>
			<div class="pay_son">
			  <input type="radio" id="nba" checked="checked" name="pay" value="weixin">
			  <label name="nba" class="checked" for="nba"></label>
			</div>
		</div>
		<div class="zc_pay_4 clearfix">
			<h3 class="h3_2">银联卡支付</h3>
			<div class="pay_son">
			  <input type="radio" id="nbc" checked="checked" name="pay" value="weixin">
			  <label name="nbc" for="nbc"></label>
			</div>
		</div>

		<div style="height:62px;"></div>
		<div class="zc_pay_dw clearfix">
			<h3 class="fl">合计:<font>0.00</font>元</h3>
			<div class="pay_submit fr"><input type="submit" value="确定支付"></div>
		</div>
	</form>
</div>
<script type="text/javascript">
$(function() {
  $('.zc_pay_4 label').click(function(){
    var radioId = $(this).attr('name');
    $('.zc_pay_4 label').removeAttr('class') && $(this).attr('class', 'checked');
    $('input[type="radio"]').removeAttr('checked') && $('#' + radioId).attr('checked', 'checked');
  });
});
</script>
</body>
</html>