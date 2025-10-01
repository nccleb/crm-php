<!--?php
session_start();

$fields = '{ 
    "request":{
        "action":"challenge",
       
        "user":"cdrapi"
      
    }
    
    }';




$curlHandle = curl_init('https://192.168.22.216:8089/api');


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
 $inc = json_decode($curlResponse, true);

  $inc = $inc['response']['channel'][0]['callernum'];
  $_SESSION['userinc'] = $inc;
  


 curl_close($curlHandle);

?>

<?php
session_start();
$inc="81721326";
 $_SESSION['userinc'] = $inc;

 ?>


 
 
  




  








 
 


 


 







 








?>







 

