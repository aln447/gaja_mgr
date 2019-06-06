<?php
require_once('../connect.php');

/*

  'username' => string 'richard20' (length=9)
  'email' => string 'rich@gmail.com' (length=14)
  'passwd' => string 'okonie' (length=6)
  'passwd2' => string 'okonie' (length=6)
  'name' => string 'Ryszard' (length=7)
  'lastname' => string 'Ryszardowy' (length=10)
  'status' => string 'Uczeń' (length=6)
  'birthdate' => string '10/23/2000 12:00 AM' (length=19)

*/

$sql = sprintf('INSERT INTO user (email, nick, passwd, firstname, lastname, birthday, status, bio)
VALUES ("%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s")', 
    $_POST['email'], 
    $_POST['username'],
    $_POST['passwd'],
    $_POST['name'],
    $_POST['lastname'],
    $_POST['birthdate'],
    $_POST['status'],
    $_POST['bio']
);

if ($conn->query($sql) === TRUE) {
    $_SESSION['user_id'] = $conn->insert_id;
    $_SESSION['user_name'] = $_POST['name'] ?: $_POST['username'];
    
    header("Location: ../index.php");
die();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}