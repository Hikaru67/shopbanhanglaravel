<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="{{asset('backend/images/icons/favicon.ico')}}"/>
	<link rel="stylesheet" type="text/css" href="{{asset('backend/vendor/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('backend/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('backend/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('backend/vendor/animate/animate.css')}}">	
	<link rel="stylesheet" type="text/css" href="{{asset('backend/vendor/css-hamburgers/hamburgers.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('backend/vendor/animsition/css/animsition.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('backend/vendor/select2/select2.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('backend/vendor/daterangepicker/daterangepicker.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('backend/css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('backend/css/main.css')}}">

</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url({{asset('backend/images/bg-01.jpg')}});">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					Admin Login
				</span>

				<?php 
					$message = Session::get('message');
					if($message){
						echo '<span class="text-alert">'.$message.'</span>';
						Session::put('message', null);
					}
				?>

				<form action="{{URL::to('/admin-dashboard')}}" method="POST" class="login100-form validate-form p-b-33 p-t-5">


					{{ csrf_field() }}

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="admin_username" placeholder="User name">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="admin_password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>

					<div class="container-login100-form-btn m-t-32">
						<button class="login100-form-btn">
							Login
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	

	<script src="{{asset('backend/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
	<script src="{{asset('backend/vendor/animsition/js/animsition.min.js')}}"></script>
	<script src="{{asset('backend/vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{asset('backend/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('backend/vendor/select2/select2.min.js')}}"></script>
	<script src="{{asset('backend/vendor/daterangepicker/moment.min.js')}}"></script>
	<script src="{{asset('backend/vendor/daterangepicker/daterangepicker.js')}}"></script>
	<script src="{{asset('backend/vendor/countdowntime/countdowntime.js')}}"></script>
	<script src="{{asset('backend/js/main.js')}}"></script>

</body>
</html>