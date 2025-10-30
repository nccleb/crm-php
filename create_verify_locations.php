<?php
header('Content-Type: application/json');

// Database connection
$conn = mysqli_connect("192.168.16.103", "root", "1Sys9Admeen72", "nccleb_test");
if (!$conn) {
    die(json_encode(['error' => 'Connection failed: ' . mysqli_connect_error()]));
}

// Get driver_id from query parameter
$driver_id = isset($_GET['driver_id']) ? (int)$_GET['driver_id'] : null;

if ($driver_id) {
    // Query for a specific driver
    $query = "SELECT 
                ds.driver_id,
                ds.current_latitude,
                ds.current_longitude,
                ds.status,
                ds.last_update,
                dl.latitude as history_lat,
                dl.longitude as history_lng,
                dl.timestamp as history_time
              FROM driver_status ds
              LEFT JOIN driver_locations dl ON ds.driver_id = dl.driver_id
              WHERE ds.driver_id = $driver_id
              ORDER BY dl.timestamp DESC LIMIT 5";
} else {
    // Query for all recent driver locations
    $query = "SELECT 
                driver_id,
                current_latitude,
                current_longitude,
                status,
                last_update
              FROM driver_status 
              WHERE current_latitude IS NOT NULL 
              AND current_longitude IS NOT NULL
              ORDER BY last_update DESC 
              LIMIT 20";
}

$result = mysqli_query($conn, $query);
if (!$result) {
    die(json_encode(['error' => 'Query failed: ' . mysqli_error($conn)]));
}

$data = [];
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

echo json_encode($data, JSON_PRETTY_PRINT);
mysqli_close($conn);
?>