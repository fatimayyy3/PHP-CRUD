
<?php
$_servername = "localhost";
$_username = "root";
$_password = "";
$_dbname = "php-crud";

$connection = mysqli_connect($_servername, $_username, $_password, $_dbname);

// Check connection
if (!$connection) {
    die("Error connecting to server: " . mysqli_connect_error());
} else {
    echo "Connection successful.";
}
?>


