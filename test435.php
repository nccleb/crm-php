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
  <link rel="stylesheet" href="css/stylei.css">
  <link rel="stylesheet" href="css/stylei2.css">
   
  <link rel="stylesheet" href="css/whatsappButton.css" />
  <script src="js/test371.js"></script>
  
  
 
  <style>
      
      
     
      th {
        background: #04af2f;
      }
    </style>
  






</head>
<body onload="" >

<div class="container text-center">
<table>

<?php 
	 
	$idr = mysqli_connect("192.168.16.103", "root", "1Sys9Admeen72", "nccleb_test");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
	  
 $stmt = $idr->prepare("SELECT COLUMN_NAME,DATA_TYPE
 FROM INFORMATION_SCHEMA.COLUMNS
 WHERE table_name = 'pipeline'    ") ; 



$stmt->execute();

$result = $stmt ->get_result();

$stmt->close();




$req12=@mysqli_query($idr," SELECT COUNT(COLUMN_NAME) as arr  FROM INFORMATION_SCHEMA.COLUMNS 
WHERE table_name = 'pipeline' ; ");
$lig=@mysqli_fetch_assoc($req12);






    
        
        for ($i=1;$i<=$lig["arr"];$i++){
            
            $lig1=@mysqli_fetch_assoc($result);
            $z = $lig1["DATA_TYPE"];

            if($z!="int"){ 
           echo "<tr><th>".$_SESSION["$i"]= $lig1["COLUMN_NAME"]."<th></tr>";
            }
           $result2=mysqli_query($idr, "SELECT  * FROM pipeline");             
            while($row=@mysqli_fetch_assoc($result2)){
               
                if($z!="int" && $z!=NULL){ 
            
             echo "<tr><td>" . $row[$lig1["COLUMN_NAME"]]."<td></tr>";
             }
            }
         echo "<br>";
    }




   
?> 
</table>


<button class="whatsappbutton" type="button" id="form"  onclick="quit()">Quit</button>
<button class="whatsappbutton" type="button" id="form" onclick="refresh()">Reload</button>
</body>

</div>

</html>  
     
 





  
   







 





	
	  
	      
	
	   
 

  












	  
	 