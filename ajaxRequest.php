<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET'&&isset($_GET['code'])) {
    $email = $_GET['el'];
    $password=$_GET['pd'];
    $code = rand(10000, 99999);
    $timeNow = time();
    $sql = "insert into verification_code (email,creattime,code) VALUES ('$email','$timeNow','$code')";
    $conn->query($sql);

// 实例化 QQMailer
    $mailer = new QQMailer();
// 添加附件
//$mailer->addFile('20130VL.jpg');
// 邮件标题
    $title = 'dueape验证码';
// 邮件内容
    $content = "您此次请求的验证码为 ".$code." 请于5分钟内输入该验证码，否则该验证码将会失效！" ;
// 发送QQ邮件
    $mailer->send($email, $title, $content);
}