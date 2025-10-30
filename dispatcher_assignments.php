<?php
session_start();
$ui=urldecode($_GET['page2']);
$nam = urldecode($_GET['page']);
 $idf = urldecode($_GET['page1']);
 $_SESSION["q"]=$ui;
$_SESSION["oop"] = $nam ;
 $_SESSION["ooq"] = $idf ;
?>

<?php
// Add this PHP code at the top of dispatcher_assignments.php after the existing form handling

// Handle clear assignments action

 $idr = mysqli_connect("192.168.16.103", "root", "1Sys9Admeen72", "nccleb_test");
        if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
        }


if (isset($_POST['clear_assignments'])) {
    $confirm_clear = isset($_POST['confirm_clear']);
    
    if (!$confirm_clear) {
        $error_msg = "Please check the confirmation checkbox to proceed with clearing assignments.";
    } else {
        try {
            // Clear assignment IDs for completed deliveries
            $clear_query = "UPDATE driver_status ds 
                           LEFT JOIN dispatch_assignments da ON ds.current_assignment_id = da.id 
                           SET ds.current_assignment_id = NULL 
                           WHERE ds.current_assignment_id IS NOT NULL 
                           AND (da.status IN ('delivered', 'failed') OR da.id IS NULL)";
            
            $result = mysqli_query($idr, $clear_query);
            
            if ($result) {
                $affected_rows = mysqli_affected_rows($idr);
                $success_msg = "Successfully cleared assignment IDs for {$affected_rows} driver(s). This will fix the 'always busy' status issue in live tracking.";
            } else {
                $error_msg = "Error clearing assignments: " . mysqli_error($idr);
            }
        } catch (Exception $e) {
            $error_msg = "Error: " . $e->getMessage();
        }
    }
}
?>


<?php
// Add this function at the top of dispatcher_assignments.php
function getCurrentTrackingUrl() {
    $urlFile = __DIR__ . '/tracking_url.txt';
    if (file_exists($urlFile)) {
        $url = trim(file_get_contents($urlFile));
        return $url ?: 'https://8d9285c2f0dc.ngrok-free.app'; // fallback
    }
    return 'https://8d9285c2f0dc.ngrok-free.app'; // fallback
}

$current_tracking_url = getCurrentTrackingUrl();
?>
<?php
            $idr = mysqli_connect("192.168.16.103", "root", "1Sys9Admeen72", "nccleb_test");
        if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
        }
    // NEW: Handle bulk delete by date range
if (isset($_POST['delete_by_date_range'])) {
    $delete_from_date = $_POST['delete_from_date'];
    $delete_to_date = $_POST['delete_to_date'];
    $confirm_delete = isset($_POST['confirm_delete']);
    
    if (!$confirm_delete) {
        $error_msg = "Please check the confirmation checkbox to proceed with deletion.";
    } elseif (empty($delete_from_date) || empty($delete_to_date)) {
        $error_msg = "Both start and end dates are required for deletion.";
    } else {
        // First, count how many records will be deleted
        $count_stmt = $idr->prepare("SELECT COUNT(*) as count FROM dispatch_assignments WHERE DATE(created_at) >= ? AND DATE(created_at) <= ?");
        $count_stmt->bind_param("ss", $delete_from_date, $delete_to_date);
        $count_stmt->execute();
        $count_result = $count_stmt->get_result();
        $count_row = $count_result->fetch_assoc();
        $records_to_delete = $count_row['count'];
        $count_stmt->close();
        
        if ($records_to_delete > 0) {
            // Perform the deletion
            $delete_stmt = $idr->prepare("DELETE FROM dispatch_assignments WHERE DATE(created_at) >= ? AND DATE(created_at) <= ?");
            $delete_stmt->bind_param("ss", $delete_from_date, $delete_to_date);
            
            if ($delete_stmt->execute()) {
                $success_msg = "Successfully deleted {$records_to_delete} assignment(s) from {$delete_from_date} to {$delete_to_date}.";
            } else {
                $error_msg = "Error deleting assignments: " . $delete_stmt->error;
            }
            $delete_stmt->close();
        } else {
            $success_msg = "No assignments found in the specified date range to delete.";
        }
    }
}

// NEW: Handle delete all and reset ID
if (isset($_POST['delete_all_reset_id'])) {
    $confirm_delete_all = isset($_POST['confirm_delete_all']);
    
    if (!$confirm_delete_all) {
        $error_msg = "Please check the confirmation checkbox to proceed with deleting all records.";
    } else {
        // Count total records before deletion
        $count_result = mysqli_query($idr, "SELECT COUNT(*) as count FROM dispatch_assignments");
        $count_row = mysqli_fetch_assoc($count_result);
        $total_records = $count_row['count'];
        
        // Delete all records
        $delete_all_result = mysqli_query($idr, "DELETE FROM dispatch_assignments");
        
        if ($delete_all_result) {
            // Reset auto-increment ID to 1
            $reset_result = mysqli_query($idr, "ALTER TABLE dispatch_assignments AUTO_INCREMENT = 1");
            
            if ($reset_result) {
                $success_msg = "Successfully deleted all {$total_records} assignment(s) and reset ID counter to 0. Next assignment will start at ID 1.";
            } else {
                $success_msg = "Deleted all {$total_records} assignment(s), but failed to reset ID counter: " . mysqli_error($idr);
            }
        } else {
            $error_msg = "Error deleting all assignments: " . mysqli_error($idr);
        }
    }
}
    
?>




