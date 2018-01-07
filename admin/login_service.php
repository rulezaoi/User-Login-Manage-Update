<?php 
	session_start();
	$username = "";
	$password = "";
	$connection = mysqli_connect('localhost','root','','USER_DATA');


	if(isset($_POST['login'])){	
		$username=mysqli_escape_string($connection,$_POST['username']);
		$password=mysqli_escape_string($connection,$_POST['password']);
		$rec=mysqli_query($connection,"SELECT * FROM admin WHERE username='$username'");
	    if (mysqli_num_rows($rec)>=0){
			$reco= mysqli_query($connection,"SELECT * FROM admin WHERE username='$username'");
			$array = mysqli_fetch_array($reco);
			$password_db = $array['password'];
			if (password_verify($password, $password_db) == TRUE) {
				$array = mysqli_fetch_array($reco);
				$id = $array['id'];
				$username = $array['username'];
				if (mysqli_num_rows($reco)==1){
					$_SESSION['user_msg']= "<br>ID : <p>User: '$username'</p>";
					header('location: admin.php');
				}
			}
			else{
				$_SESSION['error_msg']= "Incorrect Admin Credentials";
				header('location: index.php');
			}
			
		}	
		
	}
?>