
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
	 $t=$_POST['task'];
	 $y=$_POST['name'];
	 $startdate=$_POST['startdate'];
	 $enddate=$_POST['enddate'];
  $req72=mysqli_query($idr,"select * from client c , crm cr  
where c.id=cr.id and lcd between \"$startdate\" and\"$enddate\" 
AND idfc= '$y'	
AND task='$t'
order by lcd");
 


  $count=mysqli_num_rows($req72);
}

?>


<?php
 $idr = mysqli_connect("192.168.16.103", "root", "1Sys9Admeen72", "nccleb_test");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
if(isset($_POST['search'])&&isset($_POST['name'])){
	 $y=$_POST['name'];
	 
	 $startdate=$_POST['startdate'];
	 $enddate=$_POST['enddate'];
 $req7=mysqli_query($idr,"select * from client c , crm cr  
where c.id=cr.id 
AND idfc=$idf

and lcd between \"$startdate\" and\"$enddate\" order by lcd	
");
  $count=mysqli_num_rows($req7);
}
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









<?php
 $idr = mysqli_connect("192.168.16.103", "root", "1Sys9Admeen72", "nccleb_test");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
if(isset($_POST['search'])&&isset($_POST['name'])&&isset($_POST['nam'])){
	 $y=$_POST['name'];
	 
	 $startdate=$_POST['startdate'];
	 $enddate=$_POST['enddate'];
 $req=mysqli_query($idr,"select * from client c , crm cr  
where c.id=cr.id 
AND idfc=$idf

and lcd between \"$startdate\" and\"$enddate\" order by lcd	
");
  $count=mysqli_num_rows($req);
}
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
	 $t=$_POST['task'];
	
	
	
		$startdate=$_POST['startdate'];
		$enddate=$_POST['enddate'];
	$req33=mysqli_query($idr,"select * from client c , crm cr  
   where c.id=cr.id 
   AND idfc=$y
   AND num=$z
   AND task=$t
   and lcd between \"$startdate\" and\"$enddate\" order by lcd	
   ");
	 $count=mysqli_num_rows($req33);
	 }
   ?>
	
	
	
	
	
	


		

			
		
		


	


<?php
 $idr = mysqli_connect("192.168.16.103", "root", "1Sys9Admeen72", "nccleb_test");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
if(isset($_POST['search'])&&isset($_POST['name'])){
	 $y=$_POST['name'];
	 //$z=$_POST['nam'];
	 $startdate=$_POST['startdate'];
	 $enddate=$_POST['enddate'];
 $req5=mysqli_query($idr,"select * from client c , crm cr  
where c.id=cr.id 
AND idfc=$y

and lcd between \"$startdate\" and\"$enddate\" order by lcd	
");
  $count=mysqli_num_rows($req5);
}
?>






<?php
 $idr = mysqli_connect("192.168.16.103", "root", "1Sys9Admeen72", "nccleb_test");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
if(isset($_POST['search'])){
	 $startdate=$_POST['startdate'];
	 $enddate=$_POST['enddate'];
 $req1=mysqli_query($idr,"select * from client c , crm cr  
where c.id=cr.id and lcd between \"$startdate\" and\"$enddate\" order by lcd");	

  $count=mysqli_num_rows($req1);
}
?>

<?php
 $idr = mysqli_connect("192.168.16.103", "root", "1Sys9Admeen72", "nccleb_test");
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

?>


<?php
 $idr = mysqli_connect("192.168.16.103", "root", "1Sys9Admeen72", "nccleb_test");
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
AND idfc= '$y'	
AND task='$t'
 AND num=$z
order by lcd");
 


  $count=mysqli_num_rows($req19);
}

?>


<?php
 $idr = mysqli_connect("192.168.16.103", "root", "1Sys9Admeen72", "nccleb_test");
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
 AND num=$z
order by lcd");
 


  $count=mysqli_num_rows($req119);
}

?>







<?php
 $idr = mysqli_connect("192.168.16.103", "root", "1Sys9Admeen72", "nccleb_test");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
if(isset($_POST['search'])){
	 $startdate=$_POST['startdate'];
	 $enddate=$_POST['enddate'];
 $req4=mysqli_query($idr,"select * from client c , crm cr  
where c.id=cr.id and lcd between \"$startdate\" and\"$enddate\" 	
AND num=$z
order by lcd");
  $count=mysqli_num_rows($req4);
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

<p>DEALS REPORT</p>
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


<div class="container text-center"> 
<div class="divClass" id="divClass" >

</center>
<div class="wrapper" >
<table>
  <tr>
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
//if($count=="0")
//{
	//echo"<h2>No Activities Found!</h2>";
//}

echo $y;
 if($y=="*#" ){



	
 $idr = mysqli_connect("192.168.16.103", "root", "1Sys9Admeen72", "nccleb_test");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
if(isset($_POST['search'])){
	echo $t=$_POST['task'];
	 $startdate=$_POST['startdate'];
	 $enddate=$_POST['enddate'];
  $req82=mysqli_query($idr,"select * from deals
  where name = \"$t\"
and  contact_date between \"$startdate\" and\"$enddate\" 
	

order by contact_date");
 


 echo "count is". $count=mysqli_num_rows($req82);
}


	
	
	
	
	echo "<tr>";
    echo "<td>"."</td>";
	
	echo "<td>"."</td>";
    echo "<td>"."</td>";
    echo"<td>"."</td>";
	echo"<td>"."</td>";
	echo"<td>"."</td>";
	echo"<td>"."</td>";
	echo"<td>"."</td>";
	echo"<td>"."</td>";
	echo"<td>"."</td>";
    echo "</tr>";
	
	
	while($row=mysqli_fetch_array($req82)){
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
	
	echo "<td>"."<button  class=\"printPageButton\" onclick=\"window.location='test343.php?id=$id&fid=$fid&lcd=$lcd&agent=$agent&status=$status&idc=$idc&tas=$task&la=$la&incident=$incident '\"></button>"."</td>";

    echo "</tr>";
    
    
	
	 

		
	

		
		
}
$count=mysqli_num_rows($req82);	
echo "<tr><td style=\"color:blue\">". $count. "</tr>";
 //echo "82";
	

}



else if($y!="#" AND $y!="*" AND $z!="" AND $t!=""  ){
	
	
	
	
	echo "<tr>";
    echo "<td>".$y."</td>";
	
	echo "<td>"."</td>";
    echo "<td>"."</td>";
    echo"<td>"."</td>";
	echo"<td>"."</td>";
	echo"<td>"."</td>";
	echo"<td>"."</td>";
    echo "</tr>";
	
	
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




		$req11=@mysqli_query($idr," select * from form_element order by idf asc  ");
	$req12=@mysqli_query($idr," SELECT COUNT(idf) as co  FROM form_element; ");
	
	$lig12=@mysqli_fetch_assoc($req12);
	for ($i=1;$i<=$lig12["co"];$i++){
		
		$lig11=@mysqli_fetch_assoc($req11);
		   $_SESSION["$i"]= $lig11["name"];
		   
		
			if($y==$i){
			
		  
		   $driv=$_SESSION["$i"];



		
		echo "<tr>";
    echo "<td>".$row['nom']." ".$row['prenom']."</td>";

	 echo"<td>".$row['task']."</td>";
	 echo"<td>".$row['la']."</td>";
	 
	 echo"<td>".$row['incident']."</td>";
	  echo "<td>".$row['status']."</td>";
	 
	echo"<td>".$row['lcd']."</td>";
	echo"<td>".$driv."</td>";
	echo "<td>"."<button  class=\"printPageButton\" onclick=\"window.location='test343.php?id=$id&fid=$fid&lcd=$lcd&agent=$agent&status=$status&idc=$idc&tas=$task&la=$la&incident=$incident '\"></button>"."</td>";
    echo "</tr>";
  

	
	 }
		
	}

		
		
}

$count=mysqli_num_rows($req19);	
echo "<tr><td style=\"color:blue\">". $count. "</tr>";
//echo "19";
}

else if($y=="#"  AND $z!="" AND $t!=""  ){
	
	
	
	
	echo "<tr>";
    echo "<td>".$y."</td>";
	
	echo "<td>"."</td>";
    echo "<td>"."</td>";
    echo"<td>"."</td>";
	echo"<td>"."</td>";
	echo"<td>"."</td>";
	echo"<td>"."</td>";
    echo "</tr>";
	
	
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
	 
	echo"<td>".$row['lcd']."</td>";
	echo"<td>".$driv."</td>";
	echo "<td>"."<button  class=\"printPageButton\" onclick=\"window.location='test343.php?id=$id&fid=$fid&lcd=$lcd&agent=$agent&status=$status&idc=$idc&tas=$task&la=$la&incident=$incident '\"></button>"."</td>";
    echo "</tr>";
  

	
	 }
		
	}

		
		
}

$count=mysqli_num_rows($req119);	
echo "<tr><td style=\"color:blue\">". $count. "</tr>";
//echo "119";
}




