<?php
session_start();
$_SESSION["sos"]=$s;
$C=$_COOKIE["user"];
$id=$_GET['id'];
 $_SESSION["id"]=$id;
 $op=$_SESSION["p"];
?>


			  





<!DOCTYPE html>
<html lang="en">
<head>
  <title>NCC</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
<?php 
	  
	 
	  $idr=@mysql_connect("192.168.16.103","root","1Sys9Admeen72")|| ("die connection error");
      @mysql_select_db("nccleb_test");
	  $sql=("SELECT  * FROM client c,address a
      where c.id=a.id
	  and (number='{$id}'or inumber='{$id}')") ; 
	  
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
			  $city=$row['city'];
			  $street=$row['street'];
			  $floor=$row['floor'];
			  $building=$row['building'];
			  $zone=$row['zone'];
			  $near=$row['near'];
			  $remark=$row['remark'];
			  $idf=$row['idf'];
			  $telmobile=$row['telmobile'];
			  if(strlen($telmobile)==7){
              $telmobile="0".$telmobile;
			  }			  
			  
			  $telother=$row['telother'];
			  if(strlen($telother)==7){
              $telother="0".$telother;
			  }			  
			  
			 $apartment=$row['apartment'];
			  
			  
		}
	 
	  
	  
	  
	 
	
	  
	 
	?> 	  
 
       
<script>
function quit(){
	window.close();
}

</script>
<script>
function refresh(){
	window.location.reload();
}

</script>		
	
<script>
function update(){
location.replace('test55.php');
	 
}
</script>


<script>
function search(){
	
 window.open ("http://192.168.40.17//search.php","","menubar=0,resizable=1,width=480,height=620");
	
}
</script> 

<script>
function size(){
	window.resizeTo(800,800);
}

</script>


	

<script>

function test(){
	
	fieldval = document.getElementById("add").value;
		
        document.getElementById("address").value = fieldval;				
			
	
	fieldval = document.getElementById("rem").value;
		
        document.getElementById("remark").value = fieldval;
	
	
	fieldval = document.getElementById("num").value;
		
        document.getElementById("number").value = fieldval;
		
		
fieldval = document.getElementById("inu").value;
		
        document.getElementById("inumber").value = fieldval;	

		
fieldval = document.getElementById("nam").value;
		
        document.getElementById("name").value = fieldval;

		
fieldval = document.getElementById("com").value;
		
        document.getElementById("company").value = fieldval;

		
fieldval = document.getElementById("ema").value;
		
        document.getElementById("email").value = fieldval;

		
fieldval = document.getElementById("ur").value;
		
        document.getElementById("url").value = fieldval;
		
								
fieldval = document.getElementById("bus").value;
		
        document.getElementById("business").value = fieldval;
		

	
		
	
	
	
fieldval = document.getElementById("cit").value;
		
        document.getElementById("city").value = fieldval;
		
		
fieldval = document.getElementById("str").value;
		
        document.getElementById("street").value = fieldval;
		
		
fieldval = document.getElementById("flo").value;
		
        document.getElementById("floor").value = fieldval;
		
		
fieldval = document.getElementById("bui").value;
		
        document.getElementById("building").value = fieldval;
		
		
fieldval = document.getElementById("zon").value;
		
        document.getElementById("zone").value = fieldval;
		
		
fieldval = document.getElementById("nea").value;
		
        document.getElementById("near").value = fieldval;
		
								
	
}
</script>



		
<style>
* {
    box-sizing: border-box;
}
@media only screen and (max-width: 1400px) {
    body {
        background-color: lightblue;
		//font-size:1vw;
	}
	
	
}


#form{
	color:blue;
	//font-size:2vw;
}

.form{
	color:blue;
	//font-size:1.5vw;
}


</style>
</head>

<body onload="test()+size()">
<div class="container text-center"> 

<script>
function submit() {
    var form1 = document.forms['form1']
    
    
         form1.submit()
    
}
</script> 




<h1><p style="color:red"></p></h1>

<fieldset style="background:#f2f2f2;">
   
 <table>
<form method="post" action="<?php echo htmlspecialchars("test55.php");?>" >
<tr><td  valign="top"   style="align:"left"  >  

<p id="form">Tel &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp <input class="form" type="text" value="<?php echo $num?>" name="nu" id="bp" size="32" onclick="test()"><p><br/> 
 <p id="form">Tel(Office)  &nbsp &nbsp &nbsp &nbsp <input class="form" type="text" name="inu" value="<?php echo $inum?>" id="ibp" size="32"><p><br/>
 <p id="form">Tel(Mobile) &nbsp &nbsp &nbsp &nbsp <input class="form" type="text" name="tel" value="<?php echo $telmobile?>" id="tel" size="32" onclick="test()"><p><br/> 
 <p id="form">Tel(Other) &nbsp &nbsp &nbsp &nbsp <input class="form" type="text" name="oth" value="<?php echo $telother?>" id="oth" size="32"><p><br/>    
