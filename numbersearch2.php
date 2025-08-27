<?php
session_start();
 $os=$_SESSION["o"];
 
 $op=$_SESSION["p"];

$_SESSION["idf"]=$op;
?>
			  
			  
			  
			  
			  



<!DOCTYPE html>
<html>
<head>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">		
<script>
function test(){
	
	fieldval = document.getElementById("ci").value;
		
        document.getElementById("cuid").value = fieldval;	
	
	
	fieldval = document.getElementById("na").value;
		
        document.getElementById("nu").value = fieldval;
		
	fieldval = document.getElementById("ina").value;
		
        document.getElementById("iap").value = fieldval;	
	
fieldval = document.getElementById("sd").value;
		
        document.getElementById("ap").value = fieldval;
		
fieldval = document.getElementById("vd").value;
		
        document.getElementById("em").value = fieldval;		
fieldval = document.getElementById("wd").value;
		
        document.getElementById("bu").value = fieldval;		
fieldval = document.getElementById("ud").value;
		
        document.getElementById("cp").value = fieldval;		
fieldval = document.getElementById("urd").value;
		
        document.getElementById("ur").value = fieldval;		
fieldval = document.getElementById("iff").value;
		
        document.getElementById("idf").value = fieldval;		
								
fieldval = document.getElementById("co").value;
		
        document.getElementById("cof").value = fieldval;				
		
		
		
}
</script>
<script>
function quit(){
	window.close();
}

</script>

<script>
function size(){
	window.resizeTo(500,900);
}

</script>

<style>
* {
    box-sizing: border-box;
}
@media only screen and (max-width: 1400px) {
    body {
        background-color: lightblue;
		font-size:4vw;
	}
	
	
}


#form{
	color:blue;
	font-size:4vw;
}

#for{
	color:red;
	font-size:4vw;
}


</style>
<?php 
	  if(isset($_POST['name'])){ 
	  
	  if (preg_match("/^[0-9]*$/",$_POST['name']))  {  
	  $number=$_POST['name'];
	 
	  $idr=@mysql_connect("192.168.16.103","root","1Sys9Admeen72")|| ("die connection error");
      @mysql_select_db("nccleb_test");
	  $sql="SELECT  * FROM client WHERE number='{$number}'or inumber='{$number}'" ; 
	  
	  $result=mysql_query($sql); 
	  
	 while($row=mysql_fetch_assoc($result)){
	          
			  
	         
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
			  $address=$row['address'];
			  $url=$row['url'];
			  $idf=$row['idf'];
		}
	  }
	  else{
		   echo "<p id=\"for\">Please enter only numbers!</p>";  
		   echo "<a href=\"numbersearch.php\"><button id=\"form\">Try again</button></a>";
  	       echo "<button id=\"form\" type=\"button\" onclick=\"quit()\">Quit</button>";
		  exit();
	  }
	  }
	  else{
		   echo "<p id=\"for\">Incorrect entry!</p>";  
		   echo "<a href=\"numbersearch.php\"><button id=\"form\">Try again</button></a>";
  	       echo "<button id=\"form\" type=\"button\" onclick=\"quit()\">Quit</button>";
		  exit();
	  }
	  
	  
	  
	 
	
	  
	 
	?> 	  

			  



<script>
function quit(){
	window.close()
}

</script>
</head>
<body onload="test()+size()">
<fieldset style="background:#f2f2f2; " >
   
<form method="post"  action="<?php echo htmlspecialchars("test55.php");?>" > 
<p style="color:blue;font-size:4vw">CUID&nbsp &nbsp &nbsp &nbsp  <input style="color:blue;font-size:4vw" type="text" name="cuid" id="cuid" size="32" onclick="test()"><p><br/>
<p style="color:blue;font-size:4vw">Number   &nbsp &nbsp  <input style="color:blue;font-size:4vw" type="text" name="nu" id="nu" size="32" ><p><br/>
<p style="color:blue;font-size:4vw">INumber  &nbsp  <input style="color:blue;font-size:4vw" type="text" name="ia" id="iap" size="32" ><p><br/>
<p style="color:blue;font-size:4vw">Name&nbsp &nbsp &nbsp &nbsp  <input style="color:blue;font-size:4vw" type="text" name="na" id="ap" size="32" ><p><br/>
<p style="color:blue;font-size:4vw">Company&nbsp &nbsp &nbsp &nbsp  <input style="color:blue;font-size:4vw" type="text" name="cof" id="cof" size="32" ><p><br/>
<p style="color:blue;font-size:4vw">E-mail&nbsp &nbsp &nbsp <input style="color:blue;font-size:4vw" type="text" name="em" id="em" size="32" ><p><br/>
<p style="color:blue;font-size:4vw">Url&nbsp &nbsp &nbsp &nbsp  &nbsp  &nbsp  <input style="color:blue;font-size:4vw" type="text" name="ur" id="ur" size="32" ><p><br/>
<p style="color:blue;font-size:4vw">Business &nbsp <input style="color:blue;font-size:4vw" type="text" name="bu" id="bu" size="32" ><p><br/>
<p  style="color:blue;font-size:4vw">Address &nbsp <textarea  style="color:blue;font-size:4vw" name="ad" id="cp"  rows="5" cols="30" ></textarea><br/>
<p style="color:blue;font-size:4vw">Idf <input style="color:blue;font-size:4vw" type="text" name="idf" id="idf" size="10" ><p><br/><br/><br/>


<input type="hidden" id="sd" value="<?php echo $name?>">
<input type="hidden" id="co" value="<?php echo $company?>">
<input type="hidden" id="na" value="<?php echo $num?>">
<input type="hidden" id="ina" value="<?php echo $inum?>">
<input type="hidden" id="vd" value="<?php echo $email?>">
<input type="hidden" id="wd" value="<?php echo $business?>">
<input type="hidden" id="ud" value="<?php echo $address?>">
<input type="hidden" id="urd" value="<?php echo $url?>">
<input type="hidden" id="ci" value="<?php echo $id?>">
<input type="hidden" id="iff" value="<?php echo $idf?>">
<p style="color:blue;font-size:4vw">Account:<?php echo $op?></p><br>

<input type="submit" value="Update" id="form">




</form>
<?php
echo "<a href=\"numbersearch.php\"><button id=\"form\">Try again</button></a>";

echo "<button id=\"form\" type=\"button\" onclick=\"quit()\">Quit</button>";
exit();
?>	  

</fieldset>











   


 
      
	  
	  
		  
		  
	 
	  
	  
	 
	  
	
	</body>
	</html>