<?php 
	include('server.php');

	if(isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$edit_state=true;
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
		<title>ADJ-ADMIN</title>
		<link rel="stylesheet" type="text/css" href="../css/style.css">
	</head>
	<body>
		<button class="btn logout"><a href="index.php">Logout</a></button>
		<h1>WELCOME TO ADJ</h1>
		<div class="note-input-group">
			<h3>NOTE:</h3>
			<p>default password of user is (username+lastname)</p>
		</div>
		<table>
			<?php if (isset($_SESSION['msg'])): ?>
				<div class="msg">
					<?php 
						echo $_SESSION['msg'];
						unset($_SESSION['msg']);
					?>
				</div>
			<?php endif ?>
			<thead>
				<tr>
					<th>ID</th>
					<th>First Name</th>
					<th>Middle Name</th>
					<th>Last Name</th>
					<th>Gender</th>
					<th>Phone Number</th>
					<th>Email</th>
					<th>Username</th>
					<th colspan="2">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php while ($row = mysqli_fetch_array($users)) { ?>
				<tr>
					<td><?php echo $row['id']; ?></td>
					<td><?php echo $row['fname']; ?></td>
					<td><?php echo $row['mname']; ?></td>
					<td><?php echo $row['lname']; ?></td>
					<td><?php echo $row['gender']; ?></td>
					<td><?php echo $row['phone']; ?></td>
					<td><?php echo $row['email']; ?></td>
					<td><?php echo $row['username']; ?></td>
					<td>
						<a class="edit_btn" href="admin.php?edit=<?php echo $row['id']; ?>">Edit</a>
					</td>
					<td>
						<a class="delete_btn" href="server.php?delete=<?php echo $row['id'];?>">Delete</a>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
			<form class="admin" method="post" action="server.php">
				<input type="hidden" name="id" value="<?php echo $id; ?>">
				<div class="input-group">
					<div class="input-group">
						<label>First Name</label>
						<input type="text" name="first_name" value="<?php echo $first_name; ?>" required="yes">
					</div>
					<div class="input-group">
						<label>Middle Name:</label>
						<input type="text" name="middle_name" value="<?php echo $middle_name; ?>">
					</div>		
				</div>				
				<div class="input-group">
					<div class="input-group">
						<label>Last Name:</label>
						<input type="text" name="last_name" value="<?php echo $last_name; ?>" required="yes">
					</div>		
					<div class="input-group">
						<label>Gender:</label>
						<input type="radio" name="gender" value="Male" checked="">Male</input>
						<input type="radio" name="gender" value="Female">Female</input>
					</div>
				</div>
				<div class="input-group">
					<div class="input-group">
						<label>Phone Number:</label>
						<input type="number" name="phone_number" value="<?php echo $phone; ?>" max="09999999999">
					</div>		
					<div class="input-group">
						<label>Email Address:</label>
						<input type="text" name="email" value="<?php echo $email; ?>" required="yes">
					</div>		
				</div>
				<div class="input-group">
					<div class="input-group">
						<label>User Name:</label>
						<input type="text" name="username" value="<?php echo $username; ?>" required="yes">
					</div>		
					<?php if ($edit_state==false): ?>
						<div class="input-group">
							<label>Password:</label>
							<input type="password" name="password" value="" required="yes">
						</div>				
					<?php else: ?>
						<div class="input-group">
							<input type="hidden" name="newpassword" value="<?php echo $username; ?><?php echo $last_name; ?>">
						</div>
					<?php endif ?>
				
				</div>
					<div class="input-group">
					<?php if ($edit_state==false): ?>
						<button type="submit" name="save" class="btn" >Register New User Account</button>
					<?php else: ?>	
						<button type="submit" name="update" class="btn" >Update</button>
					<?php endif ?>
				</div>		
			</form>
	</body>
</html>