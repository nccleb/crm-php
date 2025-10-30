<?php
session_start();
?>

<?php
   $q=$_GET["q"];
 
//$inc="0";

$_SESSION["mapi"]=$q;

$cookie_name = "mapi";
 $cookie_value = $q;
setcookie($cookie_name, $cookie_value, time() + (86400 * 3600), "/");

?>