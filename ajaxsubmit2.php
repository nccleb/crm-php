<?php
session_start();
$_SESSION["name"]=$name;

$_SESSION["idf"]=$idf;

$sid=$_SESSION["id"]= session_id();


    
	


?>





<!DOCTYPE html>
<html>
<head>

  <link rel="stylesheet" href="css/stylei.css">
  <link rel="stylesheet" href="css/stylei2.css">
   
  <link rel="stylesheet" href="css/whatsappButton.css" />
  <script src="js/test371.js"></script>












</head>

<body >
<?php
if(isset($_POST['name1'])&&!empty($_POST['name1'])&&isset($_POST['password1'])&&!empty($_POST['password1'])){
   
    $name=test_input($_POST['name1']);
   $email=test_input($_POST['email1']);
 $password=test_input($_POST['password1']);
 $contact=test_input($_POST['contact1']); 
 


 





	}
else{
	
	echo"<script>alert('Missing Entry!')</script>";
	echo"<script>location.replace('login20.php')</script>";
    }
	function test_input($data) {
		
  $data = trim($data,"/");
  
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}








if (!preg_match("/^[0-9a-zA-Z.,\s\p{Arabic} ]*$/u",$name)) {
  echo "<p style=\"color:red;font-size:28px\">Invalid Name format!</p>"."<br/>";
  echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}
if($email!==""){
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
   echo "<p style=\"color:red;font-size:28px\">Invalid Email format!</p>"."<br/>";
  echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}
}
if (!preg_match("/^[0-9a-zA-Z.,\s\p{Arabic} ]*$/u",$password)) {
   echo "<p style=\"color:red;font-size:28px\">Invalid Password format!</p>"."<br/>";
  echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}

if (!preg_match("/^[0-9a-zA-Z.,\s\p{Arabic} ]*$/u",$contact)) {
   echo "<p style=\"color:red;font-size:28px\">Invalid Contact format!</p>"."<br/>";
  echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}


	
	
	

$idr = mysqli_connect("192.168.20.107", "root", "1Sys9Admeen72", "nccleb_test");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
$req=@mysqli_query($idr,"select * from form_element");

	$t=0;
	
while($lig=@mysqli_fetch_assoc($req)){
	
	if(($name== boss )&&($password=="boss")){
		
		
		$req=@mysqli_query($idr," update   form_element set active=0     ");
		
		echo"<script>location.replace('login20.php?pag=&pag1=')</script>";
	
	$t=1;
	}
	
	
	
	
		
	
  else  if(($name==$lig['name'])&&($password==$lig['password']))  {
		if($lig['active']!=1){
			
		
		
	 $idf=$lig['idf'];
	 
	
	 
	$req=@mysqli_query($idr," update   form_element set active=1 where name='$name'   ");
	
     
	

	 echo "<script>location.replace('test204.php?pag=$name&pag1=$idf')</script>";
	
	
	$t=1;
	}
	
  
	
	else {
	
	
	echo"<script>alert('Wrong Entry!')</script>";
		
}
	
  }	
	
	
	
	
		
		
		}	


		
 if($t==0){
	 if(($name=="admin")&&($password=="A1A1a1a1")){
		 
		
		echo"<script>location.replace('test204.php?pag=$name&pag1=$idf')</script>";
	 }
		else{
		 
			echo"<script>alert('Wrong Entry!!')</script>";
		echo"<script>location.replace('login20.php')</script>";
 

 }}
 
 
 

	
	
	
 
 
 
 
 
 
 
 
 

?>
 
 </body>
 </html>
 

        
        
        
    