<!doctype html>
<html class="no-js" lang="">
<head>
	<title>烟酒店管理系统</title>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="login/css/bootstrap.css" media="all" />
	<link rel="stylesheet" type="text/css" href="login/css/font-awesome.css" media="all" />
	<link rel="stylesheet" type="text/css" href="login/css/fonts.css" media="all" />
	<link rel="stylesheet" href="login/css/owl.carousel.css">
	<link rel="stylesheet" href="login/css/owl.theme.css">
	<link rel="stylesheet" type="text/css" href="login/css/full-slider.css" media="all" />
	<link rel="stylesheet" type="text/css" href="login/css/jPushMenu.css" media="all" />
	<link rel="stylesheet" type="text/css" href="login/css/hover.css" media="all" />
	<link rel="stylesheet" type="text/css" href="login/css/jquery.fancybox.css" media="all" />
	<link rel="stylesheet" type="text/css" href="login/css/animate.css" media="all" />
	<link rel="stylesheet" type="text/css" href="login/css/preload.css" media="all" />
	<!--=========================
	Favicon of this site 
	============================== -->
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="login/css/normalize.css">
	<link rel="stylesheet" href="login/css/main.css"><!--css for Main sayle-->
	<link rel="stylesheet" href="login/css/media.css"><!--css for Responsive-->
	<script src="login/js/vendor/modernizr-2.8.3.min.js"></script>

</head>
<body>
	<header id="myCarousel" class="carousel slide">
		<div class="carousel-inner">
			<!-- Start Overlay heady -->
			<div class="header_overlay">
				<div class="container">

					<!-- Site logo -->
					<div class="row header_top">
						<div class="col-md-12 col-sm-12 col-xs-12 logo_div">
							<span class="display_brand">华名烟酒店管理系统 1.0</span>
							<!-- <img src="img/1.png" alt="logo"/> -->
						</div>
					</div><!-- End Logo -->
					<!-- Login -->
					<div class="row header_text">
						<div class="col-md-4 col-sm-4 col-xs-4">

						</div>
						<div class="col-md-4 ">
							<form class="login-form" method="post">
									<div class="form-group  wow fadeInLeft inner-addon left-addon" data-wow-delay=".2s">
										<i class="glyphicon glyphicon-user"></i>
										<input name="username" type="text" class="form-control" placeholder="用户名">
									</div>
									<div class="form-group wow fadeInLeft inner-addon left-addon" data-wow-delay=".2s">
										<i class="glyphicon glyphicon-lock"></i>
										<input name="password" type="password" class="form-control" placeholder="密码">
									</div>
									<div class="form-group  wow fadeInLeft" data-wow-delay=".2s">
										<span><input name="validate" type="text" class="form-control" id="" style="width:40%;display:inline" placeholder="验证码">
										<img  title="点击刷新" src="login/captcha/create.php" align="absbottom" onclick="this.src='login/captcha/create.php?'+Math.random();" style="width:50%;max-height:80%;padding: 5%;"></img></span>
										<span class="login_hint">
											<!-- hint -->
										</span>
									</div>
									<div class="form-group  wow fadeInLeft" data-wow-delay=".2s">
										<button type="button" onclick="submitForm()" class="btn btn-primary" style="width:100%">登录</button>
									</div>
							</form>	
						</div>
					</div>
					<!-- End Login -->
				</div>
			</div>

			<div class="item active">
				<div class="fill" style="background-image:url('login/img/1.jpg');"></div>
				<div class="carousel-caption overlay">
				</div>
			</div>
			<!--<div class="item">
				<div class="fill" style="background-image:url('login/img/7.jpg');"></div>
				<div class="carousel-caption overlay">
				</div>
			</div>
			 <div class="item">
				<div class="fill" style="background-image:url('login/img/3.jpg');"></div>
				<div class="carousel-caption overlay">
				</div>
			</div>
			<div class="item">
				<div class="fill" style="background-image:url('login/img/4.jpg');"></div>
				<div class="carousel-caption overlay">
				</div>
			</div> -->
		</div>
	</header>
	<!-- 页脚 -->
	<footer  class="footer_area">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<p>&copy;  2016 蔡鹏博工作室 All Rights Reserved</p>
				</div>
			</div>
		</div>
	</footer>
	<script src="login/js/jquery.js"></script>
	<script type="text/javascript" src="js/jquery.easyui.min.js"></script>
	<script src="login/js/bootstrap.min.js"></script>
	<script src="login/js/jPushMenu.js"></script>
	<script src="login/js/owl.carousel.js"></script>
	<script src="login/js/jquery.fancybox.js"></script>
	<script src="login/js/jquery.fancybox.pack.js"></script>
	<script src="login/js/wow.min.js"></script>
	<script src="login/js/plugins.js"></script>
	<script src="login/js/main.js"></script>
	<script>
		function submitForm() {
			$('.login-form').form('submit',{
				url:"login/loginController.php",
				success:function(data){
					if (data == 0) {
                    	$('.login_hint').html("验证码错误!");
                    } else if(data == 2) {
                    	$('.login_hint').html("密码错误！");
                    } else if(data == 3) {
                    	$('.login_hint').html("用户名不存在");
                    } else if(data == 4) {
                    	$('.login_hint').html("请输入验证码！");
                    } else if(data == 5) {
                    	window.location.href="index.html";
                    } 
				}
			});
			
		}
	</script>
</body>
</html>
