<!DOCTYPE html>
<html lang="en">
<head>
	<title>NetshGuard Central Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="<?php echo base_url().'/Assets/login/images/icons/ngicon.png'; ?>"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'/Assets/login/vendor/bootstrap/css/bootstrap.min.css'; ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'/Assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css'; ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'/Assets/login/vendor/animate/animate.css'; ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'/Assets/login/vendor/css-hamburgers/hamburgers.min.css'; ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'/Assets/login/vendor/animsition/css/animsition.min.css'; ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'/Assets/login/vendor/select2/select2.min.css'; ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'/Assets/login/vendor/daterangepicker/daterangepicker.css'; ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'/Assets/login/css/util.css'; ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'/Assets/login/css/main.css'; ?>">
</head>
<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
			    <img class="wrap-login100-img p-t-10" src="<?php echo base_url().'/Assets/login/images/nglogin.png'; ?>">
				<form class="login100-form validate-form p-l-55 p-r-55 p-t-25">
					<div class="wrap-input100 validate-input m-b-16" data-validate="Please enter username">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Please enter password">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100"></span>
					</div>
					<div id="errorBox" hidden>
                        <div class="err-validate" id="message"></div>
                    </div>
					<div class="container-login100-form-btn p-b-30 p-t-55">
						<button class="login100-form-btn">
							Login
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script src="<?php echo base_url().'/Assets/login/vendor/jquery/jquery-3.2.1.min.js'; ?>"></script>
	<script src="<?php echo base_url().'/Assets/login/vendor/animsition/js/animsition.min.js'; ?>"></script>
	<script src="<?php echo base_url().'/Assets/login/vendor/bootstrap/js/popper.js'; ?>"></script>
	<script src="<?php echo base_url().'/Assets/login/vendor/bootstrap/js/bootstrap.min.js'; ?>"></script>
	<script src="<?php echo base_url().'/Assets/login/vendor/select2/select2.min.js'; ?>"></script>
	<script src="<?php echo base_url().'/Assets/login/vendor/daterangepicker/moment.min.js'; ?>"></script>
	<script src="<?php echo base_url().'/Assets/login/vendor/daterangepicker/daterangepicker.js'; ?>"></script>
	<script src="<?php echo base_url().'/Assets/login/vendor/countdowntime/countdowntime.js'; ?>"></script>
	<script src="<?php echo base_url().'/Assets/login/js/main.js'; ?>"></script>
</body>
</html>