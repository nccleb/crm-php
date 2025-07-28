<?php
session_start();
 $mapo=$_SESSION["mapi"];

?>

<?php $opic=   "c".":"."\\"."Mdr"."\\"."CallerID".date("Y")."-". date("m")."."."txt" ?>


<?php

require "vendor/autoload.php";

//loading data
//preprocessing data
//training data
//evaluating machine learning model
//making predictions with trained models


$data = new \Phpml\Dataset\CsvDataset('./data/iris.csv', 4 ,true);



$dataset = new  \Phpml\CrossValidation\stratifiedRandomSplit($data, 0.2);

// train group
$dataset->getTrainSamples();
$dataset->getTrainLabels();

// test group
$dataset->getTestSamples();
$dataset->getTestLabels();

$classification = new  \Phpml\Classification\ KNearestNeighbors($k=3);
$classification->train($dataset->getTrainSamples(), $dataset->getTrainLabels());
$predicted = $classification-> predict($dataset->getTestSamples());
$accuracy = \Phpml\Metric\Accuracy::score($dataset->getTestLabels(), $predicted);
 
//echo 'accuracy is'." ".$accuracy;
//echo "\n";
$predicted = $classification-> predict([4.3,3.6,1.5,0.6]);

//echo "prediction is"." ".$predicted;












$fichier="CaCallStatus.dat";
$xml=simplexml_load_file($fichier);
foreach($xml as $CallRecord){
    $ext=$show->ext;
   $inc=$CallRecord->CallerID;;
   
}  









$line = '';
//$f = fopen("c:\MDR\CallerID2022-09.txt", 'r');
$f = fopen("$opic", 'r');
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

 
 
 
 
	$idr = mysqli_connect("192.168.20.107", "root", "1Sys9Admeen72", "nccleb_test");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}




	
	          
		$stmt = $idr->prepare("SELECT  * FROM client 
      
       	where (number=? or inumber=? or telmobile=? or telother=? )   ");
	  
 
$stmt->bind_param("iiii",$inc,$inc,$inc,$inc );

$stmt->execute();

$result = $stmt ->get_result();

$stmt->close();






while($row=$result->fetch_assoc()){

	  
	          
			  
	         
              $num=$row['number'];
			  
              if(strlen($num)==7){
              $num="0".$num;
			  }			  
			  
			  
			  $inum=$row['inumber'];
			  
              if(strlen($inum)==7){
              $inum="0".$inum;
			  }			  
             $name=$row['nom']; 
			  $id=$row['id'];
		      $_SESSION["id"]=$id;
              $company=$row['company'];
			  $email=$row['email'];
			  $business=$row['business'];
			  $grade=$row['grade'];
			  $address=$row['address'];
			  $url=$row['url'];
			  $url = substr($url, 7);
			  $idf=$row['idf'];
			  $city=$row['city'];
			  $street=$row['street'];
			  $floor=$row['floor'];
			  $building=$row['building'];
			  $zone=$row['zone'];
			  $near=$row['near'];
			  $remark=$row['remark'];
			  $idf=$row['idf'];
			  $telmobile=$row['telmobile'];
			  if(strlen($telmobile)==7){
              $telmobile="0".$telmobile;
			  }			  
			  
			  $telother=$row['telother'];
			  if(strlen($telother)==7){
              $telother="0".$telother;
			  }			  
			  
			 $apartment=$row['apartment'];
			  
			  
		}
	 
	  
	  
	  
	 
	
	  
	 
	?> 	  
 

<?php
 $_SESSION["ses"]=$_POST['bp'];
  $s=$_SESSION["ses"];
$cookie_name = "user";
$cookie_value = $_POST['bp'];
setcookie($cookie_name, $cookie_value, time() + (86400 * 360), "/"); 
  
    $nam=$_GET['pag'];
   if($nam == ""){
    exit( "sorry! You have to login first in mypwca!"    );
    
   }
  $idf=$_GET['pag1'];

$_SESSION["oop"]=$nam;
$_SESSION["ooq"]=$idf;


$cookie_name = "oop";
 $cookie_value =$nam;
setcookie($cookie_name, $cookie_value, time() + (86400 * 360), "/"); 

 
$cookie_name = "ooq";
$cookie_value = $idf;
setcookie($cookie_name, $cookie_value, time() + (86400 * 360), "/"); 


?>



<!DOCTYPE html>
<html lang="en">
<head>




<style>
        .jumbotron {
            background: url("7.jpg") center center / cover no-repeat;
        }
</style>


<style>
  .form-control{
  resize: none;
  
}


.img-circle{
    width:150px;
    height:150px
   }



</style>




   
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>








<script type="text/javascript" src="js/test371.js"></script>
		

<link rel="stylesheet" href="css/stylei.css">
<link rel="stylesheet" href="css/stylei2.css">


<input type="hidden" id="demo" value="<?php echo $nam ?>"></input>
<input type="hidden" id="demo1" value="<?php echo $idf ?>"></input>
<input type="hidden" id="demo2" value="<?php echo $inc ?>"></input>


<script>
const global = document.getElementById("demo").value;
const global1 = document.getElementById("demo1").value;
const global2 = document.getElementById("demo2").value;

</script>












 

	



<!--script>
window.onbeforeunload = 
function sq(str) {
	
	 var name="<?php echo $nam ?>" ;
  var idf="<?php echo $idf ?>" ;
  
  
	
  var xhttp;
 
  
  
  if (window.XMLHttpRequest) {
    // code for modern browsers
    xhttp = new XMLHttpRequest();
    } else {
    // code for IE6, IE5
    xhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("sq").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET","test313.php?name="+name+"&idf="+idf, true);
 
  xhttp.send();
}
</script-->



<style>
 
 
     .dropdown {
position: relative;

}







.dropdown-menu .dropdown-submenu-left {
right: 100%;
left: auto;
}


 .dropdown-content:hover .hov {
  display: block;
} 
     
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}






.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: center;
}
   




