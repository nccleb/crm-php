<?php
session_start();
 
  $id=$_SESSION["id"];
  $idf=$_SESSION["idf"];
 $naa=$_SESSION["naa"];
  $inc=$_SESSION["q"];

 $incc=$_SESSION["a3"];


 $cookie_name = "enu";
  $cookie_value = $_GET["q"];
setcookie($cookie_name, $cookie_value, time() + (86400 * 3600), "/"); 

   
  $tes = $_COOKIE["enu"];


 $cookie_name = "enu2";
  $cookie_value = $_GET["qq"];
setcookie($cookie_name, $cookie_value, time() + (86400 * 3600), "/"); 

   
  $tes2 = $_COOKIE["enu2"];


 $cookie_name = "enu3";
  $cookie_value = $_GET["qqq"];
setcookie($cookie_name, $cookie_value, time() + (86400 * 3600), "/"); 

   
 $tes3 = $_COOKIE["enu3"];




  $cookie_name = "nu";
  $cookie_value = $_POST['nu'];
setcookie($cookie_name, $cookie_value, time() + (86400 * 3600), "/"); 

  
   
	 
	 
	 
 



 

 $cookie_name = "inu";
 $cookie_value = $_POST['inu'];
setcookie($cookie_name, $cookie_value, time() + (86400 * 3600), "/");



 

 



 $cookie_name = "tel";
 $cookie_value = $_POST['tel'];
setcookie($cookie_name, $cookie_value, time() + (86400 * 3600), "/"); 





 $cookie_name = "oth";
 $cookie_value = $_POST['oth'];
setcookie($cookie_name, $cookie_value, time() + (86400 * 3600), "/"); 


$cookie_name = "url";
$cookie_value = $_POST['ur'];
setcookie($cookie_name, $cookie_value, time() + (86400 * 3600), "/"); 




   $snu=$_SESSION["nu"];

   $sinu=$_SESSION["inu"];

  $stel=$_SESSION["tel"];

   $soth=$_SESSION["oth"];


?>
 
 



<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('head.php'); ?>
<style>



#id{
background:lightgrey;
color:#303030;
border-color:lightblue;
}
#id1{
color:green;
	//font-size:3vw;
}


#form{
	color:blue;
	//font-size:3vw;
}
#fo{
	color:#303030;
	//font-size:3vw;
}
#zp{
	color:red;
	//font-size:3vw;
}

#uv {
// width:30px; 
 //height:30px   
font-family: Verdana, Geneva, sans-serif;
color: white;
border-style: none;
vertical-align: center;
text-align: center;

}
#uv1 {
// width:30px; 
 //height:30px   
font-family: Verdana, Geneva, sans-serif;
color: blue;
border-style: none;
vertical-align: center;
text-align: center;

}

#av{
//width:190px; 
  color:white;
  //font-size:2vw;
//background:#0000FF;	
background:#A9A9A9;
	
	
}





</style>	
        

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


<script>
function add(){
	var myw;
	
   myw=window.open ("http://192.168.16.102/test275.php?page=<?php echo urlencode($naa) ?>&page1=<?php echo urlencode($idf)?>&page2=<?php echo urlencode($inc) ?>","","menubar=0,resizable=1,width=680,height=950");
	
}
</script>






</head>



<body onload="size()">


<?php
/*
error_reporting(0);
$target_dir = "image/";
 $target_file  =$target_dir .basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
 $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
 
 "t=".$t = $_FILES["fileToUpload"]["size"];
// Check if image file is a actual image or fake image
if(isset($_POST["upload"]) && $t>0) {
   $check = getimagesize($_FILES["fileToUpload"]["tmp_name"])."<br>";
  if($check !== false) {
    "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }


// Check if file already exists
if (file_exists($target_file)) {
  echo " File already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"]  <100000) {
  echo "Your file is too small.";
  $uploadOk = 0;
}

 if ($_FILES["fileToUpload"]["size"] >2000000) {
 echo "Your file is too large.";
  $uploadOk = 0;
}


// Allow certain file formats 
//echo $imageFileType;

 
$people = array("jpg", "jpeg", "png","gif");

if (in_array( $imageFileType, $people))

  {
    $uploadOk = 1;

} else{

  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.Please try again!";
  $uploadOk = 0;

}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}

 $filename = htmlspecialchars( basename( $_FILES["fileToUpload"]["name"]));

}

*/
?>

 



