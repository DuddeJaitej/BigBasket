<?php
$host = "localhost";
$user = "root";
$pass = "Jai1421tej@333";
$dbname = "BigBasket1";

$conn = mysqli_connect($host, $user, $pass, $dbname);

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $storedCart = $_POST["cartData"];
    $cart = json_decode($storedCart, true);

    if (!empty($cart)) {
        // Prepare the SQL statement
        $stmt = $conn->prepare("INSERT INTO cartItems (ProductName, Price, ImageSrc) VALUES (?, ?, ?)");
        
        foreach ($cart as $item) {
            $productName = htmlspecialchars($item['productName']);
            $price = floatval($item['price']);
            $imageSrc = isset($item['imageSrc']) ? htmlspecialchars($item['imageSrc']) : null;

            $stmt->bind_param("sds", $productName, $price, $imageSrc);

            if (!$stmt->execute()) {
                die("Error: " . $stmt->error);
            }
        }

        $stmt->close();
    }

    // Redirect after successful insertion
    header("Location: thankyou.html");
    exit();
}

mysqli_close($conn);
?>
