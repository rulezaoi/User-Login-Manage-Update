<?php 
	include('login_service.php');
	if (isset($_GET['show_profile'])) {
		$id = $_GET['show_profile'];
		$edit_state = true;
		$edit_state1 = true;
		$rec= mysqli_query($connection,"SELECT * FROM user_table WHERE id=$id");
		$record = mysqli_fetch_array($rec);
		$last_name = $record['lname'];
		$first_name = $record['fname'];
		$middle_name = $record['mname'];
		$gender = $record['gender'];
		$phone = $record['phone'];
		$email = $record['email'];
		$username = $record['username'];
		$password = $record['password'];
		$id = $record['id'];
	}

	if (isset($_GET['hide_profile'])) {
		$edit_state1=false;
	}
	if (isset($_GET['update'])){
		$id = $_GET['update'];
		$edit_state = true;
		$edit_state1 = true;
		$edit_state2=true;
		$rec= mysqli_query($connection,"SELECT * FROM user_table WHERE id=$id");
		$record = mysqli_fetch_array($rec);
		$last_name = $record['lname'];
		$first_name = $record['fname'];
		$middle_name = $record['mname'];
		$gender = $record['gender'];
		$phone = $record['phone'];
		$email = $record['email'];
		$username = $record['username'];
		$password = $record['password'];
		$id = $record['id'];
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>ADJ</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<table class="home-group">
		<h1>WELCOME TO ADJ</h1>
		<?php if (isset($_SESSION['user_msg'])): ?>
			<div class="msg">
					<?php 
						echo $_SESSION['user_msg'];
					?>
			</div>
				
		<?php endif?>
		<div class="link">
			<button><a name="logout" href="login.php">Logout</a></button>
		<?php if(isset($_SESSION['id_msg'])): ?>
			<?php if ($edit_state1==false): ?>
				<button><a href='home.php?show_profile=<?php echo $_SESSION['id_msg']; ?>'>Show Profile</a></button>
			<?php else: ?>
				<button><a href='home.php?hide_profile=<?php echo $_SESSION['id_msg']; ?>'>Hide Profile</a></button>
			<?php endif ?>
			<?php if ($edit_state2==false): ?>
				<button><a href="home.php?update=<?php echo $_SESSION['id_msg']; ?>">Update Account</a></button>
			<?php endif ?>
		<?php endif?>		

		</div>	
			
		<?php if (isset($_SESSION['msg'])): ?>
			<div class="msg">
				<?php 
					echo $_SESSION['msg'];
					unset($_SESSION['msg']);
				?>
			</div>
		<?php endif ?>
		<?php if (isset($_SESSION['error_msg'])): ?>
			<div class="error_msg">
				<?php 
					echo $_SESSION['error_msg'];
					unset($_SESSION['error_msg']);
				?>
			</div>
		<?php endif?>
	</table>	
	
	<?php if ($edit_state!=false): ?>
		<form class="edit" method="post" action="login_service.php">
			<input type="hidden" name="id" value="<?php echo $id; ?>">
			<div class="input-group">
				<label>First Name</label>
				<input type="text" name="first_name" value="<?php echo $first_name; ?>">
			</div>
			<div class="input-group">
				<label>Middle Name</label>
				<input type="text" name="middle_name" value="<?php echo $middle_name; ?>">
			</div>		
			<div class="input-group">
				<label>Last Name</label>
				<input type="text" name="last_name" value="<?php echo $last_name; ?>">
			</div>		
			<div class="input-group">
				<label>Gender</label>
				<input type="radio" name="gender" value="Male" checked="">Male</input>
				<input type="radio" name="gender" value="Female">Female</input>
			</div>	
			<div class="input-group">
				<label>Phone Number</label>
				<input type="number" name="phone_number" value="<?php echo $phone; ?>" max="09999999999">
			</div>		
			<div class="input-group">
				<label>Email Address</label>
				<input type="text" name="email" value="<?php echo $email; ?>">
			</div>		
			<div class="input-group">
				<label>User Name</label>
				<input type="text" name="username" value="<?php echo $username; ?>">
			</div>		
			<?php if ($edit_state2!=false): ?>
				<div>
					<div class="input-group">
					<label>Password</label>
					<input type="password" name="password1" value="">
				</div>			
				<div>
					<div class="input-group">
					<label>Confirm Password</label>
					<input type="password" name="password2" value="">
				</div>	
			<?php endif ?>
			
			<div class="input-group">
			<?php if ($edit_state2!=false): ?>
				<button type="submit" name="save" class="btn" >Save</button>
			<?php else: ?>
				<button type="submit" name="delete" class="btn" >Delete Account</button>
			<?php endif ?>
			</div>		
		</form>
	<?php  endif ?>
	
	<script type="text/javascript" scr="script.js"></script>
</body>
</html>