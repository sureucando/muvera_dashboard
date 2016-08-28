<!-- Content -->
	<div class="content">
		<!--<div class="banner">
			<div class="banner-top">
				Discover News
				<a class="btn btn-sm btn-orange" href="<?php echo base_url('media_online'); ?>">Learn More</a>
			</div>
			<div class="banner-bot"></div>-->
			<div class="content-container" id="login-page">
				<div class="section-login">
					<div id="login-form">
						<div class="login-left"><<div class="img-dummy"></div></div>
						<div class="login-right">
							<form class="form-container" action="<?php echo base_url('login/login_process'); ?>" method="post">
								<h1 class="content-title">LOG IN</h1>
								<label for="Username">Username
									<input type="text" name="username">
								</label>
								<label for="Password">Password
									<input type="password" name="password">
								</label>
								<input type="submit" class="btn btn-blue btn-md" id="btn-login" value="LOG IN">
								<!--<div class="btn btn-blue btn-md" id="btn-cs">LOG IN</div>-->
							</form>
						</div>
					</div>
				</div>	
			</div>