<?php
include("Dbconn.php");
$uname = $_SESSION['user_name'];
if (!isset($_SESSION["uid"])) {
    header("Location:login.php");
}
$sql = "select * from user where user_name = '$uname' ";
$query = $conn->query($sql);
while ($rs = $query->fetch_assoc()) {
    $email = $rs['email'];
    $wechat = $rs['wechat'];
    $qq = $rs['qq'];
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $wechat = $_POST['weixin'];
    $qq = $_POST['qq'];
    $sql = "update user set wechat='$wechat' , qq='$qq' where user_name = '$uname' ";
    $query = $conn->query($sql);
    header("Location:person.php");
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
    <title>登录</title>
    <link rel="stylesheet" type="text/css" href="css/basic.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/index.js"></script>

</head>
<body>
<div id="wrap">
    <div class="wszl login">
        <form action="" method="post">
            <div class="input clearfix">
                <span class="fl">邮箱：</span>

                <p class="fl"><?php echo $email ?></p>
            </div>
            <div class="input clearfix">
                <span class="fl"><font color="red">*</font>微信号</span>
                <input type="text" name="weixin" class="fl" value="<?php echo $wechat ?>">
            </div>
            <div class="input clearfix">
                <span class="fl"><font color="red">*</font>QQ号</span>
                <input type="text" name="qq" class="fl" value="<?php echo $qq ?>">
            </div>
            <div class="submit"><input type="submit" value="保存"></div>
        </form>
    </div>
</div>
</body>
</html>