<?php
         $idr = mysqli_connect("192.168.16.103", "root", "1Sys9Admeen72", "nccleb_test");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
	

		$stmt = $idr->prepare("SELECT  * FROM client c
      
	  where (number=? or inumber=? or telmobile=? or telother=? )") ; 
 
 $stmt->bind_param("ssss",$ui,$ui,$ui,$ui );

$stmt->execute();

$result = $stmt ->get_result();

$stmt->close();

while($row=$result->fetch_assoc()){

	  
              
              
			  $category=$row['category'];
        $source=$row['source'];
         $num=$row['number'];
			  
			  $inum=$row['inumber'];
			  $pho=$row['filename'];
               
        $name=$row['nom']; 
			  $lname=$row['prenom']; 
			  $id=$row['id'];
		          
        $_SESSION["id"]=$id;
                          
        $company=$row['company'];
        
        $job=$row['job'];
			  $email=$row['email'];
			  $business=$row['business'];
			  $grade=$row['grade'];
        $pay=$row['payment'];
        $loy=$row['card'];
        $community=$row['community'];
			  $address=$row['address'];
			  $address2=$row['address_two'];
			  $url=$row['url'];
			  $idf=$row['idf'];
		    $city=$row['city'];
			  $street=$row['street'];
			  $floor=$row['floor'];
			  $building=$row['building'];
			  $zone=$row['zone'];
			  $near=$row['near'];
			  $remark=$row['remark'];
			 
			  $telmobile=$row['telmobile'];
			 	  
			  
			  $telother=$row['telother'];
			 
			  
			 $apartment=$row['apartment'];
		    $idx=$row['idx'];
       $delivery_time = $row['best_delivery_time'];
			 
			 $simple_address = "";
if(isset($city) && $city) $simple_address .= $city. ", ";
if(isset($zone) && $zone) $simple_address .="Zone " . $zone. ", ";       
if(isset($street) && $street) $simple_address .="Street " . $street . ", ";
if(isset($building) && $building) $simple_address .= "Building " . $building . ", ";
 if(isset($apartment) && $apartment) $simple_address .="Apartment " . $apartment . ", ";
if(isset($floor) && $floor) $simple_address .= "Floor " . $floor . ", ";
if(isset($near) && $near) $simple_address .="Near " . $near. ", ";
if(isset($address) && $address) $simple_address .= "address1 " . $address ;
//if(isset($address2) && $address2) $simple_address .= "address2 " . $address2;





			  
			  
		}
	  
	  

?>

<?php
// dispatcher_assignments.php - Main management interface
session_start();

$idr = mysqli_connect("192.168.16.103", "root", "1Sys9Admeen72", "nccleb_test");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

// Handle form submissions
if ($_POST) {
    if (isset($_POST['create_assignment'])) {
        $client_id = $_POST['client_id'];
        $order_id = $_POST['order_id'] ? $_POST['order_id'] : NULL;
        $dispatcher_id = $_POST['dispatcher_id'];
        $delivery_address = $_POST['delivery_address'];
        $delivery_instructions = $_POST['delivery_instructions'];
        $estimated_arrival = $_POST['estimated_arrival'];
        $status = $_POST['status'] ? $_POST['status'] : 'pending';
        
        $stmt = $idr->prepare("INSERT INTO dispatch_assignments 
            (client_id, order_id, dispatcher_id, delivery_address, delivery_instructions, status, estimated_arrival, created_at, updated_at) 
            VALUES (?, ?, ?, ?, ?, ?, ?, NOW(), NOW())");
        $stmt->bind_param("iiissss", $client_id, $order_id, $dispatcher_id, $delivery_address, $delivery_instructions, $status, $estimated_arrival);
        
        if ($stmt->execute()) {
            $success_msg = "Assignment created successfully!";
        } else {
            $error_msg = "Error creating assignment: " . $stmt->error;
        }
        $stmt->close();
    }
    
    if (isset($_POST['update_status'])) {
        $assignment_id = $_POST['assignment_id'];
        $new_status = $_POST['new_status'];
        $actual_arrival = $_POST['actual_arrival'] ? $_POST['actual_arrival'] : NULL;
        
        $stmt = $idr->prepare("UPDATE dispatch_assignments SET status = ?, actual_arrival = ?, updated_at = NOW() WHERE id = ?");
        $stmt->bind_param("ssi", $new_status, $actual_arrival, $assignment_id);
        
        if ($stmt->execute()) {
            $success_msg = "Status updated successfully!";
        } else {
            $error_msg = "Error updating status: " . $stmt->error;
        }
        $stmt->close();
    }

   
}

// Get filter parameters
$filter_date_from = $_GET['date_from'] ?? '';
$filter_date_to = $_GET['date_to'] ?? '';
$filter_client_id = $_GET['client_id'] ?? '';
$filter_dispatcher_id = $_GET['dispatcher_id'] ?? '';
$filter_status = $_GET['status'] ?? '';

// Build query with filters
$where_conditions = [];
$params = [];
$types = "";

if ($filter_date_from) {
    $where_conditions[] = "DATE(da.created_at) >= ?";
    $params[] = $filter_date_from;
    $types .= "s";
}

if ($filter_date_to) {
    $where_conditions[] = "DATE(da.created_at) <= ?";
    $params[] = $filter_date_to;
    $types .= "s";
}

if ($filter_client_id) {
    $where_conditions[] = "da.client_id = ?";
    $params[] = $filter_client_id;
    $types .= "i";
}

if ($filter_dispatcher_id) {
    $where_conditions[] = "da.dispatcher_id = ?";
    $params[] = $filter_dispatcher_id;
    $types .= "i";
}

if ($filter_status) {
    $where_conditions[] = "da.status = ?";
    $params[] = $filter_status;
    $types .= "s";
}

$where_clause = "";
if (count($where_conditions) > 0) {
    $where_clause = "WHERE " . implode(" AND ", $where_conditions);
}

$query = "SELECT da.*, 
    CONCAT(c.nom, ' ', c.prenom) as client_name,
    c.number as client_phone,
    d.name_d as dispatcher_name
    FROM dispatch_assignments da
    LEFT JOIN client c ON da.client_id = c.id
    LEFT JOIN drivers d ON da.dispatcher_id = d.idx
    $where_clause
    ORDER BY da.created_at DESC";

if (count($params) > 0) {
    $stmt = $idr->prepare($query);
    $stmt->bind_param($types, ...$params);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $result = mysqli_query($idr, $query);
}
?>
<?php
// NEW: Handle single assignment deletion
    if (isset($_POST['delete_single_assignment'])) {
        $assignment_id = $_POST['assignment_id'];
        
        $delete_stmt = $idr->prepare("DELETE FROM dispatch_assignments WHERE id = ?");
        $delete_stmt->bind_param("i", $assignment_id);
        
        if ($delete_stmt->execute()) {
            if ($delete_stmt->affected_rows > 0) {
                $success_msg = "Assignment deleted successfully!";
            } else {
                $error_msg = "Assignment not found or already deleted.";
            }
        } else {
            $error_msg = "Error deleting assignment: " . $delete_stmt->error;
        }
        $delete_stmt->close();
    }

// NEW: Analytics Calculations
function getAnalyticsData($idr) {
    $analytics = [];
    
    // Today's metrics
    $today = date('Y-m-d');
    $yesterday = date('Y-m-d', strtotime('-1 day'));
    
    // Total assignments today
    $result = mysqli_query($idr, "SELECT COUNT(*) as count FROM dispatch_assignments WHERE DATE(created_at) = '$today'");
    $analytics['today_total'] = mysqli_fetch_assoc($result)['count'];
    
    // Yesterday's total for comparison
    $result = mysqli_query($idr, "SELECT COUNT(*) as count FROM dispatch_assignments WHERE DATE(created_at) = '$yesterday'");
    $analytics['yesterday_total'] = mysqli_fetch_assoc($result)['count'];
    
    // Success rate (last 30 days)
    $result = mysqli_query($idr, "SELECT 
        SUM(CASE WHEN status = 'delivered' THEN 1 ELSE 0 END) as delivered,
        COUNT(*) as total 
        FROM dispatch_assignments 
        WHERE created_at >= DATE_SUB(NOW(), INTERVAL 30 DAY)");
    $row = mysqli_fetch_assoc($result);
    $analytics['success_rate'] = $row['total'] > 0 ? round(($row['delivered'] / $row['total']) * 100, 1) : 0;
    
    // Active dispatchers today
    $result = mysqli_query($idr, "SELECT COUNT(DISTINCT dispatcher_id) as count FROM dispatch_assignments WHERE DATE(created_at) = '$today'");
    $analytics['active_dispatchers'] = mysqli_fetch_assoc($result)['count'];
    
    // Status breakdown (last 7 days)
    $result = mysqli_query($idr, "SELECT status, COUNT(*) as count FROM dispatch_assignments 
        WHERE created_at >= DATE_SUB(NOW(), INTERVAL 7 DAY) 
        GROUP BY status");
    $analytics['status_breakdown'] = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $analytics['status_breakdown'][$row['status']] = $row['count'];
    }
    
    // Top dispatchers (last 30 days)
    
// Replace the "Top dispatchers (last 30 days)" section in your getAnalyticsData() function with this:

// Top dispatchers (last 30 days) - FIXED VERSION
$result = mysqli_query($idr, "SELECT 
    d.name_d, 
    d.idx as driver_id,
    COUNT(*) as total_assignments,
    SUM(CASE WHEN da.status = 'delivered' THEN 1 ELSE 0 END) as successful,
    ROUND(AVG(CASE WHEN da.actual_arrival IS NOT NULL AND da.estimated_arrival IS NOT NULL 
                  THEN TIMESTAMPDIFF(MINUTE, da.estimated_arrival, da.actual_arrival) 
                  ELSE NULL END), 1) as avg_delay_minutes
    FROM dispatch_assignments da
    INNER JOIN drivers d ON da.dispatcher_id = d.idx  -- Changed from LEFT to INNER JOIN
    WHERE da.created_at >= DATE_SUB(NOW(), INTERVAL 30 DAY)
      AND d.name_d IS NOT NULL  -- Exclude NULL names
      AND d.name_d != ''        -- Exclude empty names
    GROUP BY d.idx, d.name_d    -- Group by both ID and name to avoid duplicates
    HAVING total_assignments > 0
    ORDER BY successful DESC, total_assignments DESC
    LIMIT 5");

$analytics['top_dispatchers'] = [];
while ($row = mysqli_fetch_assoc($result)) {
    $success_rate = $row['total_assignments'] > 0 ? round(($row['successful'] / $row['total_assignments']) * 100, 1) : 0;
    $analytics['top_dispatchers'][] = [
        'name' => $row['name_d'],
        'driver_id' => $row['driver_id'],  // Added for debugging
        'total' => $row['total_assignments'],
        'successful' => $row['successful'],
        'success_rate' => $success_rate,
        'avg_delay' => $row['avg_delay_minutes']
    ];
}

    // Hourly distribution (last 7 days)
    $result = mysqli_query($idr, "SELECT HOUR(created_at) as hour, COUNT(*) as count 
        FROM dispatch_assignments 
        WHERE created_at >= DATE_SUB(NOW(), INTERVAL 7 DAY) 
        GROUP BY HOUR(created_at) 
        ORDER BY hour");
    $analytics['hourly_distribution'] = array_fill(0, 24, 0);
    while ($row = mysqli_fetch_assoc($result)) {
        $analytics['hourly_distribution'][$row['hour']] = $row['count'];
    }
    
    // Daily trend (last 14 days)
    $result = mysqli_query($idr, "SELECT DATE(created_at) as date, 
        COUNT(*) as total,
        SUM(CASE WHEN status = 'delivered' THEN 1 ELSE 0 END) as delivered
        FROM dispatch_assignments 
        WHERE created_at >= DATE_SUB(NOW(), INTERVAL 14 DAY) 
        GROUP BY DATE(created_at) 
        ORDER BY date");
    $analytics['daily_trend'] = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $analytics['daily_trend'][] = [
            'date' => $row['date'],
            'total' => $row['total'],
            'delivered' => $row['delivered']
        ];
    }
    
    // Average delivery time
    $result = mysqli_query($idr, "SELECT 
        AVG(TIMESTAMPDIFF(MINUTE, created_at, actual_arrival)) as avg_delivery_time
        FROM dispatch_assignments 
        WHERE status = 'delivered' AND actual_arrival IS NOT NULL
        AND created_at >= DATE_SUB(NOW(), INTERVAL 30 DAY)");
    $row = mysqli_fetch_assoc($result);
    $analytics['avg_delivery_time'] = round($row['avg_delivery_time'] ?? 0, 1);
    
    return $analytics;
}

$analytics = getAnalyticsData($idr);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script type="text/javascript" src="js/test371.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dispatcher Assignment Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
   
   
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <style>
    .btn-gradient-danger {
    background: linear-gradient(45deg, #ff6b6b, #ee5a24);
    color: white;
    border: none;
    transition: all 0.3s ease;
    }

    .btn-gradient-danger:hover {
        background: linear-gradient(45deg, #ee5a24, #ff6b6b);
        transform: translateY(-1px);
        box-shadow: 0 4px 8px rgba(238, 90, 36, 0.3);
        color: white;
    }
   
    </style>


    <style>
        .status-pending { background-color: #fff3cd; }
        .status-assigned { background-color: #d1ecf1; }
        .status-in_transit { background-color: #d4edda; }
        .status-delivered { background-color: #f8d7da; }
        .status-failed { background-color: #f5c6cb; }
        .card { margin-bottom: 20px; }
        .table { font-size: 0.9em; }
        .analytics-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-radius: 10px;
        }
        .metric-card {
            border-left: 4px solid;
            background: white;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .metric-value {
            font-size: 2em;
            font-weight: bold;
        }
        .metric-change {
            font-size: 0.9em;
        }
        .chart-container {
            position: relative;
            height: 300px;
        }
        .delete-section {
            background-color: #ffe6e6;
            border-left: 4px solid #dc3545;
            padding: 15px;
            margin: 10px 0;
        }
        .danger-zone {
            border: 2px dashed #dc3545;
            background-color: #ffeaea;
        }
        .nav-tabs .nav-link.active {
            background-color: #667eea;
            color: white;
            border-color: #667eea;
        }
    </style>

   <script>
    function quit(){
    window.close();
 }
   </script>

</head>
<body>
<?php
include 'navbar.php';
?>
<div class="container-fluid mt-3">
    
    <?php if (isset($success_msg)): ?>
        <div class="alert alert-success alert-dismissible fade show">
            <?php echo $success_msg; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>
    
    <?php if (isset($error_msg)): ?>
        <div class="alert alert-danger alert-dismissible fade show">
            <?php echo $error_msg; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <!-- NEW: Analytics Dashboard -->
    <div class="card analytics-card">
        <div class="card-header">
            <h4 class="mb-0">📊 Business Analytics Dashboard</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <!-- Key Metrics -->
                <div class="col-md-3">
                    <div class="metric-card p-3 mb-3" style="border-left-color: #28a745;">
                        <div class="metric-value text-success"><?php echo $analytics['today_total']; ?></div>
                        <div>Today's Assignments</div>
                        <div class="metric-change">
                            <?php 
                            $change = $analytics['today_total'] - $analytics['yesterday_total'];
                            $change_class = $change >= 0 ? 'text-success' : 'text-danger';
                            $change_icon = $change >= 0 ? '▲' : '▼';
                            echo "<span class='$change_class'>$change_icon " . abs($change) . " from yesterday</span>";
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="metric-card p-3 mb-3" style="border-left-color: #17a2b8;">
                        <div class="metric-value text-info"><?php echo $analytics['success_rate']; ?>%</div>
                        <div>Success Rate (30 days)</div>
                        <div class="metric-change text-muted">Delivered assignments</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="metric-card p-3 mb-3" style="border-left-color: #ffc107;">
                        <div class="metric-value text-warning"><?php echo $analytics['active_dispatchers']; ?></div>
                        <div>Active Dispatchers</div>
                        <div class="metric-change text-muted">Working today</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="metric-card p-3 mb-3" style="border-left-color: #6f42c1;">
                        <div class="metric-value text-primary"><?php echo $analytics['avg_delivery_time']; ?> min</div>
                        <div>Avg Delivery Time</div>
                        <div class="metric-change text-muted">Last 30 days</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Analytics Tabs -->
    <div class="card">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs" id="analyticsTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="performance-tab" data-bs-toggle="tab" data-bs-target="#performance" type="button">Performance</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="trends-tab" data-bs-toggle="tab" data-bs-target="#trends" type="button">Trends</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="dispatchers-tab" data-bs-toggle="tab" data-bs-target="#dispatchers" type="button">Drivers</button>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content" id="analyticsTabContent">
                <!-- Performance Tab -->
                <div class="tab-pane fade show active" id="performance" role="tabpanel">
                    <div class="row">
                        <div class="col-md-6">
                            <h6>Status Distribution (Last 7 Days)</h6>
                            <div class="chart-container">
                                <canvas id="statusChart"></canvas>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h6>Hourly Activity (Last 7 Days)</h6>
                            <div class="chart-container">
                                <canvas id="hourlyChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Trends Tab -->
                <div class="tab-pane fade" id="trends" role="tabpanel">
                    <div class="row">
                        <div class="col-12">
                            <h6>Daily Assignment Trend (Last 14 Days)</h6>
                            <div class="chart-container">
                                <canvas id="trendChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Dispatchers Tab -->
                <div class="tab-pane fade" id="dispatchers" role="tabpanel">
                    <h6>Top Performing Drivers (Last 30 Days)</h6>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>Driver</th>
                                    <th>Total Assignments</th>
                                    <th>Successful</th>
                                    <th>Success Rate</th>
                                    <th>Avg Delay</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($analytics['top_dispatchers'] as $dispatcher): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($dispatcher['name']); ?></td>
                                    <td><?php echo $dispatcher['total']; ?></td>
                                    <td><?php echo $dispatcher['successful']; ?></td>
                                    <td>
                                        <?php
                                        $rate = $dispatcher['success_rate'];
                                        $badge_class = $rate >= 90 ? 'success' : ($rate >= 70 ? 'warning' : 'danger');
                                        echo "<span class='badge bg-$badge_class'>{$rate}%</span>";
                                        ?>
                                    </td>
                                    <td>
                                        <?php 
                                        $delay = $dispatcher['avg_delay'];
                                        if ($delay !== null) {
                                            $delay_class = $delay <= 0 ? 'text-success' : ($delay <= 15 ? 'text-warning' : 'text-danger');
                                            echo "<span class='$delay_class'>" . ($delay > 0 ? '+' : '') . $delay . " min</span>";
                                        } else {
                                            echo '<span class="text-muted">N/A</span>';
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Create New Assignment -->
    <div class="card">
        <div class="card-header">
            <h5>Create New Driver Assignment</h5>
        </div>
        <div class="card-body">
            <form method="POST">
                <div class="row">
                    <div class="col-md-3">
                        <label class="form-label">Client</label>
                        <select name="client_id" class="form-select" required>
                            <option value="<?php echo $id?>"><?php echo $name." ". $lname." ".$ui ?></option>
                            <?php
                            $clients = mysqli_query($idr, "SELECT id, CONCAT(nom, ' ', prenom) as name, number FROM client ORDER BY nom");
                            while ($client = mysqli_fetch_assoc($clients)) {
                                echo "<option value='{$client['id']}'>{$client['name']} ({$client['number']})</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Order ID (Optional)</label>
                        <input type="number" name="order_id" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Driver</label>
                        <select name="dispatcher_id" class="form-select" required>
                            <option value="">Select Driver</option>
                            <?php
                            $dispatchers = mysqli_query($idr, "SELECT idx, name_d FROM drivers ORDER BY name_d");
                            while ($dispatcher = mysqli_fetch_assoc($dispatchers)) {
                                echo "<option value='{$dispatcher['idx']}'>{$dispatcher['name_d']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select">
                            <option value="pending">Pending</option>
                            <option value="assigned">Assigned</option>
                            <option value="in_transit">In Transit</option>
                            <option value="delivered">Delivered</option>
                            <option value="failed">Failed</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Estimated Arrival</label>
                        <input type="datetime-local" name="estimated_arrival" class="form-control">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <label class="form-label">Order</label>
                        <textarea name="delivery_address" class="form-control" rows="2" required></textarea>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Delivery Instructions</label>
                        <textarea name="delivery_instructions" class="form-control" rows="2"></textarea>
                    </div>
                </div>
                <div class="mt-3">
                    <button type="submit" name="create_assignment" class="btn btn-primary">Create Assignment</button>
                </div>
            </form>
        </div>
    </div>
    <?php
    // When creating a dispatch assignment, add location tracking
$stmt = $idr->prepare("UPDATE dispatch_assignments 
    SET gps_latitude = ?, gps_longitude = ? 
    WHERE id = ?");
$stmt->bind_param("ddi", $latitude, $longitude, $assignment_id);
?>
    <?php
// Add this variable to store the latest assignment details
$latest_assignment_order = "";
$latest_assignment_instructions = "";

// If an assignment was just created, get the order details
if (isset($success_msg) && strpos($success_msg, 'Assignment created') !== false) {
    $latest_assignment_order = $_POST['delivery_address'] ?? '';
    $latest_assignment_instructions = $_POST['delivery_instructions'] ?? '';
}

// Your existing WhatsApp section - UPDATED
?>
<!-- Replace the WhatsApp section in your dispatcher_assignments.php with this: -->

<div style="padding: 15px; background: lightgreen; margin: 10px;">
    <h4>Send Assignment via WhatsApp (Auto-Selected Driver)</h4>
    
    <div id="whatsappSectionContent" style="display: none;">
        <div style="margin-bottom: 10px;">
            <label><strong>Selected Driver:</strong></label>
            <input type="text" id="selectedDriverName" readonly style="padding: 8px; width: 250px; background: #f0f0f0;">
            <input type="hidden" id="selectedDriverId">
        </div>
        
        <!-- Main Assignment Message -->
        <div style="margin-bottom: 15px;">
            <strong>STEP 1: Assignment Details</strong>
            <textarea id="assignmentMessage" readonly style="width: 80%; height: 120px; font-family: monospace; padding: 8px;"><?php
$msg = "";

if (isset($simple_address) && !empty($simple_address)) {
    $msg .= "CLIENT ADDRESS:\n" . $simple_address . "\n\n";
}

if (isset($_POST['delivery_address']) && !empty($_POST['delivery_address'])) {
    $msg .= "ORDER DETAILS:\n" . $_POST['delivery_address'] . "\n\n";
}

if (isset($_POST['delivery_instructions']) && !empty($_POST['delivery_instructions'])) {
    $msg .= "DELIVERY INSTRUCTIONS:\n" . $_POST['delivery_instructions'] . "\n\n";
}

if (isset($simple_address) && !empty($simple_address)) {
    $link = "https://maps.google.com/maps?q=" . urlencode($simple_address);
    $msg .= "Google Maps Link:\n" . $link;
}

echo $msg;
?></textarea>
            
            <button onclick="copyAssignment()" id="copyAssignmentBtn"
                    style="background: green; color: white; padding: 10px; border: none; display: block; margin-top: 5px;">
                Copy Assignment Message
            </button>
        </div>
        
        <!-- Tracking Link Section >
        <div   id="trackingSection" style="background: lightyellow; padding: 15px; border: 2px solid blue;">
            <strong>STEP 2: Driver Tracking Link (FIXED FOR WHATSAPP)</strong><br>
            <span style="font-size: 12px; color: red;">Send this as a SEPARATE message to the driver:</span>
            
            <div style="margin: 10px 0;">
                <input type="text" id="trackingUrl" readonly style="width: 70%; padding: 8px; font-size: 14px;">
                <button onclick="copyTrackingUrl()" style="background: blue; color: white; padding: 8px; border: none;">
                    Copy Tracking Link
                </button>
            </div>
            
            < WhatsApp-optimized message >
            <div style="margin-top: 10px; background: #e8f5e8; padding: 10px;display: none; border: 1px solid green;">
                <strong>WhatsApp-Ready Message (Clickable Link):</strong><br>
                <textarea id="whatsappOptimizedMessage" readonly style="width: 100%; height: 80px; font-size: 12px;"></textarea>
                <button onclick="copyOptimizedMessage()" style="background: green; color: white; padding: 5px; border: none; margin-top: 5px;">
                    Copy WhatsApp Message
                </button>
            </div>
        </div-->
        
        <!-- Tracking Link Section - SEPARATED URL AND ID -->
<div id="trackingSection" style="background: lightyellow; padding: 15px; border: 2px solid blue; border-radius: 8px;">
    <strong style="font-size: 16px; color: #333;">STEP 2: Driver Tracking Information (SEPARATED FOR EASY COPY)</strong><br>
    <span style="font-size: 12px; color: red; font-weight: bold;">⚠️ Send these as SEPARATE messages to the driver:</span>
    
    <!-- Base URL Input -->
    <div style="margin: 15px 0; padding: 12px; background: #e8f5e8; border: 2px solid green; border-radius: 5px;">
        <label style="font-weight: bold; display: block; margin-bottom: 8px; color: green;">
            📱 App URL (Copy this FIRST):
        </label>
        <div style="display: flex; align-items: center; gap: 10px;">
            <input type="text" id="baseTrackingUrl" readonly 
                   style="flex: 1; padding: 10px; font-size: 14px; font-family: 'Courier New', monospace; 
                          border: 2px solid green; border-radius: 4px; background: white;">
            <button onclick="copyBaseUrl()" 
                    style="background: green; color: white; padding: 10px 20px; border: none; 
                           border-radius: 4px; cursor: pointer; font-weight: bold; white-space: nowrap;">
                📋 Copy URL
            </button>
        </div>
        <div style="margin-top: 8px; font-size: 11px; color: #666; padding: 5px; background: #f0f0f0; border-radius: 3px;">
            ℹ️ <strong>Driver Action:</strong> Paste this in the app's "Enter Ngrok URL" field
        </div>
    </div>
    
    <!-- Driver ID Input -->
    <div style="margin: 15px 0; padding: 12px; background: #fff3e6; border: 2px solid orange; border-radius: 5px;">
        <label style="font-weight: bold; display: block; margin-bottom: 8px; color: orange;">
            🔑 Driver ID (Copy this SECOND):
        </label>
        <div style="display: flex; align-items: center; gap: 10px;">
            <input type="text" id="driverIdOnly" readonly 
                   style="flex: 1; padding: 10px; font-size: 20px; font-weight: bold; 
                          font-family: 'Courier New', monospace; text-align: center;
                          border: 2px solid orange; border-radius: 4px; background: white; color: #ff6600;">
            <button onclick="copyDriverId()" 
                    style="background: orange; color: white; padding: 10px 20px; border: none; 
                           border-radius: 4px; cursor: pointer; font-weight: bold; white-space: nowrap;">
                📋 Copy ID
            </button>
        </div>
        <div style="margin-top: 8px; font-size: 11px; color: #666; padding: 5px; background: #f0f0f0; border-radius: 3px;">
            ℹ️ <strong>Driver Action:</strong> Enter this in the app's "Driver ID" field
        </div>
    </div>
    
    <!-- WhatsApp Message Preview -->
    <div style="margin-top: 20px; background: #e8f5e8; padding: 12px; border: 2px solid #25D366; border-radius: 5px;">
        <strong style="color: #25D366;">📨 Complete WhatsApp Message (Pre-formatted with Instructions):</strong><br>
        <span style="font-size: 11px; color: #666;">This message contains both URL and ID with step-by-step instructions</span>
        <textarea id="whatsappOptimizedMessage" readonly 
                  style="width: 100%; height: 180px; font-size: 12px; font-family: 'Courier New', monospace; 
                         margin-top: 8px; padding: 10px; border: 1px solid #25D366; border-radius: 4px;"></textarea>
        <button onclick="copyOptimizedMessage()" 
                style="background: #25D366; color: white; padding: 10px 20px; border: none; 
                       border-radius: 4px; margin-top: 8px; cursor: pointer; font-weight: bold;">
            📋 Copy Complete WhatsApp Message
        </button>
    </div>
    
    <!-- Action Buttons -->
    <div style="margin-top: 20px; padding-top: 15px; border-top: 2px dashed #ccc;">
        <button onclick="openWhatsApp()" 
                style="background: #25D366; color: white; padding: 12px 24px; border: none; 
                       border-radius: 5px; font-size: 15px; cursor: pointer; font-weight: bold;">
            💬 Open WhatsApp Web
        </button>
        
        <div style="margin-top: 10px; font-size: 12px; color: #666; background: #f9f9f9; padding: 10px; border-radius: 5px;">
            <strong>📋 Recommended Workflow:</strong><br>
            1️⃣ Copy assignment details (STEP 1) → Send to driver<br>
            2️⃣ Copy complete WhatsApp message → Send to driver<br>
            3️⃣ Driver copies URL and ID separately from the message and enters them in the app
        </div>
    </div>
</div>



        <div style="margin-top: 15px;">
            <button onclick="openWhatsApp()" style="background: darkgreen; color: white; padding: 12px; border: none;">
                Open WhatsApp Web
            </button>
            
            <!--span style="margin-left: 15px; font-size: 12px; color: blue;">
                Workflow: Copy assignment → Send → Copy WhatsApp message → Send as separate message
            </span-->
        </div>
    </div>
    
    <div id="noDriverSelected" style="padding: 20px; background: #ffe6e6; border: 1px solid red;">
        <p><strong>Please create an assignment first to automatically select a driver for WhatsApp messaging.</strong></p>
    </div>
</div>

<script>
// Global variable to store current tracking URL
let currentTrackingUrl = 'https://8d9285c2f0dc.ngrok-free.app'; // fallback URL

// Fetch current tracking URL from server
async function fetchCurrentTrackingUrl() {
    try {
        const response = await fetch('get_tracking_url.php');
        const data = await response.json();
        if (data.success && data.url) {
            currentTrackingUrl = data.url;
            console.log('Updated tracking URL:', currentTrackingUrl);
            return true;
        }
    } catch (error) {
        console.error('Failed to fetch tracking URL:', error);
    }
    return false;
}

// Initialize tracking URL when page loads
document.addEventListener('DOMContentLoaded', function() {
    fetchCurrentTrackingUrl();
    
    // Check if assignment was just created by looking for success message
    const successAlert = document.querySelector('.alert-success');
    if (successAlert && successAlert.textContent.includes('Assignment created successfully')) {
        // Get the selected driver from the form
        const driverSelect = document.querySelector('select[name="dispatcher_id"]');
        if (driverSelect && driverSelect.value) {
            const driverId = driverSelect.value;
            const driverName = driverSelect.options[driverSelect.selectedIndex].text;
            
            // Auto-populate WhatsApp section
            setupWhatsAppForDriver(driverId, driverName);
        }
    }
});

function setupWhatsAppForDriver(driverId, driverName) {
    // Set driver info
    document.getElementById('selectedDriverId').value = driverId;
    document.getElementById('selectedDriverName').value = driverName;
    
    // Generate BASE URL (just the ngrok URL, no /driver_mobile.php)
    let baseUrl = currentTrackingUrl;
    
    // Fallback for local development
    const host = window.location.host;
    if (host.includes('localhost') || host.includes('127.0.0.1')) {
        const path = window.location.pathname.replace('dispatcher_assignments.php', '');
        baseUrl = 'https://192.168.16.103' + path;  // Also removed driver_mobile.php here
    }
    
    // Update the SEPARATED fields
    document.getElementById('baseTrackingUrl').value = baseUrl;
    document.getElementById('driverIdOnly').value = driverId;
    
    // Create WhatsApp message with separated instructions
    const whatsappMessage = createSeparatedWhatsAppMessage(driverName, baseUrl, driverId);
    document.getElementById('whatsappOptimizedMessage').value = whatsappMessage;
    
    // Show WhatsApp section, hide "no driver" message
    document.getElementById('whatsappSectionContent').style.display = 'block';
    document.getElementById('noDriverSelected').style.display = 'none';
}

// Also add this function to manually trigger WhatsApp setup for existing assignments
function setupWhatsAppFromTable(driverId, driverName) {
    setupWhatsAppForDriver(driverId, driverName);
    
    // Scroll to WhatsApp section smoothly
    document.querySelector('#whatsappSectionContent').scrollIntoView({ 
        behavior: 'smooth',
        block: 'start'
    });
    
    // Optional: Flash the WhatsApp section to draw attention
    const whatsappSection = document.getElementById('whatsappSectionContent');
    whatsappSection.style.border = '3px solid #25D366';
    setTimeout(() => {
        whatsappSection.style.border = '';
    }, 2000);
}

function copyAssignment() {
    document.getElementById('assignmentMessage').select();
    document.execCommand('copy');
    
    // Visual feedback
    const btn = document.getElementById('copyAssignmentBtn');
    const originalText = btn.innerHTML;
    btn.innerHTML = 'Copied!';
    btn.style.background = 'darkgreen';
    
    setTimeout(() => {
        btn.innerHTML = originalText;
        btn.style.background = 'green';
    }, 2000);
    
    alert('Assignment details copied! Paste this in WhatsApp first.');
}

function copyTrackingUrl() {
    // This function is now replaced by copyBaseUrl()
    // Redirect to the new function
    copyBaseUrl();
}

function copyOptimizedMessage() {
    document.getElementById('whatsappOptimizedMessage').select();
    document.execCommand('copy');
    
    alert('✅ WhatsApp-optimized message copied!\n\nThis version should show as a clickable link in WhatsApp.');
}

function openWhatsApp() {
    window.open('https://web.whatsapp.com/', '_blank');
}

// Optional: Add refresh function for manual URL updates
function refreshTrackingUrl() {
    fetchCurrentTrackingUrl().then(success => {
        if (success) {
            alert('Tracking URL refreshed successfully!');
        } else {
            alert('Failed to refresh tracking URL. Using fallback.');
        }
    });
}
</script>

    <!-- NEW: Delete Section -->
<div class="card danger-zone">
    <div class="card-header bg-danger text-white">
        <h5>⚠️ Delete Assignments - DANGER ZONE</h5>
    </div>
    <div class="card-body delete-section">
        <div class="alert alert-warning">
            <strong>WARNING:</strong> Deletion is permanent and cannot be undone. Please be careful!
        </div>
        
        <!-- Delete by Date Range -->
        <form method="POST" onsubmit="return confirmBulkDelete()">
            <h6>Delete All Assignments by Date Range</h6>
            <div class="row">
                <div class="col-md-3">
                    <label class="form-label">Delete From Date</label>
                    <input type="date" name="delete_from_date" class="form-control" required>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Delete To Date</label>
                    <input type="date" name="delete_to_date" class="form-control" required>
                </div>
                 <div class="col-md-6 d-flex align-items-end">
                    <button type="button" class="btn btn-warning me-2" onclick="previewDelete()">
                        Preview Records to Delete
                    </button>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="confirm_delete" id="confirmDelete" required>
                        <label class="form-check-label text-danger" for="confirmDelete">
                            <strong>I understand this will permanently delete all assignments in the selected date range</strong>
                        </label>
                    </div>
                </div>
            </div>
            <div class="mt-3">
                <button type="submit" name="delete_by_date_range" class="btn btn-danger">
                    🗑️ DELETE ASSIGNMENTS BY DATE RANGE
                </button>
            </div>
        </form>
        
        <hr class="my-4">
        
        <!-- Delete ALL and Reset ID -->
        <form method="POST" onsubmit="return confirmDeleteAllReset()">
            <h6 class="text-danger">🔥 Delete ALL Assignments and Reset ID Counter</h6>
            <div class="alert alert-danger">
                <strong>⚠️ EXTREME CAUTION:</strong> This will delete EVERY assignment record in the database and reset the ID counter to 0. The next assignment created will have ID 1.
            </div>
            
            <div class="row">
                <div class="col-12">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="confirm_delete_all" id="confirmDeleteAll" required>
                        <label class="form-check-label text-danger" for="confirmDeleteAll">
                            <strong>I understand this will PERMANENTLY DELETE ALL assignments and reset the ID counter. This cannot be undone!</strong>
                        </label>
                    </div>
                </div>
            </div>
            
            <div class="mt-3">
                <button type="submit" name="delete_all_reset_id" class="btn btn-danger btn-lg">
                    💥 DELETE ALL & RESET ID TO 0
                </button>
                <small class="text-muted d-block mt-2">
                    This is a nuclear option - use only when you want to completely clear the assignment history
                </small>
            </div>
        </form>
    </div>
</div>

    <!-- Preview Results Modal -->
    <div class="modal fade" id="previewDeleteModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title">Preview: Records to be Deleted</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div id="previewContent">
                        <!-- Preview content will be loaded here -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close Preview</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Filters -->
    <div class="card">
        <div class="card-header">
            <h5>Filter & Reports</h5>
        </div>
        <div class="card-body">
            <form method="GET">
    <!-- Add hidden inputs for page and page1 parameters -->
    <input type="hidden" name="page" value="<?php echo htmlspecialchars($_GET['page'] ?? ''); ?>">
    <input type="hidden" name="page1" value="<?php echo htmlspecialchars($_GET['page1'] ?? ''); ?>">
    
    <div class="row">
        <div class="col-md-2">
            <label class="form-label">Date From</label>
            <input type="date" name="date_from" class="form-control" value="<?php echo $filter_date_from; ?>">
        </div>
        <div class="col-md-2">
            <label class="form-label">Date To</label>
            <input type="date" name="date_to" class="form-control" value="<?php echo $filter_date_to; ?>">
        </div>
        <div class="col-md-2">
            <label class="form-label">Client</label>
            <select name="client_id" class="form-select">
                <option value="">All Clients</option>
                <?php
                $clients = mysqli_query($idr, "SELECT id, CONCAT(nom, ' ', prenom) as name, number FROM client ORDER BY nom");
                while ($client = mysqli_fetch_assoc($clients)) {
                    $selected = ($filter_client_id == $client['id']) ? 'selected' : '';
                    echo "<option value='{$client['id']}' $selected>{$client['name']} {$client['number']}</option>";
                }
                ?>
            </select>
        </div>
        <div class="col-md-2">
            <label class="form-label">Driver</label>
            <select name="dispatcher_id" class="form-select">
                <option value="">All Drivers</option>
                <?php
                $dispatchers = mysqli_query($idr, "SELECT idx, name_d FROM drivers ORDER BY name_d");
                while ($dispatcher = mysqli_fetch_assoc($dispatchers)) {
                    $selected = ($filter_dispatcher_id == $dispatcher['idx']) ? 'selected' : '';
                    echo "<option value='{$dispatcher['idx']}' $selected>{$dispatcher['name_d']}</option>";
                }
                ?>
            </select>
        </div>
        <div class="col-md-2">
            <label class="form-label">Status</label>
            <select name="status" class="form-select">
                <option value="">All Status</option>
                <option value="pending" <?php echo ($filter_status == 'pending') ? 'selected' : ''; ?>>Pending</option>
                <option value="assigned" <?php echo ($filter_status == 'assigned') ? 'selected' : ''; ?>>Assigned</option>
                <option value="in_transit" <?php echo ($filter_status == 'in_transit') ? 'selected' : ''; ?>>In Transit</option>
                <option value="delivered" <?php echo ($filter_status == 'delivered') ? 'selected' : ''; ?>>Delivered</option>
                <option value="failed" <?php echo ($filter_status == 'failed') ? 'selected' : ''; ?>>Failed</option>
            </select>
        </div>
        <?php
        $clearUrl = "test204.php?page=" . urlencode($_SESSION['oop']) . "&page1=" . urlencode($_SESSION['ooq']);
        $dispatch = "dispatcher_assignments.php?page=" . $_SESSION['oop'] . "&page1=" . $_SESSION['ooq'];
        ?>
        <div class="col-md-3 d-flex align-items-end gap-2">
    <button type="submit" class="btn btn-primary">
        <i class="fas fa-filter me-1"></i> Apply Filters
    </button>
    <a href="<?php echo $dispatch; ?>" class="btn btn-light border">
        <i class="fas fa-eraser me-1"></i> Clear
    </a>
    <a href="<?php echo $clearUrl; ?>" class="btn btn-gradient-danger">
        <i class="fas fa-sign-out-alt me-1"></i> Exit
    </a>
    
   
</div>
        
    </div>
</form>
        </div>
    </div>

   
    
    

    
    <!-- Assignments List -->
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h5>Delivery Assignments</h5>
            <button onclick="exportToCSV()" class="btn btn-success btn-sm">Export to CSV</button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover" id="assignmentsTable">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Client</th>
                            <th>Phone</th>
                            <th>Driver</th>
                            <th>Order</th>
                            <th>Instructions</th>
                            <th>Status</th>
                            <th>Est. Arrival</th>
                            <th>Actual Arrival</th>
                            <th>Created</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr class="status-<?php echo $row['status']; ?>">
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo htmlspecialchars($row['client_name']); ?></td>
                            <td><?php echo htmlspecialchars($row['client_phone']); ?></td>
                            <td><?php echo htmlspecialchars($row['dispatcher_name']); ?></td>
                            <td title="<?php echo htmlspecialchars($row['delivery_address']); ?>">
                                <?php echo htmlspecialchars(substr($row['delivery_address'], 0, 50) . '...'); ?>
                            </td>
                            <td title="<?php echo htmlspecialchars($row['delivery_instructions']); ?>">
                                <?php echo htmlspecialchars(substr($row['delivery_instructions'], 0, 30) . '...'); ?>
                            </td>
                            <td>
                               <?php
                                $status_classes = [
                                    'pending'    => 'warning',
                                    'assigned'   => 'info',
                                    'in_transit' => 'primary',
                                    'delivered'  => 'success',
                                    'failed'     => 'danger'
                                ];

                                $badge_class = isset($status_classes[$row['status']]) ? $status_classes[$row['status']] : 'secondary';
                                ?>
                                <span class="badge bg-<?php echo $badge_class; ?>">
                                    <?php echo ucfirst(str_replace('_', ' ', $row['status'])); ?>
                                </span>
                            </td>
                            <td><?php echo $row['estimated_arrival'] ? date('M j, g:i A', strtotime($row['estimated_arrival'])) : '-'; ?></td>
                            <td><?php echo $row['actual_arrival'] ? date('M j, g:i A', strtotime($row['actual_arrival'])) : '-'; ?></td>
                            <td><?php echo date('M j, g:i A', strtotime($row['created_at'])); ?></td>
                            <td>
    <button class="btn btn-sm btn-outline-primary" onclick="updateStatus(<?php echo $row['id']; ?>, '<?php echo $row['status']; ?>')">
        Update
    </button>
    <button class="btn btn-sm btn-outline-success" onclick="setupWhatsAppFromTable(<?php echo $row['dispatcher_id']; ?>, '<?php echo htmlspecialchars($row['dispatcher_name']); ?>')">
        WhatsApp
    </button>
    <button class="btn btn-sm btn-outline-danger" onclick="deleteSingleAssignment(<?php echo $row['id'] ?>)">
        Delete
    </button>
</td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Update Status Modal -->
<div class="modal fade" id="updateStatusModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST">
                <div class="modal-header">
                    <h5 class="modal-title">Update Assignment Status</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="assignment_id" id="modal_assignment_id">
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="new_status" id="modal_status" class="form-select" required>
                            <option value="pending">Pending</option>
                            <option value="assigned">Assigned</option>
                            <option value="in_transit">In Transit</option>
                            <option value="delivered">Delivered</option>
                            <option value="failed">Failed</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Actual Arrival (for delivered/failed)</label>
                        <input type="datetime-local" name="actual_arrival" id="modal_actual_arrival" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" name="update_status" class="btn btn-primary">Update Status</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Single Assignment Modal -->
<div class="modal fade" id="deleteSingleModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title">Delete Assignment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="assignment_id" id="delete_assignment_id">
                    <div class="alert alert-warning">
                        <strong>Warning:</strong> This action cannot be undone!
                    </div>
                    <p>Are you sure you want to delete this assignment for client: <strong id="delete_client_name"></strong>?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" name="delete_single_assignment" class="btn btn-danger">Delete Assignment</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Clear Assignments Section -->
<div class="card" style="border: 2px solid #28a745;">
    <div class="card-header bg-success text-white">
        <h5>🔧 Fix Driver Status - Clear Completed Assignments</h5>
    </div>
    <div class="card-body" style="background-color: #f8fff8;">
        <div class="alert alert-info">
            <strong>What this does:</strong> This will clear assignment IDs from drivers who have completed deliveries (delivered/failed status). 
            This fixes the issue where drivers always show as "busy" in live tracking.
        </div>
        
        <div class="alert alert-warning">
            <strong>Safe Operation:</strong> This only affects completed assignments and will not disrupt active deliveries.
        </div>
        
        <form method="POST" onsubmit="return confirmClearAssignments()">
            <div class="row">
                <div class="col-12">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="confirm_clear" id="confirmClear" required>
                        <label class="form-check-label text-success" for="confirmClear">
                            <strong>I understand this will clear assignment IDs for drivers with completed deliveries</strong>
                        </label>
                    </div>
                </div>
            </div>
            <div class="mt-3">
                <button type="submit" name="clear_assignments" class="btn btn-success">
                    🔧 Clear Completed Assignments (Fix Driver Status)
                </button>
                <small class="text-muted d-block mt-2">
                    This will help fix drivers showing as "always busy" in live tracking
                </small>
            </div>
        </form>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
// Initialize Charts when page loads
document.addEventListener('DOMContentLoaded', function() {
    initializeCharts();
});

function initializeCharts() {
    // Status Distribution Chart
    const statusData = <?php echo json_encode($analytics['status_breakdown']); ?>;
    const statusLabels = Object.keys(statusData).map(status => status.charAt(0).toUpperCase() + status.slice(1).replace('_', ' '));
    const statusValues = Object.values(statusData);
    
    new Chart(document.getElementById('statusChart'), {
        type: 'doughnut',
        data: {
            labels: statusLabels,
            datasets: [{
                data: statusValues,
                backgroundColor: ['#ffc107', '#17a2b8', '#007bff', '#28a745', '#dc3545'],
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });

    // Hourly Distribution Chart
    const hourlyData = <?php echo json_encode($analytics['hourly_distribution']); ?>;
    const hourLabels = Array.from({length: 24}, (_, i) => i + ':00');
    
    new Chart(document.getElementById('hourlyChart'), {
        type: 'bar',
        data: {
            labels: hourLabels,
            datasets: [{
                label: 'Assignments',
                data: hourlyData,
                backgroundColor: 'rgba(102, 126, 234, 0.6)',
                borderColor: 'rgba(102, 126, 234, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1
                    }
                }
            }
        }
    });

    // Daily Trend Chart
    const trendData = <?php echo json_encode($analytics['daily_trend']); ?>;
    const trendLabels = trendData.map(item => {
        const date = new Date(item.date);
        return (date.getMonth() + 1) + '/' + date.getDate();
    });
    const totalData = trendData.map(item => item.total);
    const deliveredData = trendData.map(item => item.delivered);
    
    new Chart(document.getElementById('trendChart'), {
        type: 'line',
        data: {
            labels: trendLabels,
            datasets: [{
                label: 'Total Assignments',
                data: totalData,
                borderColor: 'rgba(102, 126, 234, 1)',
                backgroundColor: 'rgba(102, 126, 234, 0.1)',
                tension: 0.4
            }, {
                label: 'Delivered',
                data: deliveredData,
                borderColor: 'rgba(40, 167, 69, 1)',
                backgroundColor: 'rgba(40, 167, 69, 0.1)',
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1
                    }
                }
            }
        }
    });
}

function updateStatus(assignmentId, currentStatus) {
    document.getElementById('modal_assignment_id').value = assignmentId;
    document.getElementById('modal_status').value = currentStatus;
    
    // Clear the actual arrival field first
    document.getElementById('modal_actual_arrival').value = '';
    
    // Auto-fill time if status is delivered or failed
    if (currentStatus === 'delivered' || currentStatus === 'failed') {
        const now = new Date();
        now.setMinutes(now.getMinutes() - now.getTimezoneOffset());
        document.getElementById('modal_actual_arrival').value = now.toISOString().slice(0,16);
    }
    
    // Show the modal
    var updateModal = new bootstrap.Modal(document.getElementById('updateStatusModal'));
    updateModal.show();
}

// Add event listener for status change in modal
document.addEventListener('DOMContentLoaded', function() {
    const statusSelect = document.getElementById('modal_status');
    const actualArrivalInput = document.getElementById('modal_actual_arrival');
    
    if (statusSelect && actualArrivalInput) {
        statusSelect.addEventListener('change', function() {
            if (this.value === 'delivered' || this.value === 'failed') {
                // Set current time
                const now = new Date();
                now.setMinutes(now.getMinutes() - now.getTimezoneOffset());
                actualArrivalInput.value = now.toISOString().slice(0,16);
            } else {
                // Clear the field for other statuses
                actualArrivalInput.value = '';
            }
        });
    }
});

// Delete single assignment function
function deleteSingleAssignment(assignmentId) {
    // Get client name from the table row
    const row = event.target.closest('tr');
    const clientName = row.querySelector('td:nth-child(2)').textContent.trim();
    
    // Set the values in the modal form
    document.getElementById('delete_assignment_id').value = assignmentId;
    document.getElementById('delete_client_name').textContent = clientName;
    
    // Show the confirmation modal
    const deleteModal = new bootstrap.Modal(document.getElementById('deleteSingleModal'));
    deleteModal.show();
}

// Preview delete function
function previewDelete() {
    const fromDate = document.querySelector('input[name="delete_from_date"]').value;
    const toDate = document.querySelector('input[name="delete_to_date"]').value;
    
    if (!fromDate || !toDate) {
        alert('Please select both start and end dates');
        return;
    }
    
    loadPreviewData(fromDate, toDate);
}

function loadPreviewData(fromDate, toDate) {
    const previewContent = document.getElementById('previewContent');
    let content = `<h6>Assignments to be deleted from ${fromDate} to ${toDate}:</h6>`;
    
    // Get table rows and filter by date
    const tableRows = document.querySelectorAll('#assignmentsTable tbody tr');
    let matchingRows = 0;
    let previewTable = '<table class="table table-sm"><thead><tr><th>ID</th><th>Client</th><th>Dispatcher</th><th>Created Date</th></tr></thead><tbody>';
    
    // Convert filter dates to comparable format
    const filterFromDate = new Date(fromDate);
    const filterToDate = new Date(toDate);
    filterToDate.setHours(23, 59, 59, 999); // Include full end date
    
    tableRows.forEach(row => {
        const cells = row.querySelectorAll('td');
        if (cells.length > 0) {
            const createdDateText = cells[9].textContent.trim(); // Created date column
            
            // Parse the date - handle format like "Aug 25, 12:20 AM" or "Dec 31, 11:45 PM"
            let createdDate;
            try {
                // Add current year to the date string for proper parsing
                const currentYear = new Date().getFullYear();
                let dateWithYear = createdDateText;
                
                // Check if year is already included
                if (!/\d{4}/.test(createdDateText)) {
                    // Split by comma and add year
                    const parts = createdDateText.split(',');
                    if (parts.length >= 2) {
                        dateWithYear = `${parts[0]}, ${currentYear}${parts[1]}`;
                    } else {
                        dateWithYear = `${createdDateText}, ${currentYear}`;
                    }
                }
                
                createdDate = new Date(dateWithYear);
                
                if (!isNaN(createdDate.getTime())) {
                    // Compare dates (only date part, not time)
                    const createdDateOnly = new Date(createdDate.getFullYear(), createdDate.getMonth(), createdDate.getDate());
                    const filterFromDateOnly = new Date(filterFromDate.getFullYear(), filterFromDate.getMonth(), filterFromDate.getDate());
                    const filterToDateOnly = new Date(filterToDate.getFullYear(), filterToDate.getMonth(), filterToDate.getDate());
                    
                    if (createdDateOnly >= filterFromDateOnly && createdDateOnly <= filterToDateOnly) {
                        matchingRows++;
                        previewTable += `<tr class="table-warning">
                            <td>${cells[0].textContent}</td>
                            <td>${cells[1].textContent}</td>
                            <td>${cells[3].textContent}</td>
                            <td>${cells[9].textContent}</td>
                        </tr>`;
                    }
                }
            } catch (e) {
                console.error('Error parsing date:', createdDateText, e);
            }
        }
    });
    
    previewTable += '</tbody></table>';
    
    if (matchingRows > 0) {
        content += `<div class="alert alert-danger">
            <strong>⚠️ WARNING:</strong> Found ${matchingRows} assignment(s) that will be permanently deleted.
        </div>`;
        content += previewTable;
    } else {
        content += '<div class="alert alert-info">✅ No assignments found in the selected date range.</div>';
    }
    
    previewContent.innerHTML = content;
    
    // Show the modal
    const previewModal = new bootstrap.Modal(document.getElementById('previewDeleteModal'));
    previewModal.show();
}

// Confirmation function for bulk delete
function confirmBulkDelete() {
    const fromDate = document.querySelector('input[name="delete_from_date"]').value;
    const toDate = document.querySelector('input[name="delete_to_date"]').value;
    const confirmed = document.getElementById('confirmDelete').checked;
    
    if (!confirmed) {
        alert('Please check the confirmation box to proceed with deletion.');
        return false;
    }
    
    return confirm(`⚠️ FINAL CONFIRMATION ⚠️\n\nAre you absolutely sure you want to delete ALL assignments from ${fromDate} to ${toDate}?\n\nThis action cannot be undone!`);
}


// NEW: Confirmation function for delete all and reset ID
function confirmDeleteAllReset() {
    const confirmed = document.getElementById('confirmDeleteAll').checked;
    
    if (!confirmed) {
        alert('Please check the confirmation box to proceed with deleting all records.');
        return false;
    }
    
    const firstConfirm = confirm('🔥 CRITICAL WARNING 🔥\n\nYou are about to DELETE ALL assignment records and reset the ID counter.\n\nThis will:\n- Delete EVERY assignment in the database\n- Reset the auto-increment ID to 1\n- Cannot be undone\n\nAre you ABSOLUTELY SURE?');
    
    if (!firstConfirm) {
        return false;
    }
    
    // Second confirmation for extra safety
    const secondConfirm = confirm('⚠️ FINAL CONFIRMATION ⚠️\n\nThis is your last chance to cancel.\n\nClick OK to permanently delete ALL assignments and reset IDs.\nClick Cancel to abort.');
    
    return secondConfirm;
}



// CSV Export function
function exportToCSV() {
    const table = document.getElementById('assignmentsTable');
    const rows = table.querySelectorAll('tr');
    
    let csvContent = '';
    
    // Headers
    const headers = Array.from(rows[0].querySelectorAll('th')).slice(0, -1);
    csvContent += headers.map(h => h.textContent).join(',') + '\n';
    
    // Data rows
    for (let i = 1; i < rows.length; i++) {
        const cells = Array.from(rows[i].querySelectorAll('td')).slice(0, -1);
        csvContent += cells.map(c => {
            // Use title attribute if available, otherwise use displayed text
            const text = c.title || c.textContent;
            return '"' + text.replace(/"/g, '""') + '"';
        }).join(',') + '\n';
    }
    
    // Download
    const blob = new Blob([csvContent], { type: 'text/csv' });
    const url = window.URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.href = url;
    a.download = 'dispatcher_assignments_' + new Date().toISOString().slice(0,10) + '.csv';
    a.click();
    window.URL.revokeObjectURL(url);
}
</script>










<?php

   






function sendTrackingLinkToDriver($driverPhone, $driverName, $driverId) {
    $tracking_link = generateDriverTrackingLink($driverId, $driverName);
    
    $message = "Hi $driverName! Please use this link to share your location: $tracking_link";
    
    $whatsappUrl = 'https://wa.me/' . $driverPhone . '?text=' . urlencode($message);
    return $whatsappUrl;
}

?>


<script>
// WhatsApp Functions
function generateTrackingLink() {
    const driverId = document.getElementById('whatsappDriver').value;
    if (!driverId) {
        alert('Please select a driver first');
        return;
    }
    
    // Get driver info
    const driverOption = document.getElementById('whatsappDriver').options[document.getElementById('whatsappDriver').selectedIndex];
    const driverText = driverOption.text;
    const driverName = driverText.split(' (')[0]; // Remove phone number from name
    
    // Generate tracking link
    const trackingLink = window.location.origin + 
        window.location.pathname.replace('dispatcher_assignments.php', '') + 
        'driver_mobile.php?driver_id=' + driverId + '&driver_name=' + encodeURIComponent(driverName);
    
    // Display the link
    document.getElementById('generatedLink').innerHTML = `
        <a href="${trackingLink}" target="_blank">${trackingLink}</a>
        <button class="btn btn-sm btn-outline-secondary ms-2" onclick="copyLinkToClipboard('${trackingLink}')">
            <i class="fas fa-copy"></i>
        </button>
    `;
    
    // Generate WhatsApp message
    const assignmentDetails = {
        address: '<?php echo isset($simple_address) ? addslashes($simple_address) : ""; ?>',
        order: '<?php echo isset($latest_assignment["order"]) ? addslashes($latest_assignment["order"]) : ""; ?>',
        instructions: '<?php echo isset($latest_assignment["instructions"]) ? addslashes($latest_assignment["instructions"]) : ""; ?>'
    };
    
    let whatsappMessage = "Hi " + driverName + "! 👋\n\n";
    
    if (assignmentDetails.address) {
        whatsappMessage += "📦 *NEW DELIVERY ASSIGNMENT*\n\n";
        whatsappMessage += "📍 *Client Address:*\n" + assignmentDetails.address + "\n\n";
        
        if (assignmentDetails.order) {
            whatsappMessage += "📋 *Order Details:*\n" + assignmentDetails.order + "\n\n";
        }
        
        if (assignmentDetails.instructions) {
            whatsappMessage += "📝 *Delivery Instructions:*\n" + assignmentDetails.instructions + "\n\n";
        }
    }
    
    whatsappMessage += "🚚 *TRACKING LINK:*\n";
    whatsappMessage += "Click this link to start sharing your location:\n";
    whatsappMessage += trackingLink + "\n\n";
    whatsappMessage += "Please open this link on your phone and tap 'Start Tracking' to begin.";
    
    document.getElementById('whatsappMessage').value = whatsappMessage;
    
    // Show the section
    document.getElementById('trackingLinkSection').style.display = 'block';
    document.getElementById('sendWhatsAppBtn').disabled = false;
}

function sendViaWhatsApp() {
    const driverId = document.getElementById('whatsappDriver').value;
    if (!driverId) {
        alert('Please select a driver first');
        return;
    }
    
    // Get driver phone number
    const driverOption = document.getElementById('whatsappDriver').options[document.getElementById('whatsappDriver').selectedIndex];
    const driverText = driverOption.text;
    const phoneMatch = driverText.match(/\((\d+)\)/);
    
    if (!phoneMatch) {
        alert('Could not find phone number for this driver');
        return;
    }
    
    const phoneNumber = phoneMatch[1];
    const message = encodeURIComponent(document.getElementById('whatsappMessage').value);
    
    // Open WhatsApp
    window.open(`https://wa.me/${phoneNumber}?text=${message}`, '_blank');
}

</script>
<script type="text/javascript" src="js/test371.js"></script>

<input type="hidden" id="demo" value="<?php echo $nam ?>"></input>
<input type="hidden" id="demo1" value="<?php echo $idf ?>"></input>
<input type="hidden" id="demo2" value="<?php echo $inc ?>"></input>
<input type="hidden" id="demo3" value="<?php echo $contact ?>"></input>

<script>
const global = document.getElementById("demo").value;
const global1 = document.getElementById("demo1").value;
const global2 = document.getElementById("demo2").value;
const global3 = document.getElementById("demo3").value;
</script>

<script>
// Add this JavaScript function to the existing script section

function confirmClearAssignments() {
    const confirmed = document.getElementById('confirmClear').checked;
    
    if (!confirmed) {
        alert('Please check the confirmation box to proceed.');
        return false;
    }
    
    return confirm('This will clear assignment IDs for drivers with completed deliveries.\n\nThis is safe and will help fix the "always busy" status issue.\n\nProceed?');
}
</script>

<script>
function createSeparatedWhatsAppMessage(driverName, baseUrl, driverId) {
    let message = `Hi ${driverName}! 👋\n\n`;
    message += `🚚 NEW DELIVERY ASSIGNMENT\n\n`;
    message += `Please follow these steps to start tracking:\n\n`;
    
    message += `📱 STEP 1: Open Driver Tracker App\n\n`;
    
    message += `🔗 STEP 2: Copy and paste this URL in "Enter Ngrok URL":\n`;
    message += `${baseUrl}\n\n`;
    
    message += `🔑 STEP 3: Enter this Driver ID:\n`;
    message += `${driverId}\n\n`;
    
    message += `✅ STEP 4: Tap "Start Tracking"\n`;
    message += `✅ STEP 5: Allow location permissions\n\n`;
    
    message += `💡 TIP: Copy the URL and ID separately from this message!\n\n`;
    message += `Thank you! 🙏`;
    
    return message;
}
</script> 

<script>
// Copy Base URL function
function copyBaseUrl() {
    const urlInput = document.getElementById('baseTrackingUrl');
    urlInput.select();
    urlInput.setSelectionRange(0, 99999); // For mobile devices
    document.execCommand('copy');
    
    // Visual feedback - flash green
    const originalBg = urlInput.style.background;
    urlInput.style.background = '#90EE90';
    
    // Create temporary success message
    const button = event.target;
    const originalText = button.innerHTML;
    button.innerHTML = '✅ Copied!';
    button.style.background = 'darkgreen';
    
    setTimeout(() => {
        urlInput.style.background = originalBg;
        button.innerHTML = originalText;
        button.style.background = 'green';
    }, 2000);
    
    alert('✅ BASE URL COPIED!\n\n📱 Driver should:\n1. Open Driver Tracker app\n2. Paste this in "Enter Ngrok URL" field\n3. Then enter the Driver ID');
}

// Copy Driver ID function
function copyDriverId() {
    const idInput = document.getElementById('driverIdOnly');
    idInput.select();
    idInput.setSelectionRange(0, 99999); // For mobile devices
    document.execCommand('copy');
    
    // Visual feedback - flash yellow/gold
    const originalBg = idInput.style.background;
    idInput.style.background = '#FFD700';
    
    // Create temporary success message
    const button = event.target;
    const originalText = button.innerHTML;
    button.innerHTML = '✅ Copied!';
    button.style.background = '#ff8800';
    
    setTimeout(() => {
        idInput.style.background = originalBg;
        button.innerHTML = originalText;
        button.style.background = 'orange';
    }, 2000);
    
    alert('✅ DRIVER ID COPIED!\n\n🔑 Driver should:\n1. Enter this in "Driver ID" field\n2. Then tap "Start Tracking"');
}

// Copy optimized WhatsApp message function
function copyOptimizedMessage() {
    const messageArea = document.getElementById('whatsappOptimizedMessage');
    messageArea.select();
    messageArea.setSelectionRange(0, 99999);
    document.execCommand('copy');
    
    alert('✅ COMPLETE WHATSAPP MESSAGE COPIED!\n\n' +
          'This message contains:\n' +
          '• App URL\n' +
          '• Driver ID\n' +
          '• Step-by-step instructions\n\n' +
          'Paste and send to driver via WhatsApp!');
}
</script>   

<?php include 'footer.php';?>



</body>
</html>