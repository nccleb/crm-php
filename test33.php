<!DOCTYPE html>
<html>
<head>
<?php include('head.php'); ?>
  <link rel="stylesheet" href="css/stylei.css">
  <link rel="stylesheet" href="css/stylei2.css">
  <link rel="stylesheet" href="css/whatsappButton.css" />
  <script src="js/test371.js"></script>
  <title>CSV Import</title>
</head>
<body>
<div class="jumbotron">
<?php
// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['csv_file'])) {
    processCSV();
} else {
    displayForm();
}

function displayForm() {
    echo '
    <form method="POST" enctype="multipart/form-data">
        <h2>Upload CSV File</h2>
        <input type="file" name="csv_file" accept=".csv" required>
        <button type="submit">Upload and Import</button>
    </form>';
}

function processCSV() {
    // Database connection
    $idr = mysqli_connect("192.168.16.103", "root", "1Sys9Admeen72", "nccleb_test");
    if (mysqli_connect_errno()) {
        echo "<p style='color:red;font-size:28px'>Failed to connect to MySQL: " . mysqli_connect_error() . "</p>";
        echo "<button type='button' onclick='quit()'>Quit</button>";
        exit();
    }

    // File validation
    if ($_FILES['csv_file']['error'] != 0) {
        showError("File upload error: " . $_FILES['csv_file']['error']);
    }
    
    if ($_FILES['csv_file']['size'] > 8000000) {
        showError("File size too large! Maximum size is 8MB.");
    }
    
    $info = pathinfo($_FILES['csv_file']['name']);
    $extension = strtolower($info['extension']);
    
    if ($extension !== 'csv') {
        showError("Invalid file type! Only CSV files are allowed.");
    }
    
    // Move uploaded file
    $targetDir = "upload/";
    if (!file_exists($targetDir)) {
        mkdir($targetDir, 0777, true);
    }
    
    $targetFile = $targetDir . basename($_FILES['csv_file']['name']);
    if (!move_uploaded_file($_FILES['csv_file']['tmp_name'], $targetFile)) {
        showError("Failed to move uploaded file.");
    }
    
    // Process CSV file
    $handle = fopen($targetFile, "r");
    if (!$handle) {
        showError("Cannot open CSV file.");
    }
    
    $successCount = 0;
    $errorCount = 0;
    $rowNumber = 0;
    
    // Read and process each row
    while (($file = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $rowNumber++;
        
        // Skip header row
        if ($rowNumber == 1) {
            continue;
        }
        
        // Skip empty rows or rows with insufficient data
        if (count($file) < 38) {
            $errorCount++;
            echo "<p style='color:orange'>Row $rowNumber skipped: insufficient columns (" . count($file) . " found, 38 expected)</p>";
            continue;
        }
        
        // Map CSV columns to database fields (based on your export structure)
        $id = mysqli_real_escape_string($idr, $file[0]);
        $con_date = mysqli_real_escape_string($idr, $file[1]);
        $nom = mysqli_real_escape_string($idr, $file[2]);
        $prenom = mysqli_real_escape_string($idr, $file[3]);
        $filename = mysqli_real_escape_string($idr, $file[4]);
        $category = mysqli_real_escape_string($idr, $file[5]);
        $source = mysqli_real_escape_string($idr, $file[6]);
        $company = mysqli_real_escape_string($idr, $file[7]);
        $job = mysqli_real_escape_string($idr, $file[8]);
        $number = mysqli_real_escape_string($idr, $file[9]);
        $inumber = mysqli_real_escape_string($idr, $file[10]);
        $email = mysqli_real_escape_string($idr, $file[11]);
        $url = mysqli_real_escape_string($idr, $file[12]);
        $business = mysqli_real_escape_string($idr, $file[13]);
        $grade = mysqli_real_escape_string($idr, $file[14]);
        $payment = mysqli_real_escape_string($idr, $file[15]);
        $card = mysqli_real_escape_string($idr, $file[16]);
        $community = mysqli_real_escape_string($idr, $file[17]);
        $telmobile = mysqli_real_escape_string($idr, $file[18]);
        $telother = mysqli_real_escape_string($idr, $file[19]);
        $city = mysqli_real_escape_string($idr, $file[20]);
        $street = mysqli_real_escape_string($idr, $file[21]);
        $apartment = mysqli_real_escape_string($idr, $file[22]);
        $building = mysqli_real_escape_string($idr, $file[23]);
        $zone = mysqli_real_escape_string($idr, $file[24]);
        $floor = is_numeric($file[25]) ? intval($file[25]) : 0;
        $near = mysqli_real_escape_string($idr, $file[26]);
        $remark = mysqli_real_escape_string($idr, $file[27]);
        $address = mysqli_real_escape_string($idr, $file[28]);
        $address_two = mysqli_real_escape_string($idr, $file[29]);
        $idf = is_numeric($file[30]) ? intval($file[30]) : 0;
        $idx = is_numeric($file[31]) ? intval($file[31]) : 0;
        $delivery_instructions = mysqli_real_escape_string($idr, $file[32]);
        $access_code = mysqli_real_escape_string($idr, $file[33]);
        $best_delivery_time = mysqli_real_escape_string($idr, $file[34]);
        $location_type = mysqli_real_escape_string($idr, $file[35]);
        $parking_notes = mysqli_real_escape_string($idr, $file[36]);
        $delivery_contact = mysqli_real_escape_string($idr, $file[37]);
        
        // Use INSERT IGNORE to avoid errors on duplicate IDs, or use ON DUPLICATE KEY UPDATE
        $sql = "INSERT IGNORE INTO client (id, con_date, nom, prenom, filename, category, source, company, job, number, inumber, email, url, business, grade, payment, card, community, telmobile, telother, city, street, apartment, building, zone, floor, near, remark, address, address_two, idf, idx, delivery_instructions, access_code, best_delivery_time, location_type, parking_notes, delivery_contact) 
                VALUES ('$id', '$con_date', '$nom', '$prenom', '$filename', '$category', '$source', '$company', '$job', '$number', '$inumber', '$email', '$url', '$business', '$grade', '$payment', '$card', '$community', '$telmobile', '$telother', '$city', '$street', '$apartment', '$building', '$zone', '$floor', '$near', '$remark', '$address', '$address_two', '$idf', '$idx', '$delivery_instructions', '$access_code', '$best_delivery_time', '$location_type', '$parking_notes', '$delivery_contact')";
        
        if (mysqli_query($idr, $sql)) {
            $successCount++;
        } else {
            $errorCount++;
            echo "<p style='color:red'>Row $rowNumber error: " . mysqli_error($idr) . "</p>";
        }
    }
    
    fclose($handle);
    mysqli_close($idr);
    
    // Clean up uploaded file
    unlink($targetFile);
    
    // Show results
    echo "<p style='color:green;font-size:28px'>Import completed!</p>";
    echo "<p>Successfully imported: $successCount records</p>";
    if ($errorCount > 0) {
        echo "<p style='color:orange'>Failed to import: $errorCount records</p>";
    }
    echo "<button type='button' onclick='quit()'>Quit</button>";
}

function showError($message) {
    echo "<p style='color:red;font-size:28px'>$message</p>";
    echo "<button type='button' onclick='quit()'>Quit</button>";
    exit();
}
?>
</div>
</body>
</html>