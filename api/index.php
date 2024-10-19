<?php

try{

    $db = new PDO('sqlite:oioioi.sqlite');

    $db->exec("CREATE TABLE IF NOT EXISTS groups(id INTEGER, name TEXT, email TEXT)");

    $db->exec("INSERT INTO groups(id, name, email) VALUES (1, 'amy', 'amy@aol.uk'); ");
    $db->exec("INSERT INTO groups(id, name, email) VALUES (2, 'jim', 'jim@aol.uk'); ");
    $db->exec("INSERT INTO groups(id, name, email) VALUES (3, 'meg', 'meg@aol.uk'); ");
?>

<table border=1>
    <tr>
        <td>ID</td>
        <td>Name</td>
        <td>Email</td>
    </tr>
    <?php
        $result = $db->query('SELECT * from groups');
        foreach($result as $row){
            print "<tr><td>" . $row['id'] . "</td>";
            print "<td>" . $row['name'] . "</td>";
            print "<td>" . $row['email'] . "</td></tr>";
        }
        ?>
</table>
<?php
} catch(PDOException $e){
    echo $e->getMessage();
}

?>