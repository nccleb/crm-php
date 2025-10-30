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
  
     $ch = $ch2['response']['channel'][0]['channel'];
      



    if((isset($_POST['sta'])AND !empty($_POST['sta'])) && (isset($_POST['end'])AND !empty($_POST['end']))&&isset($_POST['que'])&&isset($_POST['age'])&&isset($_POST['con']))
    {
  
      $sta=test_input($_POST['sta']);
      $end=test_input($_POST['end']);
      $que=test_input($_POST['que']);
      $age=test_input($_POST['age']);
      $con=test_input($_POST['con']);
    }
    else{
      
      echo"<script>alert('Missing Entry!')</script>";
      echo"<script>location.replace('test476.php')</script>";
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
  "queue":'.'"'.$que.'"'.',
  "agent":'.'"'.$age.'"'.',
    "format":"json",
     "statisticsType":"calldetail",
  "cookie":'.'"'.$cookie.'"'.'
  
  }

  }';
   
  

curl_setopt($curlHandle, CURLOPT_POSTFIELDS,$totalqueue);
curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, true);
  $curlResponse = curl_exec($curlHandle);
   $ch= json_decode($curlResponse);
   $ch -> status;
 
 
     if(   is_int($ch -> status)  ){
      echo '  <button style="color:blue" type="button" class="whatsappbutton" id="form"  onclick="refresh()"><h4   style="color:Tomato;" >    Please Reload! </h4></button>      ';
    }
 // foreach ($ch->response as $key => $value) {
  //  echo  $value->response;


  //}
// else{

//     echo ' <p style="color:red;font-family:verdana ">Configuration Not Reloaded!</p>';
//     echo '  <button style="color:blue" type="button" class="whatsappbutton" id="form"  onclick="quit()">Quit</button>      ';
            
// }


 
 










 curl_close($curlHandle);


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

 <p style="text-align:center;font-size:25px;"    id="form"         >Agent Details</p>

 <table>
 <tr><th>queuechairman</th><th>start_time</th><th>agent</th><th>extension</th><th>callernum</th><th>connect</th><th>wait_time</th><th>talk_time</th></tr>
 <?php 
      
      foreach ($ch->queue_statistics as $key => $value) {
         if($con != "yes" && $con != "no"){
         if( $value->agent->agent != "NONE"    ){
       
         
     
     
     
     
             
                echo	"<tr><td>"."<a>" .$value->agent->queuechairman  ." </a>"."</td><td>"."<a  \">" .$value->agent->start_time . " </a></li>\n"."</td>"."<td>"."<a>".$value->agent->agent."</a>"."</td>"."<td>"."<a>".$value->agent->extension."</a>"."</td>"."<td>"."<a>".$value->agent->callernum."</a>"."</td>"."<td>"."<a>".$value->agent->connect."</a>"."</td>"."<td>"."<a>".$value->agent->wait_time."</a>"."</td>"."<td>"."<a>".$value->agent->talk_time."</a>"."</td>"."</tr>";
             
      } 
     }
 
      if($con == "yes" ){
      if( $value->agent->agent != "NONE"    ){
         if( $value->agent->connect == "yes"    ){
      
  
  
  
  
          
             echo	"<tr><td>"."<a>" .$value->agent->queuechairman  ." </a>"."</td><td>"."<a  \">" .$value->agent->start_time . " </a></li>\n"."</td>"."<td>"."<a>".$value->agent->agent."</a>"."</td>"."<td>"."<a>".$value->agent->extension."</a>"."</td>"."<td>"."<a>".$value->agent->callernum."</a>"."</td>"."<td>"."<a>".$value->agent->connect."</a>"."</td>"."<td>"."<a>".$value->agent->wait_time."</a>"."</td>"."<td>"."<a>".$value->agent->talk_time."</a>"."</td>"."</tr>";
          
   } 
 
 }
      }
 
  
      if($con == "no" ){
         if( $value->agent->agent != "NONE"    ){
            if( $value->agent->connect == "no"    ){
         
     
     
     
     
             
                echo	"<tr><td>"."<a>" .$value->agent->queuechairman  ." </a>"."</td><td>"."<a  \">" .$value->agent->start_time . " </a></li>\n"."</td>"."<td>"."<a>".$value->agent->agent."</a>"."</td>"."<td>"."<a>".$value->agent->extension."</a>"."</td>"."<td>"."<a>".$value->agent->callernum."</a>"."</td>"."<td>"."<a>".$value->agent->connect."</a>"."</td>"."<td>"."<a>".$value->agent->wait_time."</a>"."</td>"."<td>"."<a>".$value->agent->talk_time."</a>"."</td>"."</tr>";
             
      } 
    
    }
         }
    
 
 
 
     }
 
     
                ?> 
                </table>
                
                <button  class="whatsappbutton printPageButton"  type="button" id="form" onclick="printContents(id)">Print</button>
                <button class="whatsappbutton    printPageButton       " type="button" id="form"  onclick="quit()">Quit</button>
                <button   class="whatsappbutton  printPageButton       "     type="button" id="form" onclick="refresh()">Reload</button>
                </body>
                
                </div>
                
                </html>  	 
     
     
       
 
 
 
 
      
               
       
    
 
 
 
 
 
  
  
 

 
 
  




  








 
 


 


 







 








