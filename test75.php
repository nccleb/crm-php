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
	
   myw=window.open ("http://192.168.20.107//before.php?page=<?php echo urlencode($naa) ?>&page1=<?php echo urlencode($idf)?>&page2=<?php echo urlencode($inc) ?>","","menubar=0,resizable=1,width=680,height=950");
	
}
</script>







</head>



<body onload="size()">

<?php
if(isset($_POST['la'])&&isset($_POST['ur'])&&isset($_POST['bu']) &&isset($_POST['pr'])){
 
  $la=test_input($_POST['la']);
   $ur=test_input($_POST['ur']);
  $bu=test_input($_POST['bu']);
  $na=test_input($_POST['na']);
  $co=test_input($_POST['co']);
  $tas=test_input($_POST['ta']);
  $pr=test_input($_POST['pr']);
	}
	
	
else{
	
	echo"<script>alert('Missing Entry!')</script>";
	echo"<script>location.replace('before.php')</script>";
    }
	function test_input($data) {
		
  $data = trim($data,"/");
  
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if (!preg_match("/^[a-zA-Z'?!=;~+%`\[\]()$*\"|:.,#&_\s-\p{Arabic} ]*$/u",$pr)) {
  echo "<p style=\"color:red\">Invalid Name Priority!</p>"."<br/>";
  echo "<button id=\"form\"  type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}

if (!preg_match("/^[0-9a-zA-Z'?!=;~+%`\[\]()$*\"|:.,#&_\s-\p{Arabic} ]*$/u",$co)) {
  echo "<p style=\"color:red\">Invalid Name format!</p>"."<br/>";
  echo "<button id=\"form\"  type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}


if (!preg_match("/^[0-9a-zA-Z'?!=;~+%`\[\]()$*\"|:.,#&_\s-\p{Arabic} ]*$/u",$na)) {
  echo "<p style=\"color:red\">Invalid Last Contacted format!</p>"."<br/>";
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





 $idr = mysqli_connect("192.168.20.107", "root", "1Sys9Admeen72", "nccleb_test");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}


   $stmt = $idr->prepare("select * from client c , crm cr  


                   where c.id = cr.id  
				   
				   
				   
                       
					  

                  
                    and (number=? or inumber=? or telmobile=? or telother=?)  ORDER BY  idc  DESC LIMIT 1
					
					
					");


   $stmt->bind_param("iiii",$id,$id,$id,$id );
   $stmt->execute();

     $req2= $stmt ->get_result();

     $stmt->close();

					
	while($lig=@mysqli_fetch_assoc($req2)){
		
		
		





	
	$t=0;
	$idc=$lig['idc'];
    if($id==$lig['number'] or $id==$lig['inumber'] or $id==$lig['telmobile'] or $id==$lig['telother'] ){
	 $stmt = $idr->prepare("update crm set la=?,incident=?,status=?,lcd=?,task=?,priority=? where idc=? ");;
	 $stmt->bind_param("ssssssi", $la,$ur,$bu,$na,$tas,$pr,$idc);
	 $stmt->execute();

   $test=mysqli_affected_rows($idr);
	 $stmt->close();
		
	
	$t=1;
	
	
	break;
	}	
}


	
if($test == 0  ){
	  
  echo	  "<script>

var r = confirm(\"Missing Entry! Press OK to retry \");
if (r == true) {
location.replace (\"http://192.168.20.201//before.php?page=$naa&page1=$idf&page2=$incc\",\"menubar=0,resizable=1,width=1000,height=950\");
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



