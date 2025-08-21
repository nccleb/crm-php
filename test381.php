<?php
session_start();

    $os=$_SESSION["o"];
     $ps=$_SESSION["p"];
?>


<!DOCTYPE html>
<html>
<head>
<?php include('head.php'); ?>
  <link rel="stylesheet" href="css/stylei.css">
  <link rel="stylesheet" href="css/stylei2.css">
   
  <link rel="stylesheet" href="css/whatsappButton.css" />
  <script src="js/test371.js"></script>




</head>

<body>
<?php
if(isset($_POST['na'])&&!empty($_POST['na'])){
 
 
   
  $na=test_input($_POST['na']);
 
 
 





	}
else{
	
	echo"<script>alert('Missing Entry!')</script>";
	echo"<script>location.replace('test380.php')</script>";
    }
	function test_input($data) {
	$data = trim($data);		
  $data = trim($data,"/");
  
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if (!preg_match("/^[a-zA-Z0-9\p{Arabic} ]*$/u",$na)) {
  echo "<p style=\"color:red;font-size:28px\">Invalid Complaint format!</p>"."<br/>";
  echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}



	
	

 $idr = mysqli_connect("192.168.16.102", "root", "1Sys9Admeen72", "nccleb_test");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

$req2=@mysqli_query($idr," SELECT comment_text
from comments

 ");

while($lig=@mysqli_fetch_assoc($req2)){
	
    if( $na==$lig['comment_text']) {
		
	echo"<script>alert('Duplicate Complaint!')</script>";
	
	echo "<a href=\"test380.php?page=$os&page1=$ps\"><button id=\"form\">Try again</button></a>";
	echo exit();
		}
}

  
	$stmt = $idr->prepare("insert into comments (comment_text) values(?)");

$stmt->bind_param("s", $na);


$stmt->execute();

$result = $stmt ->get_result();
$stmt->close();
   

 
  
	 echo "<p id=\"p\">Data is well inserted!</p>";
	echo "<a href=\"test380.php?page=$os&page1=$ps\"><button id=\"form\">Insert again</button></a>";
	 echo "<button id=\"id\" type=\"button\" onclick=\"quit()\">Quit</button>";

	
 mysqli_close($idr); 
	

?>
 
 </body>
 </html>
 

        
        
        
    