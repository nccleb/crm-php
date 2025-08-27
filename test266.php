
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

<body onload="size266()">

<div class="container text-center"> 
<table class="table">
<tr><th>Id</th><th>Name</th><th>Number</th><th>Ticket</th><th>Last Contacted Date</th><th>Last Activity</th><th>Complaint</th><th>Priority</th><th>Status</th><th>Agent</th></tr>
  
<?php 
	 
	   $idr = mysqli_connect("192.168.16.103", "root", "1Sys9Admeen72", "nccleb_test");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

         $result=mysqli_query($idr,"select * from client c , crm cr
	  where c.id=cr.id 
	  ORDER BY IDC DESC
        
	  ");
	  
	 
	  
	  
	  $count=mysqli_num_rows( $result);
	  
	  while($row=mysqli_fetch_assoc($result)){ 
		     $id  =$row['idc']; 
	         $name  =$row['nom']." ".$row['prenom']; 
			 $company=$row['company']; 
			 $number=$row['number'];
			 $inumber  =$row['inumber']; 
			 $email=$row['email']; 
			 $url=$row['url'];
			 $business  =$row['business']; 
			 $telmobile=$row['telmobile']; 
			 $telother=$row['telother'];
			 $task=$row['task'];
			
			 $lcd  =$row['lcd']; 
			 $la=$row['la']; 
			 $incident=$row['incident'];
			 $pr=$row['priority'];
			 $status  =$row['status']; 
			 $idf  =$row['idfc']; 


			 


			 
	  
			
			 	   

// 					$req11=@mysqli_query($idr," select * from form_element order by idf asc  ");
// $req12=@mysqli_query($idr," SELECT COUNT(idf) as co  FROM form_element; ");

// $lig12=@mysqli_fetch_assoc($req12);
// for ($i=1;$i<=$lig12["co"];$i++){
	
// 	$lig11=@mysqli_fetch_assoc($req11);
// 	   $_SESSION["$i"]= $lig11["name"];
	   
	
// 	    if($idf==$i){
		
	  
// 	   $driv=$_SESSION["$i"];
//  }
	
// }



			 
			
		echo	"<tr><td>".$id."</td><td>".$name."</td>"."<td>".$number."</td>"."<td>".$task."</td>"
		     ."<td>".$lcd."</td>"."<td>".$la."</td>"."<td>". $incident ."</td>"."<td>". $pr ."</td>"."<td>".$status."</td>"."<td>".$idf."</td>"."</tr>";
			  
	          
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
	  
	  
	  
		
         

	 
	  
	  
	  
	  
	  
       
	 
	  
	