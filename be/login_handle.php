<?php 
require_once('../connect.php');

$email = $_POST['login'];
$passwd = $_POST['passwd'];

$sql = sprintf('SELECT * FROM user WHERE email = "%s" AND passwd = "%s"', $email, $passwd);

$result = $conn->query($sql);

$user = $result->fetch_assoc();


if ($user) {
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['user_name'] = $user['firstname'] ?: $user['nick'];
} else {
    $_SESSION['flash_error'] = 'Nieprawidłowa nazwa użytkownika lub hasło';
}

header("Location: ../index.php");
die();