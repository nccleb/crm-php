<?php
session_start();
 $os=$_GET['page'];
 $op=$_GET['page1'];
 $num9=$_GET['page2'];
$_SESSION["o"]=$os;
 
$_SESSION["p"]=$op;
 //$num9=urldecode($_GET['page2']);

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
<div class="jumbotron"> 
   
 <table   >

<tr><td  valign="top"     >  
<form method="post" action="<?php echo htmlspecialchars("more1.php");?>">


<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label"  id="form">Number</label>
  <input type="text" class="form-control" id="bp" placeholder="" name="more" id="cx"  value="<?php echo $num9?>"  >
</div><br>

<input   class="btn btn-success" type="submit" id="form">
<button  class="btn btn-success" type="button" id="form" onclick="quit()">Quit</button>


</form><br/><br/>
</div>


</body>
</html>