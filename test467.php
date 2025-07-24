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


<p style="text-align:center;font-size:25px;" id="form"        >Add paging group</p>






  
 <table>

 <tr><td  valign="top"   style="align:left"  >  
<form method="post" action="<?php echo htmlspecialchars("test460.php");?>">

             <input type="text" id="ext" name = "ext" placeholder="extension" class="form-control">
             <input type="text" id="mem" name = "mem" placeholder="members" class="form-control">
            <input type="text" id="num" name = "num"  placeholder="number_allowed" class="form-control">
            <input type="text" id="pagn" name = "pagn" placeholder="paginggroup_name" class="form-control">
            <input type="text" id="pagt" name = "pagt" placeholder="paginggroup_type" class="form-control">
           
            
            
            
           
           


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