<div class="container text-center">
<?php
if(isset($_POST['nu'])&&isset($_POST['na'])&&isset($_POST['lna'])&&isset($_POST['company'])
 &&isset($_POST['inu'])&&isset($_POST['tel'])&&isset($_POST['oth'])&&isset($_POST['ur'])&&isset($_POST['bu'])    &&isset($_POST['ad'])&&isset($_POST['ad2'])&&isset($_POST['em'])
&&isset($_POST['cit'])&&isset($_POST['str'])&&isset($_POST['flo'])&&isset($_POST['delti'])
 &&isset($_POST['bui'])&&isset($_POST['zon'])&&isset($_POST['nea'])    &&isset($_POST['rem']) &&isset($_POST['apa'])&&isset($_POST['grad'])&&isset($_POST['driver'])&&isset($_POST['pay'])
 &&isset($_POST['loy'])&&isset($_POST['disa'])&&isset($_POST['job'])&&isset($_POST['cat'])&&isset($_POST['src'])&&isset($_POST['community'])
 

 )


{
  $nu=test_input($_POST['nu']);
  $photo=test_input($_POST['pho']);
   $inu=test_input($_POST['inu']);
 $na=test_input($_POST['na']);
 $lna=test_input($_POST['lna']);
  $em=test_input($_POST['em']); 
 $ur=test_input($_POST['ur']); 
 $ad=test_input($_POST['ad']);
 $ad2=test_input($_POST['ad2']);
  $bu=test_input($_POST['bu']);
  $cat=test_input($_POST['cat']);
  $src=test_input($_POST['src']);
   $company=test_input($_POST['company']);
   $jo=test_input($_POST['job']);
  $ci=test_input($_POST['cit']);
 $st=test_input($_POST['str']);
 $fl=test_input($_POST['flo']);
  $bui=test_input($_POST['bui']); 
  $zo=test_input($_POST['zon']); 
 $ne=test_input($_POST['nea']);
  $re=test_input($_POST['rem']);
  $tel=test_input($_POST['tel']);
  $oth=test_input($_POST['oth']);
  $apa=test_input($_POST['apa']);
  $gra=test_input($_POST['grad']);
  $pay=test_input($_POST['pay']);
  $loy=test_input($_POST['loy']);
  $community=test_input($_POST['community']);
   $driv=test_input($_POST['driver']);
   $disa=test_input($_POST['disa']);
   $delti=test_input($_POST['delti']);
   //$disa2=test_input($_POST['disa2']);
   //$disa3=test_input($_POST['disa3']);
   
	}
else{
	
	echo"<script>alert('Missing Entry1!')</script>";
	echo"<script>location.replace('numbersearch.php')</script>";
    }
	function test_input($data) {
	$data = trim($data);	
  $data = trim($data,"/");
  
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}





if (!preg_match("/^[0-9a-zA-Z'?!=;~+%`\[\]()$*\"|:.,#&_\s-\p{Arabic} ]*$/u",$na)) {
  echo "<p style=\"color:red\">Invalid First name format!</p>"."<br/>";
  echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}


if (!preg_match("/^[0-9a-zA-Z'?!=;~+%`\[\]()$*\"|:.,#&_\s-\p{Arabic} ]*$/u",$photo)) {
  echo "<p style=\"color:red\">Invalid filename format!</p>"."<br/>";
  echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}


if (!preg_match("/^[0-9a-zA-Z'?!=;~+%`\[\]()$*\"|:.,#&_\s-\p{Arabic} ]*$/u",$lna)) {
  echo "<p style=\"color:red\">Invalid Last name format!</p>"."<br/>";
  echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}




if (!preg_match("/^[0-9]*$/",$nu)) {
  echo "<p style=\"color:red\">Invalid Number format!</p>"."<br/>";
  echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}

if (!preg_match("/^[0-9]*$/",$inu)) {
  echo "<p style=\"color:red\">Invalid Number format!</p>"."<br/>";
  echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}


