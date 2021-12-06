
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
          <a href="login.html"> Login </a>
        </li>
        <li>
          <a href="signup.html"> Sign Up </a>
        </li>
        <li>
          <a href="admin.php"> Admin </a>
        </li>
        <li>
          <a href="resultant.php"> resultant </a>
        </li>
        <li>
          <a href="search.php"> Search product </a>
        </li>
      </ul>
    </nav>
    <form action="admin.php" method="post">
      <div class="container">
        <label for="id"><b>Delete Product</b></label>
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

    <form action="update.php" method="post">
      <div class="container">
        <label for="id"><b>Update Product</b></label>
        <input
          id="id"
          type="text"
          placeholder="Enter Product Id"
          name="id"
          required
        />
        <input
        id="id"
          type="text"
          placeholder="Enter Product name"
          name="name"
          required
        />
        <input
        id="id"
          type="number"
          placeholder="Enter Product price"
          name="price"
          required
        />
        <button type="submit">Get</button>
      </div>
    </form>

    <form action="insert.php" method="post">
      <div class="container">
        <label for="id"><b>Insert Product</b></label>
        <input
          id="id"
          type="text"
          placeholder="Enter Product Id"
          name="id"
          required
        />
        <input
        id="id"
          type="text"
          placeholder="Enter Product name"
          name="name"
          required
        />
        <input
        id="id"
          type="number"
          placeholder="Enter Product price"
          name="price"
          required
        />
        <button type="submit">Get</button>
      </div>
    </form>

  </body>
</html>

<?php

if ($_SERVER['REQUEST_METHOD'] == "POST")
{
    $id = $_REQUEST['id'];

    $servername = "localhost:3306";
    $username = "root";
    $pass= "";

    // echo $id, $name, $price;


try {
    $conn = new PDO("mysql:host=$servername;dbname=food", $username, $pass);

    $deleteProduct = $conn->prepare('DELETE FROM products WHERE id=:id');
    $deleteProduct->execute([
        'id'=> $id,
    ]);

    header("Location: resultant.php");



    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
}
    
} ?>
