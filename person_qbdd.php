<?php
include("Dbconn.php");
$_SESSION["uid"] = 'user@123.com';
$_SESSION["user_name"] = 'user@123.com';
if (!isset($_SESSION["uid"])) {
    header("Location:login.php");
}
$uname = $_SESSION["user_name"];
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
    <title>订单</title>
    <link rel="stylesheet" type="text/css" href="css/basic.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script>
        window.onload = function () {
            var nodes = $("#titleId").children("div");
            var nodesUl = $("#titleId").children("ul");
            nodes[0].className += " ddred";
            for (var i = 0; i < nodes.length; i++) {
                if(i==0){
                    nodesUl[i].style.display = "block";
                }else{
                    nodesUl[i].style.display = "none";
                }
                nodes[i].onclick = function () {
                    divClick(this);
                }
            }

        };
    </script>
    <script>
        function divClick(node) {
            var nodes = $("#titleId").children("div");
            var nodesUl = $("#titleId").children("ul");
            for (var i = 0; i < nodes.length; i++) {
                var n = nodes[i];
                if (node == n) {
                    nodesUl[i].style.display = "block"
                } else {
                    nodesUl[i].style.display = "none"
                }
                n.className = "ddtitlewithright";
                if (3 == i) {
                    n.className = "ddtitle";
                }
            }
            node.className += " ddred";
            console.log(node.innerHTML);
        }
    </script>

</head>
<body>
<div id="wrap">
    <div class="qbdd" id="titleId">
        <div class="title ddtitlewithright">全部</div>
        <div class="title ddtitlewithright">新建</div>
        <div class="title ddtitlewithright">开发中</div>
        <div class="title ddtitle">已完成</div>
        <ul id="ddall">
            <?php
            $sql = "select * from project where user_name='$uname'";
            $query = $conn->query($sql);
            if ($query!=false) {
            while ($rs = $query->fetch_assoc()) {
                ?>
                <li class="ddul clearfix">
                    <h5 class="fl">标题：<?php echo $rs['project_name'] ?></h5>
                    <span class="fr">状态：
                        <?php
                        switch ($rs['status']) {
                            case 1:
                                echo "新建";
                                break;
                            case 2:
                                echo "开发中";
                                break;
                            case 3:
                                echo "已完成";
                                break;
                        }
                        ?>
                    </span>
                </li>
            <?php } }?>

        </ul>
                <ul  id="dddai">
                    <?php
                    $sql2 = "select * from project where user_name='$uname' WHERE status='1'";
                    $query2=$conn->query($sql2);
                    if ($query2!=false) {
                    while($rs2=$query2->fetch_assoc()){
                   ?>
                        <li class="ddul clearfix">
                            <h5 class="fl">标题：<?php  echo $rs2['project_name'] ?></h5>
                            <span class="fr">状态：
                                <?php  echo "开发中";  ?>
                            </span>
                        </li>
                    <?php } }else{?>
                        <li class="ddul clearfix">
                            <h5 class="fl">无订单</h5>
                        </li>
                   <?php }?>
                </ul>
                <ul  id="ddpay">
                    <?php
                    $sql3 = "select * from project where user_name='$uname' WHERE status='2'";
                    $query3=$conn->query($sql3);
                    if ($query2!=false) {
                    while($rs3=$query3->fetch_assoc()){
                    ?>
                        <li class="ddul clearfix">
                            <h5 class="fl">标题：<?php  echo $rs3['project_name'] ?></h5>
                            <span class="fr">状态：
                                <?php  echo "新建";  ?>
                            </span>
                        </li>
                    <?php } }else{?>
                        <li class="ddul clearfix">
                            <h5 class="fl">无订单</h5>
                        </li>
                    <?php }?>
                </ul>
                <ul  id="ddover">
                    <?php
                    $sql4 = "select * from project where user_name='$uname' WHERE status='3'";
                    $query4=$conn->query($sql4);
                    if ($query2!=false) {
                    while($rs4=$query4->fetch_assoc()){                ?>
                        <li class="ddul clearfix">
                            <h5 class="fl">标题：<?php  echo $rs4['project_name'] ?></h5>
                            <span class="fr">状态：
                                <?php  echo "已完成";  ?>
                            </span>
                        </li>
                    <?php }}else{?>
                        <li class="ddul clearfix">
                            <h5 class="fl">无订单</h5>
                        </li>
                    <?php }?>
                </ul>
    </div>
    <!-- footer star -->
    <div style="height: 62px;"></div>
    <div class="footer">
        <ul class="clearfix">
            <li class="fl"><a href="">首页</a></li>
            <li class="fl"><a href="">发布订单</a></li>
            <li class="fl on"><a href="">我</a></li>
        </ul>
    </div>
    <!-- footer end -->
</div>
</body>
</html>