if($em!==""){
if (!filter_var($em, FILTER_VALIDATE_EMAIL)) {
  echo "<p style=\"color:red\">Invalid Email format!</p>"."<br/>";
  echo "<button id=\"id\" type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();
}}
if($ur!==""){
if (!filter_var($ur, FILTER_VALIDATE_URL)) {
	 echo "<p style=\"color:red\">Invalid Url format!</p>"."<br/>";
  echo "<button id=\"id\" type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();
	
}
}

if (!preg_match("/^[0-9a-zA-Z'?!=;~+%`\[\]()$*\"|:.,#&_\s-\p{Arabic} ]*$/u",$cat)) {
  echo "<p style=\"color:red\">Invalid Company format!</p>"."<br/>";
  echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}

if (!preg_match("/^[0-9a-zA-Z'?!=;~+%`\[\]()$*\"|:.,#&_\s-\p{Arabic} ]*$/u",$src)) {
  echo "<p style=\"color:red\">Invalid Source format!</p>"."<br/>";
  echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}


if (!preg_match("/^[0-9a-zA-Z'?!=;~+%`\[\]()$*\"|:.,#&_\s-\p{Arabic} ]*$/u",$company)) {
  echo "<p style=\"color:red\">Invalid Company format!</p>"."<br/>";
  echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}

if (!preg_match("/^[0-9a-zA-Z'?!=;~+%`\[\]()$*\"|:.,#&_\s-\p{Arabic} ]*$/u",$jo)) {
  echo "<p style=\"color:red\">Invalid Job format!</p>"."<br/>";
  echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}




if (!preg_match("/^[0-9a-zA-Z'?!=;~+%`\[\]()$*\"|:.,#&_\s-\p{Arabic} ]*$/u",$ad)) {
  echo "<p style=\"color:red\">Invalid Address format!</p>"."<br/>";
  echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}

if (!preg_match("/^[0-9a-zA-Z'?!=;~+%`\[\]()$*\"|:.,#&_\s-\p{Arabic} ]*$/u",$ad2)) {
  echo "<p style=\"color:red\">Invalid Address format!</p>"."<br/>";
  echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}



if (!preg_match("/^[0-9a-zA-Z'?!=;~+%`\[\]()$*\"|:.,#&_\s-\p{Arabic} ]*$/u",$bu)) {
   echo "<p style=\"color:red\">Invalid Business format!</p>"."<br/>";
  echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();
}


if (!preg_match("/^[0-9a-zA-Z.,\s\p{Arabic} ]*$/u",$cu)) {
  echo "<p style=\"color:red\">Invalid Cuid format!</p>"."<br/>";
  echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}


if (!preg_match("/^[0-9a-zA-Z'?!=;~+%`\[\]()$*\"|:.,#&_\s-\p{Arabic} ]*$/u",$ci)) {
  echo "<p style=\"color:red\">Invalid City format!</p>"."<br/>";
  echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}

if (!preg_match("/^[0-9a-zA-Z'?!=;~+%`\[\]()$*\"|:.,#&_\s-\p{Arabic} ]*$/u",$st)) {
  echo "<p style=\"color:red\">Invalid Street format!</p>"."<br/>";
  echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}

if (!preg_match("/^[0-9a-zA-Z'?!=;~+%`\[\]()$*\"|:.,#&_\s-\p{Arabic} ]*$/u",$fl)) {
  echo "<p style=\"color:red\">Invalid Floor format!</p>"."<br/>";
  echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}

if (!preg_match("/^[0-9a-zA-Z'?!=;~+%`\[\]()$*\"|:.,#&_\s-\p{Arabic} ]*$/u",$bui)) {
  echo "<p style=\"color:red\">Invalid Building format!</p>"."<br/>";
  echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}

if (!preg_match("/^[0-9a-zA-Z'?!=;~+%`\[\]()$*\"|:.,#&_\s-\p{Arabic} ]*$/u",$zo)) {
  echo "<p style=\"color:red\">Invalid Zone format!</p>"."<br/>";
  echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}

