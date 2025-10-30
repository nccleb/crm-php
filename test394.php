<!DOCTYPE html>
<html>
<head>
<title>p30</title>
<script>
function quit(){
	window.close()
}

</script>





<style>
#p{
	color:red;
	font-size:36px;
}

</style>
</head>

<body>
<?php
if(isset($_POST['nu'])&&!empty($_POST['nu'])){
   $nu=test_input($_POST['nu']);


	}
else{
	
	echo"<script>alert('Missing Entry!')</script>";
	echo"<script>location.replace('test29.php')</script>";
    }
    
	function test_input($data) {
		
  $data = trim($data,"/");
  
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if (!preg_match("/^[0-9]*$/",$nu)) {
  echo "<p style=\"color:red;font-size:28px\">Invalid Number format!</p>"."<br/>";
  echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}







	
	
	
$idr = mysqli_connect("192.168.16.103", "root", "1Sys9Admeen72", "nccleb_test");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}


$stmt = $idr->prepare("select *  from client where id=?");
$stmt->bind_param("i",$nu);
$stmt->execute();
$result = $stmt ->get_result();
$stmt->close();
   $lig=$result->fetch_assoc();

   

  $nui=$lig['filename'];

	






$filename="";
$stmt = $idr->prepare("update client set filename=? where id=?");
$stmt->bind_param("si",$filename,$nu);
$stmt->execute();
$result = $stmt ->get_result();
 $test=mysqli_affected_rows($idr);
$stmt->close();


unlink("/wamp64/www/testapp/public/image/$nui");

if($test == 0  ){
	  
    echo	  "<script>

var r = confirm(\"Missing Entry! Press OK to retry \");
if (r == true) {
location.replace (\"http://192.168.16.103//test393.php?page=$naa&page1=$idf&page2=$incc\",\"menubar=0,resizable=1,width=1000,height=950\");
} else {
window.close()
}


</script>";
       
    }
    
    elseif($test != -1   ){
   

  echo "<p id=\"form\">Data is well updated!</p>";
  
    }
    
    else{
         echo "<p id=\"form\">Data is not updated!</p>";
    }
    
   echo "<button id=\"form\"   type=\"button\" onclick=\"add()\">TRY AGAIN</button>";
  
   
   echo "<button id=\"form\"   type=\"button\" onclick=\"quit()\">Quit</button>";
  
   

  

      

mysqli_close($idr); 




	
	
	

	
	
	
	
    
		
	
	
	
	
    
	
?>
</body>
</html>
 
 
 

        
        
        
    
