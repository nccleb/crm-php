<!DOCTYPE html>
<html>
<head>
<?php include('head.php'); ?>
  <link rel="stylesheet" href="css/stylei.css">
  <link rel="stylesheet" href="css/stylei2.css">
  <link rel="stylesheet" href="css/whatsappButton.css" />
  <script src="js/test371.js"></script>

<style>
body {
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    background-color: #f8fafc;
    margin: 0;
    padding: 20px;
}

.jumbotron {
    max-width: 700px;
    margin: 50px auto;
    background: white;
    border-radius: 12px;
    padding: 40px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    border: 1px solid #e5e7eb;
}

.alert {
    padding: 15px;
    border-radius: 8px;
    margin: 20px 0;
    font-size: 16px;
    font-weight: 500;
}

.alert-success {
    background-color: #d1fae5;
    border: 1px solid #10b981;
    color: #065f46;
}

.alert-danger {
    background-color: #fee2e2;
    border: 1px solid #ef4444;
    color: #991b1b;
}

.alert-info {
    background-color: #dbeafe;
    border: 1px solid #3b82f6;
    color: #1e3a8a;
}

.stats-container {
    background-color: #f9fafb;
    padding: 20px;
    border-radius: 8px;
    margin: 20px 0;
    border-left: 4px solid #6b7280;
}

.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 15px;
    margin-top: 15px;
}

.stat-item {
    background: white;
    padding: 15px;
    border-radius: 6px;
    border-left: 3px solid #3b82f6;
}

.stat-value {
    font-size: 24px;
    font-weight: bold;
    color: #1f2937;
}

.stat-label {
    font-size: 14px;
    color: #6b7280;
    margin-top: 5px;
}

.back-button {
    display: inline-block;
    background-color: #6b7280;
    color: white;
    padding: 10px 20px;
    text-decoration: none;
    border-radius: 6px;
    margin: 10px 5px;
    transition: background-color 0.2s ease;
}

.back-button:hover {
    background-color: #4b5563;
    color: white;
    text-decoration: none;
}

.back-button.primary {
    background-color: #3b82f6;
}

.back-button.primary:hover {
    background-color: #2563eb;
}
</style>
</head>

<body>
<div class="jumbotron"> 

<?php
// Database connection
$idr = mysqli_connect("192.168.16.103", "root", "1Sys9Admeen72", "nccleb_test");

if (mysqli_connect_errno()) {
    echo "<div class='alert alert-danger'>";
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    echo "</div>";
    echo "<div style='text-align: center;'><a href='del7.php' class='back-button'>Go Back</a></div>";
    exit();
}

// Validate input
if (!isset($_POST['deletion_method'])) {
    echo "<div class='alert alert-danger'>";
    echo "Invalid request. Please select a deletion method.";
    echo "</div>";
    echo "<div style='text-align: center;'><a href='del7.php' class='back-button'>Go Back</a></div>";
    exit();
}

$deletion_method = $_POST['deletion_method'];
$deletion_description = "";
$where_clause = "";
$params = [];
$types = "";

