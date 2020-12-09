<!DOCTYPE html>
<html>
<head>
	<title>Buat Toko Kamu</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<style>
</style>
<body>
	<img class="wave" src={{ asset('img/wave.png') }}>
	<div class="container mt-5">
		<div class="img">
			<img src="img/storebg.svg">
		</div>
		<div class="login-content">
			<form action="/createstore" method="POST" enctype="multipart/form-data">
				@csrf
				<img src="img/store.svg">
				<h3>Buat Toko</h3>
				<div class="alert alert-info" role="alert">
					Link Profile Toko E-commerce harus diisi (minimal 1)
				  </div>
				@if (session('success'))
                      <div class="alert bg-success text-white">
                          <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                          {{ session('success') }}
                      </div>
				@endif
				@if (session('danger'))
                      <div class="alert bg-success bg-danger text-white">
                          <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                          {{ session('danger') }}
                      </div>
                @endif
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
					  </div>
           		   <div class="div">
           		   		<h5>Nama Toko</h5>
           		   		<input type="text" name="store_name" class="input" value="{{ old('store_name') }}">
					  </div>
				   </div>
				   @if ($errors->has('store_name'))
				   <span class="text-danger">{{ $errors->first('store_name') }}</span>
				   @endif
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Alamat Toko</h5>
           		   		<input type="text" name="store_address" class="input" value="{{ old('store_address') }}">
           		   </div>
				   </div>
				   @if ($errors->has('store_address'))
				   <span class="text-danger">{{ $errors->first('store_address') }}</span>
				   @endif
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Link Profile Toko Lazada</h5>
           		    	<input type="text" name="store_lazada" class="input" value="{{ old('store_lazada') }}">
            	   </div>
				</div>
				@if ($errors->has('store_lazada'))
				<span class="text-danger">{{ $errors->first('store_lazada') }}</span>
				@endif
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Link Profile Toko Shopee</h5>
           		    	<input type="text" name="store_shopee" class="input" value="{{ old('store_shopee') }}">
            	   </div>
				</div>
				@if ($errors->has('store_shopee'))
				<span class="text-danger">{{ $errors->first('store_shopee') }}</span>
				@endif
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Link Profile Toko Tokopedia</h5>
           		    	<input type="text" name="store_tokopedia" class="input" value="{{ old('store_tokopedia') }}">
            	   </div>
				</div>
				@if ($errors->has('store_tokopedia'))
				<span class="text-danger">{{ $errors->first('store_tokopedia') }}</span>
				@endif
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Link Profile Toko Bukalapak</h5>
           		    	<input type="text" name="store_bukalapak" class="input" value="{{ old('store_bukalapak') }}">
            	   </div>
				</div>
				@if ($errors->has('store_bukalapak'))
				<span class="text-danger">{{ $errors->first('store_bukalapak') }}</span>
				@endif
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Tentang Toko</h5>
           		    	<input type="text" name="store_about" class="input" value="{{ old('store_about') }}">
            	   </div>
				</div>
				@if ($errors->has('store_about'))
				<span class="text-danger">{{ $errors->first('store_about') }}</span>
				@endif
				<input type="submit" class="btn" value="Buat Toko">
            </form>
        </div>
    </div>
    <script type="text/javascript" src="js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
