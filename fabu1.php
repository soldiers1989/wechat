<?php

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="keywords" content="DueApe留学生辅导平台">
	<meta name="description" content="DueApe留学生辅导平台">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black" />
	<meta name="app-mobile-web-app-capable" content="yes">
	<meta name="app-itunes-app" content="app-id=599473996">
	<title>发布订单</title>
	<link rel="stylesheet" type="text/css" href="css/basic.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/index.js"></script>
	<script language="javascript">
		function checkForm() {
			var bFlag = false;
			var Project = document.getElementsByName('radioProject');
			for (var i = 0; i < Project.length; i++) {
				if (Project[i].checked) {
					bFlag = true;
					break;
				}
			}

			if (bFlag == false) {
				alert('项目不能为空，请选择！');
				//document.getElementById('radioProject').focus();
				return false;
			}
		}
	</script>
</head>
<body>
<div id="wrap">
	<div class="fbdingdan">
		<div class="img">
			<img src="images/bz1.jpg" width="100%">
		</div>
		<div class="bz1">
			<form action="fabu2.php" method="post" onSubmit="return checkForm();">
				<div class="bz_son1 clearfix">
					<div class="img fl">
						<img src="images/shu.jpg" width="100%">
					</div>
					<div class="content fl">
						<h3>51due</h3>
						<div class="content_son">
							51Due是一家以海外中国留学生创业团队为主导，总部设在美国纽约的留学教育咨询机构，同时也是海外拥有强大综合教员实力的论文代写机构。
						</div>
					</div>
					<input type="radio" name="radioProject" value="1">
				</div>
				<div class="bz_son1 clearfix">
					<div class="img fl">
						<img src="images/mao.jpg" width="100%">
					</div>
					<div class="content fl">
						<h3>51due</h3>
						<div class="content_son">
							51Due是一家以海外中国留学生创业团队为主导，总部设在美国纽约的留学教育咨询机构，同时也是海外拥有强大综合教员实力的论文代写机构。
						</div>
					</div>
					<input type="radio" name="radioProject" value="2">
				</div>
				<div class="submit">
					<input type="submit" value="下一步">
				</div>
			</form> 
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