<?php

if ($_SERVER['REQUEST_METHOD'] == "GET")
{
    $id = $_REQUEST['id'];


    $servername = "localhost:3306";
    $username = "root";
    $pass= "";

    // echo $id, $name, $price;


try {
    $conn = new PDO("mysql:host=$servername;dbname=food", $username, $pass);

    $getProduct = "SELECT * FROM orders WHERE id=".$id;

    
    $stmt = $conn->query($getProduct);
    $result = $stmt->fetch();

    if($result){
        echo "<br/>"; 
        echo "<div class='table'  >";
        echo "<table border='1' style='' > 
        <tr>
        <th>id</th> 
        <th>name</th> 
        <th>quantity</th> 
        <th>amount</th> 
        </tr>";
        echo "<tr>";
         $c = 0 ; 
        foreach ($result as $value) {
           if($c%2 == 0) {
            echo "<td> $value</td>";
           }
           $c++;
               

        }
                        echo "</tr>";
                        echo "</div>";
    } else {
        print("not found");

    }



    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
}


    
} ?>

