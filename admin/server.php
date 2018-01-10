<?php  
	session_start();
	$last_name = "";
	$edit_state=false;
	$first_name = "";
	$middle_name = "";
	$gender = "";
	$phone = "";
	$email = "";
	$username = "";
	$password = "";
	
	$connection = mysqli_connect('localhost','root','','USER_DATA');
	
	if(isset($_POST['save'])){
			$last_name = mysqli_escape_string($connection,$_POST['last_name']);
			$first_name = mysqli_escape_string($connection,$_POST['first_name']);
			$middle_name = mysqli_escape_string($connection,$_POST['middle_name']);
			$gender = mysqli_escape_string($connection,$_POST['gender']);
			$phone = mysqli_escape_string($connection,$_POST['phone_number']);
			$email = mysqli_escape_string($connection,$_POST['email']);
			$username = mysqli_escape_string($connection,$_POST['username']);
			$password= mysqli_escape_string($connection,password_hash($_POST['password'], PASSWORD_DEFAULT));
			$query 	= ("INSERT INTO user_table(lname,fname,mname,gender,phone,email,username,password) VALUES ('$last_name','$first_name','$middle_name','$gender','$phone','$email','$username','$password')");
			mysqli_query($connection,$query);
			$_SESSION['msg']="You Successfully Registered New User Account";
			header('location: admin.php');
			
	}

	if(isset($_POST['update'])){
		$edit_state=false;
		$last_name = mysqli_escape_string($connection,$_POST['last_name']);
		$first_name = mysqli_escape_string($connection,$_POST['first_name']);
		$middle_name = mysqli_escape_string($connection,$_POST['middle_name']);
		$gender = mysqli_escape_string($connection,$_POST['gender']);
		$phone = mysqli_escape_string($connection,$_POST['phone_number']);
		$email = mysqli_escape_string($connection,$_POST['email']);
		$username = mysqli_escape_string($connection,$_POST['username']);
		$password = mysqli_escape_string($connection,password_hash($_POST['newpassword'], PASSWORD_DEFAULT));
		$id =mysqli_escape_string($connection,$_POST['id']);
		mysqli_query($connection, "UPDATE user_table SET lname='$last_name',fname='$first_name',mname='$middle_name',gender='$gender',phone='$phone',email='$email',username='$username',password='$password' WHERE id='$id'");		
		
			$_SESSION['msg'] = "User Has Been Profile Updated";
			header('location: admin.php');
	}

	if(isset($_GET['delete'])){
		$id = $_GET['delete'];
		mysqli_query($connection,"DELETE FROM user_table WHERE user_table.id=$id");
		$_SESSION['msg'] = "Account Has Been Deleted";
		header('location: admin.php');
	}

	$users = mysqli_query($connection,"SELECT * FROM user_table");
	$admins = mysqli_query($connection,"SELECT * FROM admin");

?>
