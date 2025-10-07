<?php
// config.php
session_start();


$host = '127.0.0.1';
$db = 'treko';
$user = 'root';
$pass = ''; // change to your DB password
$dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";


$options = [
PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];


try {
$pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
die('Database connection failed: ' . $e->getMessage());
}


// helper flash function
function set_flash($type, $message) {
$_SESSION['flash'] = ['type'=>$type, 'msg'=>$message];
}


function get_flash() {
if(!empty($_SESSION['flash'])) {
$f = $_SESSION['flash'];
unset($_SESSION['flash']);
return $f;
}
return null;
}