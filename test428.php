<?php
session_start();
?>


<?php


    
    
$os=$_SESSION["os"];
 echo $id=$_SESSION["id"];
 echo $name=$_SESSION["name"];
?>



<?php 

    if(isset($_POST['case'])&&!empty($_POST['case'])&&isset($_POST['rate'])&&!empty($_POST['rate'])){
    echo $case=test_input($_POST['case']);
    echo $rate=test_input($_POST['rate']);

	}
else{
	
	echo"<script>alert('Missing Entry!')</script>";
	echo"<script>location.replace('test242.php')</script>";
    }
	function test_input($data) {
	$data = trim($data);	
  $data = trim($data,"/");
  
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if (!preg_match("/^[0-9a-zA-Z.,\s\p{Arabic} ]*$/u",$case)) {
  echo "<p style=\"color:red\">Invalid Case</p>"."<br/>";
  echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}	 


if (!preg_match("/^[0-9a-zA-Z.,\s\p{Arabic} ]*$/u",$rate)) {
    echo "<p style=\"color:red\">Invalid Rate</p>"."<br/>";
    echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
    exit();  
  }	 




$idr = mysqli_connect("192.168.16.103", "root", "1Sys9Admeen72", "nccleb_test");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}




	  
//$req4=@mysqli_query($idr,"UPDATE  drivers SET name_d='$nu' WHERE idx='$id' ");
$stmt = $idr->prepare("insert into  euro  ( tcurrency,tcase,average_rate,tuid) values(?,?,?,?) ");
	 $stmt->bind_param("sisi",$name, $case,$rate,$id);
	 $stmt->execute();
	 $stmt->close();




	
//$req5=@mysqli_query($idr,"UPDATE  drivers SET num_d='$pa' WHERE idx='$id' ");	
  //$stmt = $idr->prepare("UPDATE  drivers SET num_d=? WHERE idx=? ");	
	// $stmt->bind_param("ss", $pa,$id);
	 //$stmt->execute();
	 //$stmt->close();

	  
 
  
	 echo "<p id=\"form\">Data is well inserted!</p>";
	 echo "<a href=\"test380.php\">INSERT AGAIN</a>"."<br/>";
	 echo "<button id=\"form\" type=\"button\" onclick=\"quit()\">Quit</button>";

	
	
	
	
			
			  
	          
	  










		$req3=@mysqli_query($idr,"UPDATE  form_element SET active=0 WHERE name=$os");
 mysqli_close($idr);  



	 
	  
   ?>   

<!DOCTYPE html>
<html lang="en">
<head>
   <?php include('head.php'); ?>
		
		
<script>
function quit(){
	window.close();
}

</script>		
<style>
* {
    box-sizing: border-box;
}
@media only screen and (max-width: 1400px) {
    body {
        background-color: lightblue;
		//font-size:4VW;
	}
	
	
}

#form{
	color:blue;
	//font-size:4VW;
}
</style>





</head>

<body>

<div class="container text-center"> 



<h1><p style="color:red"></p></h1>


</body>
</html>
 