<?php
  $connect = new PDO("mysql:host=localhost;dbname=panel", "root", "");
  $method = $_SERVER['REQUEST_METHOD'];

  if($method == 'GET'){
    $data = array(
      ':Service_Name' => "%".$_GET['Service_Name']."%",
      ':Minimum_Order' => "%".$_GET['Minimum_Order']."%",
      ':Price_Per_K' => "%".$_GET['Price_Per_K']."%",
      ':Delivery_Per_Day' => "%".$_GET['Delivery_Per_Day']."%",
      ':Max_Order' => "%".$_GET['Max_Order']."%",
      ':Catagory' => "%".$_GET['Catagory']."%"
    );
    $query = "SELECT * FROM service WHERE name LIKE :Service_Name AND min_order LIKE :Minimum_Order AND price_per_k LIKE :Price_Per_K AND delivery_per_day LIKE :Delivery_Per_Day AND max_order LIKE :Max_Order AND  catagory LIKE :Catagory ORDER BY id DESC";

    $statement = $connect->prepare($query);
    $statement->execute($data);
    $result = $statement->fetchAll();
    foreach($result as $row){
      $output[] = array(
        'id'    => $row['id'],   
        'Service_Name'  => $row['name'],
        'Minimum_Order'   => $row['min_order'],
        'Price_Per_K'    => $row['price_per_k'],
        'Delivery_Per_Day'    => $row['delivery_per_day'],
        'Max_Order'    => $row['max_order'],
        'Catagory'   => $row['catagory']
      );
    }
    header("Content-Type: application/json");
    echo json_encode($output);
  }

  if($method == "POST"){
    $data = array(
      ':Service_Name'  => $_POST['Service_Name'],
      ':Minimum_Order'  => $_POST["Minimum_Order"],
      ':Price_Per_K'    => $_POST["Price_Per_K"],
      ':Delivery_Per_Day'    => $_POST["Delivery_Per_Day"],
      ':Max_Order'    => $_POST["Max_Order"],
      ':Catagory'   => $_POST["Catagory"]
    );
    $query = "INSERT INTO service (name, min_order, price_per_k, delivery_per_day, max_order, catagory) VALUES (:Service_Name, :Minimum_Order, :Price_Per_K, :Delivery_Per_Day, :Max_Order, :Catagory)";
    $statement = $connect->prepare($query);
    $statement->execute($data);
  }

  if($method == 'PUT'){
    parse_str(file_get_contents("php://input"), $_PUT);
    $data = array(
      ':id'   => $_PUT['id'],
      ':Service_Name' => $_PUT['Service_Name'],
      ':Minimum_Order' => $_PUT['Minimum_Order'],
      ':Price_Per_K'   => $_PUT['Price_Per_K'],
      ':Delivery_Per_Day'    => $_PUT['Delivery_Per_Day'],
      ':Max_Order'   => $_PUT['Max_Order'],
      ':Catagory'  => $_PUT['Catagory']
    );
    $query = "
    UPDATE service 
    SET name = :Service_Name, 
    min_order = :Minimum_Order, 
    price_per_k = :Price_Per_K, 
    delivery_per_day = :Delivery_Per_Day, 
    max_order = :Max_Order, 
    catagory = :Catagory 
    WHERE id = :id
    ";
    $statement = $connect->prepare($query);
    $statement->execute($data);
  }

  if($method == "DELETE"){
    parse_str(file_get_contents("php://input"), $_DELETE);
    $query = "DELETE FROM service WHERE id = '".$_DELETE["id"]."'";
    $statement = $connect->prepare($query);
    $statement->execute();
  }
?>
