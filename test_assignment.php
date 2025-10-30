<?php
// test_assignment.php - Test tool to simulate assignment process

$idr = mysqli_connect("localhost", "root", "1Sys9Admeen72", "nccleb_test");
if (mysqli_connect_errno()) {
    die("Database connection failed: " . mysqli_connect_error());
}

$action = $_GET['action'] ?? '';
$driver_id = $_GET['driver_id'] ?? 2; // Default to George

?>
<!DOCTYPE html>
<html>
<head>
    <title>Test Assignment Status</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        .btn { padding: 10px 15px; margin: 5px; cursor: pointer; border: none; border-radius: 4px; }
        .btn-assign { background: #ffc107; color: black; }
        .btn-complete { background: #28a745; color: white; }
        .btn-check { background: #007bff; color: white; }
        .result { background: #f8f9fa; border: 1px solid #dee2e6; padding: 15px; margin: 10px 0; border-radius: 4px; }
    </style>
</head>
<body>
    <h1>Test Assignment Status System</h1>
    
    <h3>Test with George (Driver ID: 2)</h3>
    <a href="?action=assign&driver_id=2" class="btn btn-assign">📦 Assign Delivery to George</a>
    <a href="?action=complete&driver_id=2" class="btn btn-complete">✅ Complete George's Delivery</a>
    <a href="?action=check&driver_id=2" class="btn btn-check">🔍 Check George's Status</a>
    
    <div class="result">
<?php

if ($action === 'assign') {
    // Simulate assigning a delivery
    $fake_assignment_id = 999; // In real system, this would be your actual assignment ID
    
    $stmt = $idr->prepare("UPDATE driver_status SET current_assignment_id = ?, status = 'busy' WHERE driver_id = ?");
    $stmt->bind_param("ii", $fake_assignment_id, $driver_id);
    
    if ($stmt->execute()) {
        echo "<strong>✅ SUCCESS:</strong> Driver $driver_id assigned delivery (Assignment ID: $fake_assignment_id)<br>";
        echo "Status changed to: <strong>busy</strong><br>";
        echo "<em>In your real system, this would happen when you create an actual assignment.</em>";
    } else {
        echo "<strong>❌ ERROR:</strong> Failed to assign delivery";
    }
    $stmt->close();

} elseif ($action === 'complete') {
    // Simulate completing a delivery
    $stmt = $idr->prepare("UPDATE driver_status SET current_assignment_id = NULL, status = 'available' WHERE driver_id = ?");
    $stmt->bind_param("i", $driver_id);
    
    if ($stmt->execute()) {
        echo "<strong>✅ SUCCESS:</strong> Driver $driver_id delivery completed<br>";
        echo "Status changed to: <strong>available</strong><br>";
        echo "Assignment cleared<br>";
        echo "<em>In your real system, this would happen when delivery is marked complete.</em>";
    } else {
        echo "<strong>❌ ERROR:</strong> Failed to complete delivery";
    }
    $stmt->close();

} elseif ($action === 'check') {
    // Check current status
    $stmt = $idr->prepare("SELECT driver_id, status, current_assignment_id, last_update FROM driver_status WHERE driver_id = ?");
    $stmt->bind_param("i", $driver_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($row = $result->fetch_assoc()) {
        echo "<strong>📊 CURRENT STATUS for Driver $driver_id:</strong><br>";
        echo "Status: <strong>" . $row['status'] . "</strong><br>";
        echo "Assignment ID: <strong>" . ($row['current_assignment_id'] ?: 'None') . "</strong><br>";
        echo "Last Update: <strong>" . $row['last_update'] . "</strong><br>";
        
        // Determine what color marker this would show
        $has_assignment = $row['current_assignment_id'] ? true : false;
        $status = $row['status'];
        
        if ($has_assignment && $status === 'busy') {
            echo "<br>🟡 <strong>Map Marker:</strong> YELLOW (Busy with delivery)";
        } elseif ($status === 'available') {
            echo "<br>🟢 <strong>Map Marker:</strong> GREEN (Available)";
        } elseif ($status === 'offline') {
            echo "<br>🔴 <strong>Map Marker:</strong> RED (Offline)";
        }
    } else {
        echo "<strong>❌ ERROR:</strong> Driver not found";
    }
    $stmt->close();

} else {
    echo "<strong>ℹ️ Instructions:</strong><br>";
    echo "1. Click <strong>Assign Delivery</strong> to simulate giving George a delivery<br>";
    echo "2. Check your live tracking page - George should show as YELLOW (busy)<br>";
    echo "3. Click <strong>Complete Delivery</strong> to finish the delivery<br>";
    echo "4. George should return to GREEN (available)<br>";
    echo "<br><em>This simulates what should happen in your real dispatch system.</em>";
}

mysqli_close($idr);
?>
    </div>
    
    <p><strong>Next Step:</strong> After testing this, you'll need to add similar code to your real assignment/dispatch system.</p>
</body>
</html>