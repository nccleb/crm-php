
<?php

session_start();
   $num=$_GET["page"];
   $idf=$_GET["page1"];
 

 $_SESSION["aidf"]=$num;
$_SESSION["anam"]=$idf;






?>








<?php
 $idr = mysqli_connect("192.168.16.103", "root", "1Sys9Admeen72", "nccleb_test");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
if(isset($_POST['search'])){
	 $y=$_POST['name'];
	 $c=$_POST['cat'];
	 $startdate=$_POST['startdate'];
	 $enddate=$_POST['enddate'];
  $req82=mysqli_query($idr,"select * from client c  
left join deals d on   c.id = d.idd 
where con_date between \"$startdate\" and\"$enddate\" 
	

AND category='$c'
order by con_date");
 


  $count=mysqli_num_rows($req82);
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

<center>

<p>CATEGORY REPORT</p>
<HR/>


	
	
	




</head>
<body>


<div class="container text-center"> 
<div class="divClass" id="divClass" >

</center>
<div class="wrapper" >
<table>
  <tr>
    <th>Name</th>
    
	
	

    <th>Number</th>
    <th> Company</th>
	<th> Email</th>
	

	 <th>Category</th>
	 <th>Source</th>
     <th>Deal</th>
     <th>Stage</th>
  </tr>
  



<?php



if($idf=="1" OR $idf=="2"){
if($count=="0")
{
	echo"<h2>No Activities Found!</h2>";
}


else if($y=="*" && $c!=""){
	
	
	
	
	echo "<tr>";
   
	
	echo "<td>"."</td>";
    echo "<td>"."</td>";
    echo"<td>"."</td>";
	echo"<td>"."</td>";
	echo"<td>"."</td>";
    echo"<td>"."</td>";
    echo"<td>"."</td>";
	echo"<td>"."</td>";
    echo "</tr>";
	
	
	while($row=mysqli_fetch_array($req82)){
		$id=$row['nom'] ;
	   $fid= $row['prenom'];
		
		$number=$row['number'];
		
		
		
		$company=$row['company'];
		$email=$row['email'];
	 	
		$category=$row['category'];
		$category=$row['source'];
		$stage=$row['stage'];

    

		echo "<tr>";
    echo "<td>".$row['nom']." ".$row['prenom']."</td>";

	 echo"<td>".$row['number']."</td>";
	 echo"<td>".$row['company']."</td>";
	 
	 echo"<td>".$row['email']."</td>";
	  echo "<td>".$row['category']."</td>";
	  echo "<td>".$row['source']."</td>";
      echo "<td>".$row['name']."</td>";
      echo "<td>".$row['stage']."</td>";
	
	//echo "<td>"."<button  class=\"printPageButton\" onclick=\"window.location='test343.php?id=$id&fid=$fid&lcd=$lcd&agent=$agent&status=$status&idc=$idc&tas=$task&la=$la&incident=$incident '\"></button>"."</td>";

    echo "</tr>";
    
    
	
	 }

		
	}

		
		

$count=mysqli_num_rows($req82);	
echo "<tr><td style=\"color:blue\">". $count. "</tr>";
 //echo "82";
	

}

	
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
Agent <input id="in" type="text" name="name" size="4">
Caller<input id="in" type="text" name="nam" size="8">
Task<input id="in" type="text" name="task" size="8">
Category<input id="in" type="text" name="cat" size="8"><br>
<input id="start" type="datetime-local" name="startdate" size="4">
<input id="end" type="datetime-local" name="enddate" size="4"><br>

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


























