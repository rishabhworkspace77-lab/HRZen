<?php
require 'config.php';
require_admin();

$id = (int)($_POST['id'] ?? 0);
$current = $_POST['current'] ?? '';
$new = $current==='Active'?'Inactive':'Active';
$stmt = $pdo->prepare("UPDATE employees SET status=? WHERE id=?");
$stmt->execute([$new,$id]);
header("Location: admin_dashboard.php");
exit;
