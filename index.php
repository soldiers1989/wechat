<?php
$fabuon='';
$personon="";
$indexon="on";
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
	<title>首页</title>
	<link rel="stylesheet" type="text/css" href="css/basic.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/index.js"></script>
	<!-- banner js -->
	<script defer src="js/banner.js"></script> 
	<script type="text/javascript">
    $(function(){
      $('.flexslider').flexslider({
        animation: "slide",
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
    });
  	</script>
</head>
<body>
<div id="wrap">
	<!-- banner star -->
	<div class="banner">
		<div class="pro-switch">
			<div class="slider">
				<div class="flexslider">
					<ul class="slides">
						<li>
							<div class="img"><img src="images/banner.jpg" /></div>
						</li>
						<li>
							<div class="img"><img src="images/banner.jpg" /></div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- banner end -->

	<!-- 服务项目 star-->
	<div class="fwxm">
		<h3>服务项目</h3>
		<a href="display.html"><img src="images/banner.jpg" width="100%"></a>
		<a href="display.html"><img src="images/banner.jpg" width="100%"></a>
		<a href="display.html"><img src="images/banner.jpg" width="100%"></a>
		<a href="display.html"><img src="images/banner.jpg" width="100%"></a>
		<a href="display.html"><img src="images/banner.jpg" width="100%"></a>
		<a href="display.html"><img src="images/banner.jpg" width="100%"></a>
	</div>
	<!-- 服务项目 end -->

	<!-- footer star -->
	<div style="height: 62px;"></div>
	<?php include("footer.php") ?>
	<!-- footer end -->
</div>
</body>
</html>