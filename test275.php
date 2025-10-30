<?php
session_start();
$s=$_SESSION["ses"];
$C=$_COOKIE["user"];
 $u=urldecode($_GET['page']);
  $_SESSION["u"]=$u;
 $p=urldecode($_GET['page1']);
  $_SESSION["p"]=$p;
$ui=urldecode($_GET['page2']);
 $_SESSION["q"]=$ui;
?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php include('head.php'); ?>
  <link rel="stylesheet" href="css/stylei.css">
  <link rel="stylesheet" href="css/stylei2.css">
   
  <link rel="stylesheet" href="css/whatsappButton.css" />

  <script type="text/javascript" src="js/test371.js"></script>

        <title>main</title>




</head>

<body>

<div class="jumbotron"> 






   
   <h3 id="form">Search  Contacts Details</h3> 
   
 

 
<form method="post" action="<?php echo htmlspecialchars("test200.php");?>" id="form">
<h4 id="form" >Enter The Number:</h4>
<input  type="text" name="name" value="<?php echo $ui?>" >


<input class="whatsappbutton"  id="form" type="submit" value="Search" name="submit">

<button   class="whatsappbutton"      type="button" id="form" onclick="quit()">Quit</button>
</form><br/><br/>






</fieldset>

<div>

</body>
</html>







 

   
        
   
       
   
   
   
   
   
    

 















   