
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
 <style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    //padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>  
   
   
<style>
* {
    box-sizing: border-box;
}
@media only screen and (max-width: 1400px) {
    body {
        background-color: lightblue;
		//font-size:2vw;
	}
	
	
}

#form{
	color:blue;
	//font-size:2vw;
}

#for{
	color:red;
	//font-size:2vw;
}


</style>

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
<table    style="color:#1500FF; align="center"        >
<tr  style="font-size:1vw;background-color:#7ACC72"       ><th>ID</th><th>First name</th><th>Last name</th><th>Company</th><th>Number</th><th>INumber</th><th>Telmobile</th> <th>Telother</th><th>Email</th><th>url</th><th>Business</th> 
    <th>City</th><th>Street</th><th>Floor</th><th>Apartment</th><th>Building</th><th>Zone</th><th>Near</th><th>Remark</th> <th>Address</th><th>Address</th></tr>
<?php 
	 $idr = mysqli_connect("192.168.16.103", "root", "1Sys9Admeen72", "nccleb_test");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

      $result=mysqli_query($idr,"select * from client c , address ad  
	     
	  where c.id=ad.id 
	 
	  ORDER BY idad DESC     
        
	  ");
	 
	  
	 
	  $count=mysqli_num_rows( $result);
	  
	  while($row=mysqli_fetch_assoc($result)){ 
	         $id=   $row['id']; 
	         $name  =$row['nom'];
             $lname  =$row['prenom']; 			 
			 $company=$row['company']; 
			 $number=$row['number'];
			 $inumber  =$row['inumber']; 
			 $email=$row['email']; 
			 $url=$row['url'];
			 $business  =$row['business']; 
			 $telmobile=$row['telmobile']; 
			 $telother=$row['telother'];
			 $city  =$row['city']; 
			 $street=$row['street']; 
			 $floor  =$row['floor']; 
			 $apartment=$row['apartment']; 
			 $building=$row['building'];
			 $zone  =$row['zone']; 
			 $near=$row['near']; 
			 $remark=$row['remark'];
			 $address  =$row['address']; 
			$address2  =$row['address_two']; 
			
		echo	"<tr>"."<td>".$id."</td>"."<td>".$name."</td>"."<td>".$lname."</td>"."<td>".$company."</td>"."<td>".$number."</td>"."<td>".$inumber."</td>"."<td>".$telmobile."</td>"."<td>".$telother."</td>"."<td>".$email."</td>"."<td>".$url."</td>"."<td>". $business."</td>"."<td>".$city."</td>"
		        ."<td>".$street."</td>"."<td>".$floor."</td>"."<td>".$apartment."</td>"."<td>".$building."</td>"."<td>".$zone."</td>"."<td>".$near."</td>"."<td>".$remark."</td>"."<td>".$address."</td>"."<td>".$address2."</td>";
			  
	          
	  }
	  ?>
	 	
		 
     
	</table>
	
	
	<button  class=" whatsappbutton"  type="button" id="form"  onclick="quit()">Quit</button>
<button    class=" whatsappbutton"        type="button" id="form" onclick="refresh()">Reload</button>
	</body>
	
	</div>
	
	</html>  
		   

	  
	  
	  
		
         

	 
	  
	  
	  
	  
	  
       
	 
	  
	