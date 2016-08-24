<!Doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $title; ?></title>
	<!-- Icon -->
	<link rel="stylesheet" href="assets/css/font-awesome.css">
	<!-- Style -->
	<link rel="stylesheet" href="assets/css/jquery-ui.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<!--<link rel="stylesheet" href="assets/css/style-s.css">-->
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-83060526-1', 'auto');
	  ga('send', 'pageview');

	</script>
</head>

<body>
	<!-- Header Bar -->
	<div class="wrapper">
	<div id="header">
		<div class="header-container">
			<div class="header-left">
				<a class="header-logo" href="<?php echo base_url(); ?>">Muvera<div class="beta-version">beta version</div></a> <!--  -->
			</div>
			<div class="header-mid">
				<div class="header-mediaonline">MEDIA ONLINE</div>
				<div class="header-twitter">TWITTER</div>
				<div class="header-facebook">FACEBOOK</div>
			</div>
			<div class="header-right">
				<a class="header-login" href="<?php echo base_url('login'); ?>">Log In</a>
				<a class="header-contactus" href="<?php echo base_url('contact_us'); ?>">Contact Us</a>
				<!--<div class="header-dashboard"><img src="assets\images\dashboard-icon.png">DASHBOARD</div>-->
			</div>
		</div>
	</div>