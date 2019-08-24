<!DOCTYPE html>
<html>
<head>
	<title>
		Admin Login
	</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
	<div id="frm" class="login">
		<form action="login.php" method="POST">
			<input class="field" type="text" name="name" placeholder="Name"/> </br>
			<input class="field" type="text" name="username" placeholder="Username"/> </br>
			<input class="field" type="password" name="password" placeholder="Password"/> </br>
			<input class="btn" type="submit" name="submit" value="Login"/>
			<input class="btn" type="button" onclck="reset()" name="cancel" value="Cancel"/><br/>
		</form>
	</div>
	

	<?php
		session_start();
		include_once 'Crud.php';
		$crud = new Crud();
		if(isset($_POST['submit'])){
			$name = $_POST['name'];
			$username = $_POST['username'];
			$password = $_POST['password'];
			$query = "select * from admin where name='$name' AND username='$username' AND password='$password'";
			$result = $crud->getData($query);
		if($result) {
			foreach($result as $res){
				$name = $res['name'];
				$username = $res['username'];
				$password = $res['password'];
			}
			$_SESSION['name'] = $name;
			$_SESSION['username'] = $username;
			header("Location: dashboard.php");
	  		exit();
		}
		else{
			echo "Please Enter Correct Username and Password";
		}
	  }
	?>
</body>
</html>