<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Openeye.com</title>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/components.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/responsee.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/owl-carousel/owl.carousel.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/owl-carousel/owl.theme.css">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/modernizr.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/responsee.js"></script>
<!--[if lt IE 9]>
      <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
      <![endif]-->
<style>
body {
	margin: 0;
	padding: 0;
	background-color:#FFF;
}
nav {
	display: block;
	width: 100%;
	height: 50px;
	background-color: #FFF;
	border-bottom: 1px #666666 solid;
}
nav ul {
	display: block;
	margin-left: auto;
	margin-right: auto;
	width: 480px;
	height: 50px;
}
nav ul li {
	height: 100%;
	text-transform: uppercase;
	display: block;
	float: left;
	width: 100px;
	text-align: center;
	cursor: pointer;
	line-height: 50px;
	opacity: .8;
}
nav ul li:hover {
	opacity: 1;
	border-bottom: 2px #0099FF solid;
}
#head {
	display: block;
	width: 100%;
	height: 100vh;
	border-bottom: 1px #000 solid;
}
.news {
	height:400px;
	background-size:cover;
	background-position:center;
}
.marg{
	margin:10px;
}
</style>
</head>
<body>
<header>
	<nav>
		<ul>
			<li>home</li>
			<li>donasi</li>
			<li>Sign in</li>
			<li>login</li>
		</ul>
	</nav>
</header>
<!-- CAROUSEL -->
<div class="line">
	<div id="owl-demo" class="owl-carousel owl-theme  margin-bottom">
		<div class="item"><img src="<?php echo base_url(); ?>assets/img/940x380.jpg" alt=""></div>
		<div class="item"><img src="<?php echo base_url(); ?>assets/img/940x380-2.jpg" alt=""></div>
		<div class="item"><img src="<?php echo base_url(); ?>assets/img/940x380-3.jpg" alt=""></div>
	</div>
</div>
<!-- END OF CAROUSEL -->
<!-- section 1 -->
<div class="marg line">
	<div class="s-12 l-6">
		<div class="box news" style="background-image:url(<?php echo base_url(); ?>assets/img/940x380.jpg);">
		</div>
	</div>
	<div class="s-12 l-6">
		<div class="box news">
			<p>Copyright 2015, Vision Design - graphic zoo</p>
		</div>
	</div>
</div>
<!-- section 2 -->
<div class="marg line">
	<div class="s-12 l-6">
		<div class="box news">
		</div>
	</div>
	<div class="s-12 l-6">
		<div class="box news" style="background-image:url(<?php echo base_url(); ?>assets/img/940x380.jpg);">
			<p>Copyright 2015, Vision Design - graphic zoo</p>
		</div>
	</div>
</div>
<div class="line">
	<div class="box" style="height:300px; background-color:#37001C; margin-bottom:-10px">
	</div>
	<div class="box" style="height:20px; background-color:#201; margin-bottom:-15px">
	</div>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/owl-carousel/owl.carousel.js"></script> 
<script type="text/javascript">
         jQuery(document).ready(function($) {	  
           $("#owl-demo").owlCarousel({		
         	navigation : true,
         	slideSpeed : 300,
         	paginationSpeed : 400,
         	autoPlay : true,
         	singleItem:true
           });
         });	 
      </script>
</body>
</html>
