<!DOCTYPE html>
<html>
<head>
	<title>Animated Login Form</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<img class="wave" src={{ asset('img/wave.png') }}>
	<div class="container">
		<div class="img">
			<img src="img/bg.svg">
		</div>
		<div class="login-content">
			<form action="/postregister" method="POST">
				@csrf
				<img src="img/avatar.svg">
				<h2 class="title">Register Account</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
					  </div>
           		   <div class="div">
           		   		<h5>email</h5>
           		   		<input type="email" name="email" class="input">
					  </div>
				   </div>
				   @if ($errors->has('email'))
				   <span class="text-danger">{{ $errors->first('email') }}</span>
				   @endif
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>nama</h5>
           		   		<input type="text" name="name" class="input">
           		   </div>
				   </div>
				   @if ($errors->has('name'))
				   <span class="text-danger">{{ $errors->first('name') }}</span>
				   @endif
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input type="password" name="password" class="input">
            	   </div>
				</div>
				@if ($errors->has('password'))
				<span class="text-danger">{{ $errors->first('password') }}</span>
				@endif
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Retype Password</h5>
           		    	<input type="password" name="retype_password" class="input">
            	   </div>
				</div>
				@if ($errors->has('retype_password'))
				<span class="text-danger">{{ $errors->first('retype_password') }}</span>
				@endif
            	<a href="#">Forgot Password?</a>
				<input type="submit" class="btn" value="Login">
            </form>
        </div>
    </div>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>
