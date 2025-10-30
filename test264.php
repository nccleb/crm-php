<?php
session_start();

// Initialize variables to avoid undefined warnings
$num = isset($_GET["page2"]) ? $_GET["page2"] : "";
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
$y = $c = $p = $z = $ace = $startdate = $enddate = $t = "";
$req9 = $req41 = $req282 = $req119 = $req72 = $req19 = $req3 = $req33 = null;
$count = 0;

// Process search form
if (isset($_POST['search'])) {
    $y = isset($_POST['name']) ? $_POST['name'] : "";
    $c = isset($_POST['cat']) ? $_POST['cat'] : "";
    $p = isset($_POST['pr']) ? $_POST['pr'] : "";
    $z = isset($_POST['nam']) ? $_POST['nam'] : "";
    $ace = isset($_POST['ace']) ? $_POST['ace'] : "";
    $t = isset($_POST['task']) ? $_POST['task'] : "";
    $startdate = isset($_POST['startdate']) ? $_POST['startdate'] : "";
    $enddate = isset($_POST['enddate']) ? $_POST['enddate'] : "";
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
    
    select, input {
      margin: 5px;
      padding: 5px;
    }
    
    @media print {
      .no-print {
        display: none !important;
      }
      body {
        font-size: 12pt;
      }
      table {
        width: 100%;
        border-collapse: collapse;
      }
      th, td {
        border: 1px solid #000;
        padding: 4px;
      }
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
    
    function printContents() {
      // Create a new window for printing
      var printWindow = window.open('', '_blank');
      
      // Get the table content
      var tableContent = document.querySelector('.wrapper table').outerHTML;
      
      // Create print document
      printWindow.document.write('<html><head><title>TELEPHONE CALLS REPORT</title>');
      printWindow.document.write('<style>');
      printWindow.document.write('body { font-family: Arial, sans-serif; font-size: 12pt; }');
      printWindow.document.write('table { width: 100%; border-collapse: collapse; }');
      printWindow.document.write('th, td { border: 1px solid #000; padding: 5px; text-align: center; }');
      printWindow.document.write('th { background-color: #ddd; }');
      printWindow.document.write('h1 { text-align: center; }');
      printWindow.document.write('</style>');
      printWindow.document.write('</head><body>');
      printWindow.document.write('<h1>TELEPHONE CALLS REPORT</h1>');
      printWindow.document.write('<p><strong>Search Criteria:</strong> ');
      
      // Add search criteria to printout
      var criteria = [];
      if ('<?php echo $ace; ?>') {
        switch ('<?php echo $ace; ?>') {
          case '*#': criteria.push('All Records'); break;
          case '@': criteria.push('Caller: <?php echo $z; ?>'); break;
          case '!!': criteria.push('Ticket: <?php echo $t; ?>'); break;
          case '!': criteria.push('Agent->Ticket: <?php echo $y . " -> " . $t; ?>'); break;
          case '#*': criteria.push('Caller->Ticket: <?php echo $z . " -> " . $t; ?>'); break;
          case '*': criteria.push('Agent->Caller: <?php echo $y . " -> " . $z; ?>'); break;
          case '**': criteria.push('Agent->Caller->Ticket: <?php echo $y . " -> " . $z . " -> " . $t; ?>'); break;
          case '##': criteria.push('Priority: <?php echo $p; ?>'); break;
        }
      }
      
      if ('<?php echo $startdate; ?>' && '<?php echo $enddate; ?>') {
        criteria.push('Date Range: <?php echo $startdate; ?> to <?php echo $enddate; ?>');
      }
      
      printWindow.document.write(criteria.join(' | '));
      printWindow.document.write('</p>');
      
      printWindow.document.write(tableContent);
      printWindow.document.write('</body></html>');
      printWindow.document.close();
      
      // Print the window
      printWindow.focus();
      printWindow.print();
      printWindow.close();
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
        <th class="no-print">Action</th>
      </tr>
      
      <?php
      // Determine which query to execute based on the search criteria
      $result = null;
      if (isset($_POST['search']) && !empty($startdate) && !empty($enddate)) {
        $query = "";
        
        switch ($ace) {
          case "##":
            if (!empty($p)) {
              $query = "SELECT * FROM client c, crm cr  
                        WHERE c.id = cr.id AND lcd BETWEEN '$startdate' AND '$enddate'	
                        AND priority = '$p'
                        ORDER BY lcd";
              $req41 = mysqli_query($idr, $query);
              $result = $req41;
            }
            break;
            
          case "#":
            if (!empty($y) && !empty($z) && !empty($t)) {
              $query = "SELECT * FROM client c, crm cr  
                        WHERE c.id = cr.id 
                        AND idfc = '$y'
                        AND num = '$z'
                        AND task = '$t'
                        AND lcd BETWEEN '$startdate' AND '$enddate' 
                        ORDER BY lcd";
              $req33 = mysqli_query($idr, $query);
              $result = $req33;
            }
            break;
            
          case "*#":
            $query = "SELECT * FROM client c, crm cr  
                      WHERE c.id = cr.id AND lcd BETWEEN '$startdate' AND '$enddate' 
                      ORDER BY lcd";
            $req282 = mysqli_query($idr, $query);
            $result = $req282;
            break;
            
          case "#*":
            if (!empty($t) && !empty($z)) {
              $query = "SELECT * FROM client c, crm cr  
                        WHERE c.id = cr.id AND lcd BETWEEN '$startdate' AND '$enddate' 
                        AND task = '$t'
                        AND num = '$z'
                        ORDER BY lcd";
              $req119 = mysqli_query($idr, $query);
              $result = $req119;
            }
            break;
            
          case "!":
            if (!empty($t) && !empty($y)) {
              $query = "SELECT * FROM client c, crm cr  
                        WHERE c.id = cr.id AND lcd BETWEEN '$startdate' AND '$enddate' 
                        AND idfc = '$y'
                        AND task = '$t'
                        ORDER BY lcd";
              $req72 = mysqli_query($idr, $query);
              $result = $req72;
            }
            break;
            
          case "!!":
            if (!empty($t)) {
              $query = "SELECT * FROM client c, crm cr  
                        WHERE c.id = cr.id AND lcd BETWEEN '$startdate' AND '$enddate' 	
                        AND task = '$t'
                        ORDER BY lcd";
              $req9 = mysqli_query($idr, $query);
              $result = $req9;
            }
            break;
            
          case "@":
            if (!empty($z)) {
              $query = "SELECT * FROM client c, crm cr  
                        WHERE c.id = cr.id AND lcd BETWEEN '$startdate' AND '$enddate' 
                        AND num = '$z'
                        ORDER BY lcd";
              $req19 = mysqli_query($idr, $query);
              $result = $req19;
            }
            break;
            
          case "*":
            if (!empty($y) && !empty($z)) {
              $query = "SELECT * FROM client c, crm cr  
                        WHERE c.id = cr.id 
                        AND idfc = '$y'
                        AND num = '$z'
                        AND lcd BETWEEN '$startdate' AND '$enddate' 
                        ORDER BY lcd";
              $req3 = mysqli_query($idr, $query);
              $result = $req3;
            }
            break;
            
          case "**":
            if (!empty($y) && !empty($z) && !empty($t)) {
              $query = "SELECT * FROM client c, crm cr  
                        WHERE c.id = cr.id 
                        AND idfc = '$y'
                        AND num = '$z'
                        AND task = '$t'
                        AND lcd BETWEEN '$startdate' AND '$enddate' 
                        ORDER BY lcd";
              $req33 = mysqli_query($idr, $query);
              $result = $req33;
            }
            break;
            
          default:
            // No specific search criteria selected
            break;
        }
        
        // Display results if a query was executed
        if (isset($result) && $result && mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_array($result)) {
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
            echo "<td class='no-print'><button class=\"printPageButton\" onclick=\"window.location='test343.php?id=$id&fid=$fid&lcd=$lcd&agent=$agent&status=$status&idc=$idc&tas=$task&la=$la&incident=$incident&priority=$pr'\">View</button></td>";
            echo "</tr>";
          }
          
          $count = mysqli_num_rows($result);
          echo "<tr><td colspan='9' style='color:blue'>Total Records: " . $count . "</td></tr>";
        } elseif (isset($_POST['search'])) {
          echo "<tr><td colspan='9'>No records found for the selected criteria.</td></tr>";
        }
      } else {
        echo "<tr><td colspan='9'>Use the search form below to find records.</td></tr>";
      }
      ?>
    </table>
  <?php else : ?>
    <h2>YOU DON'T HAVE ENOUGH PERMISSIONS!</h2>
  <?php endif; ?>
</div>

<div id="printDiv" class="no-print">
  <center>
    <form method="post">
      <p>
        <select name="ace">
          <option value="" selected>Select search type...</option>
          <option value="*#">All</option>
          <option value="@">Caller</option>
          <option value="!!">Ticket</option>
          <option value="!">Agent->Ticket</option>
          <option value="#*">Caller->Ticket</option>
          <option value="*">Agent->Caller</option>
          <option value="**">Agent->Caller->Ticket</option>
          <option value="##">Priority Calls</option>
        </select>
      </p>
      
      <p>Agent
      <select name="name">
        <option value="" selected>Select agent...</option>
        <?php
        $stmt = $idr->prepare("SELECT * FROM form_element");
        $stmt->execute();
        $agent_result = $stmt->get_result();
        $stmt->close();
        
        while ($row = $agent_result->fetch_assoc()) {
          $y = $row['name'];
          $z = $row['idf'];
          echo "<option value=\"$z\">$y</option>";
        }
        ?>
      </select>
      </p>
      
      <p>Caller <input placeholder="Enter caller..." type="text" name="nam" size="8" value="" ?></p>
      
      <p>Priority
      <select name="pr">
        <option value="" selected>Select priority...</option>
        <option value="Low">Low</option>
        <option value="Medium">Medium</option>
        <option value="High">High</option>
      </select>
      </p>
      
      <p>Ticket <input placeholder="Enter ticket..." type="text" name="task" size="8" value="<?php echo htmlspecialchars($t); ?>"></p>
      
      <p>
        <input type="datetime-local" name="startdate" value="<?php echo htmlspecialchars($startdate); ?>">
        <input type="datetime-local" name="enddate" value="<?php echo htmlspecialchars($enddate); ?>">
      </p>
      
      <input type="submit" name="search" value="Search">
      <button type="button" onclick="quit()">Quit</button>
      <button type="button" onclick="printContents()">Print</button>
    </form>
  </center>
</div>

<p id="tr"></p>

</body>
</html>