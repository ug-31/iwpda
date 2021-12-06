<?php
session_start();
?>
<?php

if ($_SERVER['REQUEST_METHOD'] == "POST")
{
    $id = $_REQUEST['id'];
    $name = $_REQUEST['name'];
    $price = $_REQUEST['price'];

    $servername = "localhost:3306";
    $username = "root";
    $pass= "";

    // echo $id, $name, $price;


try {
    $conn = new PDO("mysql:host=$servername;dbname=food", $username, $pass);

    $insertProduct = $conn->prepare('INSERT INTO products (id, name, price) VALUES (:id, :name, :price)');
    $insertProduct->execute([
        'id'=> $id,
        'name'=> $name,
        'price'=> $price
    ]);

    header("Location: search.php");



    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
}
    
} ?>