.dropdown:hover .dropdown-content {
  display: block;
} 
     
     
 </style>   

<style>
.a1{

  position: absolute;
  top: 132px;
  left: 0px;
  width: 160px;
  
  
  height: 15px;
  
  text-align: center;
  
}

.a2{

position: absolute;
top: 240px;
right: 50;
width: 200px;
height: 20px;
border: 3px solid #73AD21;


}

.drop{

position: absolute;
top: 0px;
left: 160px;
width: 200px;
height: 20px;




}

.drop a {
  background-color: white;
 
  width: 150px;
  
  
}
  



 p {
  display: none;
  background-color: white;
  padding: 10px;

}

.a1:hover p {
  display: block;
  width: 170px;
}

.a2:hover p {
  display: block;
}


</style>
 
  
  
  
</head>
<body  onload="on()">



<p id="lat" hidden></p> 
    <p id="lng" hidden></p> 
   
   
   
<div id="addp" ></div> 
     








<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle"  style="background:#FF33E0 "     data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>   
        <span class="icon-bar"></span>       
      </button>
     
	   
		 
    </div>


 
    <div>
  <ul class="nav navbar-nav navbar-right">

 
  
<li class="dropdown">

 <!--a href="#" class="dropdown-toggle" data-toggle="dropdown"><span id="count1" class="label label-pill label-danger count" style="border-radius:10px;"></span> <span class="" id="bell" style="font-size:18px;"></span></a>
 
 <ul class="dropdown-toggle" id="drop"></ul-->
 <span style="color:green">Login as  <?php echo $nam ?> </span>
 
 <li><a href="login200.php"   style="color:green"       ><span class="glyphicon glyphicon-log-out"  style="color:green"      ></span> Logout</a></li>

</li>

</ul>








