<?php
include "db.php"; // Meng-include file db.php yang mendefinisikan class database

// Inisialisasi objek database
$db = new database;

if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $insert = "INSERT INTO user (name, email) VALUES ('$name', '$email')";
    
    if ($db->exec($insert)) {
        echo "inserted";
    } else {
        echo "not inserted: " . $db->lastErrorMsg(); // Menampilkan pesan kesalahan
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>sqlite3 tutorial</title>
</head>

<body>
    <center>
        <h3>simple Sqlite3 CRUD tutorial in PHP</h3>
        <!-- Form -->
        <form action="" method="post">
            <input type="text" name="name" placeholder="name"> <br>
            <input type="text" name="email" placeholder="email"> <br>
            <input type="submit" name="submit" value="save">
        </form>
        <!-- Tampilkan data -->
        <table border="1">
            <tr>
                <th>id(desc)</th>
                <th>name</th>
                <th>email</th>
                <th>edit</th>
                <th>delete</th>
            </tr>
            <?php
            // Pilih data setelah $db diinisialisasi
            $select = "SELECT rowid, * FROM user ORDER BY rowid DESC";
            $result = $db->query($select);
            while ($row = $result->fetchArray()) {
                ?>
            <tr>
                <td><?php echo $row["rowid"]; ?></td>
                <td><?php echo $row["name"]; ?></td>
                <td><?php echo $row["email"]; ?></td>
                <td><a href="edit.php?id=<?php echo $row['rowid']; ?>">Edit</a></td>
                <td><a href="delete.php?id=<?php echo $row['rowid']; ?>">Delete</a></td>
            </tr>
            <?php
            }
            ?>
        </table>
    </center>
</body>

</html>