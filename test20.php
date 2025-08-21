<?php
session_start();
?>


<?php

$cookie_name = "hjk";
  $cookie_value = $_GET["q"];
setcookie($cookie_name, $cookie_value, time() + (86400 * 3600), "/"); 

 $_COOKIE["hjk"];


    $os=$_SESSION["o"];
     $ps=$_SESSION["p"];
 $_SESSION["id"]=$nu;
 
 
 $fichier="CaCallStatus.dat";
$xml=simplexml_load_file($fichier);
foreach($xml as $CallRecord){
    $ext=$show->ext;
    $inc=$CallRecord->CallerID;;
   
}  



 
?>


<!DOCTYPE html>
<html>
<head>
<title>p20</title>

<?php include('head.php'); ?>
  <link rel="stylesheet" href="css/stylei.css">
  <link rel="stylesheet" href="css/stylei2.css">
   
  <link rel="stylesheet" href="css/whatsappButton.css" />

  <script type="text/javascript" src="js/test371.js"></script>




</head>

<body>
  
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
      
      


 







<?php
if(isset($_POST['nu'])&&!empty($_POST['nu'])&&isset($_POST['na'])&&!empty($_POST['na'])&&isset($_POST['lna'])&&isset($_POST['co'])
 &&isset($_POST['inu'])&&isset($_POST['ur'])&&isset($_POST['bu'])    &&isset($_POST['ad'])&&isset($_POST['ad2'])&&isset($_POST['em'])
&&isset($_POST['cit'])&&isset($_POST['str'])&&isset($_POST['flo'])&&isset($_POST['delti'])
 &&isset($_POST['bui'])&&isset($_POST['zon'])&&isset($_POST['nea'])    &&isset($_POST['rem'])&&isset($_POST['driv'])
&&isset($_POST['tel'])&&isset($_POST['oth'])&&isset($_POST['apa']) &&isset($_POST['pay'])&&isset($_POST['loy'])&&isset($_POST['job'])&&isset($_POST['com'])
)

{
   $nu=test_input($_POST['nu']);
  $inu=test_input($_POST['inu']);
  $na=test_input($_POST['na']);
 $lna=test_input($_POST['lna']);
 $em=test_input($_POST['em']); 
 $ur=test_input($_POST['ur']); 
 $ad=test_input($_POST['ad']);
 $ad2=test_input($_POST['ad2']);
 $bu=test_input($_POST['bu']);
   $gra=test_input($_POST['gra']);
   $pay=test_input($_POST['pay']);
   $loy=test_input($_POST['loy']);
   $com=test_input($_POST['com']);
   $cat=test_input($_POST['cat']);
   $source=test_input($_POST['blog']);
 $co=test_input($_POST['co']);
 $jo=test_input($_POST['job']);
 $ci=test_input($_POST['cit']);
 $st=test_input($_POST['str']);
 $fl=test_input($_POST['flo']);
 
 $zo=test_input($_POST['zon']); 
 $ne=test_input($_POST['nea']);
 $re=test_input($_POST['rem']);
 $bui=test_input($_POST['bui']);
  $tel=test_input($_POST['tel']);
  $oth=test_input($_POST['oth']);
 $apa=test_input($_POST['apa']);
  $driv=test_input($_POST['driv']);
  $delti=test_input($_POST['delti']);




	}
