<?php
// Comprehensive location tracking diagnostic
header('Content-Type: text/plain');
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "=== LOCATION TRACKING DIAGNOSTIC ===\n";
echo "Date: " . date('Y-m-d H:i:s') . "\n\n";

$idr = mysqli_connect("192.168.16.103", "root", "1Sys9Admeen72", "nccleb_test");
if (mysqli_connect_errno()) {
    die("Database connection FAILED: " . mysqli_connect_error());
}

// 1. Check recent location updates
echo "1. RECENT LOCATION ACTIVITY (Last 24 hours):\n";
echo "==========================================\n";

$recent_locations = mysqli_query($idr, "
    SELECT 
        dl.id,
        dl.driver_id,
        d.name_d as driver_name,
        dl.latitude,
        dl.longitude,
        dl.status,
        dl.accuracy,
        dl.speed,
        dl.timestamp,
        TIMESTAMPDIFF(MINUTE, dl.timestamp, NOW()) as minutes_ago
    FROM driver_locations dl
    LEFT JOIN drivers d ON dl.driver_id = d.idx
    WHERE dl.timestamp > DATE_SUB(NOW(), INTERVAL 24 HOUR)
    ORDER BY dl.timestamp DESC
    LIMIT 20
");

if ($recent_locations && mysqli_num_rows($recent_locations) > 0) {
    printf("%-8s %-15s %-12s %-12s %-10s %-8s %s\n", 
           "Driver", "Name", "Latitude", "Longitude", "Status", "Accuracy", "When");
    echo str_repeat("-", 80) . "\n";
    
    while ($row = mysqli_fetch_assoc($recent_locations)) {
        printf("%-8d %-15s %11.6f %12.6f %-10s %-8s %d min ago\n",
               $row['driver_id'],
               substr($row['driver_name'] ?? 'Unknown', 0, 15),
               $row['latitude'],
               $row['longitude'],
               $row['status'],
               $row['accuracy'] ? round($row['accuracy']) . 'm' : 'N/A',
               $row['minutes_ago']
        );
    }
} else {
    echo "❌ NO LOCATION RECORDS found in last 24 hours\n";
    echo "This indicates drivers are not sending location updates.\n";
}

// 2. Check current driver status
echo "\n\n2. CURRENT DRIVER STATUS:\n";
echo "========================\n";

$current_status = mysqli_query($idr, "
    SELECT 
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
    ORDER BY ds.last_update DESC
");

if ($current_status && mysqli_num_rows($current_status) > 0) {
    printf("%-8s %-15s %-12s %-12s %-10s %s\n", 
           "Driver", "Name", "Latitude", "Longitude", "Status", "Last Update");
    echo str_repeat("-", 80) . "\n";
    
    while ($row = mysqli_fetch_assoc($current_status)) {
        $status_indicator = "🔴"; // Default offline
        if ($row['minutes_ago'] < 5) $status_indicator = "🟢"; // Recent = online
        elseif ($row['minutes_ago'] < 30) $status_indicator = "🟡"; // Stale = warning
        
        printf("%s %-6d %-15s %11.6f %12.6f %-10s %d min ago\n",
               $status_indicator,
               $row['driver_id'],
               substr($row['driver_name'] ?? 'Unknown', 0, 15),
               $row['current_latitude'] ?? 0,
               $row['current_longitude'] ?? 0,
               $row['status'] ?? 'unknown',
               $row['minutes_ago']
        );
    }
} else {
    echo "❌ NO CURRENT STATUS RECORDS found\n";
}

// 3. Test the API endpoint
echo "\n\n3. API ENDPOINT TESTING:\n";
echo "=======================\n";

// Test GET endpoint
echo "Testing GET endpoint (get_all_locations):\n";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://localhost/track_location.php?action=get_all_locations");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
$response = curl_exec($ch);
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

echo "HTTP Status: $http_code\n";
if ($response) {
    $json_data = json_decode($response, true);
    if ($json_data) {
        echo "Response: " . json_encode($json_data, JSON_PRETTY_PRINT) . "\n";
    } else {
        echo "Invalid JSON response: " . substr($response, 0, 200) . "\n";
    }
} else {
    echo "❌ No response from API endpoint\n";
}

// 4. Check PHP configuration
echo "\n\n4. PHP CONFIGURATION:\n";
echo "====================\n";
echo "PHP Version: " . phpversion() . "\n";
echo "Error Reporting: " . (error_reporting() ? "Enabled" : "Disabled") . "\n";
echo "Display Errors: " . (ini_get('display_errors') ? "On" : "Off") . "\n";
echo "Allow URL fopen: " . (ini_get('allow_url_fopen') ? "Yes" : "No") . "\n";
echo "cURL available: " . (function_exists('curl_init') ? "Yes" : "No") . "\n";

// 5. Check file permissions and paths
echo "\n\n5. FILE SYSTEM CHECK:\n";
echo "====================\n";
$files_to_check = [
    'track_location.php',
    'live_tracking.php', 
    'driver_mobile.php'
];

foreach ($files_to_check as $file) {
    if (file_exists($file)) {
        $perms = fileperms($file);
        echo "✓ $file exists (permissions: " . decoct($perms & 0777) . ")\n";
    } else {
        echo "❌ $file not found\n";
    }
}

// 6. Test CORS and headers
echo "\n\n6. HEADERS AND CORS TEST:\n";
echo "========================\n";
$headers = getallheaders();
echo "Request headers received:\n";
foreach ($headers as $name => $value) {
    echo "  $name: $value\n";
}

// 7. Database timing test
echo "\n\n7. DATABASE PERFORMANCE:\n";
echo "=======================\n";
$start = microtime(true);
$result = mysqli_query($idr, "SELECT COUNT(*) as total FROM driver_locations");
$db_time = (microtime(true) - $start) * 1000;
if ($result) {
    $row = mysqli_fetch_assoc($result);
    echo "Total location records: {$row['total']}\n";
}
echo "Database query time: " . round($db_time, 2) . "ms\n";

// 8. Real-time connection test
echo "\n\n8. REAL-TIME CONNECTION TEST:\n";
echo "============================\n";

// Insert a test location with current timestamp
$test_driver = 1; // Assuming driver 1 exists
$test_lat = 33.8938 + (rand(-50, 50) / 100000);
$test_lng = 35.5018 + (rand(-50, 50) / 100000);

$test_insert = $idr->prepare("
    INSERT INTO driver_locations 
    (driver_id, latitude, longitude, status, timestamp, accuracy) 
    VALUES (?, ?, ?, 'online', NOW(), 15.0)
");

if ($test_insert) {
    $test_insert->bind_param("idd", $test_driver, $test_lat, $test_lng);
    if ($test_insert->execute()) {
        echo "✓ Test location inserted successfully\n";
        $test_id = mysqli_insert_id($idr);
        
        // Now try to retrieve it
        $retrieve_test = $idr->prepare("
            SELECT latitude, longitude, timestamp 
            FROM driver_locations 
            WHERE id = ?
        ");
        $retrieve_test->bind_param("i", $test_id);
        $retrieve_test->execute();
        $result = $retrieve_test->get_result();
        
        if ($row = $result->fetch_assoc()) {
            echo "✓ Test location retrieved: {$row['latitude']}, {$row['longitude']} at {$row['timestamp']}\n";
        } else {
            echo "❌ Could not retrieve test location\n";
        }
        
        // Clean up
        mysqli_query($idr, "DELETE FROM driver_locations WHERE id = $test_id");
        echo "✓ Test location cleaned up\n";
        
    } else {
        echo "❌ Failed to insert test location: " . $test_insert->error . "\n";
    }
}

// 9. Mobile app simulation
echo "\n\n9. MOBILE APP SIMULATION:\n";
echo "========================\n";

// Simulate a POST request like the mobile app would send
$mobile_data = [
    'driver_id' => 1,
    'latitude' => 33.8938,
    'longitude' => 35.5018,
    'accuracy' => 12.5,
    'status' => 'online',
    'timestamp' => date('Y-m-d H:i:s')
];

echo "Simulating mobile app POST request:\n";
echo json_encode($mobile_data, JSON_PRETTY_PRINT) . "\n";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://localhost/track_location.php?action=update_location");
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($mobile_data));
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);

$post_response = curl_exec($ch);
$post_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

echo "POST Response Code: $post_code\n";
if ($post_response) {
    echo "POST Response: " . $post_response . "\n";
} else {
    echo "❌ No response from POST request\n";
}

// 10. Summary and recommendations
echo "\n\n10. DIAGNOSTIC SUMMARY:\n";
echo "======================\n";

$issues_found = [];
$recent_count = mysqli_num_rows($recent_locations ?? mysqli_query($idr, "SELECT 1"));
if ($recent_count == 0) {
    $issues_found[] = "No recent location updates (drivers not sending data)";
}

if ($http_code != 200) {
    $issues_found[] = "GET API endpoint not working properly (HTTP $http_code)";
}

if ($post_code != 200) {
    $issues_found[] = "POST API endpoint not working properly (HTTP $post_code)";
}

if (empty($issues_found)) {
    echo "✅ System appears to be working correctly\n";
    echo "If locations still don't show, the issue is likely:\n";
    echo "- Drivers haven't granted location permissions\n";
    echo "- Drivers aren't using the mobile app\n";
    echo "- Frontend JavaScript errors in live_tracking.php\n";
} else {
    echo "❌ Issues found:\n";
    foreach ($issues_found as $issue) {
        echo "  • $issue\n";
    }
}

echo "\nNext steps:\n";
echo "1. Check browser console on live_tracking.php for JavaScript errors\n";
echo "2. Test mobile app with: driver_mobile.php?driver_id=1&driver_name=Test\n";
echo "3. Ensure location permissions are granted in mobile browsers\n";
echo "4. Check network connectivity between devices\n";

mysqli_close($idr);
echo "\n=== DIAGNOSTIC COMPLETE ===\n";
?>