// Parse deletion parameters based on method
if ($deletion_method === 'preset') {
    if (!isset($_POST['keep_period'])) {
        echo "<div class='alert alert-danger'>Invalid preset option selected.</div>";
        echo "<div style='text-align: center;'><a href='del7.php' class='back-button'>Go Back</a></div>";
        exit();
    }
    
    $keep_period = $_POST['keep_period'];
    $allowed_periods = ['today', '3', '7', '30', 'all'];
    
    if (!in_array($keep_period, $allowed_periods)) {
        echo "<div class='alert alert-danger'>Invalid retention period selected.</div>";
        echo "<div style='text-align: center;'><a href='del7.php' class='back-button'>Go Back</a></div>";
        exit();
    }
    
    if ($keep_period === 'all') {
        $deletion_description = "all location data";
        $where_clause = "";
    } else if ($keep_period === 'today') {
        $deletion_description = "all location data except today's records";
        $where_clause = "WHERE DATE(timestamp) < CURDATE()";
    } else {
        $days = intval($keep_period);
        $deletion_description = "location data older than $days day" . ($days > 1 ? 's' : '');
        $where_clause = "WHERE timestamp < DATE_SUB(NOW(), INTERVAL ? DAY)";
        $params[] = $days;
        $types .= "i";
    }
    
} else if ($deletion_method === 'date_range') {
    if (!isset($_POST['delete_from']) || !isset($_POST['delete_to']) || 
        empty($_POST['delete_from']) || empty($_POST['delete_to'])) {
        echo "<div class='alert alert-danger'>Both start and end dates are required for date range deletion.</div>";
        echo "<div style='text-align: center;'><a href='del7.php' class='back-button'>Go Back</a></div>";
        exit();
    }
    
    $delete_from = $_POST['delete_from'];
    $delete_to = $_POST['delete_to'];
    
    // Validate date format and range
    if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $delete_from) || 
        !preg_match('/^\d{4}-\d{2}-\d{2}$/', $delete_to)) {
        echo "<div class='alert alert-danger'>Invalid date format. Please use YYYY-MM-DD format.</div>";
        echo "<div style='text-align: center;'><a href='del7.php' class='back-button'>Go Back</a></div>";
        exit();
    }
    
    if (strtotime($delete_from) > strtotime($delete_to)) {
        echo "<div class='alert alert-danger'>Start date must be earlier than or equal to end date.</div>";
        echo "<div style='text-align: center;'><a href='del7.php' class='back-button'>Go Back</a></div>";
        exit();
    }
    
    $deletion_description = "location data from $delete_from to $delete_to";
    $where_clause = "WHERE DATE(timestamp) >= ? AND DATE(timestamp) <= ?";
    $params[] = $delete_from;
    $params[] = $delete_to;
    $types .= "ss";
    
} else {
    echo "<div class='alert alert-danger'>Invalid deletion method selected.</div>";
    echo "<div style='text-align: center;'><a href='del7.php' class='back-button'>Go Back</a></div>";
    exit();
}

