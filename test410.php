<!DOCTYPE html>
<html>
<head>
 
<?php include('head.php'); ?>
  <link rel="stylesheet" href="css/stylei.css">
  <link rel="stylesheet" href="css/stylei2.css">
   
  <link rel="stylesheet" href="css/whatsappButton.css" />

  <script type="text/javascript" src="js/test371.js"></script>


	 
	 

<title></title>
</head>
<body>

<div class="jumbotron">













<?php
backup_tables('192.168.16.103','username','password','blog');


function backup_tables($host,$user,$pass,$name,$tables = '*')
{
	
	$idr = mysqli_connect("192.168.16.103", "root", "1Sys9Admeen72", "nccleb_test");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
	
		$result = mysqli_query($idr,'SELECT * FROM posts 
		');
		
		$num_fields = mysqli_num_fields($result);
		$return.= "Id, Title, Body,Created , Updated, UserId, Cover Image, Post Status"."\n";
		for ($i = 0; $i < $num_fields; $i++) 
		{
			while($row = mysqli_fetch_row($result))
			{
				
				
				for($j=0; $j < $num_fields; $j++) 
				{
					
					
					
					if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
					if ($j < ($num_fields-1)) { $return.= ','; }
				}
				$return.= "\n";
			}
		}
		
		$return= rtrim($return);
		
	
	 $handle = fopen('Posts-csv-backup-'.time().'-'.(md5(implode(',',$tables))).'.csv','w+');
	
	fwrite($handle,$return);
	fclose($handle);
}
     echo "<p id=\"form\">Export is completed!</p>";
	 
	  echo "<button class=\"whatsappbutton\" type=\"button\" onclick=\"quit()\">Quit</button>";











?>
</body>
</html>