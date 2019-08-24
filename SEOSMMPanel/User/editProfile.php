<?php
    include_once 'Crud.php';
    $crud = new Crud();
    $username = $_GET['username'];
    $result = $crud->getData("SELECT * FROM user_information where username = '$username'");

	foreach($result as $key => $res) {
	    $name =  $res['name'];
	    $email = $res['email'];
	    $phn_number = $res['phn_number'];    
	    $country = $res['country']; 
	}
?>

<form action="editProfile.php" method="POST">
	<input type="text" name="username" value="<?php echo $username;?>" hidden/>
	<input type="text" name="name" value="<?php echo $name;?>"/>
	<input type="text" name="email" value="<?php echo $email;?>"/>
	<input type="text" name="phn_number" value="<?php echo $phn_number;?>"/>
	<input type="text" name="country" value="<?php echo $country;?>"/>
	<input type="submit" name="submit" value="Submit"/>

</form>
<?php
	    include_once 'Crud.php';
	    $crud = new Crud();
		
	    if(isset($_POST['submit'])){
	    	$username =  $_POST['username'];
	    	$name =  $_POST['name'];
		    $email = $_POST['email'];
		    $phn_number = $_POST['phn_number'];    
		    $country = $_POST['country'];


	    	$result = $crud->execute("UPDATE user_information SET name='$name',email='$email',phn_number='$phn_number',country='$country' WHERE username = '$username'");
	    	if($result){
	    		header("Location: profile.php");
			  	exit();
	    	}
	    }
	?>

