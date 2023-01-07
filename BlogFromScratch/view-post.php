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

$stmt = $pdo->prepare(
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

$result = $stmt->execute(
    array('id' => 1,)
);

if ($result === false) {
    throw new Exception("There was a problem running the query");
}

$row = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        A blog application |
        <?php echo htmlspecialchars($row['title'], ENT_HTML5, 'UTF-8') ?>
    </title>
</head>

<body>
    <?php require 'templates/title.php' ?>

    <h2>
        <?php echo htmlspecialchars($row['title'], ENT_HTML5, 'UTF-8') ?>
    </h2>
    <div>dd Mon YYYY</div>
    <p>
        <?php echo $row['created_at'] ?>
    </p>
    <p>
        <?php echo htmlspecialchars($row['body'], ENT_HTML5, 'UTF-8') ?>
    </p>
    <p>
        <a href="#">Read more...</a>
    </p>
</body>

</html>