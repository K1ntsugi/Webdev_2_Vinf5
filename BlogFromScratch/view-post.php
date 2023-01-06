<?php
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASSWD = '';
$DATABASE_NAME = 'blog';

try {
    $pdo = new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASSWD);
    echo "Connection to database succesfull";
} catch (PDOException $exception) {
    exit('Failed to connect to database');
}

$stmt = $pdo->query(
    'SELECT
        title, created_at, body
        FROM
            post
        WHERE
            id = :id'
);

if ($stmt === false) {
    throw new Exception("There was a problem running the query");
}
