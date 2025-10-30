<?php
// Detailed debugging script
header('Content-Type: text/plain');
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection
$idr = mysqli_connect("192.168.16.103", "root", "1Sys9Admeen72", "nccleb_test");
if (mysqli_connect_errno()) {
    die("Database connection FAILED: " . mysqli_connect_error());
}

echo "=== DETAILED DEBUGGING ===\n\n";

// Check table structures
echo "1. CHECKING TABLE STRUCTURES:\n";
echo "-----------------------------\n";

$tables = ['drivers', 'driver_status', 'driver_locations'];
foreach ($tables as $table) {
    echo "\nTable: $table\n";
    $result = mysqli_query($idr, "DESCRIBE $table");
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "  {$row['Field']} - {$row['Type']} - {$row['Null']} - {$row['Key']}\n";
        }
    } else {
        echo "  ERROR: " . mysqli_error($idr) . "\n";
    }
}

echo "\n\n2. TESTING LOCATION INSERT WITH DETAILED ERROR REPORTING:\n";
echo "--------------------------------------------------------\n";

// Test location insert with detailed error reporting
$test_data = [
    'driver_id' => 999,
    'latitude' => 33.8938,
    'longitude' => 35.5018,
    'status' => 'online'
];

echo "Attempting to insert test data:\n";
echo "Driver ID: {$test_data['driver_id']}\n";
echo "Latitude: {$test_data['latitude']}\n";
echo "Longitude: {$test_data['longitude']}\n";
echo "Status: {$test_data['status']}\n\n";

// Try the basic insert first
$basic_query = "INSERT INTO driver_locations (driver_id, latitude, longitude, status, timestamp) VALUES (?, ?, ?, ?, NOW())";
echo "Query: $basic_query\n";

$stmt = mysqli_prepare($idr, $basic_query);
if (!$stmt) {
    echo "PREPARE FAILED: " . mysqli_error($idr) . "\n";
} else {
    echo "Prepare OK\n";
    
    $bind_result = mysqli_stmt_bind_param($stmt, "idds", 
        $test_data['driver_id'], 
        $test_data['latitude'], 
        $test_data['longitude'], 
        $test_data['status']
    );
    
    if (!$bind_result) {
        echo "BIND FAILED: " . mysqli_stmt_error($stmt) . "\n";
    } else {
        echo "Bind OK\n";
        
        $execute_result = mysqli_stmt_execute($stmt);
        if (!$execute_result) {
            echo "EXECUTE FAILED: " . mysqli_stmt_error($stmt) . "\n";
        } else {
            echo "Execute OK - Inserted ID: " . mysqli_insert_id($idr) . "\n";
        }
    }
    mysqli_stmt_close($stmt);
}

echo "\n\n3. TESTING DRIVER_STATUS INSERT:\n";
echo "-------------------------------\n";

$status_query = "INSERT INTO driver_status (driver_id, current_latitude, current_longitude, status, last_update) VALUES (?, ?, ?, ?, NOW()) ON DUPLICATE KEY UPDATE current_latitude = VALUES(current_latitude), current_longitude = VALUES(current_longitude), status = VALUES(status), last_update = NOW()";
echo "Query: $status_query\n";

$stmt2 = mysqli_prepare($idr, $status_query);
if (!$stmt2) {
    echo "PREPARE FAILED: " . mysqli_error($idr) . "\n";
} else {
    echo "Prepare OK\n";
    
    $bind_result2 = mysqli_stmt_bind_param($stmt2, "idds", 
        $test_data['driver_id'], 
        $test_data['latitude'], 
        $test_data['longitude'], 
        $test_data['status']
    );
    
    if (!$bind_result2) {
        echo "BIND FAILED: " . mysqli_stmt_error($stmt2) . "\n";
    } else {
        echo "Bind OK\n";
        
        $execute_result2 = mysqli_stmt_execute($stmt2);
        if (!$execute_result2) {
            echo "EXECUTE FAILED: " . mysqli_stmt_error($stmt2) . "\n";
        } else {
            echo "Execute OK - Affected rows: " . mysqli_stmt_affected_rows($stmt2) . "\n";
        }
    }
    mysqli_stmt_close($stmt2);
}

echo "\n\n4. CHECKING CURRENT DATA:\n";
echo "------------------------\n";

// Check driver_locations
$result = mysqli_query($idr, "SELECT COUNT(*) as count FROM driver_locations WHERE driver_id = 999");
if ($result) {
    $row = mysqli_fetch_assoc($result);
    echo "driver_locations records for test driver: {$row['count']}\n";
}

// Check driver_status
$result = mysqli_query($idr, "SELECT * FROM driver_status WHERE driver_id = 999");
if ($result) {
    $count = mysqli_num_rows($result);
    echo "driver_status records for test driver: $count\n";
    if ($count > 0) {
        $row = mysqli_fetch_assoc($result);
        echo "  Status: {$row['status']}\n";
        echo "  Lat: {$row['current_latitude']}\n";
        echo "  Lng: {$row['current_longitude']}\n";
        echo "  Last update: {$row['last_update']}\n";
    }
}

echo "\n\n5. TESTING GET_ALL_LOCATIONS QUERY:\n";
echo "----------------------------------\n";

$get_all_query = "SELECT 
    ds.driver_id,
    d.name_d as driver_name,
    d.num_d as driver_phone,
    ds.current_latitude,
    ds.current_longitude,
    ds.status,
    ds.last_update,
    TIMESTAMPDIFF(MINUTE, ds.last_update, NOW()) as minutes_ago
FROM driver_status ds
LEFT JOIN drivers d ON ds.driver_id = d.idx
WHERE ds.current_latitude IS NOT NULL 
AND ds.current_longitude IS NOT NULL
AND ds.last_update > DATE_SUB(NOW(), INTERVAL 10 MINUTE)
ORDER BY ds.last_update DESC";

echo "Query: $get_all_query\n\n";

$result = mysqli_query($idr, $get_all_query);
if (!$result) {
    echo "QUERY FAILED: " . mysqli_error($idr) . "\n";
} else {
    $count = mysqli_num_rows($result);
    echo "Found $count active drivers:\n";
    
    while ($row = mysqli_fetch_assoc($result)) {
        echo "  Driver {$row['driver_id']}: {$row['driver_name']} - {$row['current_latitude']}, {$row['current_longitude']} - {$row['status']} ({$row['minutes_ago']} min ago)\n";
    }
}

echo "\n\n6. TESTING ACTUAL API ENDPOINT:\n";
echo "------------------------------\n";

// Test the actual API call
$api_data = json_encode($test_data);
echo "Testing POST to track_location.php with data: $api_data\n";

// Clean up test data
echo "\n\n7. CLEANING UP:\n";
echo "---------------\n";
$deleted1 = mysqli_query($idr, "DELETE FROM driver_locations WHERE driver_id = 999");
$deleted2 = mysqli_query($idr, "DELETE FROM driver_status WHERE driver_id = 999");
echo "Cleanup: driver_locations=" . ($deleted1 ? "OK" : "FAILED") . ", driver_status=" . ($deleted2 ? "OK" : "FAILED") . "\n";

mysqli_close($idr);
echo "\n=== DEBUG COMPLETE ===\n";
?>