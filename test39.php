<!DOCTYPE html>
<html>
<head>
<?php include('head.php'); ?>
  <link rel="stylesheet" href="css/stylei.css">
  <link rel="stylesheet" href="css/stylei2.css">
  <link rel="stylesheet" href="css/whatsappButton.css" />
  <script src="js/test371.js"></script>
  <title>SQL Import</title>
</head>
<body>
<div class="jumbotron">
<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);
set_time_limit(0); // No time limit

$idr = mysqli_connect("192.168.16.103", "root", "1Sys9Admeen72", "nccleb_test");
if (mysqli_connect_errno()) {
    echo "<p style='color:red;font-size:28px'>Failed to connect to MySQL: " . mysqli_connect_error() . "</p>";
    echo "<button type='button' onclick='quit()'>Quit</button>";
    exit();
}

// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['csv_file'])) {
    
    echo "<h3>Starting SQL Import Process...</h3>";
    
    // File validation
    if ($_FILES['csv_file']['error'] != 0) {
        echo "<p style='color:red'>File upload error: " . $_FILES['csv_file']['error'] . "</p>";
        echo "<button type='button' onclick='quit()'>Quit</button>";
        exit();
    }
    
    if ($_FILES['csv_file']['size'] > 10000000) {
        echo "<p style='color:red'>File size too large! Maximum size is 10MB.</p>";
        echo "<button type='button' onclick='quit()'>Quit</button>";
        exit();
    }
    
    $info = pathinfo($_FILES['csv_file']['name']);
    $extension = strtolower($info['extension']);
    
    if ($extension !== 'sql') {
        echo "<p style='color:red'>Invalid file type! Only SQL files are allowed.</p>";
        echo "<button type='button' onclick='quit()'>Quit</button>";
        exit();
    }
    
    // Create upload directory
    $uploadDir = "upload/";
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }
    
    $target = $uploadDir . basename($_FILES['csv_file']['name']);
    
    if (!move_uploaded_file($_FILES['csv_file']['tmp_name'], $target)) {
        echo "<p style='color:red'>Failed to move uploaded file.</p>";
        echo "<button type='button' onclick='quit()'>Quit</button>";
        exit();
    }
    
    echo "<p style='color:green'>File uploaded successfully: " . basename($target) . "</p>";
    
    // Read SQL file
    $sqlContent = file_get_contents($target);
    if ($sqlContent === false) {
        echo "<p style='color:red'>Cannot read SQL file.</p>";
        echo "<button type='button' onclick='quit()'>Quit</button>";
        exit();
    }
    
    echo "<p>File size: " . number_format(strlen($sqlContent)) . " bytes</p>";
    
    // Disable foreign key checks to allow dropping tables in any order
    echo "<p style='color:blue'>Disabling foreign key checks...</p>";
    if (mysqli_query($idr, "SET FOREIGN_KEY_CHECKS = 0")) {
        echo "<p style='color:green'>✓ Foreign key checks disabled</p>";
    } else {
        echo "<p style='color:red'>✗ Failed to disable foreign key checks: " . mysqli_error($idr) . "</p>";
    }
    
    // Split into statements
    $statements = explode(';', $sqlContent);
    $totalStatements = count($statements);
    
    echo "<p>Total statements found: $totalStatements</p>";
    echo "<hr>";
    
    $successCount = 0;
    $errorCount = 0;
    $skippedCount = 0;
    
    foreach ($statements as $index => $statement) {
        $statement = trim($statement);
        
        if (empty($statement)) {
            $skippedCount++;
            continue;
        }
        
        // Show progress every 10 statements
        if (($index + 1) % 10 == 0) {
            echo "<p style='color:blue'>Processing statement " . ($index + 1) . " of $totalStatements...</p>";
            flush();
        }
        
        // Execute statement
        if (mysqli_query($idr, $statement)) {
            $successCount++;
        } else {
            $errorCount++;
            $error = mysqli_error($idr);
            echo "<p style='color:red'>ERROR at statement " . ($index + 1) . ": $error</p>";
            echo "<p style='color:red'>Statement: " . htmlspecialchars(substr($statement, 0, 100)) . "...</p>";
        }
    }
    
    echo "<hr>";
    echo "<h3>IMPORT SUMMARY:</h3>";
    echo "<p style='color:green'>✓ Successful: $successCount</p>";
    echo "<p style='color:red'>✗ Failed: $errorCount</p>";
    echo "<p style='color:gray'>⊝ Skipped (empty): $skippedCount</p>";
    echo "<p><strong>Total processed: " . ($successCount + $errorCount) . "</strong></p>";
    
    // Re-enable foreign key checks
    echo "<p style='color:blue'>Re-enabling foreign key checks...</p>";
    if (mysqli_query($idr, "SET FOREIGN_KEY_CHECKS = 1")) {
        echo "<p style='color:green'>✓ Foreign key checks re-enabled</p>";
    } else {
        echo "<p style='color:red'>✗ Failed to re-enable foreign key checks: " . mysqli_error($idr) . "</p>";
    }
    
    // Check table status
    echo "<hr>";
    echo "<h3>TABLE STATUS:</h3>";
    
    $checkTables = ['client', 'crm', 'deals', 'drivers', 'dispatch_assignments', 'comments', 'currency'];
    
    foreach ($checkTables as $tableName) {
        $result = mysqli_query($idr, "SHOW TABLES LIKE '$tableName'");
        if (mysqli_num_rows($result) > 0) {
            $countResult = mysqli_query($idr, "SELECT COUNT(*) as count FROM `$tableName`");
            if ($countResult) {
                $row = mysqli_fetch_assoc($countResult);
                $count = $row['count'];
                echo "<p style='color:green'>✓ Table '$tableName': $count records</p>";
            } else {
                echo "<p style='color:orange'>⚠ Table '$tableName': exists but can't count records</p>";
            }
        } else {
            echo "<p style='color:red'>✗ Table '$tableName': does not exist</p>";
        }
    }
    
    // Clean up
    unlink($target);
    mysqli_close($idr);
    
    echo "<hr>";
    echo "<p style='color:green;font-size:20px'><strong>PROCESS COMPLETED!</strong></p>";
    echo "<button type='button' onclick='quit()'>Quit</button>";
    
} else {
    // Show upload form
    echo '
    <form method="POST" enctype="multipart/form-data">
        <h2>Upload SQL File</h2>
        <input type="file" name="csv_file" accept=".sql" required>
        <br><br>
        <button type="submit">Upload and Import SQL</button>
    </form>';
}
?>
</div>
</body>
</html>