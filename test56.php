<?php
session_start();
$s=$_SESSION["ses"];
$C=$_COOKIE["user"];
//echo $C;
//echo $s;
$o=$_GET['page'];
$_SESSION["o"]=$o;
 $p=$_GET['page'];
$_SESSION["p"]=$p;

 $num9=urldecode($_GET['page2']);


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


<div class="jumboltron">

 <nav class="navbar navbar-inverse">

  <div class="container-fluid">

   <div class="navbar-header">

    <a class="navbar-brand" href="#">ADD-CRM</a>

   </div>

   

  

  </div>

 </nav>

 





<div class="jumbotron">  


  
 <table  >
<tr><td  valign="top"    >  
<form method="post" action="<?php echo htmlspecialchars("test57.php");?>" id="form1">

<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Contact Number
  </label>
  <input type="text" class="form-control" id="bp" placeholder=""  value="<?php echo $num9?>" name="id" id="id"    >
</div><br>












<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Ticket Name</label>
  <input type="text" class="form-control"  placeholder=""  value="<?php ?>" name="ta" id="ta"    >
</div><br>





<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Last Activity </label>
  <textarea class="form-control" id="la" rows="3"  name="la"       ></textarea>
</div><br>

<h5><strong>Complaints</strong></h5>



<?php

$idr = mysqli_connect("192.168.16.102", "root", "1Sys9Admeen72", "nccleb_test");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
$req11=@mysqli_query($idr," select * from comments order by id_co asc  ");
$req12=@mysqli_query($idr," SELECT COUNT(id_co) as arr FROM comments; ");
$lig=@mysqli_fetch_assoc($req12);
for ($i=1;$i<=$lig["arr"];$i++){
	$lig1=@mysqli_fetch_assoc($req11);
	
	   $_SESSION["$i"]= $lig1["comment_text"];
	      
	//echo " <option value='".  $_SESSION["$i"]."'>" .  $_SESSION[$i]. " </option> "; 
	echo "<div class=\"form-check\">

    <input class=\"form-check-input\" type=\"radio\"  name=\"in\" value='" .$_SESSION["$i"]."' id=\"flexRadioDefault1\">
    <label class=\"form-check-label\" for=\"flexRadioDefault1\">"
    .$_SESSION["$i"]."
    </label>
    
    
  </div> ";

	   
 }
 ?>
 
      	 
	
			  

	          
	 









<div class="form-check">
  <input class="form-check-input" type="radio" name="in" value="other" id="flexRadioDefault11">
  <label class="form-check-label" for="flexRadioDefault11">
   Other
  </label>
</div></br>


<script>
function post() {
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
      document.getElementById("pi").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET","test375.php", true);
  xhttp.send();
}
</script>


<div id="pi"></div>


<script>

$('input:radio[name="in"]').change(
    function(){
        if ($(this).is(':checked') && $(this).val() == 'other') {
         post();
        }
       
    });
	

</script>

<p> Priority
<select class="form-control"     name="pr">

<option value=""  selected>Select something...</option>

<option>Low</option>
<option>Medium</option>
<option>High</option>


</select>
<p></br>




<h4><b>Status</b></h4>

<div class="form-check">
  <input class="form-check-input" type="radio" name="st" value="Not Resolved" id="flexRadioDefault3">
  <label class="form-check-label" for="flexRadioDefault3">
   Not Resolved
  </label>
</div>


<div class="form-check">
  <input class="form-check-input" type="radio" name="st" value="In Progress" id="flexRadioDefault2" >
  <label class="form-check-label" for="flexRadioDefault2">
   In Progress
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="radio" checked name="st" value="Resolved" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
   Resolved
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="radio" checked name="st" value="Closed" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
   Closed
  </label>
</div>



<input type="hidden" id="nd" value="<?php echo $s?>">
<input  class="btn btn-success"   type="submit" value="Add" id="form">&nbsp

<button  class="btn btn-success"    type="button" id="form" onclick="quit()">Quit</button>
</form><br/><br/>
</td>
   <td>
</td></tr>

</table>



</div>
</body>
</html>







 

   
        
   
       
   
   
   
   
   
    

 















   
    
    
    
    











       
        
        
    