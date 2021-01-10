<?php 
	
	use App\Models\Web_setting;

	$website = Web_setting::all();
	$website = $website->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="<?= $website['web_language'] ?>" id="extr-page">
	<head>
		<meta charset="utf-8">
		<title> <?= $website['web_name'] ?> | ADMIN </title>
		<!-- <meta name="description" content="ONLINE STORE - Login"> -->
		<meta name="author" content="<?= $website['web_name'] ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		
		<!-- #CSS Links -->
		<!-- Basic Styles -->
		<link rel="stylesheet" type="text/css" media="screen" href="<?= base_url ?>assets/admin-1/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="<?= base_url ?>assets/admin-1/css/font-awesome.min.css">

		<!-- SmartAdmin Styles : Caution! DO NOT change the order -->
		<link rel="stylesheet" type="text/css" media="screen" href="<?= base_url ?>assets/admin-1/css/smartadmin-production-plugins.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="<?= base_url ?>assets/admin-1/css/smartadmin-production.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="<?= base_url ?>assets/admin-1/css/smartadmin-skins.min.css">

		<!-- #FAVICONS -->
		<link rel="shortcut icon" href="<?= base_url ?>assets/admin-1/img/favicon/favicon.ico" type="image/x-icon">
		<link rel="icon" href="<?= base_url ?>assets/admin-1/img/favicon/favicon.ico" type="image/x-icon">

		<!-- #GOOGLE FONT -->
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">
		
		<!-- iOS web-app metas : hides Safari UI Components and Changes Status Bar Appearance -->
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">

	</head>
	
	<body class="animated fadeInDown">

		<header id="header">

			<div id="logo-group">
				<span id="logo"> <img src="<?= base_url ?>assets/admin-1/img/logo.png" alt="SmartAdmin"> </span>
			</div>
			
		</header>

		<div id="main" role="main">

			<!-- MAIN CONTENT -->
			<div id="content" class="container">

				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 hidden-xs hidden-sm">
						<h1 class="txt-color-red login-header-big"><i>O N L I N E STORE</i></h1>
						<div class="hero">

							<div class="pull-left login-desc-box-l">
								<h4 class="paragraph-header">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								consequat.</h4>
							</div>

						</div>

					</div>
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
						<div class="well no-padding">
							<form id="form" class="smart-form client-form">
								<header>
									LOGIN
								</header>

								<fieldset>
									
									<section>
										<label class="label">Email</label>
										<label class="input"> <i class="icon-append fa fa-user"></i>
											<input type="email" id="email" name="email" required>
											<b class="tooltip tooltip-top-right"><i class="fa fa-user txt-color-teal"></i> Please enter email address</b></label>
									</section>

									<section>
										<label class="label">Password</label>
										<label class="input"> <i class="icon-append fa fa-lock"></i>
											<input type="password" id="password" name="password" required>
											<b class="tooltip tooltip-top-right"><i class="fa fa-lock txt-color-teal"></i> Enter your password</b> </label>
									</section>
								</fieldset>
								<footer>
									<button type="submit" class="btn btn-primary">
										LOGIN
									</button>
								</footer>
							</form>

						</div>
						
					</div>
				</div>
			</div>

		</div>

		<!--================================================== -->	

	    <!-- Link to Google CDN's jQuery + jQueryUI fall back to local -->
	    <script src="<?= base_url ?>assets/admin-1/js/libs/jquery-2.1.1.min.js"></script>
	    <script src="<?= base_url ?>assets/admin-1/js/libs/jquery-ui-1.10.3.min.js"></script>

		<!-- IMPORTANT: APP CONFIG -->
		<script src="<?= base_url ?>assets/admin-1/js/app.config.js"></script>

		<!-- BOOTSTRAP JS -->		
		<script src="<?= base_url ?>assets/admin-1/js/bootstrap/bootstrap.min.js"></script>

		<!-- CUSTOM NOTIFICATION -->
		<script src="<?= base_url ?>assets/admin-1/js/notification/SmartNotification.min.js"></script>

		<!-- MAIN APP JS FILE -->
		<script src="<?= base_url ?>assets/admin-1/js/app.min.js"></script>
		<script src="<?= base_url ?>assets/admin-1/application.js" type="text/javascript"></script>	
		<script type="text/javascript">
			$(document).ready(function() {
				$.sound_path = '<?= base_url ?>assets/admin-1/sound/'
				pageSetUp()
			})
		</script>

		<!-- Login Javascript -->
		<script type="text/javascript">
			$('#form').submit(ev =>
			{
				ev.preventDefault()
				
				let username = $('#email').val()
				let password = $('#password').val()

				$.ajax({
					method: 'post',
					url: '<?= base_url ?>admin/login/post',
					data: {
						username: username,
						password: password,
					},
				})
				.then(data => JSON.parse(data))
				.then(data =>
				{
					if(data.status > 0)
					{
						$.doneMessage('Login success.','LOGIN')

						setInterval(() => { location.href = '<?= base_url ?>admin/dashboard' }, 1000)
					}
					else
					{
						if(data.message == 'Username tidak ada')
						{
							$('#email').val('')
							$('#password').val('')
							$('#email').focus()
						}
						else
						{
							$('#password').val('')
							$('#password').focus()
						}

						$.warningMessage(data.message, 'Login')
					}
				})
			})
		</script>

	</body>
</html>