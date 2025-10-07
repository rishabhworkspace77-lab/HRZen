<?php
require 'config.php';
require_admin();

$id = (int)($_GET['id'] ?? 0);
$stmt = $pdo->prepare("SELECT * FROM employees WHERE id = ?");
$stmt->execute([$id]);
$emp = $stmt->fetch();
if(!$emp){ die("Not found"); }
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Employee Detail</title>
  <link rel="stylesheet" href="admin.css">

  <!-- <style>
    body{font-family:Arial;padding:20px;background:#f6f8fa}
    .card{background:#fff;padding:20px;border-radius:8px;max-width:800px;margin:0 auto}
    img.avatar{width:120px;height:120px;border-radius:8px;object-fit:cover;border:1px solid #ddd}
  </style> -->
</head>
<body>
  <div class="card">
    <h2><?=esc($emp['name'])?></h2>
    <p><strong>Father's Name:</strong> <?=esc($emp['father_name'])?></p>
    <p><strong>Job Role:</strong> <?=esc($emp['job_role'])?></p>
    <p><strong>Relative Reference No.:</strong> <?=esc($emp['relative_reference'])?></p>
    <p><strong>Location:</strong> <?=esc($emp['location'])?></p>
    <p><strong>Phone:</strong> <?=esc($emp['phone'])?></p>
    <p><strong>Email:</strong> <?=esc($emp['email'])?></p>
    <p><strong>Address:</strong> <?=nl2br(esc($emp['address']))?></p>
    <p><strong>Status:</strong> <?=esc($emp['status'])?></p>
    <p><a href="<?=esc($emp['aadhar_path'])?>" target="_blank">View Aadhar</a></p>
    <p><a href="<?=esc($emp['pan_path'])?>" target="_blank">View PAN</a></p>
    <p><a href="<?=esc($emp['photo_path'])?>" target="_blank">View Photo</a></p>
    <p><a href="admin_dashboard.php">Back</a></p>
  </div>
</body>
</html>
