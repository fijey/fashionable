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
		@if (session('statusLogin'))
                  <div class="alert alert-danger">
                    {{ session('statusLogin') }}
				  </div>
			@endif
		<div class="login-content">
			<form action="/postlogin" method="POST">
				@csrf
				<img src="img/avatar.svg">
				<h2 class="title">Selamat Datang</h2>
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
            	<a href="#">Forgot Password?</a>
            	<input type="submit" class="btn">
            </form>
        </div>
    </div>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>
