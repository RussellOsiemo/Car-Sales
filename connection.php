<<<<<<< HEAD
<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "car sales";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$database);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
else {
  //echo "Connection Successful";
}

=======
<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "car sales";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$database);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
else {
  //echo "Connection Successful";
}

>>>>>>> 9edd6aded308fde07a674814467786830aaeb416
?>