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
	    session_start();
	    $user = '';
		if(isset($_SESSION['username'])) {
			$user = $_SESSION['username'];
		}
	    $crud = new Crud();
	    $result = $crud->getData("SELECT * FROM service order by catagory ASC");
	    //Service Count
	    /*$result1 = $crud->getData("SELECT COUNT(id) FROM service");
	    foreach($result1 as $res) {
	    	echo $res['COUNT(id)'];
	    }*/
	    
	?>

	<table border="1">
	    <tr>
	        <td> Service Name </td>
	        <td> Catagory </td>
	        <td> Minimum Order</td>
	        <td> Price Per 1K </td>
	        <td> Maximum Order </td>
	        <td> Delivery Per Day </td>
	    </tr>  
	    <?php
	        foreach($result as $key => $res) {
	           echo "<tr>";
	           echo "<td>".$res['name']."</td>";
	           echo "<td>".$res['catagory']."</td>"; 
	           echo "<td>".$res['min_order']."</td>";
	           echo "<td>".$res['price_per_k']."</td>";  
	           echo "<td>".$res['max_order']."</td>"; 
	           echo "<td>".$res['delivery_per_day']."</td>";    
	           echo "<td><a href = 'service.php?id=$res[id]' > Order Here </td>";
	           echo "</tr>"; 
	        }
	    ?>
	</table>
	<?php

	    $id = "";
	    if(isset($_GET['id'])){
    	$id = $_GET['id'];
    	$result = $crud->getData("SELECT * FROM service where id = '$id'");
        
	        foreach($result as $key => $res) {
		       $name = $res['name']; 
		       $catagory = $res['catagory']; 
		       $min_order = $res['min_order']; 
		       $price_per_k = $res['price_per_k']; 
		       $max_order = $res['max_order']; 
		       $delivery_per_day = $res['delivery_per_day']; 

		    }

	        if($id){
	        	$create = date('Y-m-d H:i:s');
	        	echo "<div>" . "<br/>".
					"<form action='service.php' method='POST'>" . "<br/>". 
						"<input type='text' name='user' value='$user' hidden/>".
						"<input type='text' name='id' value='$id' hidden/>".
						"<input type='text' name='name' value='$name' hidden/>".
						"<input type='text' name='catagory' value='$catagory' hidden/>".
						"<input type='text' name='link' name='link' placeholder='Your Oder Link'/>". "<br/>". 
						"<input type='number' name='min_order' value='$min_order' hidden/>".
						"<input type='number' name='price_per_k' value='$price_per_k' hidden/>".
						"<input type='number' name='max_order' value='$max_order' hidden/>".
						"<input type='number' name='delivery_per_day' value='$delivery_per_day' hidden/>". 
						"<input type='number' id='quantity' name='quantity' placeholder='Type Quantity'/>" . 
						"<input type='text' id='status' name='status' value ='Created' hidden />" .
						"<input type='text' id='create' name='create' value ='$create' hidden />" . 
						"<input type='text' id='deadline' name='deadline' hidden />" . 
						 
						"<input type='submit' name='submit' value='Submit'/>" . "<br/>".
					"</form>" . "<br/>".
				"</div>";

				

		    }

	    }
	    $quantity = 0;
		$price = "";
	    if(isset($_POST['submit'])){
	        $user = $_POST['user'];
	        $s_id = $_POST['id'];
	        $name = $_POST['name']; 
		    $catagory = $_POST['catagory']; 
		    $link = $_POST['link']; 
			$min_order = $_POST['min_order']; 
			$price_per_k = $_POST['price_per_k']; 
		    $max_order = $_POST['max_order']; 
		    $delivery_per_day = $_POST['delivery_per_day']; 
			$quantity = $_POST['quantity'];
			$status = $_POST['status'];
			$create = $_POST['create'];
			$deadline = $_POST['deadline'];

			if($quantity < $min_order){
				echo "Quantity is Minimum";
	  		}
	  		else if($quantity > $max_order){
	  			echo "Quantity is Maximum";
	  		}
	  		else{
			  	$price = ($price_per_k / 1000) * $quantity;
			  	$deliveryTime = (24 / $delivery_per_day) * $quantity + 5;
			  	//echo $deliveryTime;
				$deadline = date("Y-m-d h:i:sa", strtotime("+$deliveryTime Hours"));
			  	//echo $create + $deliveryTime;
				if($s_id){
				    $result = $crud->execute("INSERT INTO `order_information`(`user`,`order`,`catagory`,`link`,`quantity`,`price`,`status`,`create`,`deadline`,`s_id`)VALUES('$user','$name','$catagory','$link','$quantity','$price','$status','$create','$deadline', '$s_id')");
					if($result){
						$s_id = "";
					    header("Location: order.php");
						exit();
					}
				}
			}		  		
	  	}

	?>

	
</body>
</html>