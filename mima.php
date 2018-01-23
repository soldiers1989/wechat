<?php
require_once 'Dbconn.php';
if (!isset($_SESSION["uid"])) {
    header("Location:login.php");
}
$uname =$_SESSION["uemail"];
$pay_pass=null;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    for ($i = 0; $i < 6; $i++) {
        $pay_pass .= (string)$_POST['input_' . $i];
    }
    if (strlen($pay_pass) == 6) {
        if(isset($_SESSION['pay_pass'])){
            if($pay_pass==$_SESSION['pay_pass']){
                $pay_pass = md5($pay_pass);
                $sql = "update user set pay_pass='$pay_pass' where user_name='$uname'";
                $query = $conn->query($sql);
                unset($_SESSION['pay_pass']);
                echo "<script> window.location.href = 'person.php' ;</script>";
            }else{
                unset($_SESSION['pay_pass']);
                echo "<script>alert('两次密码不一致！')</script>";
            }
        }else{
            $_SESSION['pay_pass']=$pay_pass;
            echo "<script> window.location.href = 'mima.php';</script>";
        }
    } else {
        echo "<script>alert('密码不足6位！')</script>";
    }
}else{
    $sql="select * from user where user_name='$uname'";
    $query=$conn->query($sql);
    $id=0;
    while($rs=$query->fetch_assoc()){
        $pay_pass=$rs['pay_pass'];
    }
    if(!empty($pay_pass)){
        echo "<script>alert('已设置支付密码！')</script>";
        echo "<script> window.location.href = 'person.php' ;</script>";
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="keywords" content="支付密码设置">
    <meta name="description" content="支付密码设置">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
    <meta name="apple-mobile-web-app-status-bar-style" content="black"/>
    <meta name="app-mobile-web-app-capable" content="yes">
    <meta name="app-itunes-app" content="app-id=599473996">
    <title>支付密码设置</title>
    <link rel="stylesheet" type="text/css" href="css/basic.css">
    <link rel="stylesheet" type="text/css" href="css/money.css">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/index.js"></script>
</head>
<body>
<div id="wrap">
    <div class="mima">
        <form action="" method="post">
            <div class="mima_t">
                <span>
                    <?php
                    echo isset($_SESSION['pay_pass'])?'再次输入密码':'设置6位数字作为支付密码';
                    ?>
                </span>

                <div class="box clearfix"></div>
            </div>
            <div class="money_b">
                <span>钱包支付时，启用支付密码</span>
                <input type="submit" value="确认">
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
    /*动态生成*/
    var box = document.getElementsByClassName("box")[0];
    function createDIV(num) {
        for (var i = 0; i < num; i++) {
            var pawDiv = document.createElement("div");
            pawDiv.className = "pawDiv";
            box.appendChild(pawDiv);
            var paw = document.createElement("input");
            paw.name = "input_" + i;
            paw.type = "password";
            paw.className = "paw";
            paw.maxLength = "1";
            paw.readOnly = "readonly";
            pawDiv.appendChild(paw);
        }
    }
    createDIV(6);


    var pawDiv = document.getElementsByClassName("pawDiv");
    var paw = document.getElementsByClassName("paw");
    var pawDivCount = pawDiv.length;
    /*设置第一个输入框默认选中*/
    //pawDiv[0].setAttribute("style","border: 2px solid deepskyblue;");
    paw[0].readOnly = false;
    paw[0].focus();

    var errorPoint = document.getElementsByClassName("errorPoint")[0];
    /*绑定pawDiv点击事件*/

    function func() {
        for (var i = 0; i < pawDivCount; i++) {
            pawDiv[i].addEventListener("click", function () {
                pawDivClick(this);
            });
            paw[i].onkeyup = function (event) {
                // console.log(event.keyCode);
                if (event.keyCode >= 48 && event.keyCode <= 57) {
                    /*输入0-9*/
                    changeDiv();
                    errorPoint.style.display = "none";

                } else if (event.keyCode == "8") {
                    /*退格回删事件*/
                    firstDiv();

                } else if (event.keyCode == "13") {
                    /*回车事件*/
                    getPassword();

                } else {
                    /*输入非0-9*/
                    errorPoint.style.display = "block";
                    this.value = "";
                }

            };
        }

    }
    func();


    /*定义pawDiv点击事件*/
    var pawDivClick = function (e) {
        for (var i = 0; i < pawDivCount; i++) {
            pawDiv[i].setAttribute("style", "border:none");
        }
        //e.setAttribute("style","border: 2px solid deepskyblue;");
    };


    /*定义自动选中下一个输入框事件*/
    var changeDiv = function () {
        for (var i = 0; i < pawDivCount; i++) {
            if (paw[i].value.length == "1") {
                /*处理当前输入框*/
                paw[i].blur();

                /*处理上一个输入框*/
                paw[i + 1].focus();
                paw[i + 1].readOnly = false;
                pawDivClick(pawDiv[i + 1]);
            }
        }
    };

    /*回删时选中上一个输入框事件*/
    var firstDiv = function () {
        for (var i = 0; i < pawDivCount; i++) {
            // console.log(i);
            if (paw[i].value.length == "0") {
                /*处理当前输入框*/
                //  console.log(i);
                paw[i].blur();

                /*处理上一个输入框*/
                paw[i - 1].focus();
                paw[i - 1].readOnly = false;
                paw[i - 1].value = "";
                pawDivClick(pawDiv[i - 1]);
                break;
            }
        }
    };


    /*获取输入密码*/
    var getPassword = function () {
        var n = "";
        for (var i = 0; i < pawDivCount; i++) {
            n += paw[i].value;
        }
        alert(n);
    };
    var getPasswordBtn = document.getElementsByClassName("getPasswordBtn")[0];

    getPasswordBtn.addEventListener("click", getPassword);

    /*键盘事件*/
    document.onkeyup = function (event) {
        if (event.keyCode == "13") {
            /*回车事件*/
            getPassword();
        }
    };

</script>

</body>
</html>