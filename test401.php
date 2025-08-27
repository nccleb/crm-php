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
if(isset($_POST['nu'])&&!empty($_POST['nu'])&&isset($_POST['na'])&&!empty($_POST['na']) &&isset($_POST['em'])&&!empty($_POST['em']) &&isset($_POST['cnu'])&&!empty($_POST['cnu'])    ){
 
 
   
 $na=test_input($_POST['na']);
 
 $nu=test_input($_POST['nu']);
 
 $em=test_input($_POST['em']);

 $cnu=test_input($_POST['cnu']);



	}
else{
	
	echo"<script>alert('Missing Entry!')</script>";
	echo"<script>location.replace('test182.php')</script>";
    }
	function test_input($data) {
	$data = trim($data);		
  $data = trim($data,"/");
  
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if (!preg_match("/^[a-zA-Z0-9\p{Arabic} ]*$/u",$na)) {
  echo "<p style=\"color:red;font-size:28px\">Invalid Name format!</p>"."<br/>";
  echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}
if (!preg_match("/^[0-9]*$/",$nu)) {
  echo "<p style=\"color:red;font-size:28px\">Invalid Number format!</p>"."<br/>";
  echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}

if (!preg_match("/^[0-9]*$/",$cnu)) {
  echo "<p style=\"color:red;font-size:28px\">Invalid Number format!</p>"."<br/>";
  echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}

if($em!==""){
    if (!filter_var($em, FILTER_VALIDATE_EMAIL)) {
      echo "<p style=\"color:red;font-size:28px\">Invalid Email format!</p>"."<br/>";
      echo "<button id=\"id\" type=\"button\" onclick=\"quit()\">Quit</button>";
      exit();
    }}
	
	

 $idr = mysqli_connect("192.168.16.103", "root", "1Sys9Admeen72", "nccleb_test");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

$req2=@mysqli_query($idr," SELECT *
from form_element

 ");

while($lig=@mysqli_fetch_assoc($req2)){
	
    if($nu==$lig['name'] or $na==$lig['eemail'] or$na==$lig['password'] ) {
		
	echo"<script>alert('Duplicate Name or Number!')</script>";
		
	echo "<a href=\"test400.php?page=$os&page1=$ps\"><button id=\"form\">Try again</button></a>";
	echo exit();
		}

    if($nu!= $cnu ) {
		
      echo"<script>alert('Password mismatch!')</script>";
        
      echo "<a href=\"test400.php?page=$os&page1=$ps\"><button id=\"form\">Try again</button></a>";
      echo exit();
        }

        if(strlen($nu)< 8 ) {
		
          echo"<script>alert('Password too small!')</script>";
            
          echo "<a href=\"test400.php?page=$os&page1=$ps\"><button id=\"form\">Try again</button></a>";
          echo exit();
            } 

}

   $contact="no";
   $active=0;
	$stmt = $idr->prepare("insert into form_element (name,password,eemail,contact,active) values(?,?,?,?,?)");

$stmt->bind_param("ssssi", $na,$nu,$em,$contact,$active);


$stmt->execute();

$result = $stmt ->get_result();
$stmt->close();
   

 
  
	 echo "<p id=\"p\">Data is well inserted!</p>";
	echo "<a href=\"test400.php?page=$os&page1=$ps\"><button id=\"form\">Insert again</button></a>";
	 echo "<button id=\"id\" type=\"button\" onclick=\"quit()\">Quit</button>";

	
 mysqli_close($idr); 
	

?>
 
 </body>
 </html>
 

        
        
        
    