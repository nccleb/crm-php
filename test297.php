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
if(isset($_POST['nu'])&&!empty($_POST['nu'])&&isset($_POST['pa'])&&!empty($_POST['pa'])){
  $nu=test_input($_POST['nu']);

   $pa=test_input($_POST['pa']);
	}
else{
	
	echo"<script>alert('Missing Entry!')</script>";
	echo"<script>location.replace('test296.php')</script>";
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

if (!preg_match("/^[0-9a-zA-Z.,\s\p{Arabic} ]*$/u",$pa)) {
   echo "<p style=\"color:red;font-size:28px\">Invalid Password format!</p>"."<br/>";
  echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}






	
	
	
$idr = mysqli_connect("192.168.16.103", "root", "1Sys9Admeen72", "nccleb_test");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
$req=@mysqli_query($idr,"select * from drivers");

while($lig=@mysqli_fetch_assoc($req)){
	$t=0;
    if(($nu==$lig['name_d'])&&($pa==$lig['num_d'])){
	$req1=@mysqli_query($idr,"delete from drivers  where name_d='{$nu}' and num_d='{$pa}'");
	$t=1;
	break;
	}	
}	
    if($t==0){
    echo"<script>alert('Name or Number not found!')</script>";
	echo"<script>location.replace('test296.php')</script>";
	
    }
	

 if($req1){
	 echo "<p id=\"p\">Data is well deleted!</p>";
	 echo "<a href=\"test296.php\">DELETE AGAIN</a>"."<br/>";
	 echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
}
else{
	echo"<script>alert('Incorrect Entry!')</script>";
	echo"<script>location.replace('test296.php')</script>";
	}	


?>
</body>
</html>
 
 
 