<p id="form">Name &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp <input class="form" type="text" name="na" id="name" value="<?php echo $name?>" size="32" ><p><br/>
<p id="form">Company &nbsp &nbsp &nbsp &nbsp   <input class="form"  type="text" name="co" id="company" value="<?php echo $company?>" size="32" ><p><br/>
<p id="form">E-mail &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <input class="form" value="<?php echo $email?>" type="text" name="em" id="email" size="32" ><p><br/>
<p id="form">Url &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp   <input class="form" type="text" value="<?php echo $url?>" name="ur" id="url" size="32" ><p><br/>
<p id="form">Business  &nbsp&nbsp &nbsp &nbsp  &nbsp <input class="form" type="text" name="bu" value="<?php echo $business?>" id="business" size="33" ><p><br/>
<p id="form">Cuid &nbsp&nbsp &nbsp&nbsp &nbsp &nbsp &nbsp  &nbsp <input class="form" type="text" name="bu" value="<?php echo $id?>" id="business" size="33" ><p><br/>
<p id="form">Account  &nbsp&nbsp &nbsp &nbsp  &nbsp <input class="form" type="text" name="bu" value="<?php echo $op?>" id="business" size="33" ><p><br/>
<p id="form">Idf &nbsp &nbsp &nbsp &nbsp  &nbsp&nbsp &nbsp &nbsp  &nbsp <input class="form" type="text" name="bu" value="<?php echo $idf?>" id="business" size="33" ><p><br/>
</td>
<td  valign="top"   style="align:"left"    >
<p id="form">City &nbsp &nbsp &nbsp <input class="form" type="text" name="cit"value="<?php echo $city?>"  id="city" size="33" ><p><br>
<p id="form">Zone &nbsp &nbsp  <input class="form" value="<?php echo $zone?>" type="text" name="zon" id="zone" size="33" ><p><br/>
<p id="form">Street &nbsp &nbsp <input class="form" type="text" name="str" value="<?php echo $street?>" id="street" size="32" ><p><br/>
<p id="form">Building  <input class="form" type="text" value="<?php echo $building?>" name="bui" id="building" size="32" ><p><br/>
<p id="form">Apartment  <input class="form" type="text" name="apa" value="<?php echo $apartment?>" id="apa" size="32" ><p><br/>
<p id="form">Floor&nbsp &nbsp &nbsp 
<select class="form"  name="flo"  id="floor">



<option selected><?php echo $floor?></option>
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
</select>

<p>


<p id="form">Near &nbsp &nbsp &nbsp  <input   class="form" type="text" value="<?php echo $near?>" name="nea" id="nea" size="32" ></p><br/>

<p  id="form">Address  <textarea  class="form" name="ad" id="address"  rows="5" cols="34" ></textarea><br>
<p id="form">Remark &nbsp <textarea  class="form" name="rem"  id="remark"  rows="5" cols="34" ></textarea></p><br/><br/><br/>

<input type="hidden" id="nam" value="<?php echo $name?>">
<input type="hidden" id="com" value="<?php echo $company?>">
<input type="hidden" id="num" value="<?php echo $num?>">
<input type="hidden" id="inu" value="<?php echo $inum?>">
<input type="hidden" id="ema" value="<?php echo $email?>">
<input type="hidden" id="bus" value="<?php echo $business?>">
<input type="hidden" id="add" value="<?php echo $address?>">
<input type="hidden" id="ur" value="<?php echo $url?>">
<input type="hidden" id="ci" value="<?php echo $id?>">
<input type="hidden" id="iff" value="<?php echo $idf?>">
<input type="hidden" id="cit" value="<?php echo $city?>">
<input type="hidden" id="str" value="<?php echo $street?>">
<input type="hidden" id="flo" value="<?php echo $floor?>">
<input type="hidden" id="bui" value="<?php echo $building?>">
<input type="hidden" id="zon" value="<?php echo $zone?>">
<input type="hidden" id="nea" value="<?php echo $near?>">
<input type="hidden" id="rem" value="<?php echo $remark ?>">
<input type="hidden" id="tel" value="<?php echo $telmobile?>">
<input type="hidden" id="oth" value="<?php echo $telother?>">
<input type="hidden" id="apa" value="<?php echo $apartment ?>">



<input type="hidden" id="nd" value="<?php echo $s?>">




</td>
</tr>
<tr>
   <td>
   



   
   
   
   <button type="button" id="form" onclick="quit()">Quit</button>
   </form>
   </td>
  <td>
   </td> 
   
   
   </tr>
   
   
   


</table>





</fieldset>



</div>


</body>
</html>


