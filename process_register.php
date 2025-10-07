<?php
require 'config.php';

function random_filename($prefix='file'){
    return $prefix . '_' . bin2hex(random_bytes(8));
}

if($_SERVER['REQUEST_METHOD'] !== 'POST'){
    header("Location: index.php");
    exit;
}

$name = trim($_POST['name'] ?? '');
$father_name = trim($_POST['father_name'] ?? '');
$address = trim($_POST['address'] ?? '');
$email = trim($_POST['email'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$relative_reference = trim($_POST['relative_reference'] ?? '');
$job_role = trim($_POST['job_role'] ?? '');
$location = trim($_POST['location'] ?? '');

if(!$name || !$father_name || !$phone || !$job_role || !$location){
    die("Error: Required fields missing.");
}

function handle_upload($field, $allowed_types, $max_bytes, $subdir){
    if(!isset($_FILES[$field]) || $_FILES[$field]['error'] !== UPLOAD_ERR_OK){
        throw new Exception("Upload error for $field");
    }
    $file = $_FILES[$field];
    if($file['size'] > $max_bytes) throw new Exception("$field exceeds max size");
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $mime = $finfo->file($file['tmp_name']);
    if(!in_array($mime, $allowed_types, true)){
        throw new Exception("$field invalid file type ($mime)");
    }
    $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
    $targetDir = __DIR__ . "/uploads/$subdir";
    if(!is_dir($targetDir)) mkdir($targetDir, 0755, true);
    $filename = random_filename($field) . '.' . $ext;
    $dest = $targetDir . '/' . $filename;
    if(!move_uploaded_file($file['tmp_name'], $dest)){
        throw new Exception("Failed to move uploaded file for $field");
    }
    return "uploads/$subdir/$filename";
}

try {
    $photoPath = handle_upload('photo', ['image/jpeg','image/png'], 2 * 1024 * 1024, 'photos');
    $aadharPath = handle_upload('aadhar', ['image/jpeg','image/png','application/pdf'], 4 * 1024 * 1024, 'aadhar');
    $panPath = handle_upload('pan', ['image/jpeg','image/png','application/pdf'], 2 * 1024 * 1024, 'pan');

    $stmt = $pdo->prepare("INSERT INTO employees (name,father_name,address,email,phone,relative_reference,job_role,location,photo_path,aadhar_path,pan_path) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
    $stmt->execute([$name,$father_name,$address,$email,$phone,$relative_reference,$job_role,$location,$photoPath,$aadharPath,$panPath]);

    header("Location: index.php?success=1");
    exit;
} catch (Exception $e){
    die("Error: " . esc($e->getMessage()));
}
