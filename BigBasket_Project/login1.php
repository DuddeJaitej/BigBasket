<?php
$host = "localhost";
$user = "root";
$pass = "Jai1421tej@333";
$dbname = "BigBasket1";

$conn = new mysqli($host, $user, $pass, $dbname);
if (!$conn) {
    die("Connection Failed". $conn->connect_error);
}
echo "";

if(isset($_SERVER["REQUEST_METHOD"]) == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "select*from bb1 where email = ? and password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email,$password);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows > 0) {
        header("Location: home.html");
        exit();
    }else{
        header("Location: login.html");
        exit();
    }
}