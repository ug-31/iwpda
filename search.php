
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <link rel="stylesheet" href="search.css" />
    <title>Search Product</title>
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
  </head>
  <body>
  <nav>
        
        <ul>
            <li>
                <a href="login.html">
                    Login
                </a>
            </li>
            <li>
                <a href="signup.html">
                    Sign Up
                </a>
            </li>
            <li>
                <a href="admin.php">
                    Admin
                </a>
            </li>
            <li>
                <a href="resultant.php">
                    resultant
                </a>
            </li>
            <li>
                <a href="search.php">
                    Search product
                </a>
            </li>
        </ul>
        
    </nav>

    <form action="search.php" method="post">
      <div class="container">
        <label for="id"><b>product id</b></label>
        <input
        
          id="id"
          type="text"
          placeholder="Enter Product Id"
          name="id"
          required
        />
        <button type="submit">Get</button>
      </div>
    </form>
    <!-- <script>
      $(document).ready(function () {
        $("button").click(function (e) {
          e.preventDefault();
          console.log($("#id").val());
          var id = $("#id").val();
        });
      });
    </script> -->
  </body>
</html>
<?php

if ($_SERVER['REQUEST_METHOD'] == "POST")
{
    $id = $_REQUEST['id'];

    try {
        $servername = "localhost:3306";
        $username = "root";
        $pass= "";
        $conn = new PDO("mysql:host=$servername;dbname=food", $username, $pass);
    
        
        $getProduct = "SELECT * FROM products WHERE id=".$id;
        // echo $getUser;
    
        $stmt = $conn->query($getProduct);
        $result = $stmt->fetch();
        if($result){
            echo "<br/>"; 
            echo "<div class='table'  >";
            echo "<table border='1' style='' > 
            <tr>
            <th>id</th> 
            <th>name</th> 
            <th>price</th> 
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