</div>






    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
    
     
      
  
   <li class="dropdown">
   <a class="dropdown-toggle" data-toggle="dropdown" href="#">More
    <span class="caret"></span></a>
    <ul class="dropdown-menu">
    <ul>
    <li> <a href="#" onclick="javascript:search5()"        >First name</a></li>
    <li>  <a href="" onclick="javascript:search15()">Last name</a></li>
    <li>   <a href="#" onclick="javascript:search16()">Company</a></li>
    <li> <a href="#" onclick="javascript:search2()">Business</a></li>
    <li>  <a href="#" onclick="javascript:del()">Del</a></li>
   
    </ul>
</ul>
  </li> 




     
  <!--li class="dropdown">
  <a class="dropdown-toggle" data-toggle="dropdown" href="#">CTI
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
		  <ul>
     
      <li> <a href="#" onclick="javascript:dialExtension()"   style="color:"   >Dial Extension</a></li>
       <input type="text" id="diex" name = "diex"    class="form-control"    >
      <li> <a href="#" onclick="javascript:dialOutbound()"   style="color:green"       >Dial Outbound</a></li>
       <input type="text" id="diou" name = "diou"  class="form-control"       >
      <li> <a href="#" onclick="javascript:acceptCall()" style="color:">Accept Call</a></li>
      <li>  <a href="#" onclick="javascript:refuseCall()" style="color:green">Refuse Call</a></li>
      <li> <a href="#" onclick="javascript:hold()" style="color:">Hold</a></li>
      <li>  <a href="#" onclick="javascript:unhold()" style="color:green">Unhold</a></li>
      <li><a href="#" onclick="javascript:mute()" style="color:">Mute</a></li>
      <li> <a href="#" onclick="javascript:unmute()" style="color:green">Unmute</a></li>
           
      <li> <a href="#" onclick="javascript:callTransfer()"   style="color:"   >Call Transfer</a></li>
       <input type="text" id="catr" name = "catr"  class="form-control"        >
           
            
         
          

          

            
      <li> <a class="test"   onclick="javascript:add341()"           href="#">callbarge <span class=""></span></a></li>
            
          

          

          



            
      <li>  <a class="test"   onclick="javascript:add339()"           href="#">pauseUnpause <span class=""></span></a></li>
            
          



            
      <li> <a class="test"   onclick="javascript:add337()"           href="#">addPagingGroup <span class=""></span></a></li>
            
</ul>
</ul>
  </li>
	  


   <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn">Queue Statistics</a>
    <div class="dropdown-content">
     
    
   
    
    
   
 
    
<div         class="a1"><div style="background:green">Overview</div>
  <p class="drop"> <a    onclick="javascript:add334()"           href="#">Total </a>
    <a    onclick="javascript:add335()"           href="#">Queue </a> 
   <a   onclick="javascript:add336()"           href="#">Agent </a></p>
</div>       
            


              
          
            
           <a    onclick="javascript:add345()"           href="#">Agent Detail </a>
         
       
           
            
            
              <a    onclick="javascript:add336()"           href="#">Login Record</a>
         
       
           
            
            
            <a    onclick="javascript:add336()"           href="#">Pause Log</a>
            
   

 
	  
</div>

</li-->  
        
      <li class="dropdown">
        <a              class="dropdown-toggle" data-toggle="dropdown" href="#">Queue Statistics
        <span class="caret"></span></a>
        <ul  class="dropdown-menu">
		  <ul>
        
              
            
      <li><a class="test" style="color:DodgerBlue;"  onclick="javascript:add334()"           href="#">Total </a></li>
      <li><a class="test" style="color:DodgerBlue;"  onclick="javascript:add335()"           href="#">Queue </a> </li>
      <li> <a class="test" style="color:DodgerBlue;"  onclick="javascript:add336()"           href="#">Agent </a></li>
         
       
            </ul>
        
            
            <li> <a class="test" style="color:DodgerBlue;"  onclick="javascript:add345()"           href="#">Agent Details </a></li>
         
       
           
            
            
            <li> <a class="test" style="color:DodgerBlue;"  onclick="javascript:add346()"           href="#">Login Record</a></li>
    
  
      
       
       
       <li >  <a class="test" style="color:DodgerBlue;"  onclick="javascript:add347()"           href="#">Pause Log</a></li>
    
  
      

          
        
        </ul>
      
      </li>
           

      
          
       
           
       
