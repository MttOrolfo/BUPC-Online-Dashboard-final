<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dashboard";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

       $name = $_POST['name'];
               $id_no = $_POST['id_no'];
               $username = $_POST['username'];
               $password = $_POST['password'];
 $type = $_POST['type'];
               $position = $_POST['position'];

$sql = "INSERT INTO users (name, id_no, username,password,type,position)
VALUES ('$name', '$id_no', '$username', '$password', '$type', '$position')";

if (mysqli_query($conn, $sql)) {
  header("location:index.php");
     } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