try {
    // Start transaction for data integrity
    $idr->autocommit(FALSE);
    
    // Get count of records before deletion for reporting
    $count_query = "SELECT COUNT(*) as total_records FROM driver_locations $where_clause";
    
    if (count($params) > 0) {
        $count_stmt = $idr->prepare($count_query);
        $count_stmt->bind_param($types, ...$params);
        $count_stmt->execute();
        $count_result = $count_stmt->get_result();
    } else {
        $count_result = mysqli_query($idr, $count_query);
    }
    
    if (!$count_result) {
        throw new Exception("Count query failed: " . $idr->error);
    }
    
    $count_row = $count_result->fetch_assoc();
    $records_to_delete = $count_row['total_records'];
    
    if (isset($count_stmt)) {
        $count_stmt->close();
    }
    
    // Get total records for percentage calculation
    $total_result = mysqli_query($idr, "SELECT COUNT(*) as total FROM driver_locations");
    $total_row = $total_result->fetch_assoc();
    $total_records = $total_row['total'];
    
    // Perform the deletion
    $delete_query = "DELETE FROM driver_locations $where_clause";
    
    if (count($params) > 0) {
        $stmt = $idr->prepare($delete_query);
        $stmt->bind_param($types, ...$params);
        $stmt->execute();
        $deleted_rows = $stmt->affected_rows;
        $stmt->close();
    } else {
        $result = mysqli_query($idr, $delete_query);
        if (!$result) {
            throw new Exception("Delete query failed: " . $idr->error);
        }
        $deleted_rows = $idr->affected_rows;
    }
    
    // Reset AUTO_INCREMENT to 1 if all data was deleted
    $auto_increment_reset = false;
    if (($deletion_method === 'preset' && $_POST['keep_period'] === 'all') && $deleted_rows > 0) {
        $reset_result = mysqli_query($idr, "ALTER TABLE driver_locations AUTO_INCREMENT = 1");
        if ($reset_result) {
            $auto_increment_reset = true;
        }
    }
    
    // Optimize table after deletion for better performance
    mysqli_query($idr, "OPTIMIZE TABLE driver_locations");
    
    // Commit the transaction
    $idr->commit();
    $idr->autocommit(TRUE);
    
    // Calculate statistics
    $records_remaining = $total_records - $deleted_rows;
    $percentage_deleted = $total_records > 0 ? round(($deleted_rows / $total_records) * 100, 1) : 0;
    
    // Success message
    echo "<div class='alert alert-success'>";
    echo "<strong>✅ Cleanup Completed Successfully!</strong><br><br>";
    echo "Deleted $deletion_description.";
    echo "</div>";
    
    // Enhanced Statistics
    echo "<div class='stats-container'>";
    echo "<h4>📊 Cleanup Statistics</h4>";
    echo "<div class='stats-grid'>";
    
    echo "<div class='stat-item'>";
    echo "<div class='stat-value'>" . number_format($deleted_rows) . "</div>";
    echo "<div class='stat-label'>Records Deleted</div>";
    echo "</div>";
    
    echo "<div class='stat-item'>";
    echo "<div class='stat-value'>" . number_format($records_remaining) . "</div>";
    echo "<div class='stat-label'>Records Remaining</div>";
    echo "</div>";
    
    echo "<div class='stat-item'>";
    echo "<div class='stat-value'>{$percentage_deleted}%</div>";
    echo "<div class='stat-label'>Data Deleted</div>";
    echo "</div>";
    
    if ($auto_increment_reset) {
        echo "<div class='stat-item'>";
        echo "<div class='stat-value'>✅</div>";
        echo "<div class='stat-label'>ID Counter Reset</div>";
        echo "</div>";
    }
    
    echo "</div>";
    echo "</div>";
    
    // Additional information based on deletion method
    if ($deletion_method === 'preset') {
        if ($_POST['keep_period'] === 'all') {
            echo "<div class='alert alert-info'>";
            echo "<strong>ℹ️ Complete Data Wipe</strong><br>";
            echo "All location tracking data has been permanently removed from the database.";
            if ($auto_increment_reset) {
                echo "<br>The ID counter has been reset - new records will start from ID 1.";
            }
            echo "</div>";
        } else if ($_POST['keep_period'] === 'today') {
            echo "<div class='alert alert-info'>";
            echo "<strong>ℹ️ Daily Cleanup Applied</strong><br>";
            echo "All location data from previous days has been removed.<br>";
            echo "Today's location data has been preserved.";
            echo "</div>";
        } else {
            $days = $_POST['keep_period'];
            echo "<div class='alert alert-info'>";
            echo "<strong>ℹ️ Retention Policy Applied</strong><br>";
            echo "All location data older than {$days} day" . ($days > 1 ? 's' : '') . " has been removed.<br>";
            echo "Recent location data has been preserved for operational purposes.";
            echo "</div>";
        }
    } else if ($deletion_method === 'date_range') {
        echo "<div class='alert alert-info'>";
        echo "<strong>ℹ️ Date Range Deletion Applied</strong><br>";
        echo "All location data from {$_POST['delete_from']} to {$_POST['delete_to']} has been removed.<br>";
        echo "Data outside this range has been preserved.";
        echo "</div>";
    }
    
} catch (Exception $e) {
    // Rollback transaction on error
    $idr->rollback();
    $idr->autocommit(TRUE);
    
    echo "<div class='alert alert-danger'>";
    echo "<strong>❌ Error During Cleanup</strong><br><br>";
    echo "An error occurred while processing the cleanup: " . htmlspecialchars($e->getMessage()) . "<br><br>";
    echo "No data has been deleted. Please check the database connection and try again.";
    echo "</div>";
}

// Close database connection
$idr->close();
?>

</div>

<div style="text-align: center; margin-top: 30px;">
    <a href="del7.php" class="back-button primary">Perform Another Cleanup</a>
    <button onclick="quit()" class="back-button">Close Window</button>
</div>

<script>
function quit() {
    window.close();
}

// Auto-close after 15 seconds if deletion was successful
<?php if (isset($deleted_rows) && $deleted_rows >= 0): ?>
let countdown = 15;
const countdownInterval = setInterval(function() {
    countdown--;
    if (countdown <= 0) {
        const autoClose = confirm("Cleanup completed. Close this window automatically?");
        if (autoClose) {
            quit();
        }
        clearInterval(countdownInterval);
    }
}, 1000);
<?php endif; ?>
</script>

</div>
</body>
</html>