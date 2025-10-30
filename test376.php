<?php
session_start();

// Initialize variables to avoid undefined warnings
$num = isset($_GET["page2"]) ? $_GET["page2"] : "";
$idf = isset($_GET["page1"]) ? $_GET["page1"] : "";
$y = isset($_POST["name"]) ? $_POST["name"] : "";

$_SESSION["aidf"] = $num;
$_SESSION["anam"] = $idf;

// Database connection
$idr = mysqli_connect("192.168.16.103", "root", "1Sys9Admeen72", "nccleb_test");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

// Initialize search variables
$z = $t = $startdate = $enddate = "";
$req86 = $req85 = $req84 = $req94 = $req82 = $req72 = null;
$count6 = $count5 = $count4 = $count14 = $count = 0;

// Process search form
if (isset($_POST['search'])) {
    $z = isset($_POST['name1']) ? $_POST['name1'] : "";
    $t = isset($_POST['incident']) ? $_POST['incident'] : "";
    $startdate = isset($_POST['startdate']) ? $_POST['startdate'] : "";
    $enddate = isset($_POST['enddate']) ? $_POST['enddate'] : "";
    $y = isset($_POST['name']) ? $_POST['name'] : "";
}

function test_input($data) {
    if (!isset($data)) return '';
    $data = trim($data);
    $data = trim($data, "/");
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
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
    th {
      top: 0;
    }
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
    
    function statistics() {
      window.open("test387.php?var1=<?php echo $startdate; ?>&var2=<?php echo $enddate; ?>&var3=<?php echo $y; ?>&var4=<?php echo $z; ?>");
    }
    
    function printContents() {
      // Create a new window for printing
      var printWindow = window.open('', '_blank');
      
      // Get the table content
      var tableContent = document.querySelector('.wrapper table').outerHTML;
      
      // Create print document
      printWindow.document.write('<html><head><title>TICKETS REPORT</title>');
      printWindow.document.write('<style>');
      printWindow.document.write('body { font-family: Arial, sans-serif; font-size: 12pt; }');
      printWindow.document.write('table { width: 100%; border-collapse: collapse; }');
      printWindow.document.write('th, td { border: 1px solid #000; padding: 5px; text-align: center; }');
      printWindow.document.write('th { background-color: #ddd; }');
      printWindow.document.write('h1 { text-align: center; }');
      printWindow.document.write('</style>');
      printWindow.document.write('</head><body>');
      printWindow.document.write('<h1>TICKETS REPORT</h1>');
      printWindow.document.write('<p><strong>Search Criteria:</strong> ');
      
      // Add search criteria to printout
      var criteria = [];
      if ('<?php echo $z; ?>') {
        switch ('<?php echo $z; ?>') {
          case 'q': criteria.push('All Tickets'); break;
          case '!': criteria.push('Agent: <?php echo $y; ?>'); break;
          case '$': criteria.push('All Other Tickets'); break;
          case '*': criteria.push('Agent for Other: <?php echo $y; ?>'); break;
          case '**': criteria.push('All Agent - Specific Ticket'); break;
          case '@': criteria.push('Agent: <?php echo $y; ?> - Specific Ticket'); break;
        }
      }
      
      if ('<?php echo $t; ?>') {
        criteria.push('Complaint: <?php echo $t; ?>');
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
  <p>TICKETS REPORT</p>
  <HR/>
</center>

<div class="container text-center"> 
<div class="divClass" id="divClass">
</div>

<div class="wrapper">
  <table>
    <tr>
      <th>Complaints</th>
      <th>Count</th>
    </tr>
    
    <?php
    if ($idf == "1" || $idf == "2") {
      $result = null;
      
      // Determine which query to execute based on the search criteria
      if (isset($_POST['search']) && !empty($startdate) && !empty($enddate)) {
        switch ($z) {
          case "q":
            $query = "SELECT incident, COUNT(*) AS counter FROM crm 
                      WHERE lcd BETWEEN '$startdate' AND '$enddate' 
                      AND incident IN (SELECT comment_text FROM comments)
                      GROUP BY incident";
            $req86 = mysqli_query($idr, $query);
            $result = $req86;
            $count6 = $result ? mysqli_num_rows($result) : 0;
            break;
            
          case "!":
            if (!empty($y)) {
              $query = "SELECT incident, COUNT(*) AS counter
                        FROM crm c, form_element f
                        WHERE c.idfc = f.idf
                        AND lcd BETWEEN '$startdate' AND '$enddate' 
                        AND idfc = '$y'	
                        AND incident IN (SELECT comment_text FROM comments)
                        GROUP BY incident";
              $req85 = mysqli_query($idr, $query);
              $result = $req85;
              $count5 = $result ? mysqli_num_rows($result) : 0;
            }
            break;
            
          case "*":
            if (!empty($y)) {
              $query = "SELECT incident, COUNT(*) AS counter 
                        FROM crm c, form_element f
                        WHERE c.idfc = f.idf
                        AND lcd BETWEEN '$startdate' AND '$enddate' 
                        AND idfc = '$y'	
                        AND incident NOT IN (SELECT comment_text FROM comments)
                        GROUP BY incident";
              $req84 = mysqli_query($idr, $query);
              $result = $req84;
              $count4 = $result ? mysqli_num_rows($result) : 0;
            }
            break;
            
          case "$":
            $query = "SELECT incident, COUNT(*) AS counter 
                      FROM crm 
                      WHERE lcd BETWEEN '$startdate' AND '$enddate' 
                      AND incident NOT IN (SELECT comment_text FROM comments)
                      GROUP BY incident";
            $req94 = mysqli_query($idr, $query);
            $result = $req94;
            $count14 = $result ? mysqli_num_rows($result) : 0;
            break;
            
          case "**":
            if (!empty($t)) {
              // FIXED: This case should return aggregated counts like the others
              $query = "SELECT incident, COUNT(*) AS counter 
                        FROM crm 
                        WHERE lcd BETWEEN '$startdate' AND '$enddate' 
                        AND incident = '$t'
                        GROUP BY incident";
              $req82 = mysqli_query($idr, $query);
              $result = $req82;
              $count = $result ? mysqli_num_rows($result) : 0;
            }
            break;
            
          case "@":
            if (!empty($y) && !empty($t)) {
              $query = "SELECT incident, COUNT(*) AS counter
                        FROM crm c, form_element f
                        WHERE c.idfc = f.idf
                        AND lcd BETWEEN '$startdate' AND '$enddate' 
                        AND idfc = '$y'
                        AND incident = '$t'	
                        AND incident IN (SELECT comment_text FROM comments)
                        GROUP BY incident";
              $req72 = mysqli_query($idr, $query);
              $result = $req72;
              $count = $result ? mysqli_num_rows($result) : 0;
            }
            break;
        }
        
        // Display results if a query was executed
        if ($result && mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['incident'] . "</td>";
            echo "<td>" . $row['counter'] . "</td>";
            echo "</tr>";
          }
        } elseif (isset($_POST['search'])) {
          echo "<tr><td colspan='2'><h2>No Complaints Found!</h2></td></tr>";
        }
      } else {
        echo "<tr><td colspan='2'>Use the search form below to find records.</td></tr>";
      }
    } else {
      echo "<tr><td colspan='2'><h2>YOU DON'T HAVE ENOUGH PERMISSIONS!</h2></td></tr>";
    }
    ?>
  </table>

  <script>
    function statistics() {
      window.open("test387.php?var1=<?php echo $startdate; ?>&var2=<?php echo $enddate; ?>&var3=<?php echo $y; ?>&var4=<?php echo $z; ?>");
    }
  </script>
</div>

<div id="printDiv" class="no-print">
  <center>
    <form method="post">
      <p>
        <select name="name1">
          <option value="" selected>Select search type...</option>
          <option value="q">All Tickets (only choose date)(chart)</option>
          <option value="!">Choose Agent for All Tickets (Complaints blank)</option>
          <option value="$">All Other Tickets (All blank)</option>
          <option value="*">Choose Agent for Other (Ticket blank)</option>
          <option value="**">All Agent (blank) Choose Ticket</option>
          <option value="@">Choose Agent Choose Ticket</option>
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
          $agent_name = $row['name'];
          $agent_id = $row['idf'];
          $selected = ($y == $agent_id) ? 'selected' : '';
          echo "<option value=\"$agent_id\" $selected>$agent_name</option>";
        }
        ?>
      </select>
      </p>
      
      <p>Complaints
      <select name="incident" id="in">
        <option value="">Select complaint...</option>
        <?php
        $comments_query = mysqli_query($idr, "SELECT * FROM comments ORDER BY id_co ASC");
        while ($comment = mysqli_fetch_assoc($comments_query)) {
          $selected = ($t == $comment['comment_text']) ? 'selected' : '';
          echo "<option value=\"{$comment['comment_text']}\" $selected>{$comment['comment_text']}</option>";
        }
        ?>
      </select>
      </p>
      
      <p>
        <input type="datetime-local" name="startdate" value="<?php echo htmlspecialchars($startdate); ?>">
        <input type="datetime-local" name="enddate" value="<?php echo htmlspecialchars($enddate); ?>">
      </p>
      
      <input type="submit" name="search" value="Search">
      <button type="button" onclick="statistics()">Chart</button>
      <button type="button" onclick="printContents()">Print</button>
      <button type="button" onclick="quit()">Quit</button>
    </form>
  </center>
</div>

<p id="tr"></p>
<p id="st"></p>

</body>
</html>