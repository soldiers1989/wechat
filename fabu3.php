<?php
require_once 'Dbconn.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $projectId = $_POST['project'];
    $title=$_POST['title'];
    $type=$_POST['type'];
    $content=$_POST['content'];
    $qq=$_POST['qq'];
    $wechat=$_POST['weixin'];
    $userid=$_SESSION["uid"];
    $sql="insert into request_info (request_title,request_type,request_detail,request_qq,request_wechat)VALUES ('$title','$type','$content','$qq','$wechat')";
    $query=$conn->query($sql);
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="keywords" content="DueApe留学生辅导平台">
    <meta name="description" content="DueApe留学生辅导平台">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
    <meta name="apple-mobile-web-app-status-bar-style" content="black"/>
    <meta name="app-mobile-web-app-capable" content="yes">
    <meta name="app-itunes-app" content="app-id=599473996">
    <title>发布成功</title>
    <link rel="stylesheet" type="text/css" href="css/basic.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/index.js"></script>
</head>
<body>
<div id="wrap">
    <div class="fbdingdan">
        <div class="img">
            <img src="images/bz3.jpg" width="100%">
        </div>
        <div class="bz3">
            <div><img src="images/tjcg.jpg" width="100%"></div>
            <div class="chakan"><a href="">查看已提交的订单>></a></div>
        </div>
    </div>
    <!-- footer star -->
    <div style="height: 62px;"></div>
    <div class="footer">
        <ul class="clearfix">
            <li class="fl on"><a href="index.html">首页</a></li>
            <li class="fl"><a href="">发布订单</a></li>
            <li class="fl"><a href="person.html">我</a></li>
        </ul>
    </div>
    <!-- footer end -->
</div>
</body>
</html>