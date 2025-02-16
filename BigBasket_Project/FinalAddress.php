<?php
$host = "localhost";
$user = "root";
$pass = "Jai1421tej@333";
$dbname = "BigBasket1";

$conn = mysqli_connect($host, $user, $pass, $dbname);
if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

if (isset($_GET['email'])) {
    $email = $_GET['email'];

    $stmtOrders = $conn->prepare("SELECT * FROM deliveryAddress WHERE Email = ?");
    if ($stmtOrders) {
        $stmtOrders->bind_param("s", $email);
        $stmtOrders->execute();
        $resultOrders = $stmtOrders->get_result();

        if ($resultOrders->num_rows > 0) {
            echo "<div style='margin-left: 7px;padding:40px;'>";
            echo "<h1 style='font-size:40px;color:white;'>Your Address</h1>";

            while ($rowOrders = $resultOrders->fetch_assoc()) {
                echo "<p><b style='color: blue;font-size:20px; margin-right:95px;'>Full Name:</b> " . htmlspecialchars($rowOrders['Fullname']) . "</p>";
                echo "<p><b style='color: blue;font-size:20px; margin-right:135px;'>Email:</b> " . htmlspecialchars($rowOrders['Email']) . "</p>";
                echo "<p><b style='color: blue;font-size:20px; margin-right:108px;'>Phone No:</b> " . htmlspecialchars($rowOrders['Phoneno']) . "</p>";
                echo "<p><b style='color: blue;font-size:20px; margin-right:115px;'>Country:</b> " . htmlspecialchars($rowOrders['Country']) . "</p>";
                echo "<p><b style='color: blue;font-size:20px; margin-right:145px;'>State:</b> " . htmlspecialchars($rowOrders['State']) . "</p>";
                echo "<p><b style='color: blue;font-size:20px; margin-right:151px;'>City:</b> " . htmlspecialchars($rowOrders['City']) . "</p>";
                echo "<p><b style='color: blue;font-size:20px; margin-right:126px;'>Door No:</b> " . htmlspecialchars($rowOrders['DoorNo']) . "</p>";
                echo "<p><b style='color: blue;font-size:20px; margin-right:136px;'>Pin No:</b> " . htmlspecialchars($rowOrders['PinNo']) . "</p>";
                echo "<hr>";
            }
            echo "</div>";
        } else {
            echo "<p style='color: red;'>No address found for this user.</p>";
        }
    } else {
        echo "<p>Error fetching orders.</p>";
    }
} else {
    echo "<p>Invalid access. No email provided.</p>";
}

mysqli_close($conn);
?>
