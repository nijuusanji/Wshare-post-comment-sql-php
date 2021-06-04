<?php
    session_start();
    include('connect.php'); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container d-flex-column">
		<div class="header text-center pt-5">
			<h2>Login</h2>
		</div>
		<form action="login_db.php" method="post" >
			<?php include('errors.php'); ?>
			<?php if (isset($_SESSION['error'])) : ?>
				<div class="error text-danger">
					<p>
						<?php 
							echo $_SESSION['error'];
							unset($_SESSION['error']);
						?>
					<p>
				</div>
			<?php endif ?>
			<div class="form-group">
				<label for="username">Username</label>
				<input type="text" name="username" class="form-control" id="uname" >
			</div>
			<div class="form-group pb-3">
				<label for="password">Password</label>
				<input type="password" name="password" class="form-control" >
			</div>
			
			<button type="submit" name="login_user" class="btn btn-primary btn-block">Login</button>
		
			<p class="text-center pt-5">Not a member yet? <a class="text-success" href="register.php">Sign Up</a></p>
		</form>
	</div>
</body>
</html>