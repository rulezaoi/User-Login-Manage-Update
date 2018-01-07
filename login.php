<?php include('login_service.php'); 
?>
<!DOCTYPE html>
<html>
	<head>
		<title>ADJ</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
			
		<form class="login" method="POST" action="login_service.php">
			<h1>ADJ Login</h1>
			<?php if (isset($_SESSION['error_msg'])): ?>
				<div class="error_msg">
					<?php 
						echo $_SESSION['error_msg'];
						unset($_SESSION['error_msg']);
					?>
				</div>
			<?php endif?>	
			<div class="login-input-group">
				<input type="text" name="username" placeholder="Username" maxlength="255">
			</div>
			<div class="login-input-group">
				<input type="password" name="password" placeholder="********" maxlength="255">
			</div>
			<div class="login-input-group">
				<button type="submit" name="login" class="btn">LOGIN</button>
			</div>
			<div class="login-input-group">
				<label><a href="register.php" id="sign_up">Sign Up for ADJ</a></label>
			</div>
			<div class="login-input-group">
				<label><a href="admin/index.php">Administrator Login</a></label>
			</div>
			
		</form>

		<script type="text/javascript" scr="script.js"></script>
	</body>
</html>