
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
  <link rel="stylesheet" href="stylei.css">
  <link rel="stylesheet" href="stylei2.css">

   <style>
.whatsappbutton { background-color: #7ACC72; /* Green */ border: none; color: white; text-align: center; text-decoration: none; font-size: 16px; border-radius: 20px; padding: 10px 20px; margin-top: 10px !important; width: fit-content; margin: auto; cursor: pointer }



</style>
   


<script>
function size(){
	window.resizeTo(1400,950);
}

</script>

<script>
function quit(){
	window.close();
}

</script>	


<script>
function refresh(){
	window.location.reload();
}

</script>
</head>
<body onload="size()" >

<div class="container text-center"> 
<table class="table">
<tr     ><th>Date</th><th>Number</th> 
   <th>Extension</th><th>Duration</th><th>Status</th></tr>
<?php 
	 
	   $idr = mysqli_connect("192.168.16.103", "root", "1Sys9Admeen72", "nccleb_test");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

         $result=mysqli_query($idr,"select * from billing
        
	  ");
	  
	 
	  
	  
	  $count=mysqli_num_rows( $result);
	  
	  while($row=mysqli_fetch_assoc($result)){ 
	         $date  =$row['bilDate']; 
			 //$time=$row['time']; 
			 $number=$row['callerId'];
			 $extension  =$row['extension']; 
			 $duration=$row['duration']; 
			 $status=$row['status'];
			
			
			 
			 
			
		echo	"<tr>"."<td>".$date."</td>"."<td>".$number."</td>"
		     ."<td>".$extension."</td>"."<td>".$duration."</td>"."<td>".$status."</td>";
			  
	          
	  }
	  ?>
	 	<tr><td style="color:blue"><?php echo $count?>
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
	  
	  
	  
		
         

	 
	  
	  
	  
	  
	  
       
	 
	  
	