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

	<br/>
	<br/>
	All Order will be start within 10 Hours.

	<?php
	    include_once 'Crud.php';
	    $crud = new Crud();
	    session_start();
	    $user = '';
		if(isset($_SESSION['username'])) {
			$user = $_SESSION['username'];
		}

		/*$id = $_GET['id'];
   		$result = $crud->getData("SELECT * FROM service where id = '$id'");
		foreach($result as $res) {
		    $s_id =  $res['id'];
		    $order = $res['name']; 
		}*/
		
		
	    $result = $crud->getData("SELECT * FROM order_information where user = '$user'");
	?>

	<table border="1">
	    <tr>
	        <td> Order ID </td>
	        <td> Your Order </td>
	        <td> Start Count </td>
	        <td> Quantity </td>
	        <td> Status </td>
	        <td> Created </td>
	        <td> Deadline </td>
	    </tr>  
	    <?php
	        foreach($result as $key => $res) {
	            echo "<tr>";
	            echo "<td>".$res['id']."</td>";
	            echo "<td>".$res['order']."</td>";
	            $start_count = $res['start_count'];
	            if($start_count == 0){
	           	     echo "<td>"."Will Be Update"."</td>"; 
	            }
	            else{
	            	echo "<td>".$res['start_count']."</td>"; 
	            }
	           
	            echo "<td>".$res['quantity']."</td>"; 
	            if($res['create'] > $res['deadline']) {
	            	echo "<td>".'Late Delivery'."</td>"; 
	            }
	            else{
	            	echo "<td>".$res['status']."</td>"; 
	            }
	             
	            echo "<td>".$res['create']."</td>";
	            echo "<td>".$res['deadline']."</td>";  
	            echo "</tr>"; 
	        }
	    ?>

	</table>
</body>
</html>