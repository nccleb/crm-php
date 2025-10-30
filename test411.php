
<?php $opic=   "c".":"."\\"."Mdr"."\\"."CallerID".date("Y")."-". date("m")."."."txt" ?>


<?php
session_start();


  $co = $_COOKIE["pipe"];


 




$_SESSION["sou"]=$co;
 $_COOKIE["pipe"];
$s=$_SESSION["ses"];
$C=$_COOKIE["user"];
 $o=urldecode($_GET['page']);
 
 $cookie_name = "owner";
 $cookie_value = $o;
 setcookie($cookie_name, $cookie_value, time() + (86400 * 3600), "/"); 
$o = $_COOKIE["owner"];

$_SESSION["o"]=$o;
 $p=urldecode($_GET['page1']);
   $n=urldecode($_GET['page2']);
//$_SESSION["p"]=$p;
$_SESSION["sos"]=$s;
 $pipel = $_COOKIE["pipe"];
  $pipe2 = $_COOKIE["ooq"];
 




$fichier="CaCallStatus.dat";
$xml=simplexml_load_file($fichier);
foreach($xml as $CallRecord){
    $ext=$show->ext;
    $inc=$CallRecord->CallerID;;
}


$line = '';
//$f = fopen("c:\MDR\CallerID2022-04.txt", 'r');
$f = fopen($opic, 'r');
$cursor = -1;
fseek($f, $cursor, SEEK_END);
$char = fgetc($f);
//Trim trailing newline characters in the file
while ($char === "\n" || $char === "\r") {
   fseek($f, $cursor--, SEEK_END);
   $char = fgetc($f);
}
//Read until the next line of the file begins or the first newline char
while ($char !== false && $char !== "\n" && $char !== "\r") {
   //Prepend the new character
   $line = $char . $line;
   fseek($f, $cursor--, SEEK_END);
   $char = fgetc($f);
}
  $inc= substr($line,49,8);
 fclose($f);



?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php include('head.php'); ?>
  <link rel="stylesheet" href="css/stylei.css">
  <link rel="stylesheet" href="css/stylei2.css">
   
  <link rel="stylesheet" href="css/whatsappButton.css" />

  <script type="text/javascript" src="js/test371.js"></script>


  






  <style>

select:required:invalid {
  color: gray;
}
option[value=""][disabled] {
  display: none;
}
option {
  color: black;
}

</style>



<script>
function test(){
fieldval = document.getElementById("nd").value;
		
        document.getElementById("bp").value = fieldval;
}
</script>






	

</head>

<body>


<div class="jumbotron"> 


<script>
function submit() {
    var form1 = document.forms['form1']
    
    
         form1.submit()
    
}
</script> 












   
 <table>
<form method="post" action="<?php echo htmlspecialchars("test412.php");?>"      >
<tr><td  valign="top"    >  


<p >Pipeline  </p>

<select name="pipe" id="ted" class="form-control">
 <option  selected value=""   > <?php echo $co ?></option>
<?php

$idr = mysqli_connect("192.168.16.103", "root", "1Sys9Admeen72", "nccleb_test");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
$stmt = $idr->prepare("SELECT COLUMN_NAME,DATA_TYPE
FROM INFORMATION_SCHEMA.COLUMNS
WHERE table_name = 'pipeline'    ") ; 



$stmt->execute();

$result = $stmt ->get_result();

$stmt->close();






while($row=$result->fetch_assoc()){

  $pipe = $row["COLUMN_NAME"];
 
 $z = $row["DATA_TYPE"];

   if($z!="int"){ 
   echo " <option  value=\"$pipe\">".$pipe. " </option> "; 
   

     }
    
     
    
    }
    



   






?>
</select><br>

<input type="hidden" name="pipo" value="<?php echo $co ?>"></input>


<div id="id1"></div>




<p>Deal name <input class="form-control"  placeholder="Required"    type="text"  name="nu" id="bp" size="32" onclick=""><p><br/>

<p >Deal owner <input class="form-control" value="<?php echo $o ?> " type="text" name="na" id="ap" size="32" ><p><br/>


<p>
 Deal description

  <textarea   style="  "   class="form-control" id="dd" rows="10"  name="dd"      ></textarea>
</p><br>






	  










<p >Deal stage

<select class="form-control"  required   name="gra">

<option value=""  selected></option>
<?php
$stmt = $idr->prepare("SELECT * from pipeline ") ; 

   



$stmt->execute();

$result = $stmt ->get_result();

$stmt->close();






while($row=$result->fetch_assoc()){


 $y = $row[$co];
 
 if($y!=NULL){ 
echo " <option value=\"$y\">".$y. " </option> "; 
 }


   
}

?>


</select>


</p></br>



 <p >Amount  <input class="form-control" type="text" name="tel" id="tel" size="32" ><p><br/> 
 <p >Close date   <input class="form-control" type="date" name="oth" id="oth" size="32"><p><br/>    

<p>Affiliated with <input class="form-control"  placeholder="Required" value="<?php echo $inc ?> "   type="text" name="lna" id="lap" size="32" ><p><br/>









<p >Deal type
<select class="form-control"     name="dt">

<option value=""  selected>Select something...</option>

<option>New business</option>
<option>Existing Business</option>


</select>
<p></br>



<p> Priority
<select class="form-control"     name="pr">

<option value=""  selected>Select something...</option>

<option>Low</option>
<option>Medium</option>
<option>High</option>


</select>
<p></br>
















   
  
  
  

  
  
  
  
  
   


 

</td>
</tr>
<tr>
   <td>
   <input   class=" whatsappbutton "   name="upload"      type="submit" value="Add" id="form">
   
   <button  class=" whatsappbutton "   type="button" id="form" onclick="quit()">Quit</button>
   </form>
   </td>
  <td>
   </td> 
   
   
   </tr>
   
   
   


</table>
</fieldset>


<div>








<script>

function sendurl() {
	 selectElement = document.querySelector('#ted');
        
                x = selectElement.value;


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
     document.getElementById("id1").innerHTML = this.responseText;
   }
 };
 xhttp.open("GET","test442.php?q=" + x, true);
 xhttp.send();
}







$("#ted").change(function(e) {
  

       
        sendurl();
      
   
});





</script>








</body>








</html>







 

   
        
   
       
   
   
   
   
   
    

 















   
    
    
    
    











       
        
        
    