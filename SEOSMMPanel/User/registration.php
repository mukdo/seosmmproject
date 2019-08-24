<!DOCTYPE html>
<html>
<head>
	<title>
		
	</title>
</head>
<body>
	<div id="frm">
		<form action="registration.php" method="POST">
			<input type="text" name="name" id="name" placeholder="Name"/> </br>
			<input type="text" name="username" id="username" placeholder="Username"/> </br>
			<input type="password" name="password" id="password" placeholder="Password"/> </br>
			<input type="email" name="email" id="email" placeholder="Email"/> </br>
			<input type="text" name="phn_number" id="phn_number" placeholder="Phone Number"/> </br>
			<input type="text" name="country" id="country" placeholder="Country"/> </br>
			<input type="submit" name="submit" value="Register"/>
			<input type="button" onclick="reset()" name="cancel" value="Cancel"/><br/>
			Have a Account?
			<a href="login.php">login Here</a>
		</form>
	</div>
	
	<script type="text/javascript" >
		function reset() {
			console.log("Working")
			document.getElementById('name').value = '';
			document.getElementByID('username').value = '';
			document.getElementByID('password').value = '';
			document.getElementByID('email').value = '';
			document.getElementByID('phn_number').value = '';
			document.getElementByID('country').value = '';

		}
	</script>

	<?php
	    include_once 'Crud.php';
	    $crud = new Crud();
	    if(isset($_POST['submit'])){
	    	$name = $_POST['name'];
	    	$username = $_POST['username'];
	    	$password = $_POST['password'];
	    	$email = $_POST['email'];
	    	$phn_number = $_POST['phn_number'];
	    	$country = $_POST['country'];
	    	if($name && $username && $password && $email && $phn_number && $country){
	    		$result = $crud->execute("INSERT INTO `user_information`(`name`, `username`, `password`, `email`, `phn_number`, `country`) VALUES ('$name','$username','$password','$email','$phn_number','$country') ");
		    	if($result){
		    		$_SESSION['username'] = $username;
					header("Location: dashboard.php");


		    	}
		    	else{
		    		echo "This username already used";
		    	}
	    	}
	    	else{
	    		echo "Please Fill Up all the Field";
	    	}

	    	
	    }
	?>

</body>
</html>