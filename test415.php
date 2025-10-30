<?php
session_start();
 $id=$_SESSION["id"];
  
 $os=$_SESSION["os"];
 
 $op=$_SESSION["op"];

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


<script>
function size(){
	window.resizeTo(600,900);
}

</script>
<style>
* {
    box-sizing: border-box;
}
@media only screen and (max-width: 1400px) {
    body {
        background-color: lightblue;
		//font-size:4vw;
	}
	
	
}


#form{
	color:blue;
	//font-size:4vw;
}

#for{
	color:red;
	//font-size:4vw;
}


</style>

<script>
function add(){
	var myw;
	
   myw=window.open ("http://192.168.16.103//test266.php?page=<?php echo urlencode($naa) ?>&page1=<?php echo urlencode($idf)?>&page2=<?php echo urlencode($inc) ?>","","menubar=0,resizable=1,width=680,height=950");
	
}
</script>



</head>



<body onload="size()">

<?php
if(isset($_POST['nam'])&&isset($_POST['sta'])&&isset($_POST['amo'])
&&isset($_POST['dat'])&&isset($_POST['typ'])
&&isset($_POST['pri'])&&isset($_POST['dd'])&&isset($_POST['date'])
){
 
  $name=test_input($_POST['nam']);
    $stage=test_input($_POST['sta']);
    $amount=test_input($_POST['amo']);
   $date=test_input($_POST['dat']);
  
   $daat=test_input($_POST['date']);
    $type=test_input($_POST['typ']);
   $priority=test_input($_POST['pri']);
   $description=test_input($_POST['dd']);


	}
	
	
else{
	
	echo"<script>alert('Missing Entry!')</script>";
	echo"<script>location.replace('test266.php')</script>";
    }
	function test_input($data) {
		
  $data = trim($data,"/");
  
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}








if (!preg_match("/^[0-9a-zA-Z'?!=;~+%`\[\]()$*\"|:.,#&_\s-\p{Arabic} ]*$/u",$date)) {
    echo "<p style=\"color:red\">Invalid  date format!</p>"."<br/>";
    echo "<button id=\"form\"  type=\"button\" onclick=\"quit()\">Quit</button>";
    exit();  
  }


  if (!preg_match("/^[0-9a-zA-Z'?!=;~+%`\[\]()$*\"|:.,#&_\s-\p{Arabic} ]*$/u",$daat)) {
    echo "<p style=\"color:red\">Invalid  date format!</p>"."<br/>";
    echo "<button id=\"form\"  type=\"button\" onclick=\"quit()\">Quit</button>";
    exit();  

  }


if (!preg_match("/^[0-9a-zA-Z'?!=;~+%`\[\]()$*\"|:.,#&_\s-\p{Arabic} ]*$/u",$name)) {
  echo "<p style=\"color:red\">Invalid Name format!</p>"."<br/>";
  echo "<button id=\"form\"  type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}


if (!preg_match("/^[0-9a-zA-Z'?!=;~+%`\[\]()$*\"|:.,#&_\s-\p{Arabic} ]*$/u",$description)) {
  echo "<p style=\"color:red\">Invalid description format!</p>"."<br/>";
  echo "<button id=\"form\"  type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}


if (!preg_match("/^[0-9a-zA-Z'?!=;~+%`\[\]()$*\"|:.,#&_\s-\p{Arabic} ]*$/u",$stage)) {
  echo "<p style=\"color:red\">Invalid Stage format!</p>"."<br/>";
  echo "<button id=\"form\"  type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}
if (!preg_match("/^[0-9a-zA-Z'?!=;~+%`\[\]()$*\"|:.,#&_\s-\p{Arabic} ]*$/u",$amount)) {
  echo "<p style=\"color:red\">Invalid Amount format!</p>"."<br/>";
  echo "<button id=\"form\"   type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}





  if (!preg_match("/^[0-9a-zA-Z'?!=;~+%`\[\]()$*\"|:.,#&_\s-\p{Arabic} ]*$/u",$type)) {
    echo "<p style=\"color:red\">Invalid Type format!</p>"."<br/>";
    echo "<button  id=\"form\" type=\"button\" onclick=\"quit()\">Quit</button>";
    exit();  
  }
  
  if (!preg_match("/^[0-9a-zA-Z'?!=;~+%`\[\]()$*\"|:.,#&_\s-\p{Arabic} ]*$/u",$priority)) {
      echo "<p style=\"color:red\">Invalid Priority format!</p>"."<br/>";
      echo "<button  id=\"form\" type=\"button\" onclick=\"quit()\">Quit</button>";
      exit();  
    }






 $idr = mysqli_connect("192.168.16.103", "root", "1Sys9Admeen72", "nccleb_test");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}


  








   
	 
	
  $stmt = $idr->prepare("UPDATE deals set name=?,description=?,contact_date=?,stage=?,amount=?,close_date=?,type=?,priority=?  where idce=? ");
  $stmt->bind_param("ssssssssi",$name, $description,$daat,$stage,$amount,$date,$type,$priority,$id);
  $stmt->execute();

  $test=mysqli_affected_rows($idr)."<br>";
  $stmt->close();
 

 
 
   if($test != -1 && $test != 0   ){

  echo "<p id=\"form\">Data is well updated!</p>";
 
 }
 else{
   
    echo "<p id=\"form\">Data is not  updated!</p>";
    
    
 }
   
 echo "<button id=\"form\"   type=\"button\" onclick=\"quit()\">Quit</button>";
 echo "<button id=\"form\"   type=\"button\" onclick=\"window.location='test266.php?page=$aidf &page1=$anam  ' \">Repeat</button>";
  

 
 
   

mysqli_close($idr); 

?>






























</body>


</html>