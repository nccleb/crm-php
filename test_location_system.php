<?php
// Test script to verify your location tracking system
header('Content-Type: application/json');

// Test database connection
echo "Testing Database Connection...\n";
$idr = mysqli_connect("192.168.16.103", "root", "1Sys9Admeen72", "nccleb_test");
if (mysqli_connect_errno()) {
    echo "Database connection FAILED: " . mysqli_connect_error() . "\n";
    exit;
}
echo "Database connection OK\n\n";

// Test tables exist
echo "Checking required tables...\n";
$tables = ['drivers', 'driver_status', 'driver_locations'];
foreach ($tables as $table) {
    $result = mysqli_query($idr, "SHOW TABLES LIKE '$table'");
    if (mysqli_num_rows($result) > 0) {
        echo "Table '$table' exists\n";
    } else {
        echo "Table '$table' MISSING\n";
    }
}
echo "\n";

// Test inserting a sample location
echo "Testing location insert...\n";
$test_data = [
    'driver_id' => 999,
    'latitude' => 33.8938,
    'longitude' => 35.5018,
    'status' => 'online'
];

$stmt = $idr->prepare("INSERT INTO driver_locations 
    (driver_id, latitude, longitude, status, timestamp) 
    VALUES (?, ?, ?, ?, NOW())");
    
if ($stmt) {
    $stmt->bind_param("idds", 
        $test_data['driver_id'], 
        $test_data['latitude'], 
        $test_data['longitude'], 
        $test_data['status']
    );
    
    if ($stmt->execute()) {
        echo "Test location insert OK\n";
    } else {
        echo "Test location insert FAILED: " . $stmt->error . "\n";
    }
    $stmt->close();
} else {
    echo "Prepare statement FAILED: " . $idr->error . "\n";
}

// Test driver_status update
$update_stmt = $idr->prepare("INSERT INTO driver_status 
    (driver_id, current_latitude, current_longitude, status, last_update) 
    VALUES (?, ?, ?, ?, NOW()) 
    ON DUPLICATE KEY UPDATE 
    current_latitude = VALUES(current_latitude), 
    current_longitude = VALUES(current_longitude), 
    status = VALUES(status), 
    last_update = NOW()");
    
if ($update_stmt) {
    $update_stmt->bind_param("idds", 
        $test_data['driver_id'], 
        $test_data['latitude'], 
        $test_data['longitude'], 
        $test_data['status']
    );
    
    if ($update_stmt->execute()) {
        echo "Test status update OK\n";
    } else {
        echo "Test status update FAILED: " . $update_stmt->error . "\n";
    }
    $update_stmt->close();
}

// Test retrieving locations
echo "\nTesting location retrieval...\n";
$query = "SELECT 
    ds.driver_id,
    ds.current_latitude,
    ds.current_longitude,
    ds.status,
    ds.last_update
FROM driver_status ds
WHERE ds.current_latitude IS NOT NULL 
AND ds.current_longitude IS NOT NULL
ORDER BY ds.last_update DESC
LIMIT 5";

$result = mysqli_query($idr, $query);
if ($result) {
    $count = mysqli_num_rows($result);
    echo "Found $count active driver locations:\n";
    
    while($row = mysqli_fetch_assoc($result)) {
        echo "Driver {$row['driver_id']}: {$row['current_latitude']}, {$row['current_longitude']} - {$row['status']}\n";
    }
} else {
    echo "Location retrieval FAILED: " . mysqli_error($idr) . "\n";
}

// Clean up test data
mysqli_query($idr, "DELETE FROM driver_locations WHERE driver_id = 999");
mysqli_query($idr, "DELETE FROM driver_status WHERE driver_id = 999");

mysqli_close($idr);
echo "\nTest completed.\n";
?>