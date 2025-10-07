<?php
// config.php
session_start();

$DB_HOST = 'localhost';
$DB_NAME = 'yuan_hrms';
$DB_USER = 'admin';
$DB_PASS = 'Admin@2424';

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
    $pdo = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME;charset=utf8mb4", $DB_USER, $DB_PASS, $options);
} catch (Exception $e) {
    die('Database connection error: ' . $e->getMessage());
}

function esc($v){ return htmlspecialchars($v, ENT_QUOTES|ENT_SUBSTITUTE, 'UTF-8'); }

function is_admin_logged_in(){
    return isset($_SESSION['admin_id']);
}

function require_admin(){
    if(!is_admin_logged_in()){
        header("Location: admin_login.php");
        exit;
    }
}
?>
