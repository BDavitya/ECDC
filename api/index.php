<?php

try {
    // Menggunakan __DIR__ untuk memastikan path relatif benar
    $db = new PDO('sqlite:' . __DIR__ . '/oioioi.sqlite');

    // Buat tabel jika belum ada
    $db->exec("CREATE TABLE IF NOT EXISTS groups(id INTEGER PRIMARY KEY, name TEXT, email TEXT)");

    // Tambahkan data (pastikan ID unik)
    $db->exec("INSERT INTO groups(id, name, email) VALUES (1, 'amy', 'amy@aol.uk');");
    $db->exec("INSERT INTO groups(id, name, email) VALUES (2, 'jim', 'jim@aol.uk');");
    $db->exec("INSERT INTO groups(id, name, email) VALUES (3, 'meg', 'meg@aol.uk');");

    // Tampilkan data
    ?>
<table border=1>
    <tr>
        <td>ID</td>
        <td>Name</td>
        <td>Email</td>
    </tr>
    <?php
        $results = $db->query('SELECT * FROM groups');
        foreach($results as $row) {
            print "<tr><td>" . $row['id'] . "</td>";
            print "<td>" . $row['name'] . "</td>";
            print "<td>" . $row['email'] . "</td></tr>";
        }
        ?>
</table>
<?php
} catch(PDOException $e) {
    echo $e->getMessage();
}
?>