<?php
//include "Dbconn.php";
//include "QQmailer.php";
//if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//    $email = $_POST['email'];
//    $password = md5($_POST['password']);
//    $sql = "select * from user where email='$email'";
//    $result = $conn->query($sql);
//    $arrid = 0;
//    while ($rs = $result->fetch_assoc()) {
//        $arrid = $rs["user_id"];
//    }
//    echo "<script>alert(".$arrid.")</script>";
//    if ($arrid > 0) {
//        echo "<script>alert('邮箱已注册!')</script>";
//        echo "<script> window.location.href = 'register.php' ;</script>";
//    } else {
//       // echo "<script>alert('发送邮件！')</script>";
//        $code = rand(10000, 99999);
//       // echo "<script>alert(".$code.")</script>";
//        $timeNow = time();
////        echo "<script>alert(".$timeNow.")</script>";
////        echo "<script>alert(".$email.")</script>";
//        $sqlCode = "insert into verification_code (email,creattime,code) VALUES ('$email','$timeNow','$code')";
//        $conn->query($sqlCode);
//
//        $mailer = new QQMailer();
//        $title = 'dueape验证码';
//        $content = "您此次请求的验证码为 " . $code . " 请于5分钟内输入该验证码，否则该验证码将会失效！";
//        if ($mailer->send($email, $title, $content)) {
//          //  echo "<script>alert('邮件已发送！')</script>";
//            echo "<script> window.location.href = ".'code\.php?el='.".$email.".' ;</script>';
//        } else {
//            echo "<script>alert('邮件发送失败！')</script>";
//        }
//    }
//}

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
    <title>注册</title>
    <link rel="stylesheet" type="text/css" href="css/basic.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/index.js"></script>
    <script language="javascript">
        function checkForm(form) {
//            alert("in checkform！");
            if (form.email.value == "" || form.email.value == "请输入邮箱") {
                alert("请输入邮箱！");
                form.email.focus();
                return false;
            } else {
                var reg = new RegExp("^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$");
                var obj = form.email.value;
                if (!reg.test(obj)) {
                    alert("邮箱格式不正确!");
                    form.email.focus();
                    return false;
                }
            }
            if (form.password.value == "" || form.password.value == "请设置密码") {
                alert("密码不能为空！");
                form.password.focus();
                return false;
            } else {
                var reg = new RegExp("^[a-zA-Z0-9_-]{6,16}$");
                var obj = form.password.value;
                if (!reg.test(obj)) {
                    alert("密码为6-16位的数字或字母!");
                    form.password.focus();
                    return false;
                }
            }
            if (form.password.value != form.confpass.value) {
                alert("两次密码不一致！");
                form.confpass.focus();
                return false;
            }
        }
    </script>

</head>
<body>
<div id="wrap">
    <div class="reg">
        <form action="code.php" method="post" onSubmit="return checkForm(this)">
            <div class="input"><input type="text" name="email" placeholder="请输入邮箱"></div>
            <div class="input input1"><input type="password" name="password" placeholder="请设置密码"></div>
            <div class="input input1"><input type="password" name="confpass" placeholder="请确认密码"></div>
            <input type="hidden" name="register" value="register">
            <div class="submit"><input type="submit" value="下一步"></div>

        </form>
    </div>
</div>
</body>
</html>