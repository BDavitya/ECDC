<?php
class database extends SQLite3
{
    function __construct()
    {
        if (!$this->open('/tmp/mydata.db')) {
            die("Failed to open database: " . $this->lastErrorMsg());
        }
    }
}

// Inisialisasi objek database
$db = new database;

// Create a user table
$table = "CREATE TABLE IF NOT EXISTS user (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL,
    email TEXT NOT NULL
)";

// Eksekusi query untuk membuat tabel
if ($db->exec($table)) {
    echo "Table created successfully or already exists.";
} else {
    echo "Error creating table: " . $db->lastErrorMsg();
}