


<?php
session_start();

$C=$_COOKIE["user"];
   $o=urldecode($_GET['page']);

   $p=urldecode($_GET['page1']);
   $n=urldecode($_GET['page2']);
$_SESSION["sos"]=$s;
   $op=$_SESSION["p"];
  $ot= $_SESSION["u"];
$_SESSION["idf"]=$op;
$_SESSION["id"]=$number;
 $_SESSION["pro"]=$fv;
 $_SESSION["naa"]=$ot;

 $cook=$_COOKIE["user303"];
 
 $so= $_SESSION["oop"];
 $si=$_SESSION["ooq"];
 
 $uif=urldecode($_GET['page2']);
  $_SESSION["so"]=$so;
  $_SESSION["si"]=$si;
  
  
   $_SESSION["a1"]=$o;
 $_SESSION["a2"]=$p;
 $_SESSION["a3"]=$n;
?>



<?php $opic=   "c".":"."\\"."Mdr"."\\"."CallerID".date("Y")."-". date("m")."."."txt" ?>



<?php
$fichier="CaCallStatus.dat";
$xml=simplexml_load_file($fichier);
foreach($xml as $CallRecord){
    $ext=$show->ext;
    //$inc=$CallRecord->CallerID;
    
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
  $inc = trim($inc);
 fclose($f);
 
 
//include('test449.php');
$inc = $_SESSION["userinc"];

$idr = mysqli_connect("192.168.20.107", "root", "1Sys9Admeen72", "nccleb_test");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
$req=@mysqli_query($idr,"SELECT * from client");

while($lig=@mysqli_fetch_assoc($req)){
	
   if($inc==$lig['number']){
		
		
        
		$s=$inc;
		
		
		
		
 }
}
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
  .img-circle{
    width:150px;
    height:150px
   }
	
	</style>







		


<?php 

    
	  if(isset($_POST['name'])&&!empty($_POST['name'])){ 
	   $number=$_POST['name'];
	  }
	  else if($uif!==""){
		  
		   $number=$uif;
	  }
	  else {
	echo	  "<script>

  alert(\"Missing Entry!  \");
  quit();
 
  
  

</script>";
		 
		 
	
	
	  }
	  
	  if (preg_match("/^[0-9]*$/",$number))  {  
	  
	 
	 
	          
			  
	  

         $idr = mysqli_connect("192.168.20.107", "root", "1Sys9Admeen72", "nccleb_test");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
	

		$stmt = $idr->prepare("SELECT  * FROM client c
      
	  where (number=? or inumber=? or telmobile=? or telother=? )") ; 
 
 $stmt->bind_param("ssss",$number,$number,$number,$number );

$stmt->execute();

$result = $stmt ->get_result();

$stmt->close();






while($row=$result->fetch_assoc()){



	  
              
              
			  $category=$row['category'];
        $source=$row['source'];
         $num=$row['number'];
			  
			  $inum=$row['inumber'];
			  $pho=$row['filename'];
               
        $name=$row['nom']; 
			  $lname=$row['prenom']; 
			  $id=$row['id'];
		          
        $_SESSION["id"]=$id;
                          
        $company=$row['company'];
        
        $job=$row['job'];
			  $email=$row['email'];
			  $business=$row['business'];
			  $grade=$row['grade'];
        $pay=$row['payment'];
        $loy=$row['card'];
        $community=$row['community'];
			  $address=$row['address'];
			  $address2=$row['address_two'];
			  $url=$row['url'];
			  $idf=$row['idf'];
		    $city=$row['city'];
			  $street=$row['street'];
			  $floor=$row['floor'];
			  $building=$row['building'];
			  $zone=$row['zone'];
			  $near=$row['near'];
			  $remark=$row['remark'];
			 
			  $telmobile=$row['telmobile'];
			 	  
			  
			  $telother=$row['telother'];
			 
			  
			 $apartment=$row['apartment'];
		    $idx=$row['idx'];
			 
			 
			  
			  
		}
	  }
	  else{
		   echo "<p id=\"for\">Please enter only numbers!</p>";  
		   echo "<a href=\"numbersearch.php?page=$ot&page1=$op\"><button id=\"form\">Try again</button></a>";
  	       echo "<button id=\"form\" type=\"button\" onclick=\"quit()\">Quit</button>";
		  exit();
	  }
	  
	  
	 
	  
	 
	
	  
	 
	?> 	 



	<?php

$idr = mysqli_connect("192.168.20.107", "root", "1Sys9Admeen72", "nccleb_test");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
$req11=@mysqli_query($idr," select * from drivers order by idx asc  ");
$req12=@mysqli_query($idr," SELECT COUNT(idx) as co  FROM drivers; ");

$lig12=@mysqli_fetch_assoc($req12);
for ($i=1;$i<=$lig12["co"];$i++){
	
	$lig11=@mysqli_fetch_assoc($req11);
	   $_SESSION["$i"]= $lig11["name_d"];
	   
	    $idx;
	    if($idx==$i){
		
	  
	   $driv=$_SESSION["$i"];
 }
	
}


	  



?>





			  










</head>

<body     onload="test200()">

<div class="container text-center"> 











   
 
<form method="post"   onsubmit="touch() "   action="<?php echo htmlspecialchars("test55.php");?>"   enctype="multipart/form-data"  >
<table>

<tr><td  valign="top"   style="align: left"  >  




<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">TEL</label>
  <input type="text" class="form-control" id="bp" placeholder="" name="nu"  readonly   >
</div><br>


 
  
<div class="mb-3 printPageButton"  >
  <label for="exampleFormControlInput1" class="form-label">Tel(Office)</label>
  <input type="text" class="form-control" id="ibp" placeholder="" name="inu"     >
</div><br>



<div class="mb-3 printPageButton"  >
  <label for="exampleFormControlInput1" class="form-label">Tel(Mobile)</label>
  <input type="text" class="form-control" id="tell" placeholder="" name="tel"     >
</div><br>

 
<div class="mb-3 printPageButton"  >
  <label for="exampleFormControlInput1" class="form-label">Tel(Other)</label>
  <input type="text" class="form-control" id="othh" placeholder="" name="oth"     >
</div><br>
 

<div class="mb-3 " >
  <label for="exampleFormControlInput1" class="form-label">First name </label>
  <input type="text" class="form-control" id="name" placeholder="" name="na"     >
</div><br>


<div class="mb-3 "  >
  <label for="exampleFormControlInput1" class="form-label">Last name</label>
  <input type="text" class="form-control" id="lname" placeholder="" name="lna"     >
</div><br>


<!--div class="mb-3 printPageButton"  >
  <label for="exampleFormControlInput1" class="form-label"></label>
  <input type="text" class="form-control" id=""   value=" "   placeholder="" name=""     >
</div><br-->

<!--div class="mb-3 printPageButton" >


  
    <?php

 /*
  

                   
	 $idr = mysqli_connect("192.168.20.107", "root", "1Sys9Admeen72", "nccleb_test");
   if (mysqli_connect_errno()) {
     echo "Failed to connect to MySQL: " . mysqli_connect_error();
     exit();
   }

              
       
                  $stmt = $idr->prepare("select * from client 
                  where number = ?") ; 
                  $stmt->bind_param("i",$number );
        
                  $stmt->execute();

                  $result = $stmt ->get_result();
                  
                  $stmt->close();
 
                  while($row=$result->fetch_assoc()){
         echo" <img src=\"./image/$row[filename]\" onerror=\"this.onerror=null; this.src='./image/default.jpg'\"  class = \"img-circle\"  alt=\"No image\">";
    
        }

    */
      
    ?>
   
   </div><br-->



<!--div class="mb-3 printPageButton"  >
       
            <div class="form-group">
                <input class="form-control" type="file" name="fileToUpload" value="" />
            </div>
  <div-->   
    
  



<p > <label for="exampleFormControlInput1" class="form-label">Category</label>

<select class="form-control"   id="cat"       name="cat">


<option></option>
<option  value="Existing Client"   >Existing Client</option>
<option   value="Ignore Call"     > Ignore Call</option>
<option   value="Lead"   >Lead</option>
</select><p></br>





<p ><label for="exampleFormControlInput1" class="form-label">Source</label>
<select class="form-control" name="src" id="src"  >


<option    ><?php echo $source ?></option>
<option  value="  Blog posts   "   > Blog posts</option>
<option   value="Landing pages"     > Landing pages</option>
<option   value="Organic search traffic"   >Organic search traffic</option>
<option  value="Direct traffic"   >Direct traffic</option>
<option   value=" PPC ads"     >  PPC ads</option>
<option   value="Affiliate marketers"   >Affiliate marketers</option>
<option  value=" Social media channels"   > Social media channels</option>

<option   value="Paid social ads"   >Paid social ads</option>
<option  value="Voice assistants"   >Voice assistants</option>
<option   value="Direct marketing"     > Direct marketing</option>
<option   value="Traditional marketing channels"   >Traditional marketing channels</option>
<option   value="Tradeshows"     > Tradeshows</option>
<option   value="Referrals"   >Referrals</option>
</select><p></br>






<!--p id="form">Company &nbsp &nbsp &nbsp &nbsp   <input class="form"  type="text" name="co" id="company"  size="32" ><p><br/-->
<div class="mb-3 printPageButton"  >
  <label for="exampleFormControlInput1" class="form-label">Company</label>
  <input type="text" class="form-control" id="company" placeholder="" name="company"     >
</div><br>


<div class="mb-3 printPageButton"  >
  <label for="exampleFormControlInput1" class="form-label">Job Title</label>
  <input type="text" class="form-control" id="job" placeholder="" name="job"     >
</div><br>


<!--p id="form">E-mail &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <input class="form"  type="text" name="em" id="email" size="32" ><p><br/-->
<div class="mb-3 printPageButton"  >
  <label for="exampleFormControlInput1" class="form-label">E-mail</label>
  <input type="text" class="form-control" id="email" placeholder="" name="em"     >
</div><br>


<!--p id="form">Url &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp   <input class="form" type="text"  name="ur" id="url" size="32" ><p><br/-->
<div class="mb-3 printPageButton"  >
  <label for="exampleFormControlInput1" class="form-label">Url</label>
  <input type="text" class="form-control" id="url" placeholder="" name="ur"     >
</div><br>


<!--p id="form">Business  &nbsp&nbsp &nbsp &nbsp  &nbsp <input class="form" type="text" name="bu"  id="business" size="33" ><p><br/-->
<div class="mb-3 printPageButton"  >
  <label for="exampleFormControlInput1" class="form-label">Business</label>
  <input type="text" class="form-control" id="business" placeholder="" name="bu"     >
</div><br>




<label for="exampleFormControlInput1" class="form-label">Grade</label>

<select class="form-control" name="grad"  id="grad" >

<option  selected></option>
<option>regular</option>
<option>gold</option>
<option>platinum</option>

</select>
<p></br>



<label for="exampleFormControlInput1" class="form-label">Type of payment</label>
<select class="form-control" name="pay"  id="pay"   >


<option></option>
<option>Cash</option>
<option>Visa</option>

</select><p></br>




<!--p id="form">Loyalty card   &nbsp &nbsp &nbsp  &nbsp <input class="form" type="text" name="loy"  id="loy" size="33" ><p><br/-->
<div class="mb-3 printPageButton"  >
  <label for="exampleFormControlInput1" class="form-label">Loyalty card </label>
 <select class="form-control" name="loy"  id="loy"  >


<option></option>
<option>Yes</option>
<option>No</option>

</select>
</div><br>





<label for="exampleFormControlInput1" class="form-label">Community</label>

<select class="form-control" name="community"  id="community" >


<option></option>
<option>Yes</option>
<option>No</option>

</select>
<p></br>







<label for="exampleFormControlInput1" class="form-label">Salesman  </label>

<select name="driver"   class="form-control">
<option selected value=" <?php echo  $driv ?>" > <?php echo $driv ?></option>

<?php

$idr = mysqli_connect("192.168.20.107", "root", "1Sys9Admeen72", "nccleb_test");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
$req11=@mysqli_query($idr," select * from drivers order by idx asc  ");
$req12=@mysqli_query($idr," SELECT COUNT(idx) as arr FROM drivers; ");
$lig=@mysqli_fetch_assoc($req12);
for ($i=1;$i<=$lig["arr"];$i++){
	$lig1=@mysqli_fetch_assoc($req11);
	
	   $_SESSION["$i"]= $lig1["name_d"];
	 
	echo " <option value=".  "$i"."/>" .  $_SESSION[$i]. " </option> "; 




	  
 }
	



	  



?>


</select><br>



<!--p id="form">Cuid &nbsp&nbsp &nbsp&nbsp &nbsp &nbsp &nbsp  &nbsp <input class="form" type="text" name="cui"  id="cuid" size="33" ><p><br/-->
<div class="mb-3 printPageButton"  >
  <label for="exampleFormControlInput1" class="form-label">Cuid  </label>
  <input type="text" class="form-control" id="cuid" placeholder="" name="cui"     >
</div><br>



<!--p id="form">Account  &nbsp&nbsp &nbsp &nbsp  &nbsp <input class="form" type="text" name="acc" value="<?php echo $op ?>" id="acc" size="33" ><p><br/-->
<div class="mb-3 printPageButton"  >
  <label for="exampleFormControlInput1" class="form-label"> Account</label>
  <input type="text" class="form-control" id="acc" value="<?php echo $op ?> " placeholder="" name="acc"     >
</div><br>




<!--p id="form">Idf &nbsp &nbsp &nbsp &nbsp  &nbsp&nbsp &nbsp &nbsp  &nbsp <input class="form" type="text" name="idf"  id="idf" size="33" ><p><br/-->
<div class="mb-3 printPageButton"  >
  <label for="exampleFormControlInput1" class="form-label"> Idf</label>
  <input type="text" class="form-control" id="idf" placeholder="" name="idf"     >
</div><br>




</td>
<td  valign="top"   style="align:left"    >
<!--p id="form">City &nbsp &nbsp &nbsp <input class="form" type="text" name="cit" id="city" size="33" ><p><br-->
<div class="mb-3 printPageButton"  >
  <label for="exampleFormControlInput1" class="form-label"> City</label>
  <input type="text" class="form-control" id="city" placeholder="" name="cit"     >
</div><br>


<!--p id="form">Zone &nbsp &nbsp  <input class="form"  type="text" name="zon" id="zone" size="33" ><p><br/-->
<div class="mb-3 printPageButton"  >
  <label for="exampleFormControlInput1" class="form-label"> Zone</label>
  <input type="text" class="form-control" id="zone" placeholder="" name="zon"     >
</div><br>


<!--p id="form">Street &nbsp &nbsp <input class="form" type="text" name="str"  id="street" size="32" ><p><br/-->
<div class="mb-3 printPageButton"  >
  <label for="exampleFormControlInput1" class="form-label"> Street</label>
  <input type="text" class="form-control" id="street" placeholder="" name="str"     >
</div><br>




<!--p id="form">Building  <input class="form" type="text"  name="bui" id="building" size="32" ><p><br/-->
<div class="mb-3 printPageButton"  >
  <label for="exampleFormControlInput1" class="form-label"> Building</label>
  <input type="text" class="form-control" id="building" placeholder="" name="bui"     >
</div><br>





<!--p id="form">Apartment  <input class="form" type="text" name="apa"  id="apa" size="32" ><p><br/-->
<div class="mb-3 printPageButton"  >
  <label for="exampleFormControlInput1" class="form-label"> Apartment</label>
  <input type="text" class="form-control" id="apa" placeholder="" name="apa"     >
</div><br>






<div class="mb-3 printPageButton"  >
<label for="exampleFormControlInput1" class="form-label"> Floor</label>   

<select class="form-control"  name="flo"  id="">

<option selected><?php echo $floor?></option>
<option>0</option>
<option>1</option>
<option>2</option>
<option>3</option>
<option>4</option>
<option>5</option>
<option>6</option>
<option>7</option>
<option>8</option>
<option>9</option>
<option>10</option>
<option>11</option>
<option>12</option>
<option>13</option>
<option>14</option>
<option>15</option>
<option>16</option>
<option>17</option>
<option>18</option>
<option>19</option>
<option>20</option>
</select>









</div><br>







<!--p id="form">Near &nbsp &nbsp &nbsp  <input   class="form" type="text" value="<?php echo $near ?>" name="nea" id="nea" size="32" ></p><br/-->
<div class="mb-3 printPageButton"  >
  <label for="exampleFormControlInput1" class="form-label"> Apartment</label>
  <input type="text" class="form-control" id="nea" value="<?php echo $near ?>" placeholder="" name="nea"     >
</div><br>





<!--p  id="form"> Address  <textarea  class="form" name="ad" id="address"  rows="5" cols="34" ></textarea><br-->
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Address </label>
  <textarea class="form-control" id="address" rows="10"  name="ad" ></textarea>
</div><br/>





<!--p  id="form"> Address  <textarea  class="form" name="ad2" id="address2"  rows="5" cols="34" ></textarea><br-->
<div class="mb-3 printPageButton"  >
  <label for="exampleFormControlTextarea1" class="form-label">Address </label>
  <textarea class="form-control" id="address2" rows="5"  name="ad2" ></textarea>
</div><br/>




<!--p id="form">Request &nbsp <textarea  class="form" name="rem"  id="remark"  rows="5" cols="34" ></textarea></p><br/><br/><br/-->

<div class="mb-3 printPageButton"  >
  <label for="exampleFormControlTextarea1" class="form-label">Request </label>
  <textarea class="form-control" id="remark" rows="5"  name="rem" ></textarea>
</div><br/>











  
  
  


<input type="hidden" id="disa" name="disa"  value="<?php echo $inum?>"           >
<input type="hidden" id="disa" name="disa1" >
<input type="hidden" id="disa" name="disa2" >
<input type="hidden" id="nam" value="<?php echo $name?>">
<input type="hidden" id="photo" value="<?php echo $pho?>">
<input type="hidden" id="lnam" value="<?php echo $lname?>">
<input type="hidden" id="category" value="<?php echo $category?>">
<input type="hidden" id="source" value="<?php echo $source?>">
<input type="hidden" id="comp" value="<?php echo $company?>">
<input type="hidden" id="jo" value="<?php echo $job?>">
<input type="hidden" id="num" value="<?php echo $num?>">
<input type="hidden" id="inu" value="<?php echo $inum?>">
<input type="hidden" id="em" value="<?php echo $email?>">
<input type="hidden" id="bus" value="<?php echo $business?>">
<input type="hidden" id="add" value="<?php echo $address?>">
<input type="hidden" id="add2" value="<?php echo $address2?>">
<input type="hidden" id="ur" value="<?php echo $url?>">
<input type="hidden" id="ci" value="<?php echo $id?>">
<input type="hidden" id="iff" value="<?php echo $idf?>">
<input type="hidden" id="cit" value="<?php echo $city?>">
<input type="hidden" id="str" value="<?php echo $street?>">
<input type="hidden" id="floo" value="<?php echo $floor?>">
<input type="hidden" id="bui" value="<?php echo $building?>">
<input type="hidden" id="zon" value="<?php echo $zone?>">
<input type="hidden" id="near" value="<?php echo $near?>">
<input type="hidden" id="rem" value="<?php echo $remark ?>">
<input type="hidden" id="tel" value="<?php echo $telmobile?>">
<input type="hidden" id="oth" value="<?php echo $telother?>">
<input type="hidden" id="apar" value="<?php echo $apartment ?>">
<input type="hidden" id="grady" value="<?php echo $grade ?>">
<input type="hidden" id="driv" value="<?php echo $driv ?>">
<input type="hidden" id="paye" value="<?php echo $pay ?>">
<input type="hidden" id="loyl" value="<?php echo $loy ?>">
<input type="hidden" id="comm" value="<?php echo $community ?>">
<input type="hidden" id="nd" value="<?php echo $s?>">











   








  
  
</select></th>





</td>
</tr>
<tr>
   <td>
   

<div id="printDiv">

   
   
    <input   class=" whatsappbutton "   name="upload"      type="submit" value="U" id="form">
   <input   class=" whatsappbutton "   name="upload"      type="submit" value="Update" id="form">
   <button type="button" id="form" class="whatsappbutton" onclick="printContents(id)">Print</button>
  
   
   
	
   
   
    <button type="button" id="form"   class="whatsappbutton"  onclick="quit()">Quit</button>
   
   </div>
   </form>
   </td>
  <td>
   </td> 
   
   
   </tr>
   
   
   


</table>





</fieldset>

<!--div class="printPageButton">
<?php
/*
if (!isset($_COOKIE["inu"])){
	echo "tel(Office) is ready";
}
else{
	echo "tel(Office) is not ready";
}

echo "\r\n"."/"."\r\n";

if (!isset($_COOKIE["tel"])){
	echo "tel(Mobile) is ready";
}
else{
	echo "tel(Mobile) is not ready";
}

echo "\r\n"."/"."\r\n";
if (!isset($_COOKIE["oth"])){
	echo "tel(Other) is ready";
}
else{
	echo "tel(Other) is not ready";
}
*/

?>
</div-->

<div>

<script>

function sendurl() {
	
  var x=document.getElementById("ibp").value;
  //alert(x);
  //var x = '03205818';
 //alert(x);
 
 
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
     document.getElementById("").innerHTML = this.responseText;
   }
 };
 xhttp.open("GET","test55.php?q=" + x, true);
 xhttp.send();
}





var previousValue = $("#ibp").val();
$("#ibp").keyup(function(e) {
    var currentValue = $(this).val();
    if(currentValue != previousValue) {
         previousValue = currentValue;
         sendurl();
    }
});





</script>




<script>

function sendurl1() {
	
  var x=document.getElementById("tell").value;
  //alert(x);
  //var x = '03205818';
 //alert(x);
 
 
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
     document.getElementById("").innerHTML = this.responseText;
   }
 };
 xhttp.open("GET","test55.php?qq=" + x, true);
 xhttp.send();
}





var previousValue = $("#tell").val();
$("#tell").keyup(function(e) {
    var currentValue = $(this).val();
    if(currentValue != previousValue) {
         previousValue = currentValue;
         sendurl1();
    }
});





</script>


<script>

function sendurl2() {
	
  var x=document.getElementById("othh").value;
 
 
 
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
     document.getElementById("").innerHTML = this.responseText;
   }
 };
 xhttp.open("GET","test55.php?qqq=" + x, true);
 xhttp.send();
}





var previousValue = $("#othh").val();
$("#othh").keyup(function(e) {
    var currentValue = $(this).val();
    if(currentValue != previousValue) {
         previousValue = currentValue;
         sendurl2();
    }
});





</script>












</body>
</html>







 

   
        
   
       
   
   
   
   
   
    

 









		


		

		
								

		

		

		

		
		

		
		




		


	

		

		
	
	
	
	
	

		

				
				

		

		

	
	
		
	
	
	

		
		




		
		
		
		

		


		

		
								

		
		




		








   
    
    
    
    











       
        
        
    