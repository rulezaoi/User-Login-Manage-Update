<?php  
	$last_name = "";
	$first_name = "";
	$middle_name = "";
	$gender = "";
	$phone = "";
	$email = "";
	$username = "";
	$password = "";
	$connection = mysqli_connect('localhost','root','','USER_DATA');

	session_start();
	if(isset($_POST['register'])){

			$last_name = mysqli_escape_string($connection,$_POST['last_name']);
			$first_name = mysqli_escape_string($connection,$_POST['first_name']);
			$middle_name = mysqli_escape_string($connection,$_POST['middle_name']);
			$gender = mysqli_escape_string($connection,$_POST['gender']);
			$phone = mysqli_escape_string($connection,$_POST['phone_number']);
			$email = mysqli_escape_string($connection,$_POST['email']);
			$username = mysqli_escape_string($connection,$_POST['username1']);
			$password = mysqli_escape_string($connection,password_hash($_POST['password1'], PASSWORD_DEFAULT));
			$password1 = mysqli_escape_string($connection,$_POST['password2']);
			if(password_verify($password1, $password) == TRUE){
				$query 	= ("INSERT INTO user_table(lname,fname,mname,gender,phone,email,username,password) VALUES ('$last_name','$first_name','$middle_name','$gender','$phone','$email','$username','$password')");
				mysqli_query($connection,$query);
				$_SESSION['msg']="You have been successfully registered. Please log in your account.";
				header('location: register.php');
				session_stop();
			}
			else{ 
				$_SESSION['error_msg'] = "The passwords do not match";
				header('location: register.php');
			}
	}
	
?>