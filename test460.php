
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




    if(isset($_POST['ext'])&&isset($_POST['mem'])&&isset($_POST['num'])&&isset($_POST['pagn'])
    &&isset($_POST['pagt'])){
  
      $ext=test_input($_POST['ext']);
  $mem=test_input($_POST['mem']);
   $num=test_input($_POST['num']);
 $pagn=test_input($_POST['pagn']);
 $pagt=test_input($_POST['pagt']);

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
    


 

 $addPaginggroup = '{ 


  "request":{
  "action":"addPaginggroup",
  "extension":'.'"'.$ext.'"'.',
  "members":'.'"'.$mem.'"'.',
  "number_allowed":'.'"'.$num.'"'.',
  "paginggroup_name":'.'"'.$pagn.'"'.',
  "paginggroup_type":'.'"'.$pagt.'"'.',
  "cookie":'.'"'.$cookie.'"'.'
  
  }

  }';
   

curl_setopt($curlHandle, CURLOPT_POSTFIELDS,$addPaginggroup);
curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, true);
echo $curlResponse = curl_exec($curlHandle);
$ch= json_decode($curlResponse, true);
$ch = $ch['response']['need_apply'];
if($ch == "yes"){

 echo ' <p style="color:red;font-family:verdana ">Need Apply!</p>';
 
 echo '  <button style="color:blue" type="button" class="whatsappbutton" id="form"  onclick="quit()">Quit</button>      ';
            
}















 curl_close($curlHandle);

?>

</body>

</html>
 
 
  




  








 
 


 


 







 















 
 
