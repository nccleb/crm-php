<?php
session_start();



  $inc2=$_GET["number"];
 
$inc="0";


 $opic=   "c".":"."\\"."Mdr"."\\"."CallerID".date("Y")."-". date("m")."."."txt" ;


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


*/
 








	   $idr = mysqli_connect("192.168.16.103", "root", "1Sys9Admeen72", "nccleb_test");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
	  $result=@mysqli_query($idr,"SELECT  * FROM client 
      
	  ") ;
	  
	  
	  
	  while($lig=@mysqli_fetch_assoc($result)){
    
      if( $inc!="" ){
        
       

        

  if( $inc!=0 AND  $inc==$lig['number'] OR $inc==$lig['inumber'] OR $inc==$lig['telmobile'] OR $inc==$lig['telother']  ) {
       if( $lig['address']!=""  ){
        echo "First address:".$lig['address']." \r\n  ";  
        echo " \r\n  "; 
       }
       
       if( $lig['address_two']!=""  ){
        echo "Second address:".$lig['address_two']." \r\n   ";
        echo " \r\n  "; 
       }
       if( $lig['inumber']!=""  ){
        echo "Tel(Office):".$lig['inumber']." \r\n   ";
        echo " \r\n  "; 
       }

       if( $lig['telmobile']!=""  ){
        echo "Tel(Mobile):".$lig['telmobile']." \r\n   ";
        echo " \r\n  "; 
       }
       
       if( $lig['telother']!=""  ){
        echo "Tel(Other):".$lig['telother']." \r\n   ";
        echo " \r\n  "; 
       }
       
       if( $lig['remark']!=""  ){
        echo "Notes:".$lig['remark']." \r\n   ";
        echo " \r\n  "; 
       }

       if( $lig['category']!=""  ){
        echo "Category:".$lig['category']." \r\n   ";
        echo " \r\n  "; 
       }


       if( $lig['source']!=""  ){
        echo "Source:".$lig['source']." \r\n   ";
        echo " \r\n  "; 
       }


       if( $lig['company']!=""  ){
        echo "Company:".$lig['company']." \r\n   ";
        echo " \r\n  "; 
       }
       if( $lig['email']!=""  ){
        echo "Email:".$lig['email']." \r\n   ";
        echo " \r\n  "; 
       }
       if( $lig['url']!=""  ){
        echo "Google Maps URL:".$lig['url']." \r\n   ";
        echo " \r\n  "; 
       }
       if( $lig['business']!=""  ){
        echo "Business:".$lig['business']." \r\n   ";
        echo " \r\n  "; 
       }

       if( $lig['grade']!="regular"  ){
        echo "Grade:".$lig['grade']." \r\n   ";
        echo " \r\n  "; 
       }

      if( $lig['best_delivery_time']!=""  ){
        echo "Best delivery time:".$lig['best_delivery_time']." \r\n   ";
        echo " \r\n  "; 
       }


       if( $lig['payment']!=""  ){
        echo "Type of payment:".$lig['payment']." \r\n   ";
        echo " \r\n  "; 
       }
       if( $lig['card']!=""  ){
        echo "Loyalty card:".$lig['card']." \r\n   ";
        echo " \r\n  "; 
       }
      
       if( $lig['community']!=""  ){
        echo "Joined community:".$lig['community']." \r\n   ";
        echo " \r\n  "; 
       }

      //  $idx=$lig['idx'];

        
      //   $req11=@mysqli_query($idr," select * from drivers order by idx asc  ");
      //   $req12=@mysqli_query($idr," SELECT COUNT(idx) as co  FROM drivers; ");
        
      //   $lig12=@mysqli_fetch_assoc($req12);
      //   for ($i=1;$i<=$lig12["co"];$i++){
          
      //     $lig11=@mysqli_fetch_assoc($req11);
          
          
      //       $_SESSION["$i"]= $lig11["name_d"];
             
           
          
      //       if( $lig['idx']!=""  ){
            
      //       if( $idx==$i){
             
              
      //       echo "Driver:".$idx=$_SESSION["$i"]." \r\n   ";;
      //       echo " \r\n  ";   
      //       }

      //     }
      //    }


       if( $lig['city']!=""  ){
        echo "City:".$lig['city']." \r\n   ";
        echo " \r\n  "; 
       }
        
         if( $lig['zone']!=""  ){
          
         echo "Zone:".$lig['zone']." \r\n   "; 
         echo " \r\n  "; 
         }
         if( $lig['street']!=""  ){
         echo "Street:".$lig['street']." \r\n   "; 
         echo " \r\n  "; 
         }
         if( $lig['building']!=""  ){
         echo "Building:".$lig['building']." \r\n   "; 
         echo " \r\n  "; 
         }
         if( $lig['floor']!="0"  ){
         echo "Floor:".$lig['floor']." \r\n   "; 
         echo " \r\n  "; 
         }
         if( $lig['apartment']!=""  ){
         echo "Apartment:".$lig['apartment']." \r\n   ";
         echo " \r\n  "; 
         }
         if( $lig['request']!=""  ){
         echo "Request:".$lig['request']." \r\n   "; 
         echo " \r\n  "; 
         }
		exit();
    }
	else if( $inc!=0 AND  $inc==$lig['inumber']) {
        echo $lig['address'];
		exit();
    }
	else if( $inc!=0 AND  $inc==$lig['telother']) {
        echo $lig['address'];
		exit();
    }
	
	else if( $inc!=0 AND  $inc==$lig['telmobile']) {
        echo $lig['address'];
		exit();
    }
	
}
 
    }
 ?>
 
 