<?php

class Database extends SQLite3
{
    function __construct()
    {
        $this->open('/tmp/mydata.db'); // Menggunakan direktori sementara
    }
}

$db = new Database;

// Membuat tabel jika belum ada
$table = "CREATE TABLE IF NOT EXISTS users (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL,
    email TEXT NOT NULL
)";
$db->exec($table);
?>