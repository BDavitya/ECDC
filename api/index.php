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

$result = $db->query('SELECT * FROM users');
if ($result) {
    echo '<h2>Data Users</h2>';
    echo '<table border="1">';
    echo '<tr><th>ID</th><th>Name</th><th>Email</th></tr>';
    while ($row = $result->fetchArray()) {
        echo '<tr><td>' . $row['id'] . '</td><td>' . $row['name'] . '</td><td>' . $row['email'] . '</td></tr>';
    }
    echo '</table>';
} else {
    echo "Error fetching data: " . $db->lastErrorMsg();
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