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
        id, title, created_at, body
        FROM
            post
        ORDER BY
            created_at DESC'
);

if ($stmt === false) {
    throw new Exception("There was a problem running the query");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>A blog application</title>
</head>

<body>
    <?php require 'templates/title.php' ?>

    <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
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
            <a href="view-post.php?post_id=<?php echo $row['id'] ?>">Read more...</a>
        </p>
    <?php endwhile ?>
</body>

</html>