<html>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "no_dues";
// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT * FROM students_data";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
echo "Name: " . $row["Name"] . "<br>" . $row["Password"] ;
?>
</body>
</html>