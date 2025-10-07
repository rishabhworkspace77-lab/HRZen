<?php
require 'config.php';
require_admin();

if(!isset($_GET['file'])) exit('No file specified');

$file = $_GET['file'];
$full_path = __DIR__ . '/' . $file;

// Security check: only allow files in uploads/
if(strpos(realpath($full_path), realpath(__DIR__.'/uploads/')) !== 0 || !file_exists($full_path)){
    exit('Invalid file path');
}

header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="'.basename($full_path).'"');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Length: ' . filesize($full_path));

readfile($full_path);
exit;