else{
	
	
	
    echo"<script>if (confirm(\"Missing Entry!\") == true) {
  myw=window.open (\"http://192.168.16.102//test19.php?page=$os&page1=$ps&page2=$inc \",\"\",\"menubar=0,resizable=1,width=600,height=800\");
  quit();
} else {
  quit();
}
		</script>";

    }
	
	
	function test_input($data) {
	 $data = trim($data);	
  $data = trim($data,"/");
  
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if (!preg_match("/^[0-9a-zA-Z'?!=;~+%`\[\]()$*\"|:.,#&_\s-\p{Arabic} ]*$/u",$na)) {
  echo "<p style=\"color:red;font-size:28px\">Invalid First name format!</p>"."<br/>";
  echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}

if (!preg_match("/^[0-9a-zA-Z'?!=;~+%`\[\]()$*\"|:.,#&_\s-\p{Arabic} ]*$/u",$lna)) {
  echo "<p style=\"color:red;font-size:28px\">Invalid Last name format!</p>"."<br/>";
  echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}


if (!preg_match("/^[0-9]*$/",$nu)) {
  echo "<p style=\"color:red;font-size:28px\">Invalid Number format!</p>"."<br/>";
  echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}
if (!preg_match("/^[0-9]*$/",$inu)) {
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
if($ur!==""){
if (!filter_var($ur, FILTER_VALIDATE_URL)) {
	 echo "<p style=\"color:red;font-size:28px\">Invalid Url format!</p>"."<br/>";
  echo "<button id=\"id\" type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();
	
}
}

if (!preg_match("/^[0-9a-zA-Z'?!=;~+%`\[\]()$*\"|:.,#&_\s-\p{Arabic} ]*$/u",$cat)) {
  echo "<p style=\"color:red;font-size:28px\">Invalid Company format!</p>"."<br/>";
  echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}


if (!preg_match("/^[0-9a-zA-Z'?!=;~+%`\[\]()$*\"|:.,#&_\s-\p{Arabic} ]*$/u",$source)) {
  echo "<p style=\"color:red;font-size:28px\">Invalid Source format!</p>"."<br/>";
  echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}


if (!preg_match("/^[0-9a-zA-Z'?!=;~+%`\[\]()$*\"|:.,#&_\s-\p{Arabic} ]*$/u",$co)) {
  echo "<p style=\"color:red;font-size:28px\">Invalid Company format!</p>"."<br/>";
  echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}


if (!preg_match("/^[0-9a-zA-Z'?!=;~+%`\[\]()$*\"|:.,#&_\s-\p{Arabic} ]*$/u",$jo)) {
  echo "<p style=\"color:red;font-size:28px\">Invalid Job format!</p>"."<br/>";
  echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}

if (!preg_match("/^[0-9a-zA-Z'?!=;~+%`\[\]()$*\"|:.,#&_\s-\p{Arabic} ]*$/u",$ad)) {
  echo "<p style=\"color:red;font-size:28px\">Invalid Address format!</p>"."<br/>";
  echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}

if (!preg_match("/^[0-9a-zA-Z'?!=;~+%`\[\]()$*\"|:.,#&_\s-\p{Arabic} ]*$/u",$ad2)) {
  echo "<p style=\"color:red;font-size:28px\">Invalid Address format!</p>"."<br/>";
  echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}




if (!preg_match("/^[0-9a-zA-Z'?!=;~+%`\[\]()$*\"|:.,#&_\s-\p{Arabic} ]*$/u",$bu)) {
   echo "<p style=\"color:red;font-size:28px\">Invalid Business format!</p>"."<br/>";
  echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();
}

if (!preg_match("/^[0-9a-zA-Z.,\s\p{Arabic} ]*$/u",$gra)) {
   echo "<p style=\"color:red;font-size:28px\">Invalid Grade format!</p>"."<br/>";
  echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();
}

if (!preg_match("/^[0-9a-zA-Z.,\s\p{Arabic} ]*$/u",$pay)) {
  echo "<p style=\"color:red;font-size:28px\">Invalid Type of payment format!</p>"."<br/>";
 echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
 exit();
}



if (!preg_match("/^[0-9a-zA-Z.,\s\p{Arabic} ]*$/u",$loy)) {
  echo "<p style=\"color:red;font-size:28px\">Invalid Loyalty card format!</p>"."<br/>";
 echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
 exit();
}


if (!preg_match("/^[0-9a-zA-Z.,\s\p{Arabic} ]*$/u",$com)) {
  echo "<p style=\"color:red;font-size:28px\">Invalid Loyalty card format!</p>"."<br/>";
 echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
 exit();
}



 if (!preg_match("/^[0-9a-zA-Z'?!=;~+%`\[\]()$*\"|:.,#&_\s-\p{Arabic} ]*$/u",$cu)) {
  echo "<p style=\"color:red;font-size:28px\">Invalid Cuid format!</p>"."<br/>";
  echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}


if (!preg_match("/^[0-9a-zA-Z'?!=;~+%`\[\]()$*\"|:.,#&_\s-\p{Arabic} ]*$/u",$ci)) {
  echo "<p style=\"color:red;font-size:28px\">Invalid City format!</p>"."<br/>";
  echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}

if (!preg_match("/^[0-9a-zA-Z'?!=;~+%`\[\]()$*\"|:.,#&_\s-\p{Arabic} ]*$/u",$st)) {
  echo "<p style=\"color:red;font-size:28px\">Invalid Street format!</p>"."<br/>";
  echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}

if (!preg_match("/^[0-9a-zA-Z'?!=;~+%`\[\]()$*\"|:.,#&_\s-\p{Arabic} ]*$/u",$fl)) {
  echo "<p style=\"color:red;font-size:28px\">Invalid Floor format!</p>"."<br/>";
  echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}

if (!preg_match("/^[0-9a-zA-Z'?!=;~+%`\[\]()$*\"|:.,#&_\s-\p{Arabic} ]*$/u",$bui)) {
  echo "<p style=\"color:red;font-size:28px\">Invalid Building format!</p>"."<br/>";
  echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}

if (!preg_match("/^[0-9a-zA-Z'?!=;~+%`\[\]()$*\"|:.,#&_\s-\p{Arabic} ]*$/u",$zo)) {
  echo "<p style=\"color:red;font-size:28px\">Invalid Zone format!</p>"."<br/>";
  echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}

if (!preg_match("/^[0-9a-zA-Z'?!=;~+%`\[\]()$*\"|:.,#&_\s-\p{Arabic} ]*$/u",$ne)) {
  echo "<p style=\"color:red;font-size:28px\">Invalid Near format!</p>"."<br/>";
  echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}

if (!preg_match("/^[0-9a-zA-Z'?!=;~+%`\[\]()$*\"|:.,#&_\s-\p{Arabic} ]*$/u",$re)) {
  echo "<p style=\"color:red;font-size:28px\">Invalid Address Remark format!</p>"."<br/>";
  echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}	
	 
 if (!preg_match("/^[0-9a-zA-Z'?!=;~+%`\[\]()$*\"|:.,#&_\s-\p{Arabic} ]*$/u",$tel)) {
  echo "<p style=\"color:red;font-size:28px\">Invalid Telephone format </p>"."<br/>";
  echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}	 
  
if (!preg_match("/^[0-9a-zA-Z'?!=;~+%`\[\]()$*\"|:.,#&_\s-\p{Arabic} ]*$/u",$oth)) {
  echo "<p style=\"color:red;font-size:28px\">Invalid Telephone Other format </p>"."<br/>";
  echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}	


if (!preg_match("/^[0-9a-zA-Z'?!=;~+%`\[\]()$*\"|:.,#&_\s-\p{Arabic} ]*$/u",$apa)) {
  echo "<p style=\"color:red;font-size:28px\">Invalid Apartment format</p>"."<br/>";
  echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}	

if (!preg_match("/^[0-9a-zA-Z'?!=;~+%`\[\]()$*\"|:.,#&_\s-\p{Arabic} ]*$/u",$driv)) {
  echo "<p style=\"color:red;font-size:28px\">Invalid Driver format</p>"."<br/>";
  echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}	

if (!preg_match("/^[0-9a-zA-Z'?!=;~+%`\[\]()$*\"|:.,#&_\s-\p{Arabic} ]*$/u",$delti)) {
  echo "<p style=\"color:red;font-size:28px\">Invalid Time format</p>"."<br/>";
  echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}	
	


	 $idr = mysqli_connect("192.168.16.102", "root", "1Sys9Admeen72", "nccleb_test");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

$stmt = $idr->prepare("SELECT  * FROM client 
      
	  ") ; 
 
 

$stmt->execute();

$result = $stmt ->get_result();



while($lig=$result->fetch_assoc()){


 




if($nu!=""){
	
    if( $nu==$lig['number']or $nu==$lig['inumber'] or $nu==$lig['telmobile']or $nu==$lig['telother'] )
	
	{
		echo"<script>alert('Duplicate Number1!')</script>";
		
	echo"<script>window.close()</script>";
	exit();
   	
		}
  }

 if($inu!=""){
	if($inu==$lig['number']or $inu==$lig['inumber'] or $inu==$lig['telmobile']or $inu==$lig['telother'] ){
		echo"<script>alert('Duplicate Number2!')</script>";
	echo"<script>window.close()</script>";
    exit();	
		}
} 
	   
		
	
		
 if($tel!=""){
		if( $tel==$lig['number']or $tel==$lig['inumber'] or $tel==$lig['telmobile']or $tel==$lig['telother']){
	 echo"<script>alert('Duplicate Number3!')</script>";
	echo"<script>window.close()</script>";
	exit();
		}
	 }
		
	
		
    if($oth!=""){

	if( $oth==$lig['number']or $oth==$lig['inumber'] or $oth==$lig['telmobile']or $oth==$lig['telother'] ){
		echo"<script>alert('Duplicate Number4!')</script>";
	echo"<script>window.close()</script>";
	exit();
		}
	 
	 }
		
	

	
}


?>

<?php


	  










    $stmt = $idr->prepare("insert into client (nom,prenom,filename,category,source,company,job,number,inumber,email,url,business,grade,payment,card,community,telmobile,telother,city,street,apartment,building,zone,floor,near,remark,address,address_two,best_delivery_time,idf,idx) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
  
  
     $stmt->bind_param("sssssssssssssssssssssssisssssii",$na,$lna,$filename,$cat,$source,$co,$jo,$nu,$inu,$em,$ur,$bu,$gra,$pay,$loy,$com,$tel,$oth,$ci,$st,$apa,$bui,$zo,$fl,$ne,$re,$ad,$ad2,$delti,$ps,$driv );

     $stmt->execute();

     $r1 = $stmt ->get_result();

     $stmt->close();
  
  
 
		 
		 
		
		 
  
  
   $stmt = $idr->prepare("select id  from client WHERE number=? ");
   
   $stmt->bind_param("i",$nu );
   $stmt->execute();

     $result = $stmt ->get_result();

     $stmt->close();
   
   
   
   $lig=@mysqli_fetch_assoc($result);
   $cu=$lig['id'];
   
    if($cu==""){ 
   
	
	  echo"<script>if (confirm(\"Missing Entry!\") == true) {
  //myw=window.open (\"http://192.168.16.102//test19.php?page=$os&page1=$ps&page2=$inc \",\"\",\"menubar=0,resizable=1,width=600,height=800\");
 // quit();
} else {
 // quit();
}
		</script>";
	
    }else{

      echo "<p id=\"p\">Data is well inserted!</p>";
      echo "<a href=\"test19.php?page=$os&&page1=$ps\">INSERT AGAIN</a>"."<br/>";
      echo "<button id=\"id\" type=\"button\" onclick=\"quit()\">Quit</button>";
     



    }
	
	

	
   
	
    mysqli_close($idr); 

 
	
	
	

	
	
	
	
	
	
	
	
 
	

?>
 </body>
 </html>
 

        
        
        
    