else if($y!="#" AND $y!="*" AND $z=="" AND $t!=""  ){
	
	
	
	
	echo "<tr>";
    echo "<td>".$y."</td>";
	
	echo "<td>"."</td>";
    echo "<td>"."</td>";
    echo"<td>"."</td>";
	echo"<td>"."</td>";
	echo"<td>"."</td>";
	echo"<td>"."</td>";
    echo "</tr>";
	
	
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

    

		$req11=@mysqli_query($idr," select * from form_element order by idf asc  ");
	$req12=@mysqli_query($idr," SELECT COUNT(idf) as co  FROM form_element; ");
	
	$lig12=@mysqli_fetch_assoc($req12);
	for ($i=1;$i<=$lig12["co"];$i++){
		
		$lig11=@mysqli_fetch_assoc($req11);
		   $_SESSION["$i"]= $lig11["name"];
		   
		
			if($y==$i){
			
		  
		   $driv=$_SESSION["$i"];



		
		echo "<tr>";
    echo "<td>".$row['nom']." ".$row['prenom']."</td>";

	 echo"<td>".$row['task']."</td>";
	 echo"<td>".$row['la']."</td>";
	 
	 echo"<td>".$row['incident']."</td>";
	  echo "<td>".$row['status']."</td>";
	 
	echo"<td>".$row['lcd']."</td>";
	echo"<td>".$driv."</td>";
	echo "<td>"."<button  class=\"printPageButton\" onclick=\"window.location='test343.php?id=$id&fid=$fid&lcd=$lcd&agent=$agent&status=$status&idc=$idc&tas=$task&la=$la&incident=$incident '\"></button>"."</td>";
    echo "</tr>";
  

	
	 }
		
	}

		
		
}

