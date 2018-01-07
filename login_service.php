<?php 
	session_start();
	$edit_state=false;
	$edit_state1=false;
	$edit_state2=false;
	$last_name = "";
	$first_name = "";
	$middle_name = "";
	$gender = "";
	$phone = "";
	$email = "";
	$username = "";
	$password = "";
	$password1 = "";
	$password_db = "";
	$id=0;
	$connection = mysqli_connect('localhost','root','','user_data');


	if(isset($_POST['login'])){	
		$username=mysqli_escape_string($connection,$_POST['username']);
		$password=mysqli_escape_string($connection,$_POST['password']);

	    if (mysqli_num_rows($rec)>=0){
			$reco= mysqli_query($connection,"SELECT * FROM user_table WHERE username='$username'");
			$array = mysqli_fetch_array($reco);
			$password_db = $array['password'];
			if (password_verify($password, $password_db) == TRUE) {
				$id = $array['id'];
				$lname = $array['lname'];
				$fname = $array['fname'];
				$mname = $array['mname'];
				if (mysqli_num_rows($reco)==1){
					$_SESSION['id_msg']= $id;			
					$_SESSION['user_msg']= "<br>ID : <input type='button' name='id' value='$id'> <p>Full Name: $fname $mname $lname</p>";
					header('location: home.php');
				}	
			}
			else{
				$_SESSION['error_msg']= "Incorrect Username/Password";
				header('location: login.php');
			}
		}	
		
	}
	
	if(isset($_POST['save'])){
		$edit_state=false;
		$edit_state2=false;
		$last_name = mysqli_escape_string($connection,$_POST['last_name']);
		$first_name = mysqli_escape_string($connection,$_POST['first_name']);
		$middle_name = mysqli_escape_string($connection,$_POST['middle_name']);
		$gender = mysqli_escape_string($connection,$_POST['gender']);
		$phone = mysqli_escape_string($connection,$_POST['phone_number']);
		$email = mysqli_escape_string($connection,$_POST['email']);
		$username = mysqli_escape_string($connection,$_POST['username']);
		$id =mysqli_escape_string($connection,$_POST['id']);
		$password = mysqli_escape_string($connection,password_hash($_POST['password1'], PASSWORD_DEFAULT));
		$password1 = mysqli_escape_string($connection,$_POST['password2']);	
		if(!empty($password1)){
			if (password_verify($password1, $password) == TRUE){
				mysqli_query($connection, "UPDATE user_table SET lname='$last_name',fname='$first_name',mname='$middle_name',gender='$gender',phone='$phone',email='$email',username='$username',password='$password' WHERE id='$id'");		
				$_SESSION['user_msg']= "<br>ID : <input type='button' name='id' value='$id'> <p>Full Name: $first_name $middle_name $last_name</p>";
				$_SESSION['msg'] = "Profile updated";
				header('location: home.php');
			}
			else{
				$_SESSION['error_msg'] = "Password Do Not Match";
				header('location: home.php');
			}
		}
		else{
			$_SESSION['error_msg'] = "Please Confirm Your Password";
			header('location: home.php');
		}

	}

	if(isset($_POST['delete'])){
		$id = $id =mysqli_escape_string($connection,$_POST['id']);
		mysqli_query($connection,"DELETE FROM user_table WHERE id=$id");
		$_SESSION['msg'] = "Your Account Has Been Deleted";
		header('location: login.php');
	}	

	$result = mysqli_query($connection,"SELECT * FROM user_table");
?>