<!DOCTYPE html>
<html>
<head>
<?php include('head.php'); ?>
<link rel="stylesheet" href="css/stylei.css">
<link rel="stylesheet" href="css/stylei2.css">
<link rel="stylesheet" href="css/whatsappButton.css">
<script type="text/javascript" src="js/test371.js"></script>
<title>Database Export</title>
</head>
<body>
<div class="jumbotron">
<?php

backup_tables('192.168.16.103', 'root', '1Sys9Admeen72', 'nccleb_test');

function backup_tables($host, $user, $pass, $name, $tables = [])
{
    $idr = mysqli_connect($host, $user, $pass, $name);
    if (!$idr) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    $result = mysqli_query($idr, 'SELECT * FROM client');
    if (!$result) {
        die("Query failed: " . mysqli_error($idr));
    }

    $num_fields = mysqli_num_fields($result);
    $return = ''; // Initialize the variable

    while ($row = mysqli_fetch_row($result)) {
        for ($j = 0; $j < $num_fields; $j++) {
            $return .= isset($row[$j]) ? '"' . addslashes($row[$j]) . '"' : '""';
            if ($j < ($num_fields - 1)) {
                $return .= ',';
            }
        }
        $return .= "\n";
    }

    $return = rtrim($return);
    $filename = 'client(Raw)-csv-backup-' . time() . '.csv';

    if ($handle = fopen($filename, 'w+')) {
        fwrite($handle, $return);
        fclose($handle);
        echo "<p style='color:green;'>Export completed! File: {$filename}</p>";
    } else {
        echo "<p style='color:red;'>Failed to create file.</p>";
    }
}

echo "<button class='whatsappbutton' type='button' onclick='quit()'>Quit</button>";
?>
</div>
</body>
</html>