if (!preg_match("/^[0-9a-zA-Z'?!=;~+%`\[\]()$*\"|:.,#&_\s-\p{Arabic} ]*$/u",$ne)) {
  echo "<p style=\"color:red\">Invalid Near format!</p>"."<br/>";
  echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}

if (!preg_match("/^[0-9a-zA-Z'?!=;~+%`\[\]()$*\"|:.,#&_\s-\p{Arabic} ]*$/u",$re)) {
  echo "<p style=\"color:red\">Invalid Address Remark!</p>"."<br/>";
  echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}	
	 
  
 if (!preg_match("/^[0-9a-zA-Z.,\s\p{Arabic} ]*$/u",$tel)) {
  echo "<p style=\"color:red\">Invalid Tel</p>"."<br/>";
  echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}	 


if (!preg_match("/^[0-9a-zA-Z.,\s\p{Arabic} ]*$/u",$oth)) {
  echo "<p style=\"color:red\">Invalid TelOther</p>"."<br/>";
  echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}	



	 
  if (!preg_match("/^[0-9a-zA-Z'?!=;~+%`\[\]()$*\"|:.,#&_\s-\p{Arabic} ]*$/u",$apa)) {
  echo "<p style=\"color:red\">Invalid Apartmant!</p>"."<br/>";
  echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}	
	 
 
  if (!preg_match("/^[0-9a-zA-Z.,\s\p{Arabic} ]*$/u",$gra)) {
  echo "<p style=\"color:red\">Invalid Grade</p>"."<br/>";
  echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}	


if (!preg_match("/^[0-9a-zA-Z.,\s\p{Arabic} ]*$/u",$pay)) {
  echo "<p style=\"color:red\">Invalid Grade</p>"."<br/>";
  echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}	

if (!preg_match("/^[0-9a-zA-Z.,\s\p{Arabic} ]*$/u",$loy)) {
  echo "<p style=\"color:red\">Invalid Loyalty card </p>"."<br/>";
  echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}	



if (!preg_match("/^[0-9a-zA-Z.,\s\p{Arabic} ]*$/u",$community)) {
  echo "<p style=\"color:red\">Invalid Community </p>"."<br/>";
  echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}	



if (!preg_match("/^[0-9a-zA-Z.,\s\p{Arabic} ]*$/u",$driv)) {
  echo "<p style=\"color:red\">Invalid Tel</p>"."<br/>";
  echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}	 

if (!preg_match("/^[0-9a-zA-Z'?!=;~+%`\[\]()$*\"|:.,#&_\s-\p{Arabic} ]*$/u",$delti)) {
  echo "<p style=\"color:red\">Invalid time!</p>"."<br/>";
  echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}	
	 
	

