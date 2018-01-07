<?php  include('register_service.php');?>

<!DOCTYPE html>
<html>
<head>
	<title>ADJ</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	
	<form class="register" method="POST" action="register_service.php">
		<h2>CREATE ACCOUNT</h2>
		<?php if (isset($_SESSION['msg'])): ?>
				<div class="msg">
					<?php 
						echo $_SESSION['msg'];
						unset($_SESSION['msg']);
					?>
				</div>
		<?php endif?>
		<?php if (isset($_SESSION['error_msg'])): ?>
			<div class="error_msg">
				<?php 
					echo $_SESSION['error_msg'];
					unset($_SESSION['error_msg']);
				?>
			</div>
		<?php endif?>
		
		<div class="input-group">
				<input type="text" name="last_name" placeholder="Last Name" maxlength="255" >
				<input type="text" name="first_name" placeholder="First Name" maxlength="255" >
		</div>
		<div class="input-group">
			<input type="text" name="middle_name" placeholder="Middle Name" maxlength="255">
			<input type="number" name="phone_number" placeholder="Phone Number" max="09999999999">
		</div>
		<div class="input-group">
			<input type="radio" name="gender" value="Male" checked="">Male</input>
			<input type="radio" name="gender" value="Female">Female</input>
		</div>
		<div class="input-group">
			<input type="email" name="email" placeholder="Email" maxlength="255" required="yes" >
			<input type="text" name="username1" placeholder="Username" maxlength="255" required="yes" >
		</div>
		<div class="input-group">
			<input type="password" name="password1" placeholder="Password" maxlength="255" required="yes" >
			<input type="password" name="password2" placeholder="Confirm Password" maxlength="255" required="yes" >
		</div>

		<button type="submit" name="register" class="btn">Register</button>

		<div class="login-input-group">
			<label><a href="login.php">Login Existing Account</a></label>
		</div>
	</form>
</body>
</html>