<!--             
      <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn">Reports</a>
    <div class="dropdown-content">
     
    
    
    <a href="#" onclick="javascript:list1()">Simple List(Clients)</a>
    <a href="#" onclick="javascript:list79()">Simple List(Tickets)</a>
    <a href="#" onclick="javascript:tick79()">Open Tickets</a>
              
     <a href="#" onclick="javascript:incidents()">Tickets</a>
    <a href="#" onclick="javascript:incidents2()">Statistics(Tickets)</a>  
    
     
    
  
  </li>  -->
            
          
           
              
            

             
              
            
            
         

        
		   <li class="dropdown">
        <a   style="color:"             class="dropdown-toggle" data-toggle="dropdown" href="#">Reports
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
		<ul>
    
      <li><a href="#" onclick="javascript:list1()">Simple List(Clients)</a></li>
      <li><a href="#" onclick="javascript:list79()">Simple List(Tickets)</a></li>
      <li><a href="#" onclick="javascript:tick79()">Open Tickets</a></li>
                
       <li><a href="#" onclick="javascript:incidents()">Tickets Details</a></li>
       <li><a href="#" onclick="javascript:incidents2()">Statistics(Tickets)</a></li>   
      
       
		  
		 </ul>
		  
          
        </ul>
      </li>
	   
	   
	  
	  
	  
	  
      <li class="dropdown">
        <a              class="dropdown-toggle" data-toggle="dropdown" href="#">System
        <span class="caret"></span></a>
        <ul  class="dropdown-menu">
         
		  
        


       




         
       <li> <a         href="#"><b style="color:green"    >COMPLAINTS</b></a></li>
		    <ul>  
			<li> <a href="#" onclick="javascript:add322()">Complaints</a>  </li>
      <li>  <a href="#" onclick="javascript:add33()">Add-Complaint</a></li>
		  
      <li>  <a href="#" onclick="javascript:del_ag1()">Delete Complaint</a></li>
      <li>  <a href="#" onclick="javascript:del_al1()">Delete ALL</a></li>
