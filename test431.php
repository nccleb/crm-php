<?php
session_start();

// Initialize variables to avoid undefined warnings
$num = isset($_GET["page"]) ? $_GET["page"] : "";
$idf = isset($_GET["page1"]) ? $_GET["page1"] : "";

$_SESSION["aidf"] = $num;
$_SESSION["anam"] = $idf;

// Database connection
$idr = mysqli_connect("192.168.16.103", "root", "1Sys9Admeen72", "nccleb_test");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

// Initialize search variables
$t = "";
$startdate = "";
$enddate = "";
$req9 = null;
$count = 0;

// Process search form
if (isset($_POST['search'])) {
    $t = isset($_POST['task']) ? $_POST['task'] : "";
    $startdate = isset($_POST['startdate']) ? $_POST['startdate'] : "";
    $enddate = isset($_POST['enddate']) ? $_POST['enddate'] : "";
    
    // Only execute query if dates are provided
    if (!empty($startdate) && !empty($enddate)) {
        $query = "SELECT * FROM client c, crm cr  
                  WHERE c.id = cr.id AND lcd BETWEEN '$startdate' AND '$enddate'";
        
        if (!empty($t)) {
            $query .= " AND task = '$t'";
        }
        
        $query .= " ORDER BY lcd DESC";
        
        $req9 = mysqli_query($idr, $query);
        if ($req9) {
            $count = mysqli_num_rows($req9);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php include('head.php'); ?>
  <link rel="stylesheet" href="css/stylei.css">
  <link rel="stylesheet" href="css/stylei2.css">
   
  <link rel="stylesheet" href="css/whatsappButton.css" />

  <script type="text/javascript" src="js/test371.js"></script>
   
  <style>
    th, td {
      padding: 5px 10px;
      border: 2px solid #626d5c;
      text-align: center;
    }
    th {
      background: #04af2f;
    }
    
    .wrapper {
      margin: 20px;
    }
    
    #printDiv {
      margin-top: 20px;
    }
    
    #in {
      margin: 5px;
      padding: 5px;
    }
  </style>
  
  <script>
    function dell(str) {
      var result = confirm("Want to delete?");
      if (result) {
        var id = document.getElementById("start").value;
        var idf = document.getElementById("end").value;
        
        var xhttp;
        if (window.XMLHttpRequest) {
          xhttp = new XMLHttpRequest();
        } else {
          xhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("tr").innerHTML = this.responseText;
          }
        };
        
        xhttp.open("GET", "test352.php?id=" + id + "&idf=" + idf, true);
        xhttp.send();
      }
    }
    
    function quit() {
      window.close();
    }
    
    function printContents(id) {
      var printContents = document.getElementById(id).innerHTML;
      var originalContents = document.body.innerHTML;
      
      document.body.innerHTML = printContents;
      window.print();
      document.body.innerHTML = originalContents;
      window.location.reload();
    }
  </script>
</head>
<body>

<center>
  <p>TELEPHONE CALLS REPORT</p>
  <HR/>
</center>

<div class="wrapper">
  <?php if ($idf == "1" || $idf == "2") : ?>
    <table>
      <tr>
        <th>Name</th>
        <th>Ticket</th>
        <th>Activity</th>
        <th>Complaints</th>
        <th>Status</th>
        <th>Priority</th>
        <th>Date</th>
        <th>Agent</th>
        <th>Action</th>
      </tr>
      
      <?php
      if ($req9 && mysqli_num_rows($req9) > 0) {
        while ($row = mysqli_fetch_array($req9)) {
          $id = $row['nom'];
          $fid = $row['prenom'];
          $lcd = $row['lcd'];
          $agent = $row['idfc'];
          $number = $row['number'];
          $incident = $row['incident'];
          $la = $row['la'];
          $idc = $row['idc'];
          $status = $row['status'];
          $task = $row['task'];
          $cat = $row['category'];
          $opp = $row['opp'];
          $pr = $row['priority'];
          
          echo "<tr>";
          echo "<td>" . $row['nom'] . " " . $row['prenom'] . "</td>";
          echo "<td>" . $row['task'] . "</td>";
          echo "<td>" . $row['la'] . "</td>";
          echo "<td>" . $row['incident'] . "</td>";
          echo "<td>" . $row['status'] . "</td>";
          echo "<td>" . $row['priority'] . "</td>";
          echo "<td>" . $row['lcd'] . "</td>";
          echo "<td>" . $agent . "</td>";
          echo "<td><button class=\"printPageButton\" onclick=\"window.location='test343.php?id=$id&fid=$fid&lcd=$lcd&agent=$agent&status=$status&idc=$idc&tas=$task&la=$la&incident=$incident&priority=$pr'\">View</button></td>";
          echo "</tr>";
        }
        
        echo "<tr><td colspan='9' style='color:blue'>Total Records: " . $count . "</td></tr>";
      } elseif (isset($_POST['search'])) {
        echo "<tr><td colspan='9'>No records found for the selected criteria.</td></tr>";
      } else {
        echo "<tr><td colspan='9'>Use the search form below to find records.</td></tr>";
      }
      ?>
    </table>
  <?php else : ?>
    <h2>YOU DON'T HAVE ENOUGH PERMISSIONS!</h2>
  <?php endif; ?>
</div>

<div id="printDiv">
  <center>
    <form method="post">
      <input id="in" type="text" placeholder="Enter Ticket" name="task" size="8" value="<?php echo htmlspecialchars($t); ?>"><br>
      <input id="start" type="datetime-local" name="startdate" size="4" value="<?php echo htmlspecialchars($startdate); ?>">
      <input id="end" type="datetime-local" name="enddate" size="4" value="<?php echo htmlspecialchars($enddate); ?>"><br>
      <input id="in" type="submit" name="search" value="Search" size="4">
      <button type="button" id="in" onclick="quit()">Quit</button>
      <button type="button" id="in" onclick="printContents('printDiv')">Print</button>
    </form>
  </center>
</div>

<p id="tr"></p>

</body>
</html>