<?php
$host = "localhost";
$user = "root";
$pass = "Jai1421tej@333";
$dbname = "BigBasket1";

$conn = mysqli_connect($host, $user, $pass, $dbname);
if(!$conn){
    die("Connection Failed...". mysqli_connect_error());
}
echo "";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phoneno = $_POST['phoneno'];
    $country = $_POST['country'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $doorno = $_POST['doorno'];
    $pinno = $_POST['pinno'];
    

    // Insert data into the database
    $sql = "INSERT INTO deliveryAddress VALUES ('$fullname', '$email', '$phoneno', '$country', '$state', '$city', '$doorno', '$pinno')";
    if(mysqli_query($conn, $sql)){
        header("Location: thankyou.html");
        exit();
    }else{
        header("addtocart.html");
        exit();
    }
}
?>