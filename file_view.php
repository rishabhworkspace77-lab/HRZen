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

// Detect mime type
$finfo = finfo_open(FILEINFO_MIME_TYPE);
$mime = finfo_file($finfo, $full_path);
finfo_close($finfo);

header('Content-Type: '.$mime);
header('Content-Length: ' . filesize($full_path));
readfile($full_path);
exit;
