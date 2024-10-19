<?php
include 'db.php';

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $insert = "INSERT INTO users (name, email) VALUES ('$name', '$email')";
    if ($db->exec($insert)) {
        echo "Data inserted.";
    } else {
        echo "Error inserting data.";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>SQLite Example</title>
</head>

<body>
    <h1>Insert User</h1>
    <form method="post">
        <input type="text" name="name" placeholder="Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="submit" name="submit" value="Save">
    </form>
</body>

</html>