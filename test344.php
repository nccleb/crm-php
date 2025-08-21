<?php
session_start();

 $idf= $_SESSION["idf"];
 $nam =$_SESSION["nam"];

   $idc=$_SESSION["idc"];
  //$agent=$_SESSION["agent"];
  $p=$_SESSION["pg"];
  
   $aidf= $_SESSION["aidf"];
 $anam =$_SESSION["anam"];
  
  
?>


<!DOCTYPE html>
<html lang="en">
<head>
<?php include('head.php'); ?>
	 <link rel="stylesheet" href="stylei.css">



<script>
function quit(){
	window.close();
}

</script>


<script>
function size(){
	window.resizeTo(600,900);
}

</script>
<style>

* {
    box-sizing: border-box;
}
@media only screen and (max-width: 2400px) {
    body {
        background-color: lightblue;
		//font-size:4vw;
	}
	
	
}

#form{
	color:blue;
	//font-size:28px;
}

#for{
	color:red;
	//font-size:28px;
}


</style>

</head>



<body onload="">

<div class="container text-center">
<?php


if(isset($_POST['user'])&&isset($_POST['lcd'])&&isset($_POST['status'])&&isset($_POST['la'])
 &&isset($_POST['incident'])&&isset($_POST['text'])&&isset($_POST['agent'])&&isset($_POST['pr'])



 

)

{
   $user=test_input($_POST['user']);
   $fuser=test_input($_POST['fuser']);
  $lcd=test_input($_POST['lcd']);
    $agent=test_input($_POST['agent']);
   $status=test_input($_POST['status']);
  $incident=test_input($_POST['incident']); 
   $ta=test_input($_POST['text']); 
   $la=test_input($_POST['la']); 
   $pr=test_input($_POST['pr']); 



	}
else{
	
	echo"<script>alert('Missing Entry!')</script>";
	// echo "<button id=\"form\"   type=\"button\" onclick=\"quit()\">Quit</button>";
	//echo "<button id=\"form\"   type=\"button\" onclick=\"window.location='test264.php?page=$aidf &page1=$anam  ' \">Repeat</button>";
	echo"<script>location.replace('test264.php?page=$aidf &page1=$anam ')</script>";
    }



    
	function test_input($data) {
		$data = trim($data);
  $data = trim($data,"/");
  
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}









if (!preg_match("/^[a-zA-Z\p{Arabic} ]*$/u",$user)) {
  echo "<p style=\"color:red\">Invalid user format!</p>"."<br/>";
  echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}

if (!preg_match("/^[a-zA-Z\p{Arabic} ]*$/u",$fuser)) {
  echo "<p style=\"color:red\">Invalid fuser format!</p>"."<br/>";
  echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}

if (!preg_match("/^[0-9a-zA-Z'?!=;~+%`\[\]()$*\"|:.,#&_\s-\p{Arabic} ]*$/u",$lcd)) {
  echo "<p style=\"color:red\">Invalid Last Contacted Date format!</p>"."<br/>";
  echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}



if (!preg_match("/^[0-9a-zA-Z'?!=;~+%`\[\]()$*\"|:.,#&_\s-\p{Arabic} ]*$/u",$status)) {
   echo "<p style=\"color:red\">Invalid Status format!</p>"."<br/>";
  echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();
}



if (!preg_match("/^[0-9a-zA-Z'?!=;~+%`\[\]()$*\"|:.,#&_\s-\p{Arabic} ]*$/u",$incident)) {
  echo "<p style=\"color:red\">Invalid Status format!</p>"."<br/>";
 echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
 exit();
}


if (!preg_match("/^[a-zA-Z'?!=;~+%`\[\]()$*\"|:.,#&_\s-\p{Arabic} ]*$/u",$incident)) {
  echo "<p style=\"color:red\">Invalid Priority format!</p>"."<br/>";
 echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
 exit();
}


if (!preg_match("/^[0-9a-zA-Z'?!=;~+%`\[\]()$*\"|:.,#&_\s-\p{Arabic} ]*$/u",$agent)) {
  echo "<p style=\"color:red\">Invalid Status format!</p>"."<br/>";
 echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
 exit();
}

if (!preg_match("/^[0-9a-zA-Z'?!=;~+%`\[\]()$*\"|:.,#&_\s-\p{Arabic} ]*$/u",$la)) {
   echo "<p style=\"color:red\">Invalid Last Activity format!</p>"."<br/>";
  echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();
}


if (!preg_match("/^[0-9a-zA-Z'?!=;~+%`\[\]()$*\"|:.,#&_\s-\p{Arabic} ]*$/u",$ta)) {
  echo "<p style=\"color:red\">Invalid Task format!</p>"."<br/>";
 echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
 exit();
}

	


$idr = mysqli_connect("192.168.16.102", "root", "1Sys9Admeen72", "nccleb_test");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}




$stmt = $idr->prepare("SELECT  * FROM client c,crm d 
      where c.id=d.id 
     and idc=?


 ");

$stmt->bind_param("i", $idc);

$stmt->execute();


$result= $stmt ->get_result();










while($lig=$result->fetch_assoc()){





   
	 
	
	 $stmt = $idr->prepare("update crm set task=?,status=?,la=?,incident=?,priority=?,lcd=?,idfc=? where idc=? ");
	 $stmt->bind_param("ssssssss", $ta,$status,$la,$incident,$pr,$lcd,$agent,$idc);
	 $stmt->execute();

   $test=mysqli_affected_rows($idr)."<br>";
	 $stmt->close();
	
}
	
	
    if($test == -1 || $test == 0  ){
 
	 echo "<p id=\"form\">Data is Not updated!</p>";
	
	}
	else{
		
		 echo "<p id=\"form\">Data is  updated!</p>";
		 
		 
	}
		
	echo "<button id=\"form\"   type=\"button\" onclick=\"quit()\">Quit</button>";
	echo "<button id=\"form\"   type=\"button\" onclick=\"window.location='test264.php?page=$aidf &page1=$anam  ' \">Repeat</button>";
	 

	
	
		

 mysqli_close($idr); 

?>






























</body>

</div>
</html>



