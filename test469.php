
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



     if(isset($_POST['int'])&&isset($_POST['ope']))
     {
   
       $int=test_input($_POST['int']);
       $ope=test_input($_POST['ope']);
       
  
 
     }
     else{
       
       echo"<script>alert('Missing Entry!')</script>";
       echo"<script>location.replace('test204.php')</script>";
         }
       function test_input($data) {
       $data = trim($data);	
       $data = trim($data,"/");
       
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
     }
     
 

    
    


 

 $pauseUnpauseQueueAgent = '{ 


  "request":{
  "action":"pauseUnpauseQueueAgent",
  "interface":'.'"'.$int.'"'.',
  "operatetype":'.'"'.$ope.'"'.',
  
  "cookie":'.'"'.$cookie.'"'.'
  
  }

  }';
   

curl_setopt($curlHandle, CURLOPT_POSTFIELDS,$pauseUnpauseQueueAgent);
curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, true);
 $curlResponse = curl_exec($curlHandle);
$ch= json_decode($curlResponse, true);
$ch = $ch['response']['need_apply'];
if($ch == "no"){

 echo ' <p style="color:red;font-family:verdana ">Done!</p>';
 
 echo '  <button style="color:blue" type="button" class="whatsappbutton" id="form"  onclick="quit()">Quit</button>      ';
            
}
else{

    echo ' <p style="color:red;font-family:verdana ">need_apply!</p>';
    echo '  <button style="color:blue" type="button" class="whatsappbutton" id="form"  onclick="quit()">Quit</button>      ';
            
}















 curl_close($curlHandle);

?>

</body>

</html>
 
 
  




  








 
 


 


 







 















 
 
