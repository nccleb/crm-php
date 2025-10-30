
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

  <style>
      
      th {
        position: sticky;
        top: 0;
      }
     
      th,td {
        padding: 5px 10px;
        border: 2px solid #626d5c;
        text-align: center;
      }
      th {
        background: #04af2f;
      }
    </style>



</script>
</head>
<body onload="size266()" >

<div class="container text-center"> 
<table class="table">
<tr><th>Id</th><th>Pipeline</th><th>Name</th><th>Description</th><th>Stage</th><th>Amount</th> <th>Contact Date</th>
   <th>Close Date</th><th>Owner</th><th>Contact</th> <th>Type</th><th>Priority</th></tr>
<?php 
	 
	   $idr = mysqli_connect("192.168.16.103", "root", "1Sys9Admeen72", "nccleb_test");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}










	  

$stmt = $idr->prepare("select *  from deals d , client c
where d.idd  = c.id

ORDER BY d.idce DESC 

");
	 
	  
	  
	  
	  
			 

			 
             
             
             //$stmt->bind_param("iiii",$contact,$contact,$contact,$contact );
             $stmt->execute();
             
             $req2 = $stmt ->get_result();
             $count=mysqli_num_rows( $req2);
	  
             while($row=mysqli_fetch_assoc($req2)){ 
				    $pipeline  =$row['pipe']; 
				    $id  =$row['idce']; 
					$name  =$row['name']; 
					$stage=$row['stage']; 
					$amount=$row['amount'];
					$date  =$row['close_date']; 
					$owner=$row['owner']; 
					$contact  =$row['nom']." ".$row['prenom']; 
					$type  =$row['type']; 
					$priority=$row['priority']; 
                    $description=$row['description']; 
					$daat =$row['contact_date'];    
        
             
             $stmt->close();

			 
	  
			
			 	   

					
			
		echo	"<tr><td>".$id."</td><td>".$pipeline."</td><td>".$name."</td>"."<td>".$description."</td>"."<td>".$stage."</td>"."<td>".$amount."</td>"
		."<td>".$daat."</td>"."<td>".$date."</td>"."<td>".$owner."</td>"."<td>". $contact ."</td>"."<td>".$type."</td>"."<td>".$priority."</td>"."</tr>";
		
	          
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
		   
	<?php
	//<a  href=\"test244.php?id=$id&name=$name&password=$password\">" .$name. " </a></li>\n"."</td><td>"."<a  href=\"test244.php?id=$id&name=$name&password=$password\">" .$password . " </a></li>\n"."</td></tr>"
	 ?> 
	  
	  
	  
		
         

	 
	  
	  
	  
	  
	  
       
	 
	  
	