</ul>
		 
		         
			    
			  
			  
          <!--li><a href="#">Pipelines</a></li>
		      <ul >
			 <li><a href="#" onclick="javascript:add332()">Pipelines</a></li>  
          <li><a href="#" onclick="javascript:add333()">Populate Pipelines</a></li>
		  
		  <li><a href="#" onclick="javascript:del_ag12()">Delete Deal Stage</a></li>
      <li><a href="#" onclick="javascript:del_ag13()">Delete Pipeline</a></li>
		  <li><a href="#" onclick="javascript:del_al1()">Delete ALL</a></li>
		 
		 
		      </ul-->    
			    
			  
			  
			<li><a           href="#"><b style="color:green"  >USERS</b></a></li>
		     <ul> 
       <li><a href="#" onclick="javascript:add3()">Add_user</a></li>
		  
       <li> <a href="#" onclick="javascript:add22()">Users</a> </li>
         
		   <li><a href="#" onclick="javascript:del_ag()">Del-user</a></li>
       <li><a href="#" onclick="javascript:del_al()">Del-ALL</a></li>
       </ul>
		 
		         
			  
			
		  <li><a            href="#"><b  style="color:green"    >AGENTS</b></a></li>
		      <ul>
        <li> <a href="#" onclick="javascript:search10()">Agent</a> </li>
         <?php
         if($nam=="202"){
          
         echo " <li><a href=\"#\" onclick=\"javascript:adag()\">Add_agent</a> </li>";
         echo " <li><a href=\"#\" onclick=\"javascript:delag()\">Del_agent</a> </li>";
         echo " <li><a href=\"#\" onclick=\"javascript:delal()\">Del-ALL</a> </li>";
         
         }
		 ?>
		  
        </ul>
			  
			  
			  
        </ul>
		  
        
      </li>
		  
       
	   
	   
	  
      
     
     
     
	  
      <li class="dropdown">
        <a              class="dropdown-toggle" data-toggle="dropdown" href="#">Data
        <span class="caret"></span></a>
        <ul  class="dropdown-menu">
         
        <li> <a            href="#" ><b  style="color:green"  >IMPORT</b></a> </li>
          <ul>
         <li> <a href="#" onclick="javascript:Import()">Client</a></li>
         <li><a href="#" onclick="javascript:Importc1()">Cim</a></li>
        </ul>
		  
		  
		  
	
        <li><a  style="color:blue;"         href="#"><b style="color:green"      >EXPORT</b></a></li>
        <ul>
        <li><a href="#" onclick="javascript:Export()">Client(Raw)</a></li>
        <li><a href="#" onclick="javascript:Exportd()">Client</a></li>
        <li> <a href="#" onclick="javascript:Exportc1()">Cim(Raw)</a></li>
        <li> <a href="#" onclick="javascript:Exportd1()">Cim</a></li>
        </ul>
      

		  
		      
        <li> <a href="#"          onclick="javascript:apply()"><b  style="color:#6495ED"    >APPLY</b></a></li>
        <li> <a href="#"        onclick="javascript:bb()"><b  style="color:#6495ED"     >BACK-UP</b></a> </li>
        <li><a href="#"           onclick="javascript:ImportSql()"><b style="color:#6495ED"     >RECOVERY</b></a></li>
		  
		  <?php
         if($nam=="202" or $nam=="admin"){



         echo " 
        
         <li> <a href=\"#\" ><b  style=\"color:green\"         >DELETE</b></a> </li>
      <ul> 
      <li> <a href=\"#\" onclick=\"javascript:delAll()\">Delete All CLIENT</a></li>
      <li> <a href=\"#\" onclick=\"javascript:delAll2()\">Delete All CIM</a></li>
      <!--li> <a href=\"#\" onclick=\"javascript:delAll6()\">Delete All DEALS</a></li>
      <li> <a href=\"#\" onclick=\"javascript:delAll5()\">Delete All POSTS</a></li-->
      </ul>
              ";
		
	
		  
		  
         }
         ?>
          
       
      </li>

     
     
		  
		         
     
      
        

       
    </div>
    
    
  </div>
  
  

  












</nav>




<?php
    
// 	 $idr = mysqli_connect("192.168.20.107", "root", "1Sys9Admeen72", "nccleb_test");
// if (mysqli_connect_errno()) {
//   echo "Failed to connect to MySQL: " . mysqli_connect_error();
//   exit();
// }
// 	  $result=@mysqli_query($idr,"SELECT  * FROM client 
// 	  ") ;

//  //"this=".$num=$_COOKIE["bta"];
//  "this=".$num=$inc;
//    while($lig=@mysqli_fetch_assoc($result)){
   
//  if( $inc!="" && $num==$lig['number'] ){
//         switch(  $lig['grade']) {
//       case "regular":
// 	    $t=1;
// 		break;
// 	  case "gold":
// 	   $t=2;
// 		break;
// 	  case "platinum":
// 	    $t=3;
// 		break;

// 		}
 
//  }
 
//    }
 ?>


