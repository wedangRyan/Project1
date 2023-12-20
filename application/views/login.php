<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>Login Page</title>

    <!-- Bootstrap core CSS -->
	<link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <!-- Custom styles for Login -->
    <link href="<?php echo base_url('assets/css/login.css'); ?>" rel="stylesheet">
	
  </head>
  <body>
    <form class="form-signin" method="post" action="<?php echo site_url('Login/masuk'); ?>">
	  <div class="text-center mb-4">
	  <svg xmlns="http://www.w3.org/2000/svg" width="4em" height="4em" viewBox="0 0 576 512"><!-- Font Awesome Pro 5.15.4 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) -->
	  <path class="path" fill="#333" stroke="white" stroke-width="2" d="M288 115L69.47 307.71c-1.62 1.46-3.69 2.14-5.47 3.35V496a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V311.1c-1.7-1.16-3.72-1.82-5.26-3.2zm96 261a8 8 0 0 1-8 8h-56v56a8 8 0 0 1-8 8h-48a8 8 0 0 1-8-8v-56h-56a8 8 0 0 1-8-8v-48a8 8 0 0 1 8-8h56v-56a8 8 0 0 1 8-8h48a8 8 0 0 1 8 8v56h56a8 8 0 0 1 8 8zm186.69-139.72l-255.94-226a39.85 39.85 0 0 0-53.45 0l-256 226a16 16 0 0 0-1.21 22.6L25.5 282.7a16 16 0 0 0 22.6 1.21L277.42 81.63a16 16 0 0 1 21.17 0L527.91 283.9a16 16 0 0 0 22.6-1.21l21.4-23.82a16 16 0 0 0-1.22-22.59z"/></svg>
		<h1 class="h3 mb-3 font-weight-normal">LOGIN</h1>
	  </div>

	  <div class="form-label-group">
		<input type="text" id="username" name="username" class="form-control" placeholder="Username" required autofocus>
		<label for="username">Username</label>
	  </div>

	  <div class="form-label-group">
		<input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
		<label for="inputPassword">Password</label>
	  </div>

	  <div class="checkbox mb-3">
		<label>
		  <input type="checkbox" value="remember-me"> Remember me
		</label>
	  </div>
	  <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
	  <p class="mt-5 mb-3 text-muted text-center">&copy; Rumah Sehat Yakpermas <?php echo date("Y"); ?></p>
	</form>
  </body>
</html>
