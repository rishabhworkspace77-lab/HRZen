<?php
$password = 'Admin@admin@2424'; // your current password
$hash = password_hash($password, PASSWORD_BCRYPT);
echo $hash;
?>
