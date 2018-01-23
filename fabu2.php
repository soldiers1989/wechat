<?php
require_once 'Dbconn.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $projectId = $_POST['radioProject'];
}
$fabuon='on';
$personon="";
$indexon="";
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
    <title>发布订单</title>
    <link rel="stylesheet" type="text/css" href="css/basic.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/index.js"></script>

</head>
<body>
<div id="wrap">
    <div class="fbdingdan">
        <div class="img">
            <img src="images/bz2.jpg" width="100%">
        </div>
        <div class="bz2">
            <form action="fabu3.php" method="post">
                <div class="input">
                    <p>需求标题</p>
                    <input type="text" name="title">
                </div>
                <div class="input">
                    <p>需求类型</p>
                    <select name="type">
                        <option>请选择</option>
                        <option>homework</option>
                        <option>assignment</option>
                        <option>project</option>
                        <option>毕业设计</option>
                        <option>paper</option>
                        <option>其他</option>
                    </select>
                </div>
                <div class="input">
                    <p>需求描述</p>
                    <textarea name="content" placeholder="50字以内..."></textarea>
                </div>
                <div class="input">
                    <em>*</em>
                    <input type="text" name="qq" placeholder="请输入您的QQ">
                </div>
                <div class="input introduce">
                    <em>*</em>
                    <input type="text" name="weixin" placeholder="输入您的微信">
                    <span class="introduce">详细资料以及要求可发送邮件到dueape@163.com</span><br>
                    <span class="introduce">或加客服微信：DueApe_service</span>
                </div>
                <input type="hidden" name="project" value="<?php echo $projectId ?>">

                <div class="submit">
                    <input type="submit" value="立即提交">
                </div>
            </form>
        </div>
    </div>
    <!-- footer star -->
    <div style="height: 62px;"></div>
    <?php include("footer.php") ?>
    <!-- footer end -->
</div>
</body>
</html>