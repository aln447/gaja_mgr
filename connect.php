<?php 
session_start();


$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'gaja';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

header("Content-Type: text/html;charset=UTF-8");

$conn->set_charset("utf8");