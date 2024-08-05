<?php
include 'db.php';


if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $sql = "DELETE FROM passwords WHERE id=$id";
    if ($connection->query($sql) === TRUE) {
        $message = "Record deleted successfully";
    } else {
        $message = "Error: " . $connection->error;
    }
    $connection->close();
} else {
    $message = "No ID provided for deletion";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Record</title>
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
            text-align: center;
        }
        h2 {
            color: #333;
        }
        p {
            color: #555;
            font-size: 18px;
        }
    
    </style>
</head>
<body>
    <div class="container">
        <h2>Delete Record</h2>
        <p><?php echo htmlspecialchars($message); ?></p>
        <p><a href="read.php">Back to Records</a></p>
    </div>
</body>
</html>
