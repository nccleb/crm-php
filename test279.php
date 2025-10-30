
<?php
session_start();
?>


<?php


    $os=$_SESSION["o"];
    $ps=$_SESSION["p"];
 $_SESSION["os"]=$os;
?>




<!DOCTYPE html>
<html lang="en">
<head>
<?php include('head.php'); ?>
  <link rel="stylesheet" href="css/stylei.css">
  <link rel="stylesheet" href="css/stylei2.css">
   
  <link rel="stylesheet" href="css/whatsappButton.css" />
  <script src="js/test371.js"></script>
  
  
  
  
  
  





</script>
</head>
<body onload="size279()" >

<div class="container text-center">
<table>
<tr><th>Id</th><th>Name</th><th>Number</th><th>Email</th></tr>
<?php 
	 
	$idr = mysqli_connect("192.168.16.103", "root", "1Sys9Admeen72", "nccleb_test");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
	  $sql="SELECT  * FROM drivers" ; 
	  
	  $result=mysqli_query($idr, "SELECT  * FROM drivers");
	  
	  
	  while($row=mysqli_fetch_assoc($result)){ 
	         $id  =$row['idx']; 
			 $name=$row['name_d']; 
			 $number=$row['num_d']; 
			 $email=$row['email'];
		echo	"<tr><td>"."<a  href=\"test280.php?id=$id&name=$name&number=$number&email=$email\">" .$id. " </a></li>\n"."</td><td>"."<a  href=\"test280.php?id=$id&name=$name&number=$number&email=$email\">" .$name . " </a></li>\n"."</td>"."<td>"."<a>".$number."</a>"."</td>"."<td>"."<a>".$email."</a>"."</td>"."</tr>";
			  
	          
	  }
		 
    ?> 
	</table>
	
	
	<button class="whatsappbutton" type="button" id="form"  onclick="quit()">Quit</button>
<button class="whatsappbutton" type="button" id="form" onclick="refresh()">Reload</button>
	</body>
	
	</div>
	
	</html>  
		   
	   
	  
	  
	  
	  
	  
		
         

	 
	  
	  
	  
	  
	  
       
	 
	  
	