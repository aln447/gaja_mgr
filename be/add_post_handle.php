<?php
require_once('../connect.php');

$userId = $_SESSION['user_id'];
$title = $_POST['title'];
$category = $_POST['category'];
$imagesrc = $_POST['imagesrc'];
$intro = $conn->real_escape_string($_POST['intro']);
$content = $conn->real_escape_string(nl2br($_POST['content']));

$imagesrc === '' && $imagesrc = '/assets/img/post' . mt_rand(1, 3) . '.jpg';

$sql = sprintf('INSERT INTO post (cat_id, author_id, intro, imagesrc, date_added, content, title)
VALUES ("%d", "%s", "%s", "%s", now(), "%s", "%s")', $category, $userId, $intro, $imagesrc, $content, $title);

if ($conn->query($sql) === TRUE) {
    header("Location: ../post.php?id=" . $conn->insert_id);
die();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}