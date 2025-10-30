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




    if(isset($_POST['sta'])&&isset($_POST['end'])&&isset($_POST['age']))
    {
  
      $sta=test_input($_POST['sta']);
      $end=test_input($_POST['end']);
      $age=test_input($_POST['age']);
 

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
    


 

 $totalqueue = '{ 


  "request":{
  "action":"queueapi",
  "endTime":'.'"'.$end.'"'.',
  "startTime":'.'"'.$sta.'"'.',
  "agent":'.'"'.$age.'"'.',
  "queue":'.'"'.$que.'"'.',
    "format":"json",
  "cookie":'.'"'.$cookie.'"'.'
  
  }

  }';
   

curl_setopt($curlHandle, CURLOPT_POSTFIELDS,$totalqueue);
curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, true);
   $curlResponse = curl_exec($curlHandle);
  $ch= json_decode($curlResponse, true);

  $ch -> status;
 
 
     if(   is_int($ch -> status)  ){
      echo '  <button style="color:blue" type="button" class="whatsappbutton" id="form"  onclick="refresh()"><h4   style="color:Tomato;" >    Please Reload! </h4></button>      ';
    }

  $queuechairman = $ch['queue_statistics'][0]['agent']['queuechairman']."<br>";
  $agent = $ch['queue_statistics'][0]['agent']['agent']."<br>";
  $total_calls = $ch['queue_statistics'][0]['agent']['total_calls']."<br>";
  $answered_calls = $ch['queue_statistics'][0]['agent']['answered_calls']."<br>";
  $answered_rate = $ch['queue_statistics'][0]['agent']['answered_rate']."<br>";
  
  $avg_talk = $ch['queue_statistics'][0]['agent']['avg_talk']."<br>";
  $vq_total_calls = $ch['queue_statistics'][0]['agent']['vq_total_calls']."<br>";
  







 curl_close($curlHandle);




 
 
  




  








 
 


 


 







 








?>

<?php
 $os=$_GET['page'];

   //$os=$_SESSION["o"];
     $ps=$_SESSION["p"];
 $_SESSION["os"]=$os;
?>





<!DOCTYPE html>
<html lang="en">
<head>
<?php include('head.php'); ?>
  <link rel="stylesheet" href="css/stylei.css">
  <link rel="stylesheet" href="css/stylei2.css">
   
  <link rel="stylesheet" href="css/whatsappButton.css" />
  <script src="js/test371.js"></script>




 




</head>
<body onload="size242()" >

<div class="jumbotron"> 

<p style="text-align:center;font-size:25px;"    id="form"         >Agent Statistics</p>

<table>
<tr><th>queuechairman</th><th>agent</th><th>total_calls</th><th>answered_calls</th><th>answered_rate</th><th>avg_talk</th></tr>
<?php 
	 
	  
	
			
			   echo	"<tr><td>"."<a>" .$queuechairman. " </a>"."</td><td>"."<a  \">" .$agent. " </a></li>\n"."</td>"."<td>"."<a>".$total_calls."</a>"."</td>"."<td>"."<a>".$answered_calls."</a>"."</td>"."<td>"."<a>".$answered_rate."</a>"."</td>"."<td>"."<a>".$avg_talk."</a>"."</td>"."<td>"."<a>".$vq_total_calls."</a>"."</td>"."</tr>";
			
	
               ?> 
               </table>
               
               <button  class="whatsappbutton printPageButton"  type="button" id="form" onclick="printContents(id)">Print</button>
               <button class="whatsappbutton    printPageButton       " type="button" id="form"  onclick="quit()">Quit</button>
               <button   class="whatsappbutton  printPageButton       "     type="button" id="form" onclick="refresh()">Reload</button>
               </body>
               
               </div>
               
               </html>  	 
	
	
      




	 
	          
	  
   





 
 
