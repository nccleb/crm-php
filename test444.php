<?php
session_start();


   $id=$_SESSION['id'];
 
  
?>


<!DOCTYPE html>
<html lang="en">
<head>
<?php include('head.php'); ?>
	 <link rel="stylesheet" href="stylei.css">



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
@media only screen and (max-width: 2400px) {
    body {
        background-color: lightblue;
		//font-size:4vw;
	}
	
	
}

#form{
	color:blue;
	//font-size:28px;
}

#for{
	color:red;
	//font-size:28px;
}


</style>

</head>



<body onload="">

<div class="container text-center">
<?php



if(isset($_POST['pipeline'])&&isset($_POST['name'])&&isset($_POST['description'])&&isset($_POST['contact_date'])
 &&isset($_POST['stage'])&&isset($_POST['amount'])&&isset($_POST['close_date'])&&isset($_POST['owner'])
 &&isset($_POST['deal_type'])&&isset($_POST['priority'])&&isset($_POST['contact'])




 

)

{
   $pipeline=test_input($_POST['pipeline']);
   $name=test_input($_POST['name']);
  $description=test_input($_POST['description']);
    $contact_date=test_input($_POST['contact_date']);
   $stage=test_input($_POST['stage']);
  $amount=test_input($_POST['amount']); 
   $close_date=test_input($_POST['close_date']); 
   $type=test_input($_POST['deal_type']); 
   $priority=test_input($_POST['priority']); 
   $owner=test_input($_POST['owner']); 
   $contact=test_input($_POST['contact']); 


	}
else{
	
	echo"<script>alert('Missing Entry!')</script>";
	// echo "<button id=\"form\"   type=\"button\" onclick=\"quit()\">Quit</button>";
	//echo "<button id=\"form\"   type=\"button\" onclick=\"window.location='test264.php?page=$aidf &page1=$anam  ' \">Repeat</button>";
	echo"<script>location.replace('test421.php?page=$aidf &page1=$anam ')</script>";
    }



    
	function test_input($data) {
		$data = trim($data);
  $data = trim($data,"/");
  
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}








if (!preg_match("/^[0-9a-zA-Z'?!=;~+%`\[\]()$*\"|:.,#&_\s-\p{Arabic} ]*$/u",$pipeline)) {

  echo "<p style=\"color:red\">Invalid pipeline format!</p>"."<br/>";
  echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}



if (!preg_match("/^[0-9a-zA-Z'?!=;~+%`\[\]()$*\"|:.,#&_\s-\p{Arabic} ]*$/u",$name)) {

  echo "<p style=\"color:red\">Invalid name format!</p>"."<br/>";
  echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}

if (!preg_match("/^[0-9a-zA-Z'?!=;~+%`\[\]()$*\"|:.,#&_\s-\p{Arabic} ]*$/u",$description)) {
  echo "<p style=\"color:red\">Invalid description format!</p>"."<br/>";
  echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}



if (!preg_match("/^[0-9a-zA-Z'?!=;~+%`\[\]()$*\"|:.,#&_\s-\p{Arabic} ]*$/u",$contact_date)) {
   echo "<p style=\"color:red\">Invalid contact_date format!</p>"."<br/>";
  echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();
}



if (!preg_match("/^[0-9a-zA-Z'?!=;~+%`\[\]()$*\"|:.,#&_\s-\p{Arabic} ]*$/u",$stage)) {
  echo "<p style=\"color:red\">Invalid stage format!</p>"."<br/>";
 echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
 exit();
}

if (!preg_match("/^[0-9\p{Arabic} ]*$/u",$amount)) {

  echo "<p style=\"color:red\">Invalid amount format!</p>"."<br/>";
 echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
 exit();
}



if (!preg_match("/^[0-9\p{Arabic} ]*$/u",$contact)) {

    echo "<p style=\"color:red\">Invalid contact format!</p>"."<br/>";
   echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
   exit();
  }




if (!preg_match("/^[0-9a-zA-Z'?!=;~+%`\[\]()$*\"|:.,#&_\s-\p{Arabic} ]*$/u",$close_date)) {
  echo "<p style=\"color:red\">Invalid close_date format!</p>"."<br/>";
 echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
 exit();
}

if (!preg_match("/^[0-9a-zA-Z'?!=;~+%`\[\]()$*\"|:.,#&_\s-\p{Arabic} ]*$/u",$type)) {
   echo "<p style=\"color:red\">Invalid type  format!</p>"."<br/>";
  echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();
}


if (!preg_match("/^[0-9a-zA-Z'?!=;~+%`\[\]()$*\"|:.,#&_\s-\p{Arabic} ]*$/u",$priority)) {
  echo "<p style=\"color:red\">Invalid priority format!</p>"."<br/>";
 echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
 exit();
}

	
if (!preg_match("/^[0-9a-zA-Z'?!=;~+%`\[\]()$*\"|:.,#&_\s-\p{Arabic} ]*$/u",$owner)) {
    echo "<p style=\"color:red\">Invalid owner format!</p>"."<br/>";
   echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
   exit();
  }




$idr = mysqli_connect("192.168.16.103", "root", "1Sys9Admeen72", "nccleb_test");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}



$stmt = $idr->prepare("select id  from client where number=? or inumber=? or telmobile=? or telother=? ");

   $stmt->bind_param("iiii",$contact,$contact,$contact,$contact );
   $stmt->execute();

     $req2= $stmt ->get_result();

     $stmt->close();

					
	while($lig=@mysqli_fetch_assoc($req2)){
  $id1=$lig['id'];
 
 
	}
	 $stmt->close();












$stmt = $idr->prepare("UPDATE deals set name=?,description=?,contact_date=?,stage=?,amount=?,close_date=?,type=?,priority=?,owner=?,pipe=?,contact=?,idd=?  where idce=? ");
  $stmt->bind_param("sssssssssssis",$name, $description,$contact_date,$stage,$amount,$close_date,$type,$priority,$owner,$pipeline,$contact,$id1,$id);
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
	echo "<button id=\"form\"   type=\"button\" onclick=\"window.location='test264.php?page=$aidf &page1=$anam  ' \">Repeat</button>";
	 

	
	
		

 mysqli_close($idr); 

?>






























</body>

</div>
</html>



