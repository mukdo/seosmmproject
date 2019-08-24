<!DOCTYPE html>
<html>
<head>
	<title>
		SEO & SMM Panel
	</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>

	<form action="#" method="POST">
		<select name="chooseCatagory">
			<option value="All">Select Order Status</option>
			<option value="Progress">Progress</option>
			<option value="Late Delivery">Late Delivery</option>
			<option value="Completed">Completed</option>
		</select>


	<input type="submit" name="submit" value="Submit" />
	</form>



	<?php
	    include_once 'Crud.php';
	    $crud = new Crud();
	    $result = $crud->getData("SELECT * FROM order_information order by catagory ASC");
	    if(isset($_POST['submit'])){
			$chooseCatagory = $_POST['chooseCatagory'];
			//$create = $_POST['create'];
			//$deadline = $_POST['deadline'];
			
			$result = $crud->getData("SELECT * FROM order_information where status = '$chooseCatagory' order by catagory ASC");
			
			if($chooseCatagory == 'All'){
				$result = $crud->getData("SELECT * FROM order_information order by catagory ASC");

			}
		}
		

	?>

	<table border="1">
	    <tr>
	        <td> ID </td>
	        <td> User </td>
	        <td> Order </td>
	        <td> Catagory </td>
	        <td> Link </td>
	        <td> Start </td>
	        <td> Quantity </td>
	        <td> End </td>
	        <td> Price </td>
	        <td> Status </td>
	        <td> Create </td>
	        <td> Deadline </td>

	    </tr>  
	    <?php
	        foreach($result as $key => $res) {
	           echo "<tr>";
	           echo "<td>".$res['id']."</td>";
	           echo "<td>".$res['user']."</td>"; 
	           echo "<td>".$res['order']."</td>";
	           echo "<td>".$res['catagory']."</td>";  
	           echo "<td>".$res['link']."</td>"; 
	           echo "<td>".$res['start_count']."</td>";  
	           echo "<td>".$res['quantity']."</td>"; 
	           echo "<td>".$res['end_count']."</td>"; 
	           echo "<td>".$res['price']."</td>"; 
	           if($res['create'] > $res['deadline']) {
	            	echo "<td>".'Late Delivery'."</td>"; 
	            }
	            else{
	            	echo "<td>".$res['status']."</td>"; 
	            } 
	           echo "<td>".$res['create']."</td>"; 
	           echo "<td>".$res['deadline']."</td>"; 

	           echo "<td><a href = 'manage_order.php?id=$res[id]' > Start </td>";
	           echo "</tr>"; 
	        }
	    ?>
	</table>


	<?php

	    $id = "";
	    if(isset($_GET['id'])){
    	$id = $_GET['id'];
    	$result = $crud->getData("SELECT * FROM order_information where id = '$id'");
        
	        foreach($result as $key => $res) {
	        	$start_count = $res['start_count'];
	        	$quantity = $res['quantity'];

		    }

	        if($id){
	        	$create = date('Y-m-d H:i:s');
	        	echo "<div>" . "<br/>".
					"<form action='service.php' method='POST'>" . "<br/>". 
						"<input type='text' name='id' value='$id' hidden/>".
						"<input type='text' name='start_count' value='$start_count' hidden/>".
						"<input type='text' name='quantity' value='$quantity' hidden/>".
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