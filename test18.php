
<?php
session_start();
?>
<?php
  $inc2=$_GET["number"];
 
$inc="0";
?>
<?php $opic=   "c".":"."\\"."Mdr"."\\"."CallerID".date("Y")."-". date("m")."."."txt" ?>

<?php
// Initialize variables for the form
$inc = ""; // Initialize caller ID variable

$fichier = "CaCallStatus.dat";
if (file_exists($fichier)) {
    $xml = simplexml_load_file($fichier);
    if ($xml) {
        foreach ($xml as $CallRecord) {
            if (isset($CallRecord->ext)) {
                $ext = $CallRecord->ext;
            }
            if (isset($CallRecord->CallerID)) {
                $inc = (string)$CallRecord->CallerID;
            }
        }
    }
}

// If no caller ID from XML, try to get from session
if (empty($inc) && isset($_SESSION["userinc"])) {
    $inc = $_SESSION["userinc"];
}

/*

$line = '';
//$f = fopen("c:\MDR\CallerID2022-04.txt", 'r');
$f = fopen($opic, 'r');
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
   $inc = trim($inc);
 fclose($f);
 
 
 include('test449.php');
 */



 $idr = mysqli_connect("192.168.16.103", "root", "1Sys9Admeen72", "nccleb_test");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
	  $result=@mysqli_query($idr,"SELECT  * FROM client 
      
	  ") ;
	  
	
	  
	  while($lig=@mysqli_fetch_assoc($result)){
      
      
      if( $inc!="" AND $inc==$lig['number'] ){
        echo $lig['nom']." ".$lig['prenom'];
        
		exit();
    }
	else if( $inc!="" AND  $inc==$lig['inumber']) {
        echo $lig['nom']." ".$lig['prenom'];
		exit();
    }
	else if( $inc!="" AND  $inc==$lig['telother']) {
        echo $lig['nom']." ".$lig['prenom'];
		exit();
    }
	
	else if( $inc!="" AND  $inc==$lig['telmobile']) {
        echo $lig['nom']." ".$lig['prenom'];
		exit();
    }
	
}
 

        
        
     ?>  
    
