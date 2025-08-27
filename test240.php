<?php
session_start();
 
  $nam=$_GET["pag"];
  $idf=$_GET["pag1"];
 
	
//echo	$_SESSION["id"];
	
	
 
 

 "COOKIE1=".$_COOKIE[test_status]."<br>";
 "COOKIE2=".$_COOKIE[user]."<br>"
?>

<!DOCTYPE html>
<html>
<head>
 <?php include('head.php'); ?>
<?php

$fichier="CaCallStatus.dat";
$xml=simplexml_load_file($fichier);
foreach($xml as $CallRecord){
    $ext=$show->ext;
  $inc=$CallRecord->CallerID;;
    
} 

  "INC=".$inc."<br>";
?>


<?php
if(!isset($_COOKIE['user2'])) {
if(!isset($_COOKIE['user1'])) {
	if(!isset($_COOKIE['user'])) {
if($inc!="" ){

//echo "<a  id=\"hej\"   href=\"http://212.98.135.34:15711/QTS_SADCO/en/Clients/IncomingCall?phone= $inc\"></a>";  
 echo " <script> var url = 'http://192.168.16.103/test204.php?pag= $nam &pag1= $idf ';</script>   ";
 echo " <script> var pw = 400;	</script>   ";
 echo " <script> var ph = 750;	</script>   ";
 echo " <script>var left   = (screen.width  - pw)/2;</script>   ";
 echo " <script> var top    = (screen.height - ph)/2;</script>   ";
 echo " <script>var parms = 'modal=yes, dialog=1, height='+ ph +', width=' + pw + ',left=' + left + ', top=' + top + ', status=0, location=no, menubar=0, title=no, scrollbars=0';</script>   ";
 echo " <script>var uid = window.open(url, '', parms);</script>   ";
    //echo "<script>	 document.getElementById(\"hej\").click(); </script>";

}

}

}

}


$cookie_name = "user2";
$cookie_value = $inc;
setcookie($cookie_name, $cookie_value, time() + (86400*360), "/"); 



$cookie_name = "user1";
$cookie_value = $inc;
setcookie($cookie_name, $cookie_value, time() + (86400*360), "/"); 
  
  $cookie_name = "user";
$cookie_value = $inc;
setcookie($cookie_name, $cookie_value, time() + (86400*360), "/"); 
  
  
  //echo $cook=$_COOKIE['user'];



//echo " <script> window.open('http://212.98.135.34:15711/QTS_SADCO/en/Clients/IncomingCall?phone= $inc') ;</script>   ";



?>










<script>
function setCookie(cname, cvalue, exdays) {
  var d = new Date();
  d.setTime(d.getTime() + (exdays * 24 * 1* 60 * 1000));
  var expires = "expires="+d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

</script>


<script>
function getCookie(cname) {
  var name = cname + "=";
  var ca = document.cookie.split(';');
  for(var i = 0; i < ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}
</script>





















<script>









function openPopupWin()
	{
		
		
		
		
        
   
		
		var inc=<?php echo $inc?>;
		
			if(inc!==""){
				
			 //var user = getCookie("test_status");	
				// if (user !== "1"){
			
				
				
		var url = 'http://192.168.16.103/test204.php?pag=<?php echo $nam ?>&pag1=<?php echo $idf ?>';
		var pw = 400;		// pixels - change for your desired popup width
		var ph = 750;		// pixels - change for your popup height
		var left   = (screen.width  - pw)/2;
		var top    = (screen.height - ph)/2;
		var parms = 'modal=yes, dialog=1, height='+ ph +', width=' + pw + ',left=' + left + ', top=' + top + ', status=0, location=no, menubar=0, title=no, scrollbars=0';
		var uid = window.open(url, '', parms);
		
		 //setCookie("test_status", 1, 1);
		 
		 
		
	}
	
	
	
	
	}
	 
	
	//}
	
	
</script>





	
<script>
function quit(){
	setCookie("test_status", 1, 0);
}

</script>	
	
	<script>
function quit12(){
	

	window.close();
}

</script>	

	
	

</script>

<script>
function prev(){
	
refresh();
}
function on(){
	y=setInterval("prev()",3000);
}


</script> 

<script>
function refresh(){
	
 location.replace ("http://192.168.16.103/test240.php?pag=<?php echo $nam ?>&pag1=<?php echo $idf ?>","","menubar=0,resizable=1,width=950,height=750");
	
}
</script>


<script>
function crm(){
	
 window.open("http://192.168.16.103/test204.php?pag=<?php echo $nam ?>&pag1=<?php echo $idf ?>","","menubar=0,resizable=1,width=650,height=950");
	
}
</script>




</head>
<body  onload="on()">
<!--button class="navbar-brand" href="#" onclick="javascript:quit12()"> <p style="color:lightblue ">  QUIT </p></button-->
<!--button class="navbar-brand" href="#" onclick="javascript:crm()"> <p style="color:lightblue ">  CRM </p></button-->
</body>


</html>

