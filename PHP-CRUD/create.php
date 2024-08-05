<?php
include 'db.php';
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $name=$_POST["webn"];
    $password=$_POST["pass"];
    $sql = "INSERT INTO passwords (webname,passw ) VALUES ('$name', '$password')";
    if ($connection->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }

    $connection->close();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
</head>
<body>
    <h2 >Welcome to the password management system</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="website">Enter the name of the website</label>
    <br>
    <input type="text" name="webn"  required>
    <br>
    <br>
    <label for="password">Enter the password of the system</label>
    <br>
    <input type="password" name="pass" required>
    <br><br>
    <input type="submit" value="Submit">
    </form>
</body>
</html>