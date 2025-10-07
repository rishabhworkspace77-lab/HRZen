<?php
require 'config.php';

if(is_admin_logged_in()){
    header("Location: admin_dashboard.php");
    exit;
}

$err = '';
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    $stmt = $pdo->prepare("SELECT * FROM admins WHERE username = ?");
    $stmt->execute([$username]);
    $admin = $stmt->fetch();

    if($admin && password_verify($password, $admin['password_hash'])){
        $_SESSION['admin_id'] = $admin['id'];
        $_SESSION['admin_name'] = $admin['full_name'] ?: $admin['username'];
        header("Location: admin_dashboard.php");
        exit;
    } else {
        $err = 'Invalid credentials';
    }
}
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8"><title>Admin Login</title>
  <link rel="stylesheet" href="admin.css">

  <!-- <style>
    body{font-family:Arial;background:#f3f4f6;padding:40px}
    .box{max-width:380px;margin:0 auto;background:#fff;padding:20px;border-radius:8px;box-shadow:0 2px 8px rgba(0,0,0,0.06)}
    input {width:100%;padding:10px;margin-top:8px;border:1px solid #ccc;border-radius:4px}
    button{margin-top:12px;padding:10px;background:#0b74de;color:#fff;border:none;border-radius:6px}
    .err{color:#c0392b}
  </style> -->
</head>
<body>
  <div class="box">
    <h3>Admin Login</h3>
    <?php if($err): ?><p class="err"><?=esc($err)?></p><?php endif; ?>
    <form method="post">
      <label>Username</label>
      <input name="username" required>
      <label>Password</label>
      <input name="password" type="password" required>
      <button type="submit">Login</button>
    </form>
  </div>
</body>
</html>
