<?php
include("Dbconn.php");
//require_once('/path/to/pingpp-php/init.php');
if (!isset($_SESSION["uid"])) {
    header("Location:login.php");
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="keywords" content="充值支付">
    <meta name="description" content="充值支付">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
    <meta name="apple-mobile-web-app-status-bar-style" content="black"/>
    <meta name="app-mobile-web-app-capable" content="yes">
    <meta name="app-itunes-app" content="app-id=599473996">
    <title>充值支付</title>
    <link rel="stylesheet" type="text/css" href="css/basic.css">
    <link rel="stylesheet" type="text/css" href="css/money.css">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/index.js"></script>
    <script>
        function changePoint() {
            var money = $("#money").val();
            $("#totalMoney").html(money);
            console.log(money);
        }
    </script>
</head>
<body style="background: #ededed;">
<div id="wrap">
    <form action="" method="post">
        <div class="zc_pay_1">充值积分<input type="text" name="money" id="money" oninput="changePoint()"></div>
        <div class="zc_pay_4 clearfix">
            <h3>微信支付</h3>

            <div class="pay_son">
                <input type="radio" id="nba" checked="checked" name="pay" value="weixin">
                <label name="nba" class="checked" for="nba"></label>
            </div>
        </div>
        <!--		<div class="zc_pay_4 clearfix">-->
        <!--			<h3 class="h3_2">银联卡支付</h3>-->
        <!--			<div class="pay_son">-->
        <!--			  <input type="radio" id="nbc" checked="checked" name="pay" value="weixin">-->
        <!--			  <label name="nbc" for="nbc"></label>-->
        <!--			</div>-->
        <!--		</div>-->

        <div style="height:62px;"></div>
        <div class="zc_pay_dw clearfix">
            <h3 class="fl">合计:<span style="margin-left: 20px;margin-right: 10px;" id="totalMoney">0.00</span>元</h3>

            <div class="pay_submit fr"><input type="button" onclick="wap_pay()" value="确定支付"></div>
        </div>
    </form>
</div>
<script type="text/javascript">
    $(function () {
        $('.zc_pay_4 label').click(function () {
            var radioId = $(this).attr('name');
            $('.zc_pay_4 label').removeAttr('class') && $(this).attr('class', 'checked');
            $('input[type="radio"]').removeAttr('checked') && $('#' + radioId).attr('checked', 'checked');
        });
    });
</script>
<script>
    var YOUR_URL = 'payServe.php';
    function wap_pay() {

//		if(YOUR_URL.length == 0 || !YOUR_URL.startsWith('http')){
//			alert("请填写正确的URL");
//			return;
//		}
        var money = $("#totalMoney").html();
        var amount = money * 100;

        var xhr = new XMLHttpRequest();
        xhr.open("POST", YOUR_URL, true);
        xhr.setRequestHeader("Content-type", "application/json");
        xhr.send(JSON.stringify({
            //channel: channel,
            amount: amount,
            openid:openid
        }));
        alert('in wap_pay function');
        xhr.onreadystatechange = function () {
            alert(xhr.readyState);
            alert(xhr.status);
            alert(xhr.responseText);
            if (xhr.readyState == 4 && xhr.status == 200) {

                console.log(xhr.responseText);
                pingpp.createPayment(xhr.responseText, function (result, err) {
                    console.log(result);
                    console.log(err.msg);
                    console.log(err.extra);
                });
            }
        }
    }
</script>

</body>
</html>