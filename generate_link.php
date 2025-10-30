<?php
$idr = mysqli_connect("192.168.16.103", "root", "1Sys9Admeen72", "nccleb_test");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

if(isset($_GET['driver_id'])){
    $driver_id = intval($_GET['driver_id']);
    $result = $idr->query("SELECT * FROM drivers WHERE idx=$driver_id");
    if($row = $result->fetch_assoc()){
        $driver_name = $row['name_d'];
        $link = "http://localhost/driver_mobile.php?driver_id=$driver_id&driver_name=".urlencode($driver_name);
        echo '<a href="'.$link.'" target="_blank">'.$link.'</a>';
    } else {
        echo "Driver not found.";
    }
}
?>
