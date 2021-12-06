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

    $updateProduct = $conn->prepare('UPDATE products SET name=:name, price=:price WHERE id=:id');

    $updateProduct->execute([
        'name'=> $name,
        'price'=> $price,
        'id'=> $id,
    ]);

    header("Location: search.php");



    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
}
    
} ?>