$count=mysqli_num_rows($req72);	
echo "<tr><td style=\"color:blue\">". $count. "</tr>";
//echo "72";

}





else if($y=="#" AND $z==""){
	
	
	
	
	echo "<tr>";
    echo "<td>".$y."</td>";
	
	echo "<td>"."</td>";
    echo "<td>"."</td>";
    echo"<td>"."</td>";
	echo"<td>"."</td>";
	echo"<td>"."</td>";
	echo"<td>"."</td>";
    echo "</tr>";
	
	
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
	 
	echo"<td>".$row['lcd']."</td>";
	echo"<td>".$driv."</td>";
	echo "<td>"."<button  class=\"printPageButton\" onclick=\"window.location='test343.php?id=$id&fid=$fid&lcd=$lcd&agent=$agent&status=$status&idc=$idc&tas=$task&la=$la&incident=$incident '\"></button>"."</td>";
    echo "</tr>";
  

	
	 }
		
	}

		
		
}

$count=mysqli_num_rows($req9);	
echo "<tr><td style=\"color:blue\">". $count. "</tr>";
//echo "9";

}

else if($y=="#"AND $z!=""){
	
	
	
	
	echo "<tr>";
    echo "<td>".$y."</td>";
	
	echo "<td>"."</td>";
    echo "<td>"."</td>";
    echo"<td>"."</td>";
	echo"<td>"."</td>";
	echo"<td>"."</td>";
	echo"<td>"."</td>";
    echo "</tr>";
	
	
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
	 
	echo"<td>".$row['lcd']."</td>";
	echo"<td>".$driv."</td>";
	echo "<td>"."<button class=\"printPageButton\" onclick=\"window.location='test343.php?id=$id&fid=$fid&lcd=$lcd&agent=$agent&status=$status&idc=$idc&tas=$task&la=$la&incident=$incident '\"></button>"."</td>";
    echo "</tr>";
  

	
	 }
		
	}

		
		
}

$count=mysqli_num_rows($req19);	
echo  "<tr><td style=\"color:blue\">". $count. "</tr>";
//echo "19";
}


