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
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        // Display the fetched data
        foreach ($data as $row) {
            echo "<div class='container' style='position: absolute;
            top: 00px;
            left: 350px;
            height: 900px;
            width: 700px;
            background-image: radial-gradient(rgb(3, 201, 136), rgb(0, 21, 36));
            display: flex;
            flex-direction: column;
            align-items: center;
            box-shadow: #000 1px 2px 10px 2px;
            '>";
            
            echo "<div style='margin: 0px;padding:30px;'>";
            echo "<h1 style='font-size:40px;color:white;'>Profile Page</h1>";

            echo "<p><b style='color: white;font-size:22px;
            margin-right:90px;'>
            Full Name:</b> " . htmlspecialchars($row['Fullname']) . "</p>";

            echo "<p><b style='color: white;font-size:22px;
            margin-right:130px;'>
            Email:</b> " . htmlspecialchars($row['Email']) . "</p>";

            echo "<p><b style='color: white;font-size:22px;
            margin-right:46px;'>
            Mobile Number:</b> " . htmlspecialchars($row['MobileNumber']) . "</p>";
            
            echo "<p><b style='color: white;font-size:22px;
            margin-right:71px;'>
            Date of Birth:</b> " . htmlspecialchars($row['DateofBirth']) . "</p>";

            echo "<form action='yourOrder.php' method='post'>";
            echo "<input type='submit' id='orders' name='yo' value='Your Orders' 
            style='text-decoration: none;
            color:darkblue;
            cursor:pointer;
            width: 340px;
            height: 60px;
            position: absolute;
            margin-top: 0px;
            background-color: white;
            box-shadow: #000 0px 2px 3px 0px;border-radius:5px;'></form> "."<br>";

            echo "<a href='FinalAddress.php?email=" . urlencode($row['Email']) . "'>
            <input type='button' id='adress' value='Your Address' 
            style='text-decoration: none;
            cursor:pointer;
            color:darkblue;
            width: 340px;
            height: 60px;
            position: absolute;
            margin-top: 50px;
            background-color: white;
            box-shadow: #000 0px 2px 3px 0px;
            border: 0;border-radius:5px;'></a>"."<br>";


            echo "<input type='button' id='details' value='Your Contact' 
            style='text-decoration: none;
            width: 340;
            height: 60px;
            position: absolute;
            margin-top: 100px;
            /* margin-left: 670px; */
            background-color: white;
            box-shadow: #000 0px 2px 3px 0px;
            border: 0;border-radius:5px;'>"."<br>";

            echo "<input type='button' id='setting' value='Settings'
            style='text-decoration: none;
            width: 340;
            height: 60px;
            position: absolute;
            margin-top: 150px;
            /* margin-left: 670px; */
            background-color: white;
            box-shadow: #000 0px 2px 3px 0px;
            border: 0;border-radius:5px;'>"."<br>";

            echo "<input type='button' id='coup' value='Coupons'
            style='text-decoration: none;
            width: 340;
            height: 60px;
            position: absolute;
            margin-top: 200px;
            /* margin-left: 670px; */
            background-color: white;
            box-shadow: #000 0px 2px 3px 0px;
            border: 0;border-radius:5px;'>"."<br>";

            echo "<input type='button' id='faq' value='FAQ's'
            style='text-decoration: none;
            width: 340;
            height: 60px;
            position: absolute;
            margin-top: 250px;
            /* margin-left: 670px; */
            background-color: white;
            box-shadow: #000 0px 2px 3px 0px;
            border: 0;border-radius:5px;'>"."<br>";

            echo "<a href = 'login.html'>
            '<input type='button' id='out' name='logout' value='Log out'
            style='text-decoration: none;
            color:darkblue;
            cursor:pointer;
            width: 340;
            height: 60px;
            position: absolute;
            margin-top: 300px;
            background-color: white;
            box-shadow: #000 0px 2px 3px 0px;
            border: 0;border-radius:5px;'></a>";

            echo "<button type='submit' id='bth' 
            style='width:340px;height:60px;
            margin-top:370px;
            cursor:pointer;
            box-shadow: #000 0px 2px 3px 0px;
            border-radius:5px;'>
            <a href='home.html' style='text-decoration:none;color:darkblue;'>
            Back to Home</a></button>";

            echo "</div>";
            echo "</div>";
            // Add more fields as needed
            echo "<hr>";
        }
    } else {
        // No data found, handle accordingly
        header("Location: Profilelogin.html");
        exit();
    }
} else {
    echo "Invalid request method";
}

// Close the database connection
mysqli_close($conn);
?>