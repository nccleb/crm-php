<?php
session_start();
$ui=urldecode($_GET['page2']);
 $_SESSION["q"]=$ui;
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
if(isset($address) && $address) $simple_address .= "address1 " . $address . ", ";
if(isset($address2) && $address2) $simple_address .= "address2 " . $address2;





			  
			  
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
    $result = mysqli_query($idr, "SELECT d.name_d, 
        COUNT(*) as total_assignments,
        SUM(CASE WHEN da.status = 'delivered' THEN 1 ELSE 0 END) as successful,
        ROUND(AVG(CASE WHEN da.actual_arrival IS NOT NULL AND da.estimated_arrival IS NOT NULL 
                      THEN TIMESTAMPDIFF(MINUTE, da.estimated_arrival, da.actual_arrival) 
                      ELSE NULL END), 1) as avg_delay_minutes
        FROM dispatch_assignments da
        LEFT JOIN drivers d ON da.dispatcher_id = d.idx
        WHERE da.created_at >= DATE_SUB(NOW(), INTERVAL 30 DAY)
        GROUP BY da.dispatcher_id, d.name_d
        HAVING total_assignments > 0
        ORDER BY successful DESC, total_assignments DESC
        LIMIT 5");
    $analytics['top_dispatchers'] = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $success_rate = $row['total_assignments'] > 0 ? round(($row['successful'] / $row['total_assignments']) * 100, 1) : 0;
        $analytics['top_dispatchers'][] = [
            'name' => $row['name_d'],
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dispatcher Assignment Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
<div style="padding: 10px; background: lightgreen; margin: 10px;">
    <h4>📱 Quick Location Send</h4>
    <?php
    $link = "https://maps.google.com/maps?q=" . urlencode($simple_address);
    
    // Build the full message with assignment details if available
    $fullMessage = "📍 CLIENT ADDRESS:\n" . $simple_address . "\n\n";
    
    if (!empty($latest_assignment_order)) {
        $fullMessage .= "📦 ORDER DETAILS:\n" . $latest_assignment_order . "\n\n";
    }
    
    if (!empty($latest_assignment_instructions)) {
        $fullMessage .= "📋 DELIVERY INSTRUCTIONS:\n" . $latest_assignment_instructions . "\n\n";
    }
    
    $fullMessage .= "🗺️ Google Maps Link:\n" . $link;
    ?>
         
    <p id="addr"><strong>Client Address:</strong> <?php echo $simple_address; ?></p>
    
    <?php if (!empty($latest_assignment_order)): ?>
    <p><strong>Order:</strong> <?php echo htmlspecialchars($latest_assignment_order); ?></p>
    <?php endif; ?>
    
    <?php if (!empty($latest_assignment_instructions)): ?>
    <p><strong>Instructions:</strong> <?php echo htmlspecialchars($latest_assignment_instructions); ?></p>
    <?php endif; ?>
    
    <textarea id="quickLink" style="width: 80%; height: 120px;" readonly><?php echo $fullMessage; ?></textarea>
    <br><br>
         
    <button onclick="
        document.getElementById('quickLink').select();
        document.execCommand('copy');
        alert('✅ Assignment details copied! Now open WhatsApp on your PHONE and paste it to the driver.');
        window.open('https://web.whatsapp.com/', '_blank');
    " style="background: green; color: white; padding: 10px; border: none;">
        📱 Copy Assignment & Open WhatsApp
    </button>
</div>


    <!-- NEW: Delete Section -->
    <div class="card danger-zone">
        <div class="card-header bg-danger text-white">
            <h5>⚠️ Delete Assignments - DANGER ZONE</h5>
        </div>
        <div class="card-body delete-section">
            <div class="alert alert-warning">
                <strong>WARNING:</strong> Deletion is permanent and cannot be undone. Please be careful!
            </div>
            
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
                    <div class="col-md-3 d-flex align-items-end">
                        <button type="submit" class="btn btn-info me-2">Filter</button>
                         <button class="btn btn-info me-2" onclick="quit()">Quit</button>
                        <a href="dispatcher_assignments.php" class="btn btn-secondary">Clear</a>
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
</body>
</html>