$cookie_name = "city";
$cookie_value = $_POST['cit'];
setcookie($cookie_name, $cookie_value, time() + (86400 * 360), "/"); 





 $idr = mysqli_connect("192.168.16.102", "root", "1Sys9Admeen72", "nccleb_test");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}


     
		$stmt = $idr->prepare("SELECT  * FROM client 
      
	  where (number=? or inumber=? or telmobile=? or telother=? )") ; 
 
 $stmt->bind_param("iiii",$nu,$nu,$nu,$nu );

$stmt->execute();

$result = $stmt ->get_result();

$stmt->close();






while($row=$result->fetch_assoc()){



	  
			  
              
			  
			  
			  $inum=$row['inumber'];
			  
               
            
			  $telmobile=$row['telmobile'];
			 	  
			  
			  $telother=$row['telother'];
			 
			  $idt=$row['id'];
			  
			
			 
			 
			 
			  
			  
		}















$req6=mysqli_query($idr," SELECT number,inumber,telmobile,telother
from client ");
 
 
 
 
 
 
 
 
 


while($lig=mysqli_fetch_assoc($req6)){
	
  
 
	   
	
	
  
	if(  $tes != "" ){	 
	if($tes==$lig['number']or $tes==$lig['inumber'] or $tes==$lig['telmobile']or $tes==$lig['telother'] ){
		echo"<script>alert('Duplicate Number2!')</script>";
	echo"<script>location.replace (\"http://192.168.20.109/test275.php?page=$naa&page1=$idf&page2=$inc\",\"menubar=0,resizable=1,width=1000,height=950\");</script>";
	
    exit();	
		}
} 
 
   
   
   
       
    
      
      if( $tes2!="" ){	
	if($tes2==$lig['number']or $tes2==$lig['inumber'] or $tes2==$lig['telmobile']or $tes2==$lig['telother'] ){
		echo"<script>alert('Duplicate Number3!')</script>";
	echo"<script>location.replace (\"http://192.168.20.109/test275.php?page=$naa&page1=$idf&page2=$inc\",\"menubar=0,resizable=1,width=1000,height=950\");</script>";
	
    exit();	
		}
} 
      
    
      
        
           
		 if( $tes3!="" ){   
	if($tes3==$lig['number']or $tes3==$lig['inumber'] or $tes3==$lig['telmobile']or $tes3==$lig['telother'] ){
		echo"<script>alert('Duplicate Number4!')</script>";
	echo"<script>location.replace (\"http://192.168.20.109/test275.php?page=$naa&page1=$idf&page2=$inc\",\"menubar=0,resizable=1,width=1000,height=950\");</script>";
	
    exit();	
		}
} 
      
    
  
    
  }
  

?>
  















  <?php

$idr = mysqli_connect("192.168.16.102", "root", "1Sys9Admeen72", "nccleb_test");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
$req11=@mysqli_query($idr," select * from drivers order by idx asc  ");
$req12=@mysqli_query($idr," SELECT COUNT(idx) as arr FROM drivers; ");
$lig=@mysqli_fetch_assoc($req12);
for ($i=1;$i<=$lig["arr"];$i++){
	$lig1=@mysqli_fetch_assoc($req11);
	
	   $_SESSION["$i"]= $lig1["name_d"];
	 
	if( $_SESSION["$i"]==$driv  ){

     $driv=$i;

  }



	  
 }

?>

 
   <?php

	

     if($filename==""){
      $filename=$photo;
     }

	if($id == $idt){
	   	
     $stmt = $idr->prepare("update client set nom=?,prenom=?,filename=?,category=?,source=?,company=?,job=?, number=?,inumber=?,email=?,business=?,grade=?,payment=?,card=?,community=?,telmobile=?,telother=?,url=?, city=?, street=?,floor=?,apartment=?, building=?,zone=?,near=?,remark=?,address=?,address_two=?,best_delivery_time=?,idx=? where id=?");
	 $stmt->bind_param("ssssssssssssssssssssissssssssii", $na,$lna,$filename,$cat,$src,$company,$jo,$nu,$inu,$em,$bu,$gra,$pay,$loy,$community,$tel,$oth,$ur,$ci,$st,$fl,$apa,$bui,$zo,$ne,$re,$ad,$ad2,$delti,$driv,$id);
	 $stmt->execute();
	  $test=mysqli_affected_rows($idr);
	 $stmt->close();
	 
	}

	 
	  
	  
	    if($test == 0 ){
	  
	  echo	  "<script>

  var r = confirm(\"Missing Entry! Press OK to retry \");
  if (r == true) {
location.replace (\"http://192.168.16.102/test275.php?page=$naa&page1=$idf&page2=$incc\",\"menubar=0,resizable=1,width=1000,height=950\");
  } else {
  window.close()
  }
  

</script>";
		 
	  }
	  
	  elseif($test != -1){
	 
  
    echo "<p id=\"form\">Data is well updated!</p>";
	
	  }
	  
	  else{
		   echo "<p id=\"form\">Data is not updated!</p>";
	  }
	  
	 echo "<button id=\"form\"   type=\"button\" onclick=\"add()\">TRY AGAIN</button>";
	
	 
	 echo "<button id=\"form\"   type=\"button\" onclick=\"quit()\">Quit</button>";
	
	 

	

		

 mysqli_close($idr); 
 

 if($size==0 && $photo!=""){

  $filename=$photo;
  
  $cookie_name = "pho";
  $cookie_value = $photo;
  setcookie($cookie_name, $cookie_value, time() + (86400 * 3600), "/"); 
    
  
  
  
  }


?>















</body>





</html>



