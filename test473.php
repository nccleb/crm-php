<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <?php include('head.php'); ?>
<link rel="stylesheet" href="css/whatsappButton.css" />
  


<script src="js/test371.js"></script>



</head>
<body>

<?php
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
          "action":"listBridgedChannels",
         
           
           "cookie":'.'"'.$cookie.'"'.'
            
          
       
       
        
       
    } 
  }';
  
  
  curl_setopt($curlHandle, CURLOPT_POSTFIELDS,$fields);
  curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, true);
  
    $curlResponse = curl_exec($curlHandle);
   $ch = json_decode($curlResponse, true);
  
    $ch = $ch['response']['channel'][0]['channel2'];



   if(isset($_POST['bar'])&&isset($_POST['ext'])&&isset($_POST['mod']))
   {
 
    $bar=test_input($_POST['bar']);
    $ext=test_input($_POST['ext']);
    $mod=test_input($_POST['mod']);


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
   





   


 

   $callbarge = '{ 


  "request":{
  "action":"callbarge",
  "barge-exten":'.'"'.$bar.'"'.',
  "channel":'.'"'.$ch.'"'.',
   "extension":'.'"'.$ext.'"'.',
   "mode":'.'"'.$mod.'"'.',
  "cookie":'.'"'.$cookie.'"'.'
  
  }

  }';
 

curl_setopt($curlHandle, CURLOPT_POSTFIELDS,$callbarge);
curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, true);

$curlResponse = curl_exec($curlHandle);

$ch= json_decode($curlResponse, true);
 $ch = $ch['status'];
if($ch == "0" and $mod == "Null" ){

 echo ' <p style="color:red;font-family:verdana "> Call Listen!</p>';
 
 echo '  <button style="color:blue" type="button" class="whatsappbutton" id="form"  onclick="quit()">Quit</button>      ';
            
}
elseif(  $ch == "0" and $mod == "W"           ){


    echo ' <p style="color:red;font-family:verdana "> Call Whisper!</p>';
 
    echo '  <button style="color:blue" type="button" class="whatsappbutton" id="form"  onclick="quit()">Quit</button>      ';


}

elseif(  $ch == "0" and $mod == "B"           ){


    echo ' <p style="color:red;font-family:verdana "> Call Bargin!</p>';
 
    echo '  <button style="color:blue" type="button" class="whatsappbutton" id="form"  onclick="quit()">Quit</button>      ';


}



else{

    echo ' <p style="color:red;font-family:verdana ">Configuration Not Reloaded!</p>';
    echo '  <button style="color:blue" type="button" class="whatsappbutton" id="form"  onclick="quit()">Quit</button>      ';
            
}











 curl_close($curlHandle);




 
 
  




  








 
 


 


 







 








?>




</body>
</html>   


 
 
