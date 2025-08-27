<?php
session_start();
?>


<?php


    
    
 $os=$_SESSION["os"];
$id=$_SESSION["id"];
?>



<?php 

    if(isset($_POST['nu'])&&!empty($_POST['nu'])&& isset($_POST['pa'])&&!empty($_POST['pa'])&& isset($_POST['em'])&&!empty($_POST['em'])&& isset($_POST['cpa'])&&!empty($_POST['cpa'])){
    $nu=test_input($_POST['nu']);

    $pa=test_input($_POST['pa']);
    $em=test_input($_POST['em']);
    $cpa=test_input($_POST['cpa']);
	}
else{
	
	echo"<script>alert('Missing Entry!')</script>";
	echo"<script>window.close()</script>";
    }
	function test_input($data) {
  $data = trim($data);	
  $data = trim($data,"/");
  
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if (!preg_match("/^[0-9a-zA-Z.,\s\p{Arabic} ]*$/u",$nu)) {
  echo "<p style=\"color:red\">Invalid Tel</p>"."<br/>";
  echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}	 


if (!preg_match("/^[0-9a-zA-Z.,\s\p{Arabic} ]*$/u",$pa)) {
  echo "<p style=\"color:red\">Invalid Tel</p>"."<br/>";
  echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}	 


if (!preg_match("/^[0-9a-zA-Z.,\s\p{Arabic} ]*$/u",$cpa)) {
  echo "<p style=\"color:red\">Invalid Password</p>"."<br/>";
  echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}	 


if($em!==""){
  if (!filter_var($em, FILTER_VALIDATE_EMAIL)) {
    echo "<p style=\"color:red;font-size:28px\">Invalid Email format!</p>"."<br/>";
    echo "<button id=\"id\" type=\"button\" onclick=\"quit()\">Quit</button>";
    exit();
  }}

//connect  to the database 
	 $idr = mysqli_connect("192.168.16.103", "root", "1Sys9Admeen72", "nccleb_test");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

		






if($pa==$cpa){
	  
$req4=@mysqli_query($idr,"UPDATE  form_element SET name='$nu' WHERE idf='$id' ");	
$req5=@mysqli_query($idr,"UPDATE  form_element SET password='$pa' WHERE idf='$id' ");	
$req6=@mysqli_query($idr,"UPDATE  form_element SET eemail='$em' WHERE idf='$id' "); 
}
else{
	echo"<script>alert('Password Mismatch!')</script>";
	
	echo"<script>window.close()</script>";
	}

if($req4==1&&$req5==1&&$req6==1){ 
  
	 echo "<p id=\"form\">Data is well inserted!</p>";
	 //echo "<a href=\"test242.php\">INSERT AGAIN</a>"."<br/>";
	 echo "<button id=\"form\" type=\"button\" onclick=\"quit()\">Quit</button>";
}
else{
	echo"<script>alert('Incorrect Entry!')</script>";
	
	
	echo"<script>window.close()</script>";
	}
			
			  
	          
	  










		
 mysqli_close($idr);  



	 
	  
   ?>   

<!DOCTYPE html>
<html lang="en">
<head>
  <title>NCC</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		
		
<script>
function quit(){
	window.close();
}

</script>		
<style>
* {
    box-sizing: border-box;
}
@media only screen and (max-width: 1400px) {
    body {
        background-color: lightblue;
		//font-size:4VW;
	}
	
	
}

#form{
	color:blue;
	//font-size:4VW;
}
</style>





</head>

<body>

<div class="container text-center"> 



<h1><p style="color:red"></p></h1>


</body>
</html>
 

   





       
        
        
    