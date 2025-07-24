
<?php

session_start();
   $num=$_GET["page"];
   $idf=$_GET["page1"];
 

 $_SESSION["aidf"]=$num;
$_SESSION["anam"]=$idf;






?>


<?php


 $idr = mysqli_connect("192.168.20.107", "root", "1Sys9Admeen72", "nccleb_test");
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








 if($ace=="##"){
	
	$idr = mysqli_connect("192.168.20.107", "root", "1Sys9Admeen72", "nccleb_test");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
if(isset($_POST['search'])){
	 $startdate=$_POST['startdate'];
	 $enddate=$_POST['enddate'];
	 $p=$_POST['pr'];
 $req41=mysqli_query($idr,"select * from client c , crm cr  
where c.id=cr.id and lcd between \"$startdate\" AND \"$enddate\" 	
AND priority=\"$p\"
order by lcd");
   $count=mysqli_num_rows($req41);
}
	
	
	while($row=mysqli_fetch_array($req41)){
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



		$req11=@mysqli_query($idr," select * from form_element order by idf asc  ");
		$req12=@mysqli_query($idr," SELECT COUNT(idf) as co  FROM form_element; ");
		
		$lig12=@mysqli_fetch_assoc($req12);
		for ($i=1;$i<=$lig12["co"];$i++){
			
			$lig11=@mysqli_fetch_assoc($req11);
			   $_SESSION["$i"]= $lig11["name"];
			   
			
				if($agent==$i){
				
			  
			   $driv=$_SESSION["$i"];
		
			   echo "<tr>";
			   echo "<td>".$row['nom']." ".$row['prenom']."</td>";
		   
				echo"<td>".$row['task']."</td>";
				echo"<td>".$row['la']."</td>";
				
				echo"<td>".$row['incident']."</td>";
				 echo "<td>".$row['status']."</td>";
				 echo "<td>".$row['priority']."</td>";
			   echo"<td>".$row['lcd']."</td>";
			   echo"<td>".$driv."</td>";
			   echo "<td>"."<button  class=\"printPageButton\" onclick=\"window.location='test343.php?id=$id&fid=$fid&lcd=$lcd&agent=$agent&status=$status&idc=$idc&tas=$task&la=$la&incident=$incident&priority=$pr '\"></button>"."</td>";
		   
			   echo "</tr>";
  
				}
			}
		
		
}


$count=mysqli_num_rows($req41);	
echo "<tr><td style=\"color:blue\">". $count. "</tr>";


}





else if($ace=="#" ){

	
	
	echo "req33";
	
	
	$idr = mysqli_connect("192.168.20.107", "root", "1Sys9Admeen72", "nccleb_test");
   if (mysqli_connect_errno()) {
	 echo "Failed to connect to MySQL: " . mysqli_connect_error();
	 exit();
   }
   if(isset($_POST['search'])&&isset($_POST['name'])){
	    $y=$_POST['name'];
        $z=$_POST['nam'];
	    $t=$_POST['task'];
	  
	  
	  
		  $startdate=$_POST['startdate'];
		  $enddate=$_POST['enddate'];
	$req33=mysqli_query($idr,"select * from client c , crm cr  
   where c.id=cr.id 
   AND idfc=\"$y\"
   AND num=\"$z\"
   AND task=\"$t\"
   and lcd between \"$startdate\" and\"$enddate\" order by lcd	
   ");
	echo $count=mysqli_num_rows($req33);
   }
   
   
	
	
	while($row=mysqli_fetch_array($req33)){
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
 


		$req11=@mysqli_query($idr," select * from form_element order by idf asc  ");
		$req12=@mysqli_query($idr," SELECT COUNT(idf) as co  FROM form_element; ");
		
		$lig12=@mysqli_fetch_assoc($req12);
		for ($i=1;$i<=$lig12["co"];$i++){
			
			$lig11=@mysqli_fetch_assoc($req11);
			   $_SESSION["$i"]= $lig11["name"];
			   
			
				if($agent==$i){
				
			  
			   $driv=$_SESSION["$i"];
		
		echo "<tr>";
    echo "<td>".$row['nom']." ".$row['prenom']."</td>";
	
	echo"<td>".$row['task']."</td>";
	 echo"<td>".$row['la']."</td>";
	 
	 echo"<td>".$row['incident']."</td>";
	  echo "<td>".$row['status']."</td>";
	  echo "<td>".$row['priority']."</td>";
	echo"<td>".$row['lcd']."</td>";
	echo"<td>".$driv."</td>";
	echo "<td>"."<button class=\"printPageButton\" onclick=\"window.location='test343.php?id=$id&fid=$fid&lcd=$lcd&agent=$agent&status=$status&idc=$idc&tas=$task&la=$la&incident=$incident &priority=$pr'\"></button>"."</td>";
    echo "</tr>";
  
				}
			}
		
		
}


$count=mysqli_num_rows($req33);	
echo "<tr><td style=\"color:blue\">". $count. "</tr>";


}












 

























else if($ace=="*#" ){


	$idr = mysqli_connect("192.168.20.107", "root", "1Sys9Admeen72", "nccleb_test");
	if (mysqli_connect_errno()) {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  exit();
	}
	if(isset($_POST['search'])){
		 
		 $startdate=$_POST['startdate'];
		 $enddate=$_POST['enddate'];
	  $req282=mysqli_query($idr,"select * from client c , crm cr  
	where c.id=cr.id and lcd between \"$startdate\" and\"$enddate\" 
		
	
	
	order by lcd");
	 
	
	
	  $count=mysqli_num_rows($req282);
	}











	
	
	
	while($row=mysqli_fetch_array($req282)){
		$id=$row['nom'] ;
	   $fid= $row['prenom'];
		$lcd=$row['lcd'];
		$agent=$row['idfc'];
		$number=$row['number'];
		$incident=$row['incident'];
		//$_SESSION["incident"]=$nam;
		$la=$row['la'];
		 $_SESSION["la"]=$la;
		$idc=$row['idc'];
		$status=$row['status'];
	 	$task=$row['task'];
		$cat=$row['category'];
		$opp=$row['opp'];
        $pr=$row['priority'];
    

		$req11=@mysqli_query($idr," select * from form_element order by idf asc  ");
	$req12=@mysqli_query($idr," SELECT COUNT(idf) as co  FROM form_element; ");
	
	$lig12=@mysqli_fetch_assoc($req12);
	for ($i=1;$i<=$lig12["co"];$i++){
		
		$lig11=@mysqli_fetch_assoc($req11);
		   $_SESSION["$i"]= $lig11["name"];
		   
		
			if($agent==$i){
			
		  
		   $driv=$_SESSION["$i"];



		
		echo "<tr>";
    echo "<td>".$row['nom']." ".$row['prenom']."</td>";

	 echo"<td>".$row['task']."</td>";
	 echo"<td>".$row['la']."</td>";
	 
	 echo"<td>".$row['incident']."</td>";
	  echo "<td>".$row['status']."</td>";
	  echo "<td>".$row['priority']."</td>";
	echo"<td>".$row['lcd']."</td>";
	echo"<td>".$driv."</td>";
	//echo "<td>"."<button  class=\"printPageButton\" onclick=\"window.location='test343.php?id=$id&fid=$fid&lcd=$lcd&agent=$agent&status=$status&idc=$idc&tas=$task&la=$la&incident=$incident&priority=$pr '\"></button>"."</td>";
	echo "<td>"."<button  class=\"printPageButton\" onclick=\"window.location='test343.php?id=$id&fid=$fid&lcd=$lcd&agent=$agent&status=$status&idc=$idc&tas=$task&la=$la&incident=$incident&priority=$pr '\"></button>"."</td>";
    echo "</tr>";
    
    
	
	 }

		
	}

		
		
}
$count=mysqli_num_rows($req282);	
echo "<tr><td style=\"color:blue\">". $count. "</tr>";
 
	

}





else if($ace=="#*" ){
	
	


	$idr = mysqli_connect("192.168.20.107", "root", "1Sys9Admeen72", "nccleb_test");
	if (mysqli_connect_errno()) {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  exit();
	}
	if(isset($_POST['search'])){
		  $y=$_POST['name'];
		  $t=$_POST['task'];
		  $z=$_POST['nam'];
		 $startdate=$_POST['startdate'];
		 $enddate=$_POST['enddate'];
	  $req119=mysqli_query($idr,"select * from client c , crm cr  
	where c.id=cr.id and lcd between \"$startdate\" and\"$enddate\" 
	
	AND task='$t'
	 AND num='$z'
	order by lcd");
	 
	
	
	  $count=mysqli_num_rows($req119);
	}









    
	
	while($row=mysqli_fetch_array($req119)){
		$id=$row['nom'] ;
	   $fid= $row['prenom'];
		$lcd=$row['lcd'];
		$agent=$row['idfc'];
		$number=$row['number'];
		$incident=$row['incident'];
		//$_SESSION["incident"]=$nam;
		$la=$row['la'];
		 $_SESSION["la"]=$la;
		$idc=$row['idc'];
		$status=$row['status'];
		$task=$row['task'];
		$cat=$row['category'];
		$opp=$row['opp'];
        $pr=$row['priority'];



		$req11=@mysqli_query($idr," select * from form_element order by idf asc  ");
	$req12=@mysqli_query($idr," SELECT COUNT(idf) as co  FROM form_element; ");
	
	$lig12=@mysqli_fetch_assoc($req12);
	for ($i=1;$i<=$lig12["co"];$i++){
		
		$lig11=@mysqli_fetch_assoc($req11);
		   $_SESSION["$i"]= $lig11["name"];
		   
		
			if($agent=="$i"){
			
		  
		   $driv=$_SESSION["$i"];



		
		echo "<tr>";
    echo "<td>".$row['nom']." ".$row['prenom']."</td>";

	 echo"<td>".$row['task']."</td>";
	 echo"<td>".$row['la']."</td>";
	 
	 echo"<td>".$row['incident']."</td>";
	  echo "<td>".$row['status']."</td>";
	  echo "<td>".$row['priority']."</td>";
	echo"<td>".$row['lcd']."</td>";
	echo"<td>".$driv."</td>";
	echo "<td>"."<button  class=\"printPageButton\" onclick=\"window.location='test343.php?id=$id&fid=$fid&lcd=$lcd&agent=$agent&status=$status&idc=$idc&tas=$task&la=$la&incident=$incident &priority=$pr  '\"></button>"."</td>";
    echo "</tr>";
  

	
	 }
		
	}

		
		
}

$count=mysqli_num_rows($req119);	
echo "<tr><td style=\"color:blue\">". $count. "</tr>";

}




else if($ace=="!"  ){
	
	


	$idr = mysqli_connect("192.168.20.107", "root", "1Sys9Admeen72", "nccleb_test");
	if (mysqli_connect_errno()) {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  exit();
	}
	if(isset($_POST['search'])){
		   $t=$_POST['task'];
		   $y=$_POST['name'];
		 
		   $startdate=$_POST['startdate'];
		   $enddate=$_POST['enddate'];
	  $req72=mysqli_query($idr,"select * from client c , crm cr  
	where c.id=cr.id and lcd between \"$startdate\" and\"$enddate\" 
	AND idfc=$y
	AND task='$t'
	order by lcd");
	 
	
	
	  $count=mysqli_num_rows($req72);
	}









	
	while($row=mysqli_fetch_array($req72)){
		$id=$row['nom'] ;
	   $fid= $row['prenom'];
		$lcd=$row['lcd'];
		$agent=$row['idfc'];
		$number=$row['number'];
		$incident=$row['incident'];
		//$_SESSION["incident"]=$nam;
		$la=$row['la'];
		 $_SESSION["la"]=$la;
		$idc=$row['idc'];
		$status=$row['status'];
	 	$task=$row['task'];
		$cat=$row['category'];
		$opp=$row['opp'];
        $pr=$row['priority'];
    

		$req11=@mysqli_query($idr," select * from form_element order by idf asc  ");
	$req12=@mysqli_query($idr," SELECT COUNT(idf) as co  FROM form_element; ");
	
	$lig12=@mysqli_fetch_assoc($req12);
	for ($i=1;$i<=$lig12["co"];$i++){
		
		$lig11=@mysqli_fetch_assoc($req11);
		   $_SESSION["$i"]= $lig11["name"];
		   
		
			if($agent==$i){
			
		  
		   $driv=$_SESSION["$i"];

			}

	}
		echo "<tr>";
    echo "<td>".$row['nom']." ".$row['prenom']."</td>";

	 echo"<td>".$row['task']."</td>";
	 echo"<td>".$row['la']."</td>";
	 
	 echo"<td>".$row['incident']."</td>";
	  echo "<td>".$row['status']."</td>";
	  echo "<td>".$row['priority']."</td>";
	echo"<td>".$row['lcd']."</td>";
	echo"<td>".$agent."</td>";
	echo "<td>"."<button  class=\"printPageButton\" onclick=\"window.location='test343.php?id=$id&fid=$fid&lcd=$lcd&agent=$agent&status=$status&idc=$idc&tas=$task&la=$la&incident=$incident  &priority=$pr'\"></button>"."</td>";
    echo "</tr>";
  

	
	 
		
	

		
		
}

$count=mysqli_num_rows($req72);	
echo "<tr><td style=\"color:blue\">". $count. "</tr>";


}





else if($ace=="!!"){
	
	
    $idr = mysqli_connect("192.168.20.107", "root", "1Sys9Admeen72", "nccleb_test");
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
order by lcd");
 


  $count=mysqli_num_rows($req9);
}







	while($row=mysqli_fetch_array($req9)){
		$id=$row['nom'] ;
	   $fid= $row['prenom'];
		$lcd=$row['lcd'];
		$agent=$row['idfc'];
		$number=$row['number'];
		$incident=$row['incident'];
		//$_SESSION["incident"]=$nam;
		$la=$row['la'];
		 $_SESSION["la"]=$la;
		$idc=$row['idc'];
		$status=$row['status'];
		$task=$row['task'];
		$cat=$row['category'];
		$opp=$row['opp'];
        $pr=$row['priority'];


		$req11=@mysqli_query($idr," select * from form_element order by idf asc  ");
	$req12=@mysqli_query($idr," SELECT COUNT(idf) as co  FROM form_element; ");
	
	$lig12=@mysqli_fetch_assoc($req12);
	for ($i=1;$i<=$lig12["co"];$i++){
		
		$lig11=@mysqli_fetch_assoc($req11);
		   $_SESSION["$i"]= $lig11["name"];
		   
		
			if($agent==$i){
			
		  
		   $driv=$_SESSION["$i"];



		
		echo "<tr>";
    echo "<td>".$row['nom']." ".$row['prenom']."</td>";

	 echo"<td>".$row['task']."</td>";
	 echo"<td>".$row['la']."</td>";
	 
	 echo"<td>".$row['incident']."</td>";
	  echo "<td>".$row['status']."</td>";
	  echo "<td>".$row['priority']."</td>";
	echo"<td>".$row['lcd']."</td>";
	echo"<td>".$driv."</td>";
	echo "<td>"."<button  class=\"printPageButton\" onclick=\"window.location='test343.php?id=$id&fid=$fid&lcd=$lcd&agent=$agent&status=$status&idc=$idc&tas=$task&la=$la&incident=$incident &priority=$pr'\"></button>"."</td>";
    echo "</tr>";
  

	
	 }
		
	}

		
		
}

$count=mysqli_num_rows($req9);	
echo "<tr><td style=\"color:blue\">". $count. "</tr>";
//echo "9";

}

else if($ace=="@"){
	
	
	
	$idr = mysqli_connect("192.168.20.107", "root", "1Sys9Admeen72", "nccleb_test");
   if (mysqli_connect_errno()) {
	 echo "Failed to connect to MySQL: " . mysqli_connect_error();
	 exit();
   }
   if(isset($_POST['search'])){

		 $y=$_POST['name'];
		 $t=$_POST['task'];
		  $z=$_POST['nam'];
		$startdate=$_POST['startdate'];
		$enddate=$_POST['enddate'];
	 $req19=mysqli_query($idr,"select * from client c , crm cr  
   where c.id=cr.id and lcd between \"$startdate\" and\"$enddate\" 
   	
   
	AND num='$z'
   order by lcd");
	
   
   
	 $count=mysqli_num_rows($req19);
   }
   
   
   










	
	
	
	while($row=mysqli_fetch_array($req19)){
		$id=$row['nom'] ;
	   $fid= $row['prenom'];
		$lcd=$row['lcd'];
		$agent=$row['idfc'];
		$number=$row['number'];
		$incident=$row['incident'];
		//$_SESSION["incident"]=$nam;
		$la=$row['la'];
		 $_SESSION["la"]=$la;
		$idc=$row['idc'];
		$status=$row['status'];
		$task=$row['task'];
		$cat=$row['category'];
		$opp=$row['opp'];
        $pr=$row['priority'];



		$req11=@mysqli_query($idr," select * from form_element order by idf asc  ");
	$req12=@mysqli_query($idr," SELECT COUNT(idf) as co  FROM form_element; ");
	
	$lig12=@mysqli_fetch_assoc($req12);
	for ($i=1;$i<=$lig12["co"];$i++){
		
		$lig11=@mysqli_fetch_assoc($req11);
		   $_SESSION["$i"]= $lig11["name"];
		   
		
			if($agent==$i){
			
		  
		   $driv=$_SESSION["$i"];



		
		echo "<tr>";
    echo "<td>".$row['nom']." ".$row['prenom']."</td>";

	 echo"<td>".$row['task']."</td>";
	 echo"<td>".$row['la']."</td>";
	 
	 echo"<td>".$row['incident']."</td>";
	  echo "<td>".$row['status']."</td>";
	  echo "<td>".$row['priority']."</td>";
	echo"<td>".$row['lcd']."</td>";
	echo"<td>".$driv."</td>";
	echo "<td>"."<button class=\"printPageButton\" onclick=\"window.location='test343.php?id=$id&fid=$fid&lcd=$lcd&agent=$agent&status=$status&idc=$idc&tas=$task&la=$la&incident=$incident &priority=$pr '\"></button>"."</td>";
    echo "</tr>";
  

	
	 }
		
	}

		
		
}

$count=mysqli_num_rows($req19);	
echo  "<tr><td style=\"color:blue\">". $count. "</tr>";
//echo "19";
}











	
	












else if($ace=="*" ){

	
	
	
	$idr = mysqli_connect("192.168.20.107", "root", "1Sys9Admeen72", "nccleb_test");
   if (mysqli_connect_errno()) {
	 echo "Failed to connect to MySQL: " . mysqli_connect_error();
	 exit();
   }
   if(isset($_POST['search'])&&isset($_POST['name'])){
	   $y=$_POST['name'];
	   $z=$_POST['nam'];
	   $t=$_POST['task'];
	  
	  
	  
		  $startdate=$_POST['startdate'];
		  $enddate=$_POST['enddate'];
	$req3=mysqli_query($idr,"select * from client c , crm cr  
   where c.id=cr.id 
   AND idfc=$y
   AND num=$z
   and lcd between \"$startdate\" and\"$enddate\" order by lcd	
   ");
	 $count=mysqli_num_rows($req3);
   }
   
   
	
	

	while($row=mysqli_fetch_array($req3)){
		$id=$row['nom'] ;
		$fid= $row['prenom'];
		 $lcd=$row['lcd'];
		 $agent=$row['idfc'];
		 $number=$row['number'];
		 $incident=$row['incident'];
		 //$_SESSION["incident"]=$nam;
		 $la=$row['la'];
		  $_SESSION["la"]=$la;
		 $idc=$row['idc'];
		 $status=$row['status'];
		 $task=$row['task'];
		 $cat=$row['category'];
		 $opp=$row['opp'];
         $pr=$row['priority'];
 


		$req11=@mysqli_query($idr," select * from form_element order by idf asc  ");
		$req12=@mysqli_query($idr," SELECT COUNT(idf) as co  FROM form_element; ");
		
		$lig12=@mysqli_fetch_assoc($req12);
		for ($i=1;$i<=$lig12["co"];$i++){
			
			$lig11=@mysqli_fetch_assoc($req11);
			   $_SESSION["$i"]= $lig11["name"];
			   
			
				if($agent==$i){
				
			  
			   $driv=$_SESSION["$i"];
		
		echo "<tr>";
    echo "<td>".$row['nom']." ".$row['prenom']."</td>";
	
	echo"<td>".$row['task']."</td>";
	 echo"<td>".$row['la']."</td>";
	 
	 echo"<td>".$row['incident']."</td>";
	  echo "<td>".$row['status']."</td>";
	  echo "<td>".$row['priority']."</td>";
	echo"<td>".$row['lcd']."</td>";
	echo"<td>".$driv."</td>";
	echo "<td>"."<button class=\"printPageButton\" onclick=\"window.location='test343.php?id=$id&fid=$fid&lcd=$lcd&agent=$agent&status=$status&idc=$idc&tas=$task&la=$la&incident=$incident &priority=$pr'\"></button>"."</td>";
    echo "</tr>";
  
				}
			}
		
		
}


$count=mysqli_num_rows($req3);	
echo "<tr><td style=\"color:blue\">". $count. "</tr>";
//echo "3";

}



else if($ace=="*" ){

	
	
	
	$idr = mysqli_connect("192.168.20.107", "root", "1Sys9Admeen72", "nccleb_test");
   if (mysqli_connect_errno()) {
	 echo "Failed to connect to MySQL: " . mysqli_connect_error();
	 exit();
   }
   if(isset($_POST['search'])&&isset($_POST['name'])){
	   $y=$_POST['name'];
	   $z=$_POST['nam'];
	   $t=$_POST['task'];
	  
	  
	  
		  $startdate=$_POST['startdate'];
		  $enddate=$_POST['enddate'];
	$req3=mysqli_query($idr,"select * from client c , crm cr  
   where c.id=cr.id 
   AND idfc='$y'
   AND num='$z'
   and lcd between \"$startdate\" and\"$enddate\" order by lcd	
   ");
	 $count=mysqli_num_rows($req3);
   }
   
   
	
	



	while($row=mysqli_fetch_array($req3)){
		$id=$row['nom'] ;
		$fid= $row['prenom'];
		 $lcd=$row['lcd'];
		 $agent=$row['idfc'];
		 $number=$row['number'];
		 $incident=$row['incident'];
		 //$_SESSION["incident"]=$nam;
		 $la=$row['la'];
		  $_SESSION["la"]=$la;
		 $idc=$row['idc'];
		 $status=$row['status'];
		 $task=$row['task'];
		 $cat=$row['category'];
		 $opp=$row['opp'];
         $pr=$row['priority'];
 


		$req11=@mysqli_query($idr," select * from form_element order by idf asc  ");
		$req12=@mysqli_query($idr," SELECT COUNT(idf) as co  FROM form_element; ");
		
		$lig12=@mysqli_fetch_assoc($req12);
		for ($i=1;$i<=$lig12["co"];$i++){
			
			$lig11=@mysqli_fetch_assoc($req11);
			   $_SESSION["$i"]= $lig11["name"];
			   
			
				if($agent==$i){
				
			  
			   $driv=$_SESSION["$i"];
		
		echo "<tr>";
    echo "<td>".$row['nom']." ".$row['prenom']."</td>";
	
	echo"<td>".$row['task']."</td>";
	 echo"<td>".$row['la']."</td>";
	 
	 echo"<td>".$row['incident']."</td>";
	  echo "<td>".$row['status']."</td>";
	  echo "<td>".$row['priority']."</td>";
	echo"<td>".$row['lcd']."</td>";
	echo"<td>".$driv."</td>";
	echo "<td>"."<button class=\"printPageButton\" onclick=\"window.location='test343.php?id=$id&fid=$fid&lcd=$lcd&agent=$agent&status=$status&idc=$idc&tas=$task&la=$la&incident=$incident &priority=$pr'\"></button>"."</td>";
    echo "</tr>";
  
				}
			}
		
		
}


$count=mysqli_num_rows($req3);	
echo "<tr><td style=\"color:blue\">". $count. "</tr>";
//echo "3";

}




else if($ace=="**" ){

	
	
	
	$idr = mysqli_connect("192.168.20.107", "root", "1Sys9Admeen72", "nccleb_test");
   if (mysqli_connect_errno()) {
	 echo "Failed to connect to MySQL: " . mysqli_connect_error();
	 exit();
   }
   if(isset($_POST['search'])&&isset($_POST['name'])){
	   $y=$_POST['name'];
	   $z=$_POST['nam'];
	   $t=$_POST['task'];
	  
	  
	  
		  $startdate=$_POST['startdate'];
		  $enddate=$_POST['enddate'];
	$req33=mysqli_query($idr,"select * from client c , crm cr  
   where c.id=cr.id 
   AND idfc='$y'
   AND num='$z'
   AND task='$t'
   and lcd between \"$startdate\" and\"$enddate\" order by lcd	
   ");
	 $count=mysqli_num_rows($req33);
   }
   
   
	
	


	
	while($row=mysqli_fetch_array($req33)){
		$id=$row['nom'] ;
		$fid= $row['prenom'];
		 $lcd=$row['lcd'];
		 $agent=$row['idfc'];
		 $number=$row['number'];
		 $incident=$row['incident'];
		 //$_SESSION["incident"]=$nam;
		 $la=$row['la'];
		  $_SESSION["la"]=$la;
		 $idc=$row['idc'];
		 $status=$row['status'];
		 $task=$row['task'];
		 $cat=$row['category'];
		 $opp=$row['opp'];
         $pr=$row['priority'];
 


		$req11=@mysqli_query($idr," select * from form_element order by idf asc  ");
		$req12=@mysqli_query($idr," SELECT COUNT(idf) as co  FROM form_element; ");
		
		$lig12=@mysqli_fetch_assoc($req12);
		for ($i=1;$i<=$lig12["co"];$i++){
			
			$lig11=@mysqli_fetch_assoc($req11);
			   $_SESSION["$i"]= $lig11["name"];
			   
			
				if($agent==$i){
				
			  
			   $driv=$_SESSION["$i"];
		
		echo "<tr>";
    echo "<td>".$row['nom']." ".$row['prenom']."</td>";
	
	echo"<td>".$row['task']."</td>";
	 echo"<td>".$row['la']."</td>";
	 
	 echo"<td>".$row['incident']."</td>";
	  echo "<td>".$row['status']."</td>";
	  echo "<td>".$row['priority']."</td>";
	echo"<td>".$row['lcd']."</td>";
	echo"<td>".$driv."</td>";
	echo "<td>"."<button class=\"printPageButton\" onclick=\"window.location='test343.php?id=$id&fid=$fid&lcd=$lcd&agent=$agent&status=$status&idc=$idc&tas=$task&la=$la&incident=$incident &priority=$pr'\"></button>"."</td>";
    echo "</tr>";
  
				}
			}
		
		
}


$count=mysqli_num_rows($req33);	
echo "<tr><td style=\"color:blue\">". $count. "</tr>";
//echo "3";

}




	
	
	

	
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

 <p> 
<select      name="ace">

<option value=""  selected>Select something...</option>
<option value="*#"      >All </option>
<option value="@"      >All->Caller</option>

<option value="!!">All Agents->Ticket</option>
<option value="!"> Agent->Ticket</option>
<option value="#*"> Caller->Ticket</option>
<option value="*"> Agent->Caller</option>
<option value="**"> Agent->Caller->Ticket</option>
<option  value="##"      >Priority Calls</option>

</select>
<p>	




 

Agent

<select     name="name">

<option value=""  selected>Select something...  </option>

 <?php
$stmt = $idr->prepare("SELECT * from form_element ") ; 

   



$stmt->execute();

$result = $stmt ->get_result();

$stmt->close();






while($row=$result->fetch_assoc()){


 $y = $row[name];

 
 
echo " <option value=\"$y\">".$y. " </option> "; 



   
}

?> 

 
</select>





Caller <input    placeholder="Enter value...  "     id="in" type="text" name="nam" size="8">
 Priority
<select    name="pr">

<option value=""  selected>Select something...</option>

<option>Low</option>
<option>Medium</option>
<option>High</option>


</select>


Ticket <input   placeholder="Enter value...  "     id="in" type="text" name="task" size="8">






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
