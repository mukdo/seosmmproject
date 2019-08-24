<!DOCTYPE html>
<html>
<head>
	<title>
		SEO & SMM Panel
	</title>
</head>
<body>
	<a href="service.php">Service</a>
	<a href="order.php">Order</a>
	<a href="contact.php">Contact</a>
	<a href="profile.php">Profile</a>
	<a href="balance.php">Balance</a>
	<a href="logout.php">LogOut</a>

	<?php
	    include_once 'Crud.php';
	    $crud = new Crud();
	    session_start();
	    $user = '';
		if(isset($_SESSION['username'])) {
			$user = $_SESSION['username'];
		}
	    $result = $crud->getData("SELECT * FROM user_information where username = '$user'");
	    foreach($result as $key => $res) {
	    	echo "<br/><br/>";
	        echo "Name : " . $res['name'] . "<br/>"; 
	        echo "Email : " . $res['email'] . "<br/>";
	        echo "Phone Number : " . $res['phn_number'] . "<br/>";
	        echo "Country : " . $res['country'];
	        echo "<br/><br/>";
	        echo "<td><a href = 'editProfile.php?username=$res[username]' > Edit Profile </td>";
	    }
	?>

</body>
</html>