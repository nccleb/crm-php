<!DOCTYPE html>
<html>
<head>
<?php include('head.php'); ?>
  <link rel="stylesheet" href="css/stylei.css">
  <link rel="stylesheet" href="css/stylei2.css">
  <link rel="stylesheet" href="css/whatsappButton.css" />
  <script src="js/test371.js"></script>
  <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
  <title>CRM Data Import</title>
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
        <h2>Upload CRM CSV File</h2>
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
    
    // Check if first row is a header
    $firstRow = fgetcsv($handle, 1000, ",");
    $isHeaderRow = false;
    
    if (count($firstRow) >= 11) {
        // Check if the first column contains text that looks like a header
        if (isset($firstRow[0]) && !is_numeric($firstRow[0]) && 
            (stripos($firstRow[0], 'id') !== false || stripos($firstRow[0], 'task') !== false)) {
            $isHeaderRow = true;
        }
    }
    
    // If we detected a header row, we've already read the first line
    // If not, reset to beginning
    if (!$isHeaderRow) {
        rewind($handle);
    }
    
    // Prepare statement
    $stmt = $idr->prepare("INSERT INTO crm (idc, task, lcd, la, incident, status, num, priority, comment_status, id, idfc) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    
    if (!$stmt) {
        showError("Prepare failed: " . $idr->error);
    }
    
    $stmt->bind_param("issssssssii", $idc, $task, $lcd, $la, $incident, $status, $num, $priority, $comment, $id, $idfc);
    
    // Read and process each row
    while (($file = fgetcsv($handle, 1000, ",")) !== FALSE) {
        // Skip empty rows
        if (count($file) < 11) {
            $errorCount++;
            continue;
        }
        
        // Assign values
        $idc = isset($file[0]) ? $file[0] : '';
        $task = isset($file[1]) ? $file[1] : '';
        $lcd = isset($file[2]) ? $file[2] : '';
        $la = isset($file[3]) ? $file[3] : '';
        $incident = isset($file[4]) ? $file[4] : '';
        $status = isset($file[5]) ? $file[5] : '';
        $num = isset($file[6]) ? $file[6] : '';
        $priority = isset($file[7]) ? $file[7] : '';
        $comment = isset($file[8]) ? $file[8] : 0;
        $id = isset($file[9]) ? $file[9] : 0;
        $idfc = isset($file[10]) ? $file[10] : 0;
        
        // Validate data
        if (!validateData($idc, $task, $lcd, $la, $incident, $status, $num, $priority, $comment, $id, $idfc)) {
            $errorCount++;
            continue;
        }
        
        // Execute insert
        if ($stmt->execute()) {
            $successCount++;
        } else {
            $errorCount++;
        }
    }
    
    fclose($handle);
    $stmt->close();
    mysqli_close($idr);
    
    // Show results
    if ($isHeaderRow) {
        echo "<p>Header row detected and skipped.</p>";
    }
    echo "<p style='color:green;font-size:28px'>Import completed!</p>";
    echo "<p>Successfully imported: $successCount records</p>";
    if ($errorCount > 0) {
        echo "<p style='color:orange'>Failed to import: $errorCount records</p>";
    }
    echo "<button type='button' onclick='quit()'>Quit</button>";
}

function validateData($idc, $task, $lcd, $la, $incident, $status, $num, $priority, $comment, $id, $idfc) {
    // Common pattern for text fields
    $textPattern = "/^[0-9a-zA-Z()=%`#_?*;\[\]:~&'+\-\.\p{Arabic} ]*$/u";
    $numberPattern = "/^[0-9]*$/";
    
    $validations = [
        'IDC' => [$idc, $numberPattern],
        'Task' => [$task, $textPattern],
        'LCD' => [$lcd, $textPattern],
        'LA' => [$la, $textPattern],
        'Incident' => [$incident, $textPattern],
        'Status' => [$status, $textPattern],
        'Number' => [$num, $numberPattern],
        'Priority' => [$priority, $textPattern],
        'Comment Status' => [$comment, $numberPattern],
        'ID' => [$id, $numberPattern],
        'IDFC' => [$idfc, $numberPattern]
    ];
    
    foreach ($validations as $field => $data) {
        list($value, $pattern) = $data;
        
        // Allow empty values for optional fields
        if (empty(trim($value))) {
            continue;
        }
        
        if (!preg_match($pattern, $value)) {
            return false;
        }
    }
    
    return true;
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