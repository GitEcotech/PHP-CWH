<?php
    $inser=false;
if(isset($_POST['name'])){
    //set connection variable
    $server="localhost";
    $user="phpmyadmin";
    $password="Password@123";
    //create database connection 
    $con = mysqli_connect($server,$user,$password,'trip');

    //chech for connection success
    if(!$con){
        die("Connection failed".mysqli_connect_error());
    }
    //echo "Connection Succesful";

    //collect post variables
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];

    //Execute the query
    $sql = "INSERT INTO `trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES 
    ('$name', '$age', '$gender', '$email', '$phone', 
    '$desc', CURRENT_TIMESTAMP)";
   // echo $sql; 

    if($con->query($sql) == true){
        //echo "Record inserted successfully";
        //flag for success insertion.
        $insert=true;
    }
    else{
        echo "ERROR: $sql<br> $con->error";
    }

    //close the connection
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Tutorial</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Alkatra&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="style.css">
</head>

<body>
    <img src="bg.jpg" alt="Building Image" class="bg">
    <div class="container">
        <h1>Welcome to IIT US Trip Form</h1>
        <p>Enter your details and submit this form to confirm your participation in the trip.</p>

        <?php 
        if($insert==true){
            echo '<p class="submitMsg"> Thanks for submitting your form. 
            We are happy to see you joining us to US trip </p>';
        }
        ?>

        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone no">
            <textarea name="desc" id="desc" cols="30" rows="5" placeholder="Enter 
            any other information here."></textarea>
            <button class="btn">Submit</button>
            <button class="btn">Reset</button>
        </form>
    </div>

    <script src="index.js"></script>

</body>

</html>