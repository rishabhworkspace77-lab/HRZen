<?php
require 'config.php';
require_admin();

// Get selected outlet
$selectedOutlet = $_GET['location'] ?? '';

// Outlets
$locations = [
    "THIVA THAI SPA","EPSOM","TOE AND NAIL OSHIWARA","LOFT THANE","SEA SALT BANDRA",
    "FTV SALON","YUAN THAI SPA LOKHANDWALA","SEAFA THAI SPA COLABA",
    "AURA THAI SPA GINGER ANDHERI EAST","THAI MAGICA BORIVALI","TAPOUT FITNESS",
    "YUAN THAI SPA BANDRA","CASA THAI SPA","VEDA CHEMBUR","VEDA BANDRA",
    "MAJESTIC SPA GOREGAON","YUAN THAI SPA COLABA","YUAN PREMIUM THAI SPA AND SALON",
    "YUAN THAI SPA PEDDAR ROAD","YUAN THAI SPA CHEMBUR","AURA THAI SPA POWAI",
    "YUAN THAI SPA JUHU","AURA THAI SPA CHEMBUR"
];

// Handle update
if(isset($_POST['update_employee'])){
    $updateId = $_POST['id'];
    $stmt = $pdo->prepare("UPDATE employees SET 
        name=:name,
        father_name=:father_name,
        mother_name=:mother_name,
        dob=:dob,
        date_of_joining=:date_of_joining,
        address=:address,
        email=:email,
        phone=:phone,
        emergency_contact=:emergency_contact,
        job_role=:job_role,
        relative_reference=:relative_reference,
        location=:location,
        marital_status=:marital_status,
        clothing_size=:clothing_size,
        status=:status
        WHERE id=:id");
    $stmt->execute([
        ':name'=>$_POST['name'],
        ':father_name'=>$_POST['father_name'],
        ':mother_name'=>$_POST['mother_name'],
        ':dob'=>$_POST['dob'],
        ':date_of_joining'=>$_POST['date_of_joining'],
        ':address'=>$_POST['address'],
        ':email'=>$_POST['email'],
        ':phone'=>$_POST['phone'],
        ':emergency_contact'=>$_POST['emergency_contact'],
        ':job_role'=>$_POST['job_role'],
        ':relative_reference'=>$_POST['relative_reference'],
        ':location'=>$_POST['location'],
        ':marital_status'=>$_POST['marital_status'],
        ':clothing_size'=>$_POST['clothing_size'],
        ':status'=>$_POST['status'],
        ':id'=>$updateId
    ]);
    header("Location: ".$_SERVER['PHP_SELF']."?location=".urlencode($selectedOutlet));
    exit;
}

// Fetch employees
if($selectedOutlet){
    $stmt = $pdo->prepare("SELECT * FROM employees WHERE location = :location ORDER BY created_at DESC");
    $stmt->execute([':location' => $selectedOutlet]);
} else {
    $stmt = $pdo->query("SELECT * FROM employees ORDER BY created_at DESC");
}
$employees = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Admin Dashboard - Employees</title>
<style>
body { font-family: Arial, sans-serif; background:#111; color:#fff; padding: 20px; }
table { width: 100%; border-collapse: collapse; margin-top: 20px; }
th, td { padding: 8px; border: 1px solid #444; text-align: left; vertical-align: top; font-size: 13px; }
th { background-color: #222; }
tr:nth-child(even) { background-color: #333; }
tr:nth-child(odd) { background-color: #444; }
a { color: #FFD700; text-decoration: none; margin-right: 5px; }
a:hover { text-decoration: underline; }
select, input[type=text], input[type=email], input[type=date] { padding:5px; border-radius:4px; background:#333; color:#fff; border:1px solid #444; width:100%; }
button { padding:4px 8px; background:#FFD700; border:none; color:#000; cursor:pointer; border-radius:4px; margin:2px; }
button:hover { background:#e6c200; }
.readonly input, .readonly select { background:#111; border:none; color:#fff; pointer-events:none; }
</style>
<script>
function toggleEdit(rowId) {
    let row = document.getElementById('row-'+rowId);
    row.classList.toggle('readonly');
    let editBtn = document.getElementById('edit-btn-'+rowId);
    if(row.classList.contains('readonly')){
        editBtn.textContent = "Edit";
    } else {
        editBtn.textContent = "Cancel";
    }
}
</script>
</head>
<body>

<h2>Employee List</h2>

<form method="get" action="">
    <label for="location">Filter by Outlet:</label>
    <select name="location" id="location" onchange="this.form.submit()">
        <option value="">-- All Outlets --</option>
        <?php foreach($locations as $loc): ?>
            <option value="<?= esc($loc) ?>" <?= ($selectedOutlet == $loc)?'selected':'' ?>><?= esc($loc) ?></option>
        <?php endforeach; ?>
    </select>
</form>

<table>
<thead>
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Father</th>
    <th>Mother</th>
    <th>DOB</th>
    <th>DOJ</th>
    <th>Address</th>
    <th>Email</th>
    <th>Phone</th>
    <th>Emergency</th>
    <th>Job Role</th>
    <th>Reference</th>
    <th>Location</th>
    <th>Marital</th>
    <th>Size</th>
    <th>Photo</th>
    <th>Aadhar</th>
    <th>PAN</th>
    <th>Status</th>
    <th>Created</th>
    <th>Action</th>
</tr>
</thead>
<tbody>
<?php foreach($employees as $emp): ?>
<tr id="row-<?= $emp['id'] ?>" class="readonly">
    <form method="post">
    <td><?= esc($emp['id']) ?><input type="hidden" name="id" value="<?= $emp['id'] ?>"></td>
    <td><input type="text" name="name" value="<?= esc($emp['name']) ?>"></td>
    <td><input type="text" name="father_name" value="<?= esc($emp['father_name']) ?>"></td>
    <td><input type="text" name="mother_name" value="<?= esc($emp['mother_name']) ?>"></td>
    <td><input type="date" name="dob" value="<?= esc($emp['dob']) ?>"></td>
    <td><input type="date" name="date_of_joining" value="<?= esc($emp['date_of_joining']) ?>"></td>
    <td><input type="text" name="address" value="<?= esc($emp['address']) ?>"></td>
    <td><input type="email" name="email" value="<?= esc($emp['email']) ?>"></td>
    <td><input type="text" name="phone" value="<?= esc($emp['phone']) ?>"></td>
    <td><input type="text" name="emergency_contact" value="<?= esc($emp['emergency_contact']) ?>"></td>
    <td><input type="text" name="job_role" value="<?= esc($emp['job_role']) ?>"></td>
    <td><input type="text" name="relative_reference" value="<?= esc($emp['relative_reference']) ?>"></td>
    <td>
        <select name="location">
            <?php foreach($locations as $loc): ?>
                <option value="<?= esc($loc) ?>" <?= ($emp['location']==$loc)?'selected':'' ?>><?= esc($loc) ?></option>
            <?php endforeach; ?>
        </select>
    </td>
    <td>
        <select name="marital_status">
            <option value="">--</option>
            <option value="Single" <?= ($emp['marital_status']=='Single')?'selected':'' ?>>Single</option>
            <option value="Married" <?= ($emp['marital_status']=='Married')?'selected':'' ?>>Married</option>
        </select>
    </td>
    <td>
        <select name="clothing_size">
            <option value="">--</option>
            <?php foreach(['XS','S','M','L','XL','XXL'] as $size): ?>
                <option value="<?= $size ?>" <?= ($emp['clothing_size']==$size)?'selected':'' ?>><?= $size ?></option>
            <?php endforeach; ?>
        </select>
    </td>
   <td>
    <div style="display:flex; flex-direction:column; gap:3px;">
        <a href="file_view.php?file=<?= urlencode($emp['photo_path']) ?>" target="_blank">View</a>
        <a href="download.php?file=<?= urlencode($emp['photo_path']) ?>">Download</a>
    </div>
</td>
<td>
    <div style="display:flex; flex-direction:column; gap:3px;">
        <a href="file_view.php?file=<?= urlencode($emp['aadhar_path']) ?>" target="_blank">View</a>
        <a href="download.php?file=<?= urlencode($emp['aadhar_path']) ?>">Download</a>
    </div>
</td>
<td>
    <div style="display:flex; flex-direction:column; gap:3px;">
        <a href="file_view.php?file=<?= urlencode($emp['pan_path']) ?>" target="_blank">View</a>
        <a href="download.php?file=<?= urlencode($emp['pan_path']) ?>">Download</a>
    </div>
</td>

    <td>
        <select name="status">
            <option value="Active" <?= ($emp['status']=='Active')?'selected':'' ?>>Active</option>
            <option value="Inactive" <?= ($emp['status']=='Inactive')?'selected':'' ?>>Inactive</option>
        </select>
    </td>
    <td><?= esc($emp['created_at']) ?></td>
    <td>
        <button type="button" id="edit-btn-<?= $emp['id'] ?>" onclick="toggleEdit(<?= $emp['id'] ?>)">Edit</button>
        <button type="submit" name="update_employee">Save</button>
    </td>
    </form>
</tr>
<?php endforeach; ?>
</tbody>
</table>

</body>
</html>
