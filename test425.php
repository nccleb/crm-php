<?php
session_start();
$s=$_SESSION["ses"];
$C=$_COOKIE["user"];
//echo $C;
//echo $s;
$o=$_GET['page'];
$_SESSION["o"]=$o;
 $p=$_GET['page1'];
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

    <a class="navbar-brand" href="#">TRANSACTION</a>

   </div>

   

  

  </div>

 </nav>

 





<div class="jumbotron">  


  
 <table  >
<tr><td  valign="top"    >  
<form method="post" action="<?php echo htmlspecialchars("test57.php");?>" id="form1">

<!--div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Case</label>
  <input type="text" class="form-control" id="bp" placeholder=""  value="<?php ?>" name="case" id="case"    >
</div><br-->


<!--h4>Category:</h4>
<div class="form-check">
  <input class="form-check-input" type="radio"  name="ca" value="Existing Client" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
   Existing Client
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="ca" value="Ignore Call" id="flexRadioDefault2" >
  <label class="form-check-label" for="flexRadioDefault2">
   Ignore Call
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="radio" name="ca" value="Lead" id="flexRadioDefault3">
  <label class="form-check-label" for="flexRadioDefault3">
   Lead
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
  xhttp.open("GET","test354.php", true);
  xhttp.send();
}
</script>


<div id="pi"></div>


<script>

$('input:radio[name="ca"]').change(
    function(){
        if ($(this).is(':checked') && $(this).val() == 'Lead') {
         post();
        }
    });
	

</script!-->


<h4>State:</h4>
<div class="form-check">
  <input class="form-check-input" type="radio" checked name="state" value="Resolved" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
   Buy
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="state" value="In Progress" id="flexRadioDefault2" >
  <label class="form-check-label" for="flexRadioDefault2">
   Sell
  </label>
</div></br>









<h5><strong>Currency:</strong></h5>



<?php

$idr = mysqli_connect("192.168.16.103", "root", "1Sys9Admeen72", "nccleb_test");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
$req11=@mysqli_query($idr," select * from currency order by curid asc  ");
$req12=@mysqli_query($idr," SELECT COUNT(curid) as arr FROM currency; ");
$lig=@mysqli_fetch_assoc($req12);
for ($i=1;$i<=$lig["arr"];$i++){
	$lig1=@mysqli_fetch_assoc($req11);
	
	   $_SESSION["$i"]= $lig1["curr"];
	      
	//echo " <option value='".  $_SESSION["$i"]."'>" .  $_SESSION[$i]. " </option> "; 
	echo "<div class=\"form-check\">

    <input class=\"form-check-input\" type=\"radio\"  name=\"currency\" value='" .$_SESSION["$i"]."' id=\"flexRadioDefault1\">
    <label class=\"form-check-label\" for=\"flexRadioDefault1\">"
    .$_SESSION["$i"]."
    </label>
    
  </div> ";

	   
 }
 ?><br>
 
      	 
 <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Amount</label>
  <input type="text" class="form-control"  placeholder=""  value="<?php ?>" name="amount" id="amount"    >
</div><br>





<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Rate </label>
  <input class="form-control" id="rate" rows="3"  name="rate"       ></input>
</div><br>



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

			  

	          
	 



























 

   
        
   
       
   
   
   
   
   
    

 















   
    
    
    
    











       
        
        
    