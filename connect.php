<?php 
session_start();

//local data
// $servername = 'localhost';
// $username = 'root';
// $password = '';
// $dbname = 'gaja';

/*
Heroku Data: 
mysql://ba7a0b3fdf9ae0:526d0ff2@us-cdbr-iron-east-02.cleardb.net/heroku_09d49274fea8a0d?reconnect=true
*/
$dbHost = 'us-cdbr-iron-east-02.cleardb.net';
$dbName = 'heroku_09d49274fea8a0d';
$dbUser = 'ba7a0b3fdf9ae0';
$dbPasswd = '526d0ff2';

// Create connection
$conn = new mysqli($dbHost, $dbUser, $dbPasswd, $dbName);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

header("Content-Type: text/html;charset=UTF-8");

$conn->set_charset("utf8");