<?php 
    session_start();
    include('connect.php'); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container d-flex-column">
		<div class="header text-center pt-5">
			<h2>Register</h2>
		</div>

		<form action="register_db.php" method="post" >
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
				<input type="text" name="username" class="form-control">
			</div>
			<div class="form-group">
				<label for="email">Email</label>
				<input type="email" name="email" class="form-control">
			</div>
			<div class="form-group">
				<label for="password_1">Password</label>
				<input type="password" name="password_1" class="form-control">
			</div>
			<div class="form-group pb-3">
				<label for="password_2">Confirm Password</label>
				<input type="password" name="password_2" class="form-control">
			</div>
			
			<button type="submit" name="reg_user" class="btn btn-primary btn-block">Register</button>
			
			<p class="text-center pt-5">Already a member? <a class="text-success" href="login.php">Sign in</a></p>
		</form>
	</div>
</body>
</html>