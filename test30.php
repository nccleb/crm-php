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





	
	



     $req4=@mysqli_query($idr,"select id from client ");

     while( $lig=@mysqli_fetch_assoc($req4)){
    $cu=$lig['id'];
    
   
	
    if($cu==$nu){ 
	$req5=@mysqli_query($idr,"select id from crm ");

     while( $lig=@mysqli_fetch_assoc($req5)){
	
	$req6=@mysqli_query($idr,"delete from crm  where id='{$nu}' ");
	
	 }



 
	$req2=@mysqli_query($idr,"delete from address  where id='{$nu}' ");
	

	$req1=@mysqli_query($idr,"delete from client  where id='{$nu}' ");


    unlink("/wamp64/www/testapp/public/image/$nui");

	
	$t=1;
	}
	 }
	if($t==1){
		
		echo "<p id=\"p\">Data is well deleted!</p>";
	 echo "<a href=\"test29.php\">DELETE AGAIN</a>"."<br/>";
	 echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
	}
	else{
     echo"<script>alert('Incorrect Entry!')</script>";
	echo"<script>location.replace('test29.php')</script>";
	
	}
	
	
	
	
	

	
	
	
	
    
		
	
	
	
	
    
	
?>
</body>
</html>
 
 
 

        
        
        
    
