
<?php

session_start();
   $num=$_GET["page"];
   $idf=$_GET["page1"];
 

 $_SESSION["aidf"]=$num;
$_SESSION["anam"]=$idf;


  


?>





<?php 

 $start=$_GET["id"];
     $end=$_GET["idf"];


$idr = mysqli_connect("192.168.16.103", "root", "1Sys9Admeen72", "nccleb_test");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
	
	          
		$stmt = $idr->prepare(" delete FROM crm
      where lcd between ? and ?   ");
	  
 
$stmt->bind_param("ss",$start,$end );

$stmt->execute();

$result = $stmt ->get_result();


$stmt->close();





$stmt1 = $idr->prepare(" select * FROM crm
      where lcd between ? and ?   ");
	  
 
$stmt1->bind_param("ss",$start,$end );

$stmt1->execute();

$result1 = $stmt1 ->get_result();

$lig=@mysqli_fetch_assoc($result1);
   $cu=$lig['idc'];
   
    if($cu==""){ 


echo "ALL IS DELETED";

	}

$stmt1->close();





?>


