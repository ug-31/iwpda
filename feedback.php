<?php

if ($_SERVER['REQUEST_METHOD'] == "POST")
{
    $feedback = $_REQUEST['feedback'];


    $servername = "localhost:3306";
    $username = "root";
    $pass= "";


    $servername = "localhost:3306";
    $username = "root";
    $pass= "";




try {
    $conn = new PDO("mysql:host=$servername;dbname=food", $username, $pass);

    $insertFeedback = $conn->prepare('INSERT INTO feedback (feedback) VALUES (:feedback)');
    $insertFeedback->execute([
        'feedback'=> $feedback
    ]);

    header("Location: resultant.php");



    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
}
    

    
} ?>

