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
<?php







	
	
	
$idr = mysqli_connect("192.168.16.103", "root", "1Sys9Admeen72", "nccleb_test");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
$req=@mysqli_query($idr,"set foreign_key_checks=0");
$req.=@mysqli_query($idr,"truncate table comments");
$req.=@mysqli_query($idr,"set foreign_key_checks=1");
$req.=@mysqli_query($idr,"alter table drivers auto_increment=1");


 if($req){
	 echo "<p id=\"p\">Table is well deleted!</p>";
	 
	 echo "<button id=\"p1\"  type=\"button\" onclick=\"quit()\">Quit</button>";
}
else{
	echo "<p id=\"p\">Table is not deleted!</p>";
	echo "<button id=\"p1\"   type=\"button\" onclick=\"quit()\">Quit</button>";
}


?>
</body>
</html>