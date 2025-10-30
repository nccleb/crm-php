
<!DOCTYPE html>
<html lang="en">
<head>
 <?php include('head.php'); ?>
<link rel="stylesheet" href="css/whatsappButton.css" />
  


<script src="js/test371.js"></script>



</head>
<body>
<?php
session_start();


$fields = '{ 
    "request":{
        "action":"challenge",
       
        "user":"cdrapi"
      
    }
    
    }';




$curlHandle = curl_init('https://192.168.20.216:8089/api');


$headers = [
  "Connection: close",
  
  "Content-Type: application/json",

  
];


 curl_setopt($curlHandle, CURLOPT_HTTPHEADER, $headers);
 


 
curl_setopt($curlHandle, CURLOPT_SSL_VERIFYPEER, 0);

curl_setopt($curlHandle, CURLOPT_SSL_VERIFYHOST, 0);
 
curl_setopt($curlHandle, CURLOPT_POSTFIELDS,$fields);
curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, true);





$curlResponse = curl_exec($curlHandle);


$pass="cdrapi123";


$array = json_decode($curlResponse, true);
  $arr = $array['response']['challenge'];
  $token = MD5( $arr.$pass);
 



 
  

  $fields = '{ 
    "request":{ 
        "action":"login", 
        "token":'.'"'.$token.'"'.', 
        
        "user":"cdrapi" 
    } 
}';


    
curl_setopt($curlHandle, CURLOPT_POSTFIELDS,$fields);
curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, true);

$curlResponse = curl_exec($curlHandle);


 $cookie = json_decode($curlResponse, true);
 $cookie = $cookie['response']['cookie'];







 $fields = '{ 
    "request":{ 
          "action":"listUnBridgedChannels",
         
           
           "cookie":'.'"'.$cookie.'"'.'
            
          
       
       
        
       
    } 
  }';
  
  
  curl_setopt($curlHandle, CURLOPT_POSTFIELDS,$fields);
  curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, true);
  
    $curlResponse = curl_exec($curlHandle);
    $ch = json_decode($curlResponse, true);
  
     $ch = $ch['response']['channel'][0]['channel'];




   

 

 $apply = '{ 


  "request":{
  "action":"applyChanges",
  
  "cookie":'.'"'.$cookie.'"'.'
  
  }

  }';
   

curl_setopt($curlHandle, CURLOPT_POSTFIELDS,$apply);
curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, true);
$curlResponse = curl_exec($curlHandle);
$ch= json_decode($curlResponse, true);
 $ch = $ch['status'];
if($ch == "0"){

 echo ' <p style="color:red;font-family:verdana ">Configuration Reloaded!</p>';
 

            
}
else{
    echo ' <p style="color:red;font-family:verdana ">Configuration Not Reloaded!</p>';

}















 curl_close($curlHandle);

?>

</body>

</html>
 
 
  




  








 
 


 


 







 















 
 
