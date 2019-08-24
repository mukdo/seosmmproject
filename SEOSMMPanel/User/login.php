<!DOCTYPE html>
<html>
<head>
	<title>
		User Login
	</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
	<div class="login">
		<form action="login.php" method="POST" >
			<br>
			<h1>LOG IN</h1>
			<hr style="margin-top: -8%; margin-left: -6%; background-color: blue; width: 50%"><br>
			<input type="text" name="username" id="username" placeholder="Username"/> </br><br>
			<input type="password" name="password" id="password" placeholder="Password"/> </br><br>
			<input type="submit" name="submit" value="Login"/>
			<input type="button" onclick="reset()" name="cancel" value="Cancel"/><br/>
			<span>If you are not a member,<span>
			<a href="registration.php">Register Here</a>
		</form>
	</div>

	<script type="text/javascript">
		function reset() {
			console.log("Working")
			document.getElementById('username').value = '';
			document.getElementById('password').value = '';
		}
	</script>
	

	<?php
		session_start();
		include_once 'Crud.php';
		$crud = new Crud();
		if(isset($_POST['submit'])){
			$username = $_POST['username'];
			$password = $_POST['password'];
			$query = "select * from user_information where username='$username' AND password='$password'";
			$result = $crud->getData($query);
				if($result) {
					foreach($result as $res){
						$name = $res['name'];
						$username = $res['username'];
						$password = $res['password'];
						$email = $res['email'];
						$phn_number = $res['phn_number'];
						$country = $res['country'];
					}
					$_SESSION['username'] = $username;
					header("Location: dashboard.php");
			  		exit();
				}
				else{
					echo "Please Enter Correct Infromation";
				}
	  }
	?>
</body>
</html>