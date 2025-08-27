
<?php
session_start();
?>


<?php
 $os=$_GET['page'];

   //$os=$_SESSION["o"];
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




 




</head>
<body onload="size242()" >

<div class="jumbotron"> 
<table>
<tr><th>Username</th><th>Password</th><th>Email</th><th>Id</th></tr>
<?php 
	 
	  //connect  to the database 
	   $idr = mysqli_connect("192.168.16.103", "root", "1Sys9Admeen72", "nccleb_test");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
	  
	  $result=mysqli_query($idr, "SELECT  * FROM form_element");

      if($os="true"){

		while($row=mysqli_fetch_assoc($result)){ 
			$name  =$row['name']; 
			$password=$row['password']; 
			$email=$row['eemail'];
			$id=$row['idf']; 
			
			   echo	"<tr><td>"."<a  href=\"test244.php?email=$email&id=$id&name=$name&password=$password\">" .$name. " </a></li>\n"."</td><td>"."<a  href=\"test244.php?email=$email&id=$id&name=$name&password=$password\">" .$password . " </a></li>\n"."</td>"."<td>"."<a>".$email."</a>"."</td>"."<td>"."<a>".$id."</a>"."</td>"."</tr>";
			
	 }
			 
	}
	
      




	  else{
	  
	  while($row=mysqli_fetch_assoc($result)){ 
	         $name  =$row['name']; 
			 $password=$row['password']; 
			 $email=$row['eemail'];
			 $id=$row['idf']; 
            
			  if($name==$os){
		echo	"<tr><td>"."<a  href=\"test244.php?email=$email&id=$id&name=$name&password=$password\">" .$name. " </a></li>\n"."</td><td>"."<a  href=\"test244.php?email=$email&id=$id&name=$name&password=$password\">" .$password . " </a></li>\n"."</td>"."<td>"."<a>".$email."</a>"."</td>"."<td>"."<a>".$id."</a>"."</td>"."</tr>";
	  }
	          
	  }

	}
		 
    ?> 
	</table>
	
	
	<button class="whatsappbutton" type="button" id="form"  onclick="quit()">Quit</button>
<button   class="whatsappbutton"     type="button" id="form" onclick="refresh()">Reload</button>
	</body>
	
	</div>
	
	</html>  
		   
	   
	  
	  
	  
	  
	  
		
         

	 
	  
	  
	  
	  
	  
       
	 
	  
	