<div >


  <table  style="background:#f8f8f8"  class="table"    id="comment_form"  >
  <tr >
 
  <th style="width:20%;background:lightgrey "    >

  <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">INCOMING CALL</label>
  <input type="text"  <?php  if($t==2){ echo "style=\"background-color:gold\" "; } elseif($t==3) { echo "style=\"background-color:#e5e4e2\" "; } ?>          class="form-control" id="bp" placeholder="" name="bp"  >
 
 </div> <br>
  

 <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">NAME</label>
  <input type="text" class="form-control" id="ap" placeholder="" name="ap"   >
</div><br>


        

   <div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Last Contacted</label>
 <input style="font-size:13px;" id="acdc" rows="5"  name="acdc" ></input>
</div>

  

<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Ticket Name</label>
 <input style="font-size:13px;" id="iss" rows="5"  name="iss" ></input>
</div>



   <div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Complaint </label>
 <textarea style="font-size:13px;" id="comp" rows="5"  name="comp" ></textarea>
</div>


<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Status..</label>
  <input  style="font-size:13px;"   id="stat" rows="5"  name="stat" ></input>
</div>


 
      </th>

      <th>

   
  
      
   
  
  
   
  
   
  
   

  
  
  
  
  
	  
	    
		


 




<div class="mb-3">
 

  <textarea   style="  background-color: lightblue;"   class="form-control" id="cp" rows="38"  name="cp"      ></textarea>
</div>




</th>

<th  style="width:30%"        >
<div  >

<button   style="color:black"           class="btn btn-success   btn-block "      type="button" id="form" onclick="refresh()">R</button> 
           
              <ul   class="list-group">
              <li      class="list-group-item "><a   style="color:black"       href="#" onclick="javascript:add110()">Add Client</a></li>
                  
			    <li class="list-group-item "><a  style="color:black"     href="#" onclick="javascript:number23()">Edit Client(Actual)</a></li>
               
				<li class="list-group-item "><a  style="color:black"         href="#" onclick="javascript:number22()">Search Client(Number) </a></li>
        <!--li class="list-group-item "><a href="#" onclick="javascript:list1()">Simple List </a></li-->

				    </br>          
								

            <li class="list-group-item "><a   style="color:black"        href="#" onclick="javascript:add()">Create Ticket</a></li>  
				 <li class="list-group-item "><a   style="color:black"      href="#" onclick="javascript:uro1()">Edit Last Ticket(Actual Number)</a></li>
				   
                <li class="list-group-item "><a   style="color:black"       href="#" onclick="javascript:uro2()">Search Last Ticket(Number)</a></li>
                <li class="list-group-item "><a   style="color:black"        href="#" onclick="javascript:uro8()">Search Ticket</a></li>
                <li class="list-group-item "><a   style="color:black"     href="#" onclick="javascript:tick79()">Open Tickets</a></li>
                <!--li class="list-group-item "><a href="#" onclick="javascript:list79()">Simple List </a></li-->
				</br>  

        <!--li class="list-group-item "><a href="#" onclick="javascript:search51()">Create Deal</a></li> 
        <li class="list-group-item "><a href="#" onclick="javascript:search52()">Search Last Deal(Actual Number)</a></li> 
        <li class="list-group-item "><a href="#" onclick="javascript:uro3()">Search Last Deal(Number)</a></li> 
        <li class="list-group-item "><a href="#" onclick="javascript:uro9()">Search Deal</a></li--> 
      </br>
 




  

 

  
          </div>
       

 </th>

  </tr>



 
   
 </table>















 





















 







 </div>


 
 <!--script>
$(document).ready(function(){
  $('.dropdown-submenu a.test').on("click", function(e){
    $(this).next('ul').toggle();
    e.stopPropagation();
    e.preventDefault();
  });
});
</script-->

 
 <?php include 'footer.php';?>
 
</body>



          
    

        
      


       

       
     


	  
		  
        
      
	






	
	  












</html>









































 



 
 
 
 
 
 

 

 












 
 
 

 
 










		






































 















































































































 





















