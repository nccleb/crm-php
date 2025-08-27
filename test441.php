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
if(isset($_POST['nu'])&&!empty($_POST['nu'])){
  $nu=test_input($_POST['nu']);

  
	}
else{
	
	echo"<script>alert('Missing Entry!')</script>";
	echo"<script>location.replace('test439.php')</script>";
    }
	function test_input($data) {
		
  $data = trim($data,"/");
  
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if (!preg_match("/^[0-9a-zA-Z.,\s\p{Arabic} ]*$/u",$nu)) {
  echo "<p style=\"color:red;font-size:28px\">Invalid Name format!</p>"."<br/>";
  echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}








	
	
	
$idr = mysqli_connect("192.168.16.103", "root", "1Sys9Admeen72", "nccleb_test");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

	$req1=@mysqli_query($idr,"ALTER TABLE pipeline
  DROP COLUMN $nu   ");

	

 if($req1){
	 echo "<p id=\"p\">Data is well deleted!</p>";
	 echo "<a href=\"test440.php\">DELETE AGAIN</a>"."<br/>";
	 echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
}
else{
	echo"<script>alert('Incorrect Entry!')</script>";
	echo"<script>location.replace('test440.php')</script>";
	}	


?>
</body>
</html>
 
 
 