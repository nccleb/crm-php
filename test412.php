<?php
session_start();
?>


<?php


    $os=$_SESSION["o"];
  // echo  $ps=$_SESSION["p"];
 $_SESSION["id"]=$nu;
  $ps= $_COOKIE["ooq"];
 
 $fichier="CaCallStatus.dat";
$xml=simplexml_load_file($fichier);
foreach($xml as $CallRecord){
    $ext=$show->ext;
    $inc=$CallRecord->CallerID;;
   
}  


/*
$line = '';
$f = fopen("c:\MDR\CallerID2022-04.txt", 'r');
$cursor = -1;
fseek($f, $cursor, SEEK_END);
$char = fgetc($f);
//Trim trailing newline characters in the file
while ($char === "\n" || $char === "\r") {
   fseek($f, $cursor--, SEEK_END);
   $char = fgetc($f);
}
//Read until the next line of the file begins or the first newline char
while ($char !== false && $char !== "\n" && $char !== "\r") {
   //Prepend the new character
   $line = $char . $line;
   fseek($f, $cursor--, SEEK_END);
   $char = fgetc($f);
}
  $inc= substr($line,49,8);
 fclose($f);

 */
 
 
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
if(isset($_POST['nu'])&&!empty($_POST['nu'])&&isset($_POST['gra'])&&!empty($_POST['gra'])&&isset($_POST['lna'])
 

    
&&isset($_POST['pipo'])&&isset($_POST['tel'])&&isset($_POST['oth']) &&isset($_POST['na'])&&isset($_POST['dt'])&&isset($_POST['pr'])&&isset($_POST['dd'])
)

{


   $pipeline=test_input($_POST['pipo']);
 
   $name=test_input($_POST['nu']);
 
  $owner=test_input($_POST['na']);
    $contact=test_input($_POST['lna']);
 
 
   $stage=test_input($_POST['gra']);
   
 
 

   $amount=test_input($_POST['tel']);
   $date=test_input($_POST['oth']);
   $dt=test_input($_POST['dt']);
   $pr=test_input($_POST['pr']);
   $description=test_input($_POST['dd']);




	}
else{
	
	
	
    echo"<script>if (confirm(\"Missing-Entry!\") == true) {
  myw=window.open (\"http://192.168.16.103//test411.php?page=$os&page1=$ps&page2=$inc \",\"\",\"menubar=0,resizable=1,width=600,height=800\");
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

if (!preg_match("/^[0-9a-zA-Z'?!=;~+%`\[\]()$*\"|:.,#&_\s-\p{Arabic} ]*$/u",$owner)) {
  echo "<p style=\"color:red;font-size:28px\">Invalid Deal owner format!</p>"."<br/>";
  echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}


if (!preg_match("/^[0-9a-zA-Z'?!=;~+%`\[\]()$*\"|:.,#&_\s-\p{Arabic} ]*$/u",$pipeline)) {
  echo "<p style=\"color:red;font-size:28px\">Invalid Deal owner format!</p>"."<br/>";
  echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}




if (!preg_match("/^[0-9]*$/u",$contact)) {
  echo "<p style=\"color:red;font-size:28px\">Invalid Contact format!</p>"."<br/>";
  echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}


if (!preg_match("/^[0-9a-zA-Z'?!=;~+%`\[\]()$*\"|:.,#&_\s-\p{Arabic} ]*$/u",$name)) {
  echo "<p style=\"color:red;font-size:28px\">Invalid Deal name format!</p>"."<br/>";
  echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}








if (!preg_match("/^[0-9a-zA-Z'?!=;~+%`\[\]()$*\"|:.,#&_\s-\p{Arabic} ]*$/u",$dt)) {
  echo "<p style=\"color:red;font-size:28px\">Invalid Deal type format!</p>"."<br/>";
  echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}


if (!preg_match("/^[0-9a-zA-Z'?!=;~+%`\[\]()$*\"|:.,#&_\s-\p{Arabic} ]*$/u",$pr)) {
  echo "<p style=\"color:red;font-size:28px\">Invalid Priority format!</p>"."<br/>";
  echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}








if (!preg_match("/^[0-9a-zA-Z.,\s\p{Arabic} ]*$/u",$stage)) {
   echo "<p style=\"color:red;font-size:28px\">Invalid Deal stage format!</p>"."<br/>";
  echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();
}


if (!preg_match("/^[0-9a-zA-Z.,\s\p{Arabic} ]*$/u",$description)) {
  echo "<p style=\"color:red;font-size:28px\">Invalid Deal stage format!</p>"."<br/>";
 echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
 exit();
}





 





if (!preg_match("/^[0-9a-zA-Z'?!=;~+%`\[\]()$*\"|:.,#&_\s-\p{Arabic} ]*$/u",$amount)) {
	echo "<p style=\"color:red;font-size:28px\">Invalid Amount format </p>"."<br/>";
	echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
	exit();  
  }	
  




  
if (!preg_match("/^[0-9a-zA-Z'?!=;~+%`\[\]()$*\"|:.,#&_\s-\p{Arabic} ]*$/u",$date)) {
  echo "<p style=\"color:red;font-size:28px\">Invalid Date format </p>"."<br/>";
  echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}	





?>
<?php

	
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


?>
	



	  





<?php

$idr = mysqli_connect("192.168.16.103", "root", "1Sys9Admeen72", "nccleb_test");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}


    $stmt = $idr->prepare("insert into deals (pipe,name,description,stage,amount,close_date,owner,contact,type,priority,post_status,idd) values(?,?,?,?,?,?,?,?,?,?,?,?)");
  
    if($date==""){
      $date="0001-01-01";
    }
    $stmt->bind_param("sssssssssssi",$pipeline,$name,$description,$stage,$amount,$date,$owner,$contact,$dt,$pr,$ps,$id1 );

    $stmt->execute();

    $r1 = $stmt ->get_result();

    $stmt->close();
  
  
 
		 
		 
		
		 
  
  
  
	
	
	$stmt = $idr->prepare("SELECT * FROM deals ORDER BY idce DESC LIMIT 1    ");
   
   //$stmt->bind_param("s",$name );
   $stmt->execute();

     $result = $stmt ->get_result();

     $stmt->close();
   
   
   
   $lig=@mysqli_fetch_assoc($result);
   $cu=$lig['name'];
   
    
 if($cu==$name){ 
  
	 echo "<p id=\"p\">Data is well inserted!</p>";
	 echo "<a href=\"test411.php?page=$os&&page1=$ps\">INSERT AGAIN</a>"."<br/>";
	 echo "<button id=\"id\" type=\"button\" onclick=\"quit()\">Quit</button>";
	
	 
}
else{
	  echo"<script>if (confirm(\"Missing Entry!\") == true) {
  myw=window.open (\"http://192.168.16.103//test411.php?page=$os&page1=$ps&page2=$inc \",\"\",\"menubar=0,resizable=1,width=600,height=800\");
 
} else {
  quit();
}
		</script>";

    }
	
	
	
   
	
    mysqli_close($idr); 

 
	
	
	

	
	
	
	
	
	
	
	
 
	

?>
 </body>
 </html>
 

        
        
        
    