
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
<?php include('head.php'); ?>
  <link rel="stylesheet" href="css/stylei.css">
  <link rel="stylesheet" href="css/stylei2.css">
   
  <link rel="stylesheet" href="css/whatsappButton.css" />
  <script src="js/test371.js"></script>





</script>
</head>
<body onload="size266()" >

<div class="container text-center"> 
<table class="table">
<tr><th>Name</th><th>Number</th><th>Email</th></tr>

<?php 
	 
	   $idr = mysqli_connect("192.168.16.103", "root", "1Sys9Admeen72", "nccleb_test");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}









	  

$stmt = $idr->prepare("select * from client where community ='Yes'
 ");
	  
	  
	  
			 

			 
             
             
             //$stmt->bind_param("iiii",$contact,$contact,$contact,$contact );
             $stmt->execute();
             
             $req2 = $stmt ->get_result();
             $count=mysqli_num_rows( $req2);
	  
             while($row=mysqli_fetch_array($req2)){
                $id=$row['nom'] ;
               $fid= $row['prenom'];
                
                $number=$row['number'];
                
                
                
                
                $email=$row['email'];
                 
                
            
        
             
             $stmt->close();

			 
	  
			
			 	   

					
			
		echo	"<tr><td>".$id." ".$fid."</td><td>".$number."</td>"."<td>".$email."</td>"."</tr>";
		
		
	          
	  }
	
	  ?>


	 	<tr><td ><?php echo $count?>
		 </tr>
		 
     
	</table>
	
	
	<button type="button" id="form"  class="whatsappbutton" onclick="quit()">Quit</button>
<button type="button" id="form" class="whatsappbutton" onclick="refresh()">Reload</button>
	</body>
	
	</div>
	
	</html>  
		   
	
	  
	  
		
         

	 
	  
	  
	  
	  
	  
       
	 
	  
	































































	
	
	





	
	
	
	
	
	
	
	
	
	
	
	
	

	
	
	
	
	
	
	
	
































