<?php
include_once 'Dbconn.php';
include_once 'QQmailer.php';
$code = null;
$email = null;
$password = null;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['sendCode'])) {
   // echo "<script>alert(" . $_POST['sendCode'] . ")</script>";
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $code = rand(10000, 99999);
    $timeNow = time();
    $sqlCode = "insert into verification_code (email,creattime,code) VALUES ('$email','$timeNow','$code')";
    $conn->query($sqlCode);
    $mailer = new QQMailer();
    $title = 'dueape验证码';
    $content = "您此次请求的验证码为 " . $code . " 请于5分钟内输入该验证码，否则该验证码将会失效！";
    if ($mailer->send($email, $title, $content)) {
        echo "<script>alert('已发送验证码至邮箱！')</script>";
    } else {
        echo "<script>alert('邮件发送失败！')</script>";
        echo "<script> window.location.href = 'register.php' ;</script>";
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $sql = "select * from user where email='$email'";
    $result = $conn->query($sql);
    $arrid = 0;
    while ($rs = $result->fetch_assoc()) {
        $arrid = $rs["user_id"];
    }
    if ($arrid > 0) {
        echo "<script>alert('邮箱已注册!')</script>";
        echo "<script> window.location.href = 'register.php' ;</script>";
    } else {
        // echo "<script>alert('发送邮件！')</script>";
        $code = rand(10000, 99999);
        // echo "<script>alert(".$code.")</script>";
        $timeNow = time();
//        echo "<script>alert(".$timeNow.")</script>";
//        echo "<script>alert(".$email.")</script>";
        $sqlCode = "insert into verification_code (email,creattime,code) VALUES ('$email','$timeNow','$code')";
        $conn->query($sqlCode);

        $mailer = new QQMailer();
        $title = 'dueape验证码';
        $content = "您此次请求的验证码为 " . $code . " 请于5分钟内输入该验证码，否则该验证码将会失效！";
        if ($mailer->send($email, $title, $content)) {
            //  echo "<script>alert('邮件已发送！')</script>";
//            echo "<script> window.location.href = " . 'code\.php?el=' . ".$email." . ' ;</script>';
        } else {
            echo "<script>alert('邮件发送失败！')</script>";
            echo "<script> window.location.href = 'register.php' ;</script>";
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['code'])) {
    $emalPost = $_POST['email'];
    $codePost = $_POST['code'];
    $passwordPost = $_POST['password'];
    $sql = "select code from verification_code where email='$emalPost' ORDER BY id desc limit 1";
    $query = $conn->query($sql);
    $getcode = null;
    while ($result = $query->fetch_assoc()) {
        $getcode = $result["code"];
    }
    if ($getcode == $codePost) {
        $sqlMaxId = "select * from user order by user_id desc limit 1";
        $resultMaxId = $conn->query($sqlMaxId);
        $userid = 0;
        while ($rsMaxId = $resultMaxId->fetch_assoc()) {
            $userid = $rsMaxId["user_id"];
        }
        $userid += 1;
        $sql = "insert into user (user_id,email,user_pass,user_name) VALUES ('$userid','$emalPost','$passwordPost','$emalPost')";
        $result = $conn->query($sql);
        $_SESSION['uid'] = $userid;
        $_SESSION['uemail'] = $emalPost;
        $_SESSION['user_name'] = $emalPost;
        header("Location: fabu1.php");
    } else {
        echo "<script>alert('验证码不正确!')</script>";
        echo "<script> window.location.href = 'register.php' ;</script>";
    }
}

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    echo "<script> window.location.href = 'register.php' ;</script>";
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
    <title>注册验证码</title>
    <link rel="stylesheet" type="text/css" href="css/basic.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/index.js"></script>
    <script type="text/javascript" src="js/leftTime.min.js"></script>

    <script type="text/javascript">
        $(function () {
            //60秒倒计时
            $("#dateBtn1").on("click", function () {
                var _this = $(this);
                if (!$(this).hasClass("oncode")) {
                    $.leftTime(60, function (d) {
                        if (d.status) {
                            _this.addClass("oncode");
                            _this.html((d.s == "00" ? "60" : d.s) + "秒后重新获取");
                        } else {
                            _this.removeClass("oncode");
                            _this.html("获取验证码");
                        }
                    });

                    $.ajax({
                        type: 'POST',
                        url: "code.php",
                        data: {"email":$("#email").val(), "password":$("#password").val(),"sendCode":'sendCode'},
                        success: function(req) {},
                        dataType: "json"
                    });
                }
            });
        });
    </script>
</head>
<body>
<div id="wrap">
    <div class="reg">
        <form action="" method="post">
            <div class="input code"><input type="text" name="username" placeholder="请输入验证码                   ">

                <div class="time" id="dateBtn1">获取验证码</div>
            </div>
            <h3>你的邮箱有一封带验证码的邮件，请输入验证码</h3>
            <input type="hidden" name="code" value="<?php echo $code ?>">
            <input type="hidden" name="email" id="email" value="<?php echo $email ?>">
            <input type="hidden" name="password" id="password" value="<?php echo $password ?>">
            <input type="hidden" name="code" value="code">

            <div class="submit"><input type="submit" value="确认"></div>
        </form>
    </div>
</div>
</body>
</html>