
<?php

session_start();
   $num=$_GET["page"];
   $idf=$_GET["page1"];
 

 $_SESSION["aidf"]=$num;
$_SESSION["anam"]=$idf;






?>


<?php


 $idr = mysqli_connect("192.168.16.102", "root", "1Sys9Admeen72", "nccleb_test");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
if(isset($_POST['search'])){
	 $y=$_POST['name'];
	 $c=$_POST['cat'];
	  $p=$_POST['pr'];
	  $z=$_POST['nam'];
	  $ace=$_POST['ace'];
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



   </style>


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

<p>TELEPHONE CALLS REPORT</p>
<HR/>


























<script>
	
	
	
	
function dell(str) {
	
	 var result = confirm("Want to delete?");
if (result) {
    //Logic to delete the item

	
	 var id=document.getElementById("start").value;;
  var idf=document.getElementById("end").value; ;
  
  //alert(name+idf);
	
  var xhttp;
 
  
  
  if (window.XMLHttpRequest) {
    // code for modern browsers
    xhttp = new XMLHttpRequest();
    } else {
    // code for IE6, IE5
    xhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("tr").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET","test352.php?id="+id+"&idf="+idf, true);
 
  xhttp.send();
}

}                                                          
</script>



</head>
<body>




</center>
<div class="wrapper" >
<table>
  <tr>
    <th>Name</th>
  
	
	<th> Ticket</th>
	<th> Activity</th>
	
	 <th>Complaints</th>
	 
	 <th>Status</th>
	 <th>Priority</th>
    <th>Date</th>
	<th>Agent</th>
  </tr>
  



<?php



if($idf=="1" OR $idf=="2"){








 





 


























		
		














	
    $idr = mysqli_connect("192.168.16.102", "root", "1Sys9Admeen72", "nccleb_test");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
if(isset($_POST['search'])){
	 $t=$_POST['task'];
	 $startdate=$_POST['startdate'];
	 $enddate=$_POST['enddate'];
  $req9=mysqli_query($idr,"select * from client c , crm cr  
where c.id=cr.id and lcd between \"$startdate\" and\"$enddate\" 	
AND task='$t'
order by lcd  DESC ");
 


  $count=mysqli_num_rows($req9);
}







	while($row=mysqli_fetch_array($req9)){
		$id=$row['nom'] ;
	   $fid= $row['prenom'];
		$lcd=$row['lcd'];
		$agent=$row['idfc'];
		$number=$row['number'];
		$incident=$row['incident'];
		
		$la=$row['la'];
		 $_SESSION["la"]=$la;
		$idc=$row['idc'];
		$status=$row['status'];
		$task=$row['task'];
		$cat=$row['category'];
		$opp=$row['opp'];
        $pr=$row['priority'];


	// 	$req11=@mysqli_query($idr," select * from form_element order by idf asc  ");
	// $req12=@mysqli_query($idr," SELECT COUNT(idf) as co  FROM form_element; ");
	
	// $lig12=@mysqli_fetch_assoc($req12);
	// for ($i=1;$i<=$lig12["co"];$i++){
		
	// 	$lig11=@mysqli_fetch_assoc($req11);
	// 	   $_SESSION["$i"]= $lig11["name"];
		   
		
	// 		if($agent==$i){
			
		  
	// 	   $driv=$_SESSION["$i"];

	// 		}}

		
		echo "<tr>";
    echo "<td>".$row['nom']." ".$row['prenom']."</td>";

	 echo"<td>".$row['task']."</td>";
	 echo"<td>".$row['la']."</td>";
	 
	 echo"<td>".$row['incident']."</td>";
	  echo "<td>".$row['status']."</td>";
	  echo "<td>".$row['priority']."</td>";
	echo"<td>".$row['lcd']."</td>";
	echo"<td>".$agent."</td>";
	echo "<td>"."<button  class=\"printPageButton\" onclick=\"window.location='test343.php?id=$id&fid=$fid&lcd=$lcd&agent=$agent&status=$status&idc=$idc&tas=$task&la=$la&incident=$incident &priority=$pr'\"></button>"."</td>";
    echo "</tr>";
  

	
	 
		
	

		
		
}

$count=mysqli_num_rows($req9);	
echo "<tr><td style=\"color:blue\">". $count. "</tr>";
//echo "9";

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
 <!--input id="in" type="text" name="ace" size="4"-->

 




 

<input id="in" type="text"  placeholder="Enter Ticket"   name="task" size="8"><br>

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

