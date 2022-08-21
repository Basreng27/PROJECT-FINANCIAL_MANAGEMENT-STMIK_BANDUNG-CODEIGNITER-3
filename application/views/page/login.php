<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Login</title>

	<!-- ================= Favicon ================== -->
	<!-- Standard -->
	<link rel="shortcut icon" href="assets/images/logotitle.png">
	<!-- Retina iPad Touch Icon-->
	<link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
	<!-- Retina iPhone Touch Icon-->
	<link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
	<!-- Standard iPad Touch Icon-->
	<link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
	<!-- Standard iPhone Touch Icon-->
	<link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">

	<!-- Styles -->
	<link href="assets/css/lib/font-awesome.min.css" rel="stylesheet">
	<link href="assets/css/lib/themify-icons.css" rel="stylesheet">
	<link href="assets/css/lib/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/lib/helper.css" rel="stylesheet">
	<link href="assets/css/style.css" rel="stylesheet">
</head>

<style>
	body {
		background-color: lightgrey;
	}
</style>

<body>
	<div class="body-img">

	</div>
	<div class="unix-login">
		<div class="container-fluid">
			<div class="row justify-content-center">
				<div class="col-lg-6">
					<div class="login-content">
						<div class="login-logo">
							<img src="assets/images/logologin.png">
						</div>
						<div class="login-form">
							<h4>Login</h4>
							<form action="<?php echo base_url() ?>cek_login" method="POST">
								<div class="form-group">
									<label>Username</label>
									<input type="text" class="form-control" name="username" placeholder="Username">
								</div>
								<div class="form-group">
									<label>Password</label>
									<input type="password" class="form-control" name="password" placeholder="Password">
								</div>
								<button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Sign in</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>

</html>