<?php
// simple_debug.php - Direct database inspection

header('Content-Type: text/html');
error_reporting(E_ALL);
ini_set('display_errors', 1);

$idr = mysqli_connect("localhost", "root", "1Sys9Admeen72", "nccleb_test");
if (mysqli_connect_errno()) {
    die("Database connection failed: " . mysqli_connect_error());
}

echo "<h2>Database Debug Results</h2>";
echo "<style>table {border-collapse: collapse; margin: 20px 0;} th, td {border: 1px solid #ddd; padding: 8px;} th {background: #f2f2f2;}</style>";

// Check drivers table
echo "<h3>1. DRIVERS Table</h3>";
$result = mysqli_query($idr, "SELECT idx, name_d, num_d FROM drivers ORDER BY idx");
if ($result) {
    echo "<table><tr><th>idx</th><th>name_d</th><th>num_d</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>{$row['idx']}</td><td>{$row['name_d']}</td><td>{$row['num_d']}</td></tr>";
    }
    echo "</table>";
} else {
    echo "Error: " . mysqli_error($idr);
}

// Check driver_status table
echo "<h3>2. DRIVER_STATUS Table</h3>";
$result = mysqli_query($idr, "SELECT * FROM driver_status ORDER BY driver_id");
if ($result) {
    echo "<table><tr><th>driver_id</th><th>current_latitude</th><th>current_longitude</th><th>status</th><th>last_update</th><th>current_assignment_id</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        $lat = $row['current_latitude'] ?: 'NULL';
        $lng = $row['current_longitude'] ?: 'NULL';
        $status = $row['status'] ?: 'NULL';
        $assignment = $row['current_assignment_id'] ?: 'NULL';
        echo "<tr><td>{$row['driver_id']}</td><td>{$lat}</td><td>{$lng}</td><td>{$status}</td><td>{$row['last_update']}</td><td>{$assignment}</td></tr>";
    }
    echo "</table>";
} else {
    echo "Error: " . mysqli_error($idr);
}

// Check assignments
echo "<h3>3. DISPATCH_ASSIGNMENTS Table</h3>";
$result = mysqli_query($idr, "SELECT id, dispatcher_id, delivery_address, status, created_at FROM dispatch_assignments ORDER BY created_at DESC LIMIT 10");
if ($result) {
    echo "<table><tr><th>id</th><th>dispatcher_id</th><th>delivery_address</th><th>status</th><th>created_at</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        $address = $row['delivery_address'] ?: 'NULL';
        echo "<tr><td>{$row['id']}</td><td>{$row['dispatcher_id']}</td><td>{$address}</td><td>{$row['status']}</td><td>{$row['created_at']}</td></tr>";
    }
    echo "</table>";
} else {
    echo "Error: " . mysqli_error($idr);
}

// Test the exact query used by live tracking
echo "<h3>4. LIVE TRACKING QUERY Result</h3>";
$query = "SELECT 
    ds.driver_id,
    d.name_d as driver_name,
    d.num_d as driver_phone,
    ds.current_latitude,
    ds.current_longitude,
    IF(ds.last_update < DATE_SUB(NOW(), INTERVAL 5 MINUTE), 'offline', ds.status) AS status,
    ds.last_update,
    ds.current_assignment_id,
    da.delivery_address as current_delivery
FROM driver_status ds
LEFT JOIN drivers d ON ds.driver_id = d.idx
LEFT JOIN dispatch_assignments da ON ds.current_assignment_id = da.id
WHERE ds.current_latitude IS NOT NULL 
AND ds.current_longitude IS NOT NULL
ORDER BY ds.last_update DESC";

$result = mysqli_query($idr, $query);
if ($result) {
    echo "<table><tr><th>driver_id</th><th>driver_name</th><th>latitude</th><th>longitude</th><th>status</th><th>last_update</th><th>assignment_id</th><th>delivery</th></tr>";
    $count = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $count++;
        $delivery = $row['current_delivery'] ?: 'None';
        $assignment = $row['current_assignment_id'] ?: 'None';
        echo "<tr><td>{$row['driver_id']}</td><td>{$row['driver_name']}</td><td>{$row['current_latitude']}</td><td>{$row['current_longitude']}</td><td>{$row['status']}</td><td>{$row['last_update']}</td><td>{$assignment}</td><td>{$delivery}</td></tr>";
    }
    echo "</table>";
    echo "<p><strong>Total drivers returned: {$count}</strong></p>";
} else {
    echo "Error: " . mysqli_error($idr);
}

// Show the same query without the WHERE clause
echo "<h3>5. ALL DRIVERS (No Coordinate Filter)</h3>";
$query2 = "SELECT 
    ds.driver_id,
    d.name_d as driver_name,
    ds.current_latitude,
    ds.current_longitude,
    ds.status,
    ds.last_update
FROM driver_status ds
LEFT JOIN drivers d ON ds.driver_id = d.idx
ORDER BY ds.driver_id";

$result2 = mysqli_query($idr, $query2);
if ($result2) {
    echo "<table><tr><th>driver_id</th><th>driver_name</th><th>latitude</th><th>longitude</th><th>status</th><th>last_update</th></tr>";
    while ($row = mysqli_fetch_assoc($result2)) {
        $lat = $row['current_latitude'] ?: '<span style="color:red">NULL</span>';
        $lng = $row['current_longitude'] ?: '<span style="color:red">NULL</span>';
        $status = $row['status'] ?: 'NULL';
        echo "<tr><td>{$row['driver_id']}</td><td>{$row['driver_name']}</td><td>{$lat}</td><td>{$lng}</td><td>{$status}</td><td>{$row['last_update']}</td></tr>";
    }
    echo "</table>";
} else {
    echo "Error: " . mysqli_error($idr);
}

mysqli_close($idr);
?>