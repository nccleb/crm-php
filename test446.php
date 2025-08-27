
<?php

session_start();
$num=$_GET["page"];
$idf=$_GET["page1"];
 

$_SESSION["aidf"]=$num;
$_SESSION["anam"]=$idf;

$ace=$_POST['ace'];




?>



<?php
 $idr = mysqli_connect("192.168.16.103", "root", "1Sys9Admeen72", "nccleb_test");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
if(isset($_POST['search'])&&isset($_POST['name'])){
	 $y=$_POST['name'];
	 $z=$_POST['nam'];
	
	 $startdate=$_POST['startdate'];
	 $enddate=$_POST['enddate'];
 $req8=mysqli_query($idr,"select * from deals 
 where owner = '$y'
 and contact = '$z'
 and contact_date between \"$startdate\" and\"$enddate\" 
 order by close_date	

");
  $count=mysqli_num_rows($req8);
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
<?php include('head.php'); ?>
  <link rel="stylesheet" href="css/stylei.css">
  <link rel="stylesheet" href="css/stylei2.css">
   
  <link rel="stylesheet" href="css/whatsappButton.css" />

  <script type="text/javascript" src="js/test371.js"></script>


  <style>
      
      
     
      th,td {
        padding: 5px 10px;
        border: 2px solid #626d5c;
        text-align: center;
      }
      th {
        background: #04af2f;
      }
    </style>









<center>

<p>DEALS REPORT</p>
<HR/>




























	
	
	
	


</head>
<body>


<div class="container text-center"> 
<div class="divClass" id="divClass" >

</center>
<div class="wrapper" >
<table>
  <tr>
    <th>Pipeline</th>
    <th>Name</th>
  
	
	<th> Description</th>
	<th> Stage</th>
	
	<th>Amount</th>
	<th>Contact Date</th>
	<th>Close Date</th>
    <th>Owner</th>
	<th>Contact</th>
	<th>Type </th>
    <th>Priority</th>

  </tr>
  







<?php



if($idf=="1" OR $idf=="2"){



 //if($ace=="@" ){



	
 $idr = mysqli_connect("192.168.16.103", "root", "1Sys9Admeen72", "nccleb_test");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
if(isset($_POST['search'])){
	 $t=$_POST['task'];
	 $startdate=$_POST['startdate'];
	 $enddate=$_POST['enddate'];
  $req82=mysqli_query($idr,"select * from deals
  where name = \"$t\"
and  contact_date between \"$startdate\" and\"$enddate\" 
	

order by contact_date DESC");
 


 "count is". $count=mysqli_num_rows($req82);
}


	
	
	
	
	
	
	
	while($row=mysqli_fetch_array($req82)){
		$id = $row['idce'];
		$pipeline = $row['pipe'];
		$name=$row['name'] ;
	   
		$description=$row['description'];
		
		$contact_date=$row['contact_date'];
		$stage=$row['stage'];
		$amount=$row['amount'];
		$close_date=$row['close_date'];
		$owner=$row['owner'];
		$contact=$row['contact'];
	 	$type=$row['type'];
		$priority=$row['priority'];
		

    


		
		echo "<tr>";
		
	echo "<td>".$row['pipe']."</td>";	
    echo "<td>".$row['name']."</td>";
    echo"<td>".$row['description']."</td>";
	 
	 echo"<td>".$row['stage']."</td>";
	 

	  echo "<td>".$row['amount']."</td>";
	  echo"<td>".$row['contact_date']."</td>";
	 
	  
	 
	echo"<td>".$row['close_date']."</td>";
	echo"<td>".$row['owner']."</td>";
	echo"<td>".$row['contact']."</td>";
	 
	  echo "<td>".$row['type']."</td>";


	 
	echo"<td>".$row['priority']."</td>";
	//echo '<a href="mycgi?foo=', urlencode($description), '">';
	echo "<td>"."<button  class=\"printPageButton\" onclick=\"window.location='test443.php?pipeline=$pipeline&description=". urlencode($description)."&name=$name&contact_date=$contact_date&stage=$stage&amount=$amount&close_date=$close_date&owner=$owner&contact=$contact&type=$type&priority=$priority&id=$id'\"></button>"."</td>";

    echo "</tr>";
    
    
	
	 

		
	

		
		
}
$count=mysqli_num_rows($req82);	
echo "<tr><td style=\"color:blue\">". $count. "</tr>";
 
	

}
//}
else
	{
		echo"<h2>YOU DON'T HAVE ENOUGH PERMISSIONS!</h2>";
		
		
	}
	
	
	
	?>
	</table>
	
	</div>
	<div  id="printDiv">
	<center>
	<form method="post" >
    

	
	Name<input id="in" type="text" name="task" size="8"><br>
	
	
	<input id="start" type="date" name="startdate" size="4">
	<input id="end" type="date" name="enddate" size="4"><br>
	
	<input id="in" type="submit" name="search" value="Search" size="4" >
	
	
	<button type="button" id="in" onclick="quit()">Quit</button>
	<button type="button" id="in" onclick="printContents(id)">Print</button>
	
	</form>
	</center>
	
	</div>
	</div>
	
	<p id="tr"></p>
	
	
	</body>
		
	</HTML>
	




















	
	
	
	
	


		

			
		
		


	















































	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

	
	
	
	
	
	
	
	






