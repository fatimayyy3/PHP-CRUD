<?php
include 'db.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $name = $_POST["webn"];
    $password = $_POST["pass"];

    $sql = "UPDATE passwords SET webname='$name', passw='$password' WHERE id=$id";
    if ($connection->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error: " . $connection->error;
    }
    $connection->close();
    exit;
}


$id = $_GET["id"];
$sql = "SELECT id, webname, passw FROM passwords WHERE id=$id";
$result = $connection->query($sql);
$row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Record</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 50%;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
        }
        input[type="text"], input[type="password"] {
            width: calc(100% - 22px);
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 12px;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 4px;
            background-color: #5cb85c;
            color: #fff;
            font-size: 16px;
        }
      
    </style>
</head>
<body>
    <div class="container">
        <h2>Update Record</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <label for="website">Enter the name of the website</label>
            <input type="text" name="webn" value="<?php echo htmlspecialchars($row['webname']); ?>" required>
            <label for="password">Enter the password of the system</label>
            <input type="password" name="pass" value="<?php echo htmlspecialchars($row['passw']); ?>" required>
            <input type="submit" value="Update">
        </form>
    </div>
</body>
</html>
<?php
$connection->close();
?>
