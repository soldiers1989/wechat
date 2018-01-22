<?php
require_once 'Dbconn.php';
require_once 'QQMailer.php';
$code=null;
$email=null;
$password=null;
if ($_SERVER['REQUEST_METHOD'] == 'GET'&&isset($_GET['act'])&&$_GET['act']=='regist') {
    $email = $_GET['el'];
    $password=$_GET['pd'];
    $code = rand(10000, 99999);
    $timeNow = time();
    $sql = "insert into verification_code (email,creattime,code) VALUES ('$email','$timeNow','$code')";
    $conn->query($sql);

// 实例化 QQMailer
    $mailer = new QQMailer(true);
// 添加附件
//$mailer->addFile('20130VL.jpg');
// 邮件标题
    $title = 'dueape验证码';
// 邮件内容
    $content = "您此次请求的验证码为 ".$code." 请于5分钟内输入该验证码，否则该验证码将会失效！" ;
// 发送QQ邮件
    $mailer->send($email, $title, $content);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $emalPost=$_POST['email'];
    $codePost = $_POST['code'];
    $passwordPost = $_POST['password'];
    $sql = "select code from verification_code where email='$emalPost' ORDER BY id desc limit 1";
    $query = $conn->query($sql);
    $getcode = null;
    while ($result = $query->fetch_assoc()) {
        $getcode = $result["code"];
    }
    if($getcode==$codePost){
        $sqlMaxId = "select * from user order by user_id desc limit 1";
        $resultMaxId = $conn->query($sqlMaxId);
        $userid = 0;
        while ($rsMaxId = $resultMaxId->fetch_assoc()) {
            $userid = $rsMaxId["user_id"];
        }
        $userid += 1;
        $sql = "insert into user (user_id,email,user_pass,user_name) VALUES ('$userid','$emalPost','$passwordPost','$emalPost')";
        $result = $conn->query($sql);
        $_SESSION['uid']=$userid;
        $_SESSION['uemail']=$emalPost;
        $_SESSION['user_name']=$emalPost;
        header("Location: fabu1.php");
    }else{
        echo "<script>alert('验证码不正确!')</script>";
        echo "<script> window.location.href = 'register.php' ;</script>";
    }
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
        $(function(){
            //60秒倒计时
            $("#dateBtn1").on("click",function(){
                console.log('in click');
                var _this=$(this);
                if(!$(this).hasClass("oncode")){
                    $.leftTime(60,function(d){
                        if(d.status){
                            _this.addClass("oncode");
                            _this.html((d.s=="00"?"60":d.s)+"秒后重新获取");
                        }else{
                            _this.removeClass("oncode");
                            _this.html("获取验证码");
                        }
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

                <div class="time" id="dateBtn1" >获取验证码</div>
            </div>
            <h3>你的邮箱有一封带验证码的邮件，请输入验证码</h3>
            <input type="hidden" name="code" value="<?php echo $code ?>">
            <input type="hidden" name="email" value="<?php echo $email ?>">
            <input type="hidden" name="password" value="<?php echo $password ?>">
            <div class="submit"><input type="submit" value="确认"></div>
        </form>
    </div>
</div>
</body>
</html>