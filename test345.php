<?php

$idr = mysqli_connect("192.168.16.103", "root", "1Sys9Admeen72", "nccleb_test");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}



	  $a=$_GET['id'];
	
	 
	   $stmt = $idr->prepare("delete from crm where idc=?");
	 $stmt->bind_param("i",$a);
	 $stmt->execute();
	 $stmt->close();
	 
    
	
 echo "<p id=\"form2\">Data is well Deleted!</p>";
	


	?>
	
	
	