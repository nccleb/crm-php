<?php
session_start();
$s=$_SESSION["ses"];
$C=$_COOKIE["user"];
 $o=urldecode($_GET['page']);
$_SESSION["o"]=$o;
 $p=urldecode($_GET['page1']);
$_SESSION["p"]=$p;


?>

<!DOCTYPE html>
<html>
    <head>
    <?php include('head.php'); ?>
  <link rel="stylesheet" href="css/stylei.css">
  <link rel="stylesheet" href="css/stylei2.css">
   
  <link rel="stylesheet" href="css/whatsappButton.css" />
  <script src="js/test371.js"></script>







	



		

</head>

<body>
<div class="jumbotron"> 

<p  id="form"   style="text-align:center;font-size:25px;"       > Login Record</p>







  
 <table>

<tr><td  valign="top"   style="align:left"  >  
<form method="post" action="<?php echo htmlspecialchars("test477.php");?>" >

 

<input type="date" id="sta" name = "sta" placeholder="start time" class="form-control"        >
<input type="date" id="end" name = "end"  placeholder="end time" class="form-control"       >
<input type="text" id="que" name = "que" placeholder="queue" class="form-control"       >
<input type="text" id="age" name = "age" placeholder="agent" class="form-control"       >


<input  class="whatsappbutton"  type="submit" value="Search" >

<button type="button"  class="whatsappbutton"     onclick="quit()">Quit</button>
<button  type="button" class="whatsappbutton"   onclick="refresh()">Reload</button>
</form><br/><br/>
</td>
   <td>
</td></tr>

</table>


</body>

<div>
</html>

