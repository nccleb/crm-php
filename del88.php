<!DOCTYPE html>
<html>
<head>
<?php include('head.php'); ?>
  <link rel="stylesheet" href="css/stylei.css">
  <link rel="stylesheet" href="css/stylei2.css">
  <link rel="stylesheet" href="css/whatsappButton.css" />
  <script src="js/test371.js"></script>
</head>

<body>
<div class="jumbotron"> 

<?php
// Database connection
$idr = mysqli_connect("192.168.16.103", "root", "1Sys9Admeen72", "nccleb_test");

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

try {
    // Delete all records older than 7 days
    $stmt = $idr->prepare("DELETE FROM driver_locations WHERE timestamp < DATE_SUB(NOW(), INTERVAL 7 DAY)");
    
    if (!$stmt) {
        throw new Exception("Prepare failed: " . $idr->error);
    }
    
    $stmt->execute();
    $deleted_rows = $idr->affected_rows;
    $stmt->close();
    
    // Optimize table after deletion
    $optimize_stmt = $idr->prepare("OPTIMIZE TABLE driver_locations");
    if ($optimize_stmt) {
        $optimize_stmt->execute();
        $optimize_stmt->close();
    }
    
    echo "<div class='alert alert-success'>";
    echo "Cleanup completed successfully. Deleted $deleted_rows old location records (keeping last 30 days).";
    echo "</div>";
    
} catch (Exception $e) {
    echo "<div class='alert alert-danger'>";
    echo "Error during cleanup: " . $e->getMessage();
    echo "</div>";
}

// Close database connection
$idr->close();
?>

</div>
</body>
</html>