else if($y=="*" && $z==""){
	
	
	
	
	
	echo "<tr>";
    echo "<td>".$y."</td>";
	echo "<td>"."</td>";
    echo "<td>"."</td>";
    echo"<td>"."</td>";
	echo"<td>"."</td>";
	echo"<td>"."</td>";
	echo"<td>"."</td>";
    echo "</tr>";
	
	
	while($row=mysqli_fetch_array($req1)){
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
	 
	echo"<td>".$row['lcd']."</td>";
	echo"<td>".$driv."</td>";
	echo "<td>"."<button  class=\"printPageButton\" onclick=\"window.location='test343.php?id=$id&fid=$fid&lcd=$lcd&agent=$agent&status=$status&idc=$idc&tas=$task&la=$la&incident=$incident '\"></button>"."</td>";
    echo "</tr>";
  
				}

			}
		
		
}


$count=mysqli_num_rows($req1);	
echo "<tr><td style=\"color:blue\">". $count. "</tr>";
//echo "1";

}

else if($y=="*" && $z!==""){
	
	
	
	
	echo "<tr>";
    echo "<td>".$y."</td>";
	echo "<td>"."</td>";
    echo "<td>"."</td>";
    echo"<td>"."</td>";
	echo"<td>"."</td>";
	echo"<td>"."</td>";
	echo"<td>"."</td>";
    echo "</tr>";
	
	
	while($row=mysqli_fetch_array($req4)){
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
	 
	echo"<td>".$row['lcd']."</td>";
	echo"<td>".$driv."</td>";
	echo "<td>"."<button  class=\"printPageButton\" onclick=\"window.location='test343.php?id=$id&fid=$fid&lcd=$lcd&agent=$agent&status=$status&idc=$idc&tas=$task&la=$la&incident=$incident '\"></button>"."</td>";
    echo "</tr>";
  
				}

			}
		
		
}

$count=mysqli_num_rows($req4);	
echo"<tr><td style=\"color:blue\">". $count. "</tr>";
//echo "4";

}








else if($y!=="*" && $z==""){
	
	
	
	
	
	echo "<tr>";
    echo "<td>".$y."</td>";
	echo "<td>"."</td>";
    echo "<td>"."</td>";
    echo"<td>"."</td>";
	echo"<td>"."</td>";
	echo"<td>"."</td>";
	echo"<td>"."</td>";
    echo "</tr>";

	
	
	while($row=mysqli_fetch_array($req5)){
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
	 
	echo"<td>".$row['lcd']."</td>";
	echo"<td>".$driv."</td>";
	echo "<td>"."<button  class=\"printPageButton\" onclick=\"window.location='test343.php?id=$id&fid=$fid&lcd=$lcd&agent=$agent&status=$status&idc=$idc&tas=$task&la=$la&incident=$incident '\"></button>"."</td>";
    echo "</tr>";
  
				}

			}
		
		
}


$count=mysqli_num_rows($req5);	
 echo "<tr><td style=\"color:blue\">". $count. "</tr>";
 

}



else if($y!="" && $z!=""){
	
	
	
	
	
	
	
	
	while($row=mysqli_fetch_array($req8)){
		$id=$row['idce'] ;
		$name=$row['name'] ;
		$descr= $row['description'];
		$_SESSION['de']=$descr;
		 $stage=$row['stage'];
		 $amount=$row['amount'];
		 $contact_date=$row['contact_date'];
		 $close_date=$row['close_date'];
		 $owner=$row['owner'];
		
		 $contact=$row['contact'];
		 
		 $type=$row['type'];
		 $priority=$row['priority'];
		 
 
 


		
		echo "<tr>";
        echo"<td>".$name."</td>";
	
	echo"<td>".$descr."</td>";
	echo"<td>". $stage."</td>";
	 
	echo"<td>".$amount."</td>";

    echo "<td>".$contact_date."</td>";

	echo "<td>".$close_date."</td>";
	 
	echo"<td>".$owner."</td>";
	echo"<td>".$contact."</td>";

    echo"<td>".$type."</td>";
	echo"<td>".$priority."</td>";

	echo "<td>"."<button class=\"printPageButton\" onclick=\"window.location='test422.php?id=$id&name=$name&stage=$stage&amount=$amount&contact_date=$contact_date&close_date=$close_date&owner=$owner&contact=$contact&type=$type&priority=$priority '\"></button>"."</td>";
	//echo "<td>"."<button  class=\"printPageButton\" onclick=\"window.location='test422.php?id=$id&name=$name&description=$description '\"></button>"."</td>";
    echo "</tr>";
  
				}
			
                $count=mysqli_num_rows($req8);	
                echo "<tr><td style=\"color:blue\">". $count. "</tr>";
		
}








