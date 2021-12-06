
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
    <form action="resultant.php" method="post">
      <div class="container">
        <label ><b>Add Orders</b></label>
        <input
        
          id="name"
          type="text"
          placeholder="Enter Name"
          name="name"
          required
        />
        <input
        
          id="quant"
          type="number"
          placeholder="Enter quantity"
          name="quant"
          required
        />
        <input
        
          id="price"
          type="number"
          placeholder="Enter price"
          name="price"
          required
        />
        <input
        
          id="total"
          type="number"
          placeholder="Enter total amount"
          name="total"
          required
        />
        <button  id="btn">Get Amount </button>
        <button type="submit">Add order</button>
      </div>
    </form>

    <form action="orders.php" method="get">
      <div class="container">
        <label for="id"><b>Get Details</b></label>
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

    <form action="feedback.php" method="post">
      <div class="container">
        <label for="id"><b>Feedback</b></label>
        <input
          id="feedback"
          type="text"
          rows="4"
           cols="50"
          placeholder="feedback"
          name="feedback"
          required
          
        />
        <button type="submit">Send</button>
      </div>
    </form>

    



 <form method="post" action="send_mail.php">
 <div class="container">
  <p>Enter Your Name : <input typ="text" name="sender_name"></p>
  <p>Enter Your Email : <input typ="text" name="sender_email"></p>
  <p>Enter Recipient Email : <input typ="text" name="reciever_email"></p>
  <p>Enter Email Subject : <input typ="text" name="subject"></p>
  <p>Enter Message : <textarea id="text" name="message"></textarea></p>
  <p>Select File : <input type="file" name="attach_file"></p>
  <p><input type="submit" name="send_mail" value="Send"></p>
  </div>
 </form>



        <script>
      $(document).ready(function () {
        $("#btn").click(function (e) {
          e.preventDefault();
          var quant = parseInt($("#quant").val());
          var price = parseInt($("#price").val());
          var total = quant*price;
          $("#total").val(total);
          console.log(quant, price)
        });
      });
    </script>

  </body>
</html>

<?php

if ($_SERVER['REQUEST_METHOD'] == "POST")
{
    $name = $_REQUEST['name'];
    $quant = $_REQUEST['quant'];
    $total = $_REQUEST['total'];

    echo $name, $quant, $total;

    $servername = "localhost:3306";
    $username = "root";
    $pass= "";

    // echo $id, $name, $price;


try {
    $conn = new PDO("mysql:host=$servername;dbname=food", $username, $pass);

    $insertOrders = $conn->prepare('INSERT INTO orders (name, quantity, amount) VALUES (:name, :quantity, :amount)');
    $insertOrders->execute([
        'name'=> $name,
        'quantity'=> $quant,
        'amount'=> $total
    ]);

    header("Location: resultant.php");



    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
}


    
} ?>



