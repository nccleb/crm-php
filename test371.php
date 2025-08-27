<!DOCTYPE html>
<html>
<head>
<?php include('head.php'); ?>
  <link rel="stylesheet" href="css/stylei.css">
  <link rel="stylesheet" href="css/stylei2.css">
  <link rel="stylesheet" href="css/whatsappButton.css" />
  <script type="text/javascript" src="js/test371.js"></script>
  <title>Client Data Export</title>
</head>
<body>
<div class="jumbotron">
<?php
// Function to export client table to CSV
function backup_tables($host, $user, $pass, $name, $tables = '*')
{
    // Connect to database using provided credentials
    $idr = mysqli_connect($host, $user, $pass, $name);
    if (mysqli_connect_errno()) {
        return "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    
    // Fetch data from client table
    $result = mysqli_query($idr, 'SELECT * FROM client');
    if (!$result) {
        return "Error in query: " . mysqli_error($idr);
    }
    
    $num_fields = mysqli_num_fields($result);
    $return = '';
    
    // Get field names dynamically from the database
    $field_names = [];
    for ($i = 0; $i < $num_fields; $i++) {
        $field_info = mysqli_fetch_field_direct($result, $i);
        $field_names[] = $field_info->name;
    }
    
    // Add headers from actual database fields
    $return .= implode(',', $field_names) . "\n";
    
    // Add data rows
    while ($row = mysqli_fetch_row($result)) {
        for ($j = 0; $j < $num_fields; $j++) {
            if (isset($row[$j])) { 
                $return .= '"' . str_replace('"', '""', $row[$j]) . '"'; 
            } else { 
                $return .= '""'; 
            }
            if ($j < ($num_fields - 1)) { 
                $return .= ','; 
            }
        }
        $return .= "\n";
    }
    
    // Generate filename
    $filename = 'client-csv-backup-' . time() . '.csv';
    
    // Save to file
    $handle = fopen($filename, 'w+');
    if (!$handle) {
        return "Cannot open file for writing: " . $filename;
    }
    
    fwrite($handle, $return);
    fclose($handle);
    
    mysqli_close($idr);
    
    return "Export completed successfully! File: " . $filename;
}

// Call the function with your credentials
$result = backup_tables('192.168.16.103', 'root', '1Sys9Admeen72', 'nccleb_test');
echo "<p id=\"form\">$result</p>";
echo "<button class=\"whatsappbutton\" type=\"button\" onclick=\"quit()\">Quit</button>";
?>
</div>
</body>
</html>