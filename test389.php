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
if(isset($_POST['la'])&&isset($_POST['ur'])&&isset($_POST['bu'])){
 
  $la=test_input($_POST['la']);
   $ur=test_input($_POST['ur']);
  $bu=test_input($_POST['bu']);
  $lea=test_input($_POST['bp']);
  $oppor=test_input($_POST['opu']);
  $tas=test_input($_POST['ta']);
  $agent=test_input($_POST['ag']);
  $lcd=test_input($_POST['na']);
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








if (!preg_match("/^[0-9a-zA-Z'?!=;~+%`\[\]()$*\"|:.,#&_\s-\p{Arabic} ]*$/u",$lcd)) {
    echo "<p style=\"color:red\">Invalid Contacted date format!</p>"."<br/>";
    echo "<button id=\"form\"  type=\"button\" onclick=\"quit()\">Quit</button>";
    exit();  
  }


if (!preg_match("/^[0-9a-zA-Z'?!=;~+%`\[\]()$*\"|:.,#&_\s-\p{Arabic} ]*$/u",$tas)) {
  echo "<p style=\"color:red\">Invalid Task format!</p>"."<br/>";
  echo "<button id=\"form\"  type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}


if (!preg_match("/^[0-9a-zA-Z'?!=;~+%`\[\]()$*\"|:.,#&_\s-\p{Arabic} ]*$/u",$la)) {
  echo "<p style=\"color:red\">Invalid Last Activity format!</p>"."<br/>";
  echo "<button id=\"form\"  type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}
if (!preg_match("/^[0-9a-zA-Z'?!=;~+%`\[\]()$*\"|:.,#&_\s-\p{Arabic} ]*$/u",$ur)) {
  echo "<p style=\"color:red\">Invalid Comment format!</p>"."<br/>";
  echo "<button id=\"form\"   type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}
if (!preg_match("/^[0-9a-zA-Z'?!=;~+%`\[\]()$*\"|:.,#&_\s-\p{Arabic} ]*$/u",$bu)) {
  echo "<p style=\"color:red\">Invalid Status format!</p>"."<br/>";
  echo "<button  id=\"form\" type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}

if (!preg_match("/^[0-9a-zA-Z'?!=;~+%`\[\]()$*\"|:.,#&_\s-\p{Arabic} ]*$/u",$agent)) {
    echo "<p style=\"color:red\">Invalid Agent format!</p>"."<br/>";
    echo "<button  id=\"form\" type=\"button\" onclick=\"quit()\">Quit</button>";
    exit();  
  }



 $idr = mysqli_connect("192.168.16.103", "root", "1Sys9Admeen72", "nccleb_test");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}


   $stmt = $idr->prepare("select * from client c , crm cr  


                   where c.id = cr.id  
				   
                   and idc=?
				   
                       
					  

                  
                    
					
					
					");

 
   $stmt->bind_param("i",$id );
   $stmt->execute();

     $result= $stmt ->get_result();

     $stmt->close();

	
     


switch ($agent) {
  case "super":
    $agen="1";
    break;

  case "user":
    $agen="2";
    break;
  
  //default:
    //echo "Your favorite color is neither red, blue, nor green!";
}




while($lig=$result->fetch_assoc()){





   
	 
	
  $stmt = $idr->prepare("update crm set task=?,status=?,la=?,incident=?,lcd=?,idfc=? where idc=? ");
  $stmt->bind_param("sssssss", $tas,$bu,$la,$ur,$lcd,$agen,$id);
  $stmt->execute();

  $test=mysqli_affected_rows($idr)."<br>";
  $stmt->close();
 
}
 
 
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