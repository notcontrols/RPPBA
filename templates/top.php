<?php
session_start();

$connection = mysql_connect("localhost","root","");
$db = mysql_select_db("rppba_nesterovich");
mysql_set_charset("utf8");
if(!$connection||!$db){
	exit(mysql_error());
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>РППБА</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,800italic,800,700italic,700,600italic,600,400italic,300italic,300' rel='stylesheet' type='text/css'>
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/responsiveslides.min.js"></script>
 <script>
    $(function () {
      $("#slider").responsiveSlides({
      	auto: true,
      	nav: true,
      	speed: 500,
        namespace: "callbacks",
        pager: true,
      });
    });
  </script>
</head>
<body>
			<!--header-->
			<div class="header">
				<div class="container">
					<div class="top-header">
						<div class="logo">
							<h1><a href="index.html">РППБА</a></h1>
						</div>
						<div class="top-menu">
						 <span class="menu"><img src="images/nav.png" alt=""/></span>
							<ul>
								<li><a href="index.php">Главная</a></li>
								<li><a href="about.php">О нас</a></li>
								<li><a href="nout.php">Ноутбуки</a></li>
								<li><a style="color: red;" href="login.php">Личный кабинет</a></li>
								
							</ul>
							 <!--script-nav-->
							 <script>
								 $("span.menu").click(function(){
								 $(".top-menu ul").slideToggle("slow" , function(){
								 });
								 });
							 </script>
						</div>
					</div>
				</div>	
			</div>	
			