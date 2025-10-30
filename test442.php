
<?php
// $co = $_GET["q"];
$cookie_name = "pipe";
   $cookie_value = $_GET["q"];
   setcookie($cookie_name, $cookie_value, time() + (86400 * 3600), "/"); 
   
    echo '<meta http-equiv=Refresh content="0;url=test411.php?reload=1">';
    
 
 
   

 

 
 ?>
 