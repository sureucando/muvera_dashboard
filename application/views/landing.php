<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
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
	<div class="wrapper">
		<div id="landing-container">
			<div class="section-product">
				<img src="assets/images/pattern1.png" id="pattern1">
				<img src="assets/images/pattern2.png" id="pattern2">
				<h1>S C R A P<div class="beta-version"> beta version</div></h1>
				<h2>MEDIA INTELLIGENCE</h2>
				<h3>Powered by Muvera</h3>
				<a class="btn btn-lg btn-orange" id="btn-" href="<?php echo base_url('login'); ?>">LOG IN</a>
			</div>
			<!--<img src="assets/images/landing1.jpg">-->
		</div>
		<!--<div class="btn-landing">
			<a class="btn btn-lg btn-blue" href="<?php //echo base_url('media_online'); ?>">Media Monitoring</a>
			<a class="btn btn-lg btn-blue" href="<?php //echo base_url('subscription'); ?>">Subscription</a>
			<a class="btn btn-lg btn-blue" href="<?php //echo base_url('contact_us'); ?>">Contact Us</a>
		</div>-->
	</div>
</body>
</html>