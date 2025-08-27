<!DOCTYPE html>
<html>
<head>

 <?php include('head.php'); ?>
<script>
function quit(){
	window.close()
}

</script>





<style>
* {
    box-sizing: border-box;
}
@media only screen and (max-width: 1400px) {
    body {
        background-color: lightblue;
		font-size:1vw;
	}
	
	
}


#p{
	color:red;
	font-size:5vw;
}


#p1{
	color:blue;
	font-size:5vw;
}




</style>
</head>

<body>
<?php







	
	
	
$idr = mysqli_connect("192.168.16.103", "root", "1Sys9Admeen72", "nccleb_test");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
$req=@mysqli_query($idr,"set foreign_key_checks=0");
$req.=@mysqli_query($idr,"truncate table billing");
$req.=@mysqli_query($idr,"set foreign_key_checks=1");
$req.=@mysqli_query($idr,"alter table billing auto_increment=1");


$stmt = $idr->prepare("SELECT  idc FROM crm ");

	  
 


$stmt->execute();

$result = $stmt ->get_result();

$stmt->close();




$i=0;

while($row=$result->fetch_assoc()){

	  
	          
			  
	         
              $i=1;
			  
			  
			  
			  
}
			  

 if($i==1){
	 echo "<p id=\"p\">Table is not deleted!</p>";
	 
	 echo "<button id=\"p1\"  type=\"button\" onclick=\"quit()\">Quit</button>";
}
else{
	echo "<p id=\"p\">Table is well deleted!</p>";
	echo "<button id=\"p1\"   type=\"button\" onclick=\"quit()\">Quit</button>";
}


?>
</body>
</html>
 
 
 

        
        
        
    
