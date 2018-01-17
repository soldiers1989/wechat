<?php
require_once 'Dbconn.php';
require_once 'QQMailer.php';

$userEmail = $_GET['email'];
// 实例化 QQMailer
$mailer = new QQMailer(true);
// 添加附件
//$mailer->addFile('20130VL.jpg');
// 邮件标题
$title = '验证码。';
// 邮件内容
$content = "您验证码如下：".$testCode;
// 发送QQ邮件
$mailer->send($userEmail, $title, $content);

$sqlMaxId = "select * from user order by user_id desc limit 1";
$resultMaxId = $conn->query($sqlMaxId);
$userid = 0;
while ($rsMaxId = $resultMaxId->fetch_assoc()) {
    $userid = $rsMaxId["user_id"];
}
$userid += 1;
$sql = "insert into user (user_id,email,user_pass) VALUES ('$userid','$email','$password')";
$result = $conn->query($sql);
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
    <title>注册验证码</title>
    <link rel="stylesheet" type="text/css" href="css/basic.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/index.js"></script>

</head>
<body>
<div id="wrap">
    <div class="reg">
        <form action="" method="post">
            <div class="input code"><input type="text" name="username" placeholder="请输入验证码">

                <div class="time">60s</div>
            </div>
            <h3>你的邮箱有一封带验证码的邮件，请输入验证码</h3>

            <div class="submit"><input type="submit" value="确认"></div>
        </form>
    </div>
</div>
</body>
</html>