else if($y!=="*" && $z!=="" && $t!==""){
	
	
	
	
	
	echo "<tr>";
    echo "<td>".$y."</td>";
	echo "<td>"."</td>";
    echo "<td>"."</td>";
    echo"<td>"."</td>";
	echo"<td>"."</td>";
	echo"<td>"."</td>";
	echo"<td>"."</td>";
    echo "</tr>";
	
	
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
	 
	echo"<td>".$row['lcd']."</td>";
	echo"<td>".$driv."</td>";
	echo "<td>"."<button  class=\"printPageButton\" onclick=\"window.location='test343.php?id=$id&fid=$fid&lcd=$lcd&agent=$agent&status=$status&idc=$idc&tas=$task&la=$la&incident=$incident '\"></button>"."</td>";
    echo "</tr>";
  
				}
			}
		
		
}


$count=mysqli_num_rows($req33);	
 echo "<tr><td style=\"color:blue\">". $count. "</tr>";
 //echo "33";

}




else if($y!=="*" && $z==""){
	
	
	
	echo "<tr>";
    echo "<td>".$y."</td>";
	echo "<td>"."</td>";
    echo "<td>"."</td>";
	echo "<td>"."</td>";
    echo "<td>"."</td>";
    echo"<td>"."</td>";
	echo"<td>"."</td>";
	echo"<td>"."</td>";
	echo"<td>"."</td>";
    echo "</tr>";
	
	
	while($row=mysqli_fetch_array($req7)){
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
	
	 echo"<td>".$row['category']."</td>";
	 
	 echo"<td>".$row['opp']."</td>";
   
    echo"<td>".$row['task']."</td>";
	 echo"<td>".$row['la']."</td>";
	 
	 echo"<td>".$row['incident']."</td>";
	  echo "<td>".$row['status']."</td>";
	 
	echo"<td>".$row['lcd']."</td>";
	echo"<td>".$driv."</td>";
	echo "<td>"."<button  class=\"printPageButton\" onclick=\"window.location='test343.php?id=$id&fid=$fid&lcd=$lcd&agent=$agent&status=$status&idc=$idc&tas=$task&la=$la&incident=$incident '\"></button>"."</td>";
    echo "</tr>";
  
				}
			}
		
		
}


$count=mysqli_num_rows($req7);	
echo "<tr><td style=\"color:blue\">". $count. "</tr>";
//echo "7";


}


	
	
	else if($y!=="*" && $z!=""){
	
	
	
	echo "<tr>";
    echo "<td>".$y."</td>";
	echo "<td>"."</td>";
    echo "<td>"."</td>";
	echo "<td>"."</td>";
    echo "<td>"."</td>";
    echo"<td>"."</td>";
	echo"<td>"."</td>";
	echo"<td>"."</td>";
	echo"<td>"."</td>";
    echo "</tr>";
	
	
	while($row=mysqli_fetch_array($req8)){
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
	
	 echo"<td>".$row['category']."</td>";
	 
	 echo"<td>".$row['opp']."</td>";
   
    echo"<td>".$row['task']."</td>";
	 echo"<td>".$row['la']."</td>";
	 
	 echo"<td>".$row['incident']."</td>";
	  echo "<td>".$row['status']."</td>";
	 
	echo"<td>".$row['lcd']."</td>";
	echo"<td>".$driv."</td>";
	echo "<td>"."<button  class=\"printPageButton\" onclick=\"window.location='test343.php?id=$id&fid=$fid&lcd=$lcd&agent=$agent&status=$status&idc=$idc&tas=$task&la=$la&incident=$incident '\"></button>"."</td>";
    echo "</tr>";
  

				}
			}		
		
		
}

$count=mysqli_num_rows($req8);	
echo "<tr><td style=\"color:blue\">". $count. "</tr>";
//echo "8";


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
Owner <input id="in" type="text" name="name" size="4">
Contact<input id="in" type="text" name="nam" size="8">
Name<input id="in" type="text" name="task" size="8">
Stage<input id="in" type="text" name="stage" size="8">
Priorirty<input id="in" type="text" name="priority" size="8"><br>

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
