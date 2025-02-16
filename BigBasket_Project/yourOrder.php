<?php
$host = "localhost";
$user = "root";
$pass = "Jai1421tej@333";
$dbname = "BigBasket1";

// Establish connection
$conn = mysqli_connect($host, $user, $pass, $dbname);
if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve data from the cartItems table
    $stmtCart = $conn->prepare("SELECT * FROM cartItems");
    if ($stmtCart) {
        $stmtCart->execute();
        $resultCart = $stmtCart->get_result();

        if ($resultCart->num_rows > 0) {
            echo "<div style='margin: 0px;padding:30px;'>";
            echo "<h1 style='font-size:40px;color:white;'>Cart Items</h1>";

            while ($rowCart = $resultCart->fetch_assoc()) {
                echo "<p><b style='color: blue;font-size:20px; margin-right:95px;'>Product Name:</b> " . htmlspecialchars($rowCart['ProductName']) . "</p>";
                echo "<p><b style='color: blue;font-size:20px; margin-right:175px;'>Price:</b> " . htmlspecialchars($rowCart['Price']) . "</p>";
                echo "<p><b style='color: blue;font-size:20px; margin-right:104px;'>Image Source:</b> " . htmlspecialchars($rowCart['ImageSrc']) . "</p>";
                echo "<hr>";
            }
            echo "</div>";
        } else {
            echo "<p>No cart items found.</p>";
        }
    } else {
        echo "<p>Error fetching cart items.</p>";
    }

} else {
    echo "Invalid request method.";
}

// Close the database connection
mysqli_close($conn);
?>
