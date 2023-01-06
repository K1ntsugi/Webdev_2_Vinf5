<?php
// Get PDO DSN string
$root = realpath(__DIR__);
$database = $root . '/data/data.sqlite';
$dsn = 'sqlite:' . $database;

$error = '';

if (is_readable($database) && filesize($database) > 0) {
    $error = 'Please delete the existing database manually befor installing it afresh';
}

if (!$error) {
    $createdOk = @touch($database);
    if (!$createdOk) {
        $error = sprintf(
            'Could not create the database, please allow the server to create new files in \'%s\'',
            dirname($database)
        );
    }
}
