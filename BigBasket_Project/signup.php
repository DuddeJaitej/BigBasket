<?php
$host = "localhost";
$user = "root";
$pass = "Jai1421tej@333";
$dbname = "BigBasket1";

$conn = mysqli_connect($host, $user, $pass, $dbname);
if (!$conn) {
    die("Connection Failed". mysqli_connect_error());
}
echo "Connection Successful";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $fullname = $_POST["fname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm = $_POST["confirmp"];
    $mobile = $_POST["Mobile"];
    $dob = $_POST["dateob"];

    $sql = "insert into bb1 values('$fullname','$email','$password','$confirm','$mobile','$dob')";
    if(mysqli_query($conn, $sql)){
        header("Location: home.html");  
        exit();
    }else{
        header("Location: signup.html");
        exit();
    }
}else{
    echo "Insuficient user details";
}
?>