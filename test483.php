
<!DOCTYPE html>
<html>
<head>

<?php include('head.php'); ?>
  <link rel="stylesheet" href="css/stylei.css">
  <link rel="stylesheet" href="css/stylei2.css">
   
  <link rel="stylesheet" href="css/whatsappButton.css" />
  <script src="js/test371.js"></script>












</head>

<body>
<div class="jumbotron"> 




<?php
$idr = mysqli_connect("192.168.16.103", "root", "1Sys9Admeen72", "nccleb_test");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

// Handle date range delete
if (isset($_POST['delete_by_date'])) {
    $start_date = $_POST['start_date'];
    $end_date   = $_POST['end_date'];

    if (!empty($start_date) && !empty($end_date)) {
        $stmt = $idr->prepare("DELETE FROM dispatch_assignments WHERE DATE(created_at) BETWEEN ? AND ?");
        $stmt->bind_param("ss", $start_date, $end_date);
        if ($stmt->execute()) {
            echo "<p style='color:green;'>Assignments from $start_date to $end_date deleted successfully.</p>";
        } else {
            echo "<p style='color:red;'>Error deleting assignments: " . $stmt->error . "</p>";
        }
        $stmt->close();
    } else {
        echo "<p style='color:red;'>Please select both start and end dates.</p>";
    }
}
?>

<!-- Form for deleting by date range -->
<h3>Delete Dispatcher Assignments by Date Range</h3>
<form method="post">
    <label for="start_date">Start Date:</label>
    <input type="date" name="start_date" required>
    <br><br>
    <label for="end_date">End Date:</label>
    <input type="date" name="end_date" required>
    <br><br>
    <button  class="whatsappbutton"  type="submit" name="delete_by_date">Delete Assignments</button>
    <button class="whatsappbutton" onclick="quit()">Quit</button>
</form>

</body>
</html>