<?php
require 'config.php';

// Handle form submission
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $father_name = $_POST['father_name'];
    $mother_name = $_POST['mother_name'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $emergency_contact = $_POST['emergency_contact'];
    $dob = $_POST['dob'];
    $date_of_joining = $_POST['date_of_joining']; // NEW FIELD (mandatory)
    $job_role = $_POST['job_role'];
    $relative_reference = $_POST['relative_reference'];
    $location = $_POST['location'];

    // Optional fields
    $marital_status = $_POST['marital_status'] ?? null;
    $clothing_size = $_POST['clothing_size'] ?? null;

    // Check for duplicate email or phone
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM employees WHERE email = :email OR phone = :phone");
    $stmt->execute([':email' => $email, ':phone' => $phone]);
    $exists = $stmt->fetchColumn();

    if($exists) {
        $error = "Employee with this Email or Phone already exists!";
    } else {
        // Handle file uploads
        $uploadDir = 'uploads/';
        $photoPath = $uploadDir . basename($_FILES['photo']['name']);
        move_uploaded_file($_FILES['photo']['tmp_name'], $photoPath);

        $aadharPath = $uploadDir . basename($_FILES['aadhar']['name']);
        move_uploaded_file($_FILES['aadhar']['tmp_name'], $aadharPath);

        $panPath = $uploadDir . basename($_FILES['pan']['name']);
        move_uploaded_file($_FILES['pan']['tmp_name'], $panPath);

        // Insert into database including optional + DOJ
        $stmt = $pdo->prepare("INSERT INTO employees 
            (name, father_name, mother_name, address, email, phone, emergency_contact, dob, date_of_joining, job_role, relative_reference, location, marital_status, clothing_size, photo_path, aadhar_path, pan_path) 
            VALUES (:name, :father_name, :mother_name, :address, :email, :phone, :emergency_contact, :dob, :date_of_joining, :job_role, :relative_reference, :location, :marital_status, :clothing_size, :photo, :aadhar, :pan)");

        $stmt->execute([
            ':name' => $name,
            ':father_name' => $father_name,
            ':mother_name' => $mother_name,
            ':address' => $address,
            ':email' => $email,
            ':phone' => $phone,
            ':emergency_contact' => $emergency_contact,
            ':dob' => $dob,
            ':date_of_joining' => $date_of_joining,
            ':job_role' => $job_role,
            ':relative_reference' => $relative_reference,
            ':location' => $location,
            ':marital_status' => $marital_status,
            ':clothing_size' => $clothing_size,
            ':photo' => $photoPath,
            ':aadhar' => $aadharPath,
            ':pan' => $panPath
        ]);

        // Send email notification to HR
        $to = "casawellness55@gmail.com,bhavinsolanki2232000@gmail.com";
        $subject = "New Employee Registered";
        $message = "Hello HR,\n\nA new employee has been registered.\n\nEmployee Name: $name\nLocation: $location\nDate of Joining: $date_of_joining\n\nRegards,\nHRMS System";
        $headers = "From: noreply@yourdomain.com\r\n";
        @mail($to, $subject, $message, $headers);

        $success = "Employee registered successfully!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Employee Registration</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
/* Loader overlay */
#loader-overlay {
    display: none;
    position: fixed;
    top:0;
    left:0;
    width:100%;
    height:100%;
    background: rgba(0,0,0,0.8);
    color:#FFD700;
    font-size:24px;
    text-align:center;
    padding-top:25%;
    z-index:9999;
}

/* Form styling */
body { font-family: Arial, sans-serif; background: #111; color: #fff; }
form { max-width: 600px; margin: 50px auto; background: #222; padding: 20px; border-radius: 8px; }
label { display: block; margin: 10px 0 5px; }
input, select, textarea { width: 100%; padding: 8px; border-radius: 4px; border: 1px solid #444; background: #333; color: #fff; }
input[type="file"] { padding: 3px; }
button { margin-top: 15px; padding: 10px 15px; background: #FFD700; border: none; color: #000; cursor: pointer; border-radius: 4px; }
button:hover { background: #e6c200; }
.success { margin: 15px 0; color: #0f0; text-align:center; }
.error { margin: 15px 0; color: #f00; text-align:center; }
.admin-login { display:block; text-align:center; margin:20px 0; }
.admin-login a { color:#FFD700; text-decoration:none; font-weight:bold; }
.admin-login a:hover { text-decoration:underline; }
</style>
<script>
function showLoader() {
    const email = document.getElementById('email').value.trim();
    const phone = document.getElementById('phone').value.trim();
    if(email === "" || phone === "") return;
    document.getElementById('submitBtn').disabled = true;
    document.getElementById('loader-overlay').style.display = 'block';
}
</script>
</head>
<body>

<div id="loader-overlay">Please wait... Do not go back or refresh the page.</div>

<h2 style="text-align:center;">Employee Registration Form</h2>

<div class="admin-login">
    <a href="admin_login.php">Admin Login</a>
</div>

<?php if(isset($success)): ?>
<p class="success"><?= esc($success) ?></p>
<?php endif; ?>
<?php if(isset($error)): ?>
<p class="error"><?= esc($error) ?></p>
<?php endif; ?>

<form id="employeeForm" method="post" enctype="multipart/form-data" onsubmit="showLoader()">
    <label for="name">Full Name</label>
    <input type="text" name="name" id="name" required>

    <label for="father_name">Father Name</label>
    <input type="text" name="father_name" id="father_name" required>

    <label for="mother_name">Mother Name</label>
    <input type="text" name="mother_name" id="mother_name" required>

    <label for="dob">Date of Birth</label>
    <input type="date" name="dob" id="dob" required>

    <!-- NEW FIELD -->
    <label for="date_of_joining">Date of Joining</label>
    <input type="date" name="date_of_joining" id="date_of_joining" required>

    <label for="address">Address</label>
    <textarea name="address" id="address" required></textarea>

    <label for="email">Email</label>
    <input type="email" name="email" id="email" required>

    <label for="phone">Phone Number</label>
    <input type="text" name="phone" id="phone" required>

    <label for="emergency_contact">Emergency Contact</label>
    <input type="text" name="emergency_contact" id="emergency_contact" required>

    <label for="job_role">Job Role</label>
    <input type="text" name="job_role" id="job_role" required>

    <label for="relative_reference">Relative Reference</label>
    <input type="text" name="relative_reference" id="relative_reference" required>

   <label for="outlet">Select Outlet</label>
<select name="location" id="outlet" required>
    <option value="">-- Select Outlet --</option>
    <?php
    $locations = [
        "THIVA THAI SPA","EPSOM","TOE AND NAIL OSHIWARA","LOFT THANE","SEA SALT BANDRA",
        "FTV SALON","YUAN THAI SPA LOKHANDWALA","SEAFA THAI SPA COLABA",
        "AURA THAI SPA GINGER ANDHERI EAST","THAI MAGICA BORIVALI","TAPOUT FITNESS",
        "YUAN THAI SPA BANDRA","CASA THAI SPA","VEDA CHEMBUR","VEDA BANDRA",
        "MAJESTIC SPA GOREGAON","YUAN THAI SPA COLABA","YUAN PREMIUM THAI SPA AND SALON",
        "YUAN THAI SPA PEDDAR ROAD","YUAN THAI SPA CHEMBUR","AURA THAI SPA POWAI",
        "YUAN THAI SPA JUHU","AURA THAI SPA CHEMBUR"
    ];

    foreach($locations as $loc) {
        echo '<option value="'.htmlspecialchars($loc).'">'.htmlspecialchars($loc).'</option>';
    }
    ?>
</select>

    <!-- Optional fields -->
    <label for="marital_status">Marital Status</label>
    <select name="marital_status" id="marital_status">
        <option value="">-- Select Status --</option>
        <option value="Single">Single</option>
        <option value="Married">Married</option>
    </select>

    <label for="clothing_size">Clothing Size</label>
    <select name="clothing_size" id="clothing_size">
        <option value="">-- Select Size --</option>
        <option value="XS">XS</option>
        <option value="S">S</option>
        <option value="M">M</option>
        <option value="L">L</option>
        <option value="XL">XL</option>
        <option value="XXL">XXL</option>
        <option value="XXXL">XXXL</option>
    </select>

    <label for="photo">Profile Photo</label>
    <input type="file" name="photo" id="photo" accept="image/*" required>

    <label for="aadhar">Aadhar Card</label>
    <input type="file" name="aadhar" id="aadhar" accept=".pdf,.jpg,.jpeg,.png" required>

    <label for="pan">PAN Card</label>
    <input type="file" name="pan" id="pan" accept=".pdf,.jpg,.jpeg,.png" required>

    <button type="submit" id="submitBtn">Register Employee</button>
</form>

<a href="index.html" title="Home" style="
    position: fixed;
    top: 45px;
    right: 15px;
    width: 40px;
    height: 40px;
    background-color: #FFD700;
    color: #000;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    text-decoration: none;
    font-size: 20px;
    z-index: 10000;
    box-shadow: 0 0 10px #FFD700;
">
    <i class="fas fa-home"></i>
</a>

</body>
</html>
