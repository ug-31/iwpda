<?php
session_start();
?>
<?php

if ($_SERVER['REQUEST_METHOD'] == "POST")
{
    $uid = $_REQUEST['uname'];
    $password = $_REQUEST['password'];
    $cpassword = $_REQUEST['cpassword'];

    $servername = "localhost:3306";
    $username = "root";
    $pass= "";


try {
    $conn = new PDO("mysql:host=$servername;dbname=food", $username, $pass);

    // echo $uid;
    echo "<br />";
    $getUser = "SELECT uid FROM users WHERE uid="."'".$uid."'";
    // echo $getUser;

    $stmt = $conn->query($getUser);
    $result = $stmt->fetch();
    if($result){
        header("Location: login.html");
    } else {
        if($password == $cpassword){
            $insertUser = $conn->prepare('INSERT INTO users (uid, password) VALUES (:uid, :password)');
            $insertUser->execute([
                'uid' => $uid,
                'password' => $password,
            ]);
            $_SESSION["user"] = $uid;
            header("Location: search.php");
        } else {
            echo "confirm password doesnt match";
        }
        

    }

    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
}
    
} ?>
