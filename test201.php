<?php
session_start();
$_SESSION["sos"]=$s;
$C=$_COOKIE["user"];
$id=$_GET['number'];
 $_SESSION["id"]=$id;
 $op=$_SESSION["p"];
?>


			  





<!DOCTYPE html>
<html lang="en">
<head>
  <?php include('head.php'); ?>
<?php 
	  
	 
	  $idr = mysqli_connect("192.168.16.103", "root", "1Sys9Admeen72", "nccleb_test");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

	  
	  $result=mysqli_query($idr,"SELECT  * FROM client c
      
	  where (number='{$id}'or inumber='{$id}')") ;
	  
	  
	 while($row=mysqli_fetch_assoc($result)){
	          
		      $category=$row['category'];
	          $source=$row['source'];
              $num=$row['number'];
			  
             		  
			  
			  
			  $inum=$row['inumber'];
			  
              if(strlen($inum)==7){
              $inum="0".$inum;
			  }			  
              $name=$row['nom']; 
			  $lname=$row['prenom'];
			  $id=$row['id'];
		      $_SESSION["id"]=$id;
              $company=$row['company'];
			  $email=$row['email'];
			  $business=$row['business'];
			  $grade=$row['grade'];
			  $pay=$row['payment'];
			  $loy=$row['card'];
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
			  $idf=$row['idf'];
			  $telmobile=$row['telmobile'];
			  if(strlen($telmobile)==7){
              $telmobile="0".$telmobile;
			  }			  
			  
			  $telother=$row['telother'];
			  if(strlen($telother)==7){
              $telother="0".$telother;
			  }			  
			  $delivery_time = $row['best_delivery_time'];
			 $apartment=$row['apartment'];
			  $idx=$row['idx'];
			  
		}
	 
	  
	  
	  
	 
	
	  
	 
	?> 	




     <?php

$idr = mysqli_connect("192.168.16.103", "root", "1Sys9Admeen72", "nccleb_test");
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
	
 window.open ("http://192.168.16.103//search.php","","menubar=0,resizable=1,width=480,height=620");
	
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
		
		
    fieldval = document.getElementById("add2").value;
		
        document.getElementById("address2").value = fieldval;			
			
	
	fieldval = document.getElementById("rem").value;
		
        document.getElementById("remark").value = fieldval;

		
		
	
	fieldval = document.getElementById("loyl").value;
		
        document.getElementById("loy").value = fieldval;

	
	
	
	
	fieldval = document.getElementById("grady").value;
		
        document.getElementById("grad").value = fieldval;
		
		
	fieldval = document.getElementById("driv").value;
		
        document.getElementById("driver").value = fieldval;
		
	
	
	fieldval= document.getElementById("paye").value;
		
	document.getElementById("pay").value = fieldval;	


	
	fieldval = document.getElementById("num").value;
		
        document.getElementById("number").value = fieldval;
		
		
fieldval = document.getElementById("inu").value;
		
        document.getElementById("inumber").value = fieldval;	

		
fieldval = document.getElementById("nam").value;
		
        document.getElementById("name").value = fieldval;
		
		
		
	fieldval = document.getElementById("lnam").value;
		
        document.getElementById("lname").value = fieldval;	

		
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
.whatsappbutton { background-color: #7ACC72; /* Green */ border: none; color: white; text-align: center; text-decoration: none; font-size: 16px; border-radius: 20px; padding: 10px 20px; margin-top: 10px !important; width: fit-content; margin: auto; cursor: pointer }



</style>





</head>

<body onload="test()+size()">
<div class="jumbotron"> 






<h1><p style="color:red"></p></h1>

<fieldset style="background:#f2f2f2;">
   
 <table>
<form >
<tr><td  valign="top"   style="align:left"  >  
  <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">TEL</label>
  <input type="text" class="form-control" value="<?php echo $num?>"  id="bp" placeholder="" name="nu"  readonly   >
</div><br>
   <div class="mb-3 printPageButton"  >
  <label for="exampleFormControlInput1" class="form-label">Tel(Office)</label>
  <input type="text"   value="<?php echo $inum?>" class="form-control" id="ibp" placeholder="" name="inu"     >
</div><br>
<div class="mb-3 printPageButton"  >
  <label for="exampleFormControlInput1" class="form-label">Tel(Mobile)</label>
  <input type="text"  value="<?php echo $telmobile?>"  class="form-control" id="tell" placeholder="" name="tel"     >
</div><br>

 
<div class="mb-3 printPageButton"  >
  <label for="exampleFormControlInput1" class="form-label">Tel(Other)</label>
  <input type="text"  value="<?php echo $telother?>"  class="form-control" id="othh" placeholder="" name="oth"     >
</div><br>
<div class="mb-3 " >
  <label for="exampleFormControlInput1" class="form-label">First name </label>
  <input type="text" value="<?php echo $name?>" class="form-control" id="name" placeholder="" name="na"     >
</div><br>


<div class="mb-3 "  >
  <label for="exampleFormControlInput1" class="form-label">Last name</label>
  <input type="text" value="<?php echo $lname?>" class="form-control" id="lname" placeholder="" name="lna"     >
</div><br>
<div class="mb-3 "  >
  <label for="exampleFormControlInput1" class="form-label">Company</label>
  <input type="text" name="co" id="company" value="<?php echo $company?>"   class="form-control"  placeholder=""      >
</div><br>
<div class="mb-3 "  >
  <label for="exampleFormControlInput1" class="form-label">Category</label>
  <input type="text" class="form-control"  name="co" id="company" value="<?php echo $category?>" placeholder=""     >
</div><br>
<div class="mb-3 "  >
  <label for="exampleFormControlInput1" class="form-label">Source</label>
  <input type="text" class="form-control" name="co" id="source" value="<?php echo $source?>"  placeholder=""      >
</div><br>
<div class="mb-3 "  >
  <label for="exampleFormControlInput1" class="form-label">Email</label>
<input class="form-control" value="<?php echo $email?>" type="text" name="em" id="email" size="32" >
</div><br>
<div class="mb-3 "  >
 <label for="exampleFormControlInput1" class="form-label">URL</label>
<input class="form-control" type="text" value="<?php echo $url?>" name="ur" id="url" size="32" >
</div><br>
<div class="mb-3 "  >
 <label for="exampleFormControlInput1" class="form-label">Business</label>
<input class="form-control" type="text" name="bu" value="<?php echo $business?>" id="business" size="33" >
</div><br>
<div class="mb-3 "  >
 <label for="exampleFormControlInput1" class="form-label">Grade</label>
<input class="form-control" type="text" name="grad"  id="grad" size="33" >
</div><br>
<div class="mb-3 "  >
 <label for="exampleFormControlInput1" class="form-label">Payment</label>
 <input class="form-control" type="text" name="pay"  id="pay" size="33" >
</div><br>
<div class="mb-3 "  >
 <label for="exampleFormControlInput1" class="form-label">Loyalty card   </label>
<input class="form-control" type="text" name="loy"  id="loy" size="33" >
</div><br>
<div class="mb-3 "  >
 <label for="exampleFormControlInput1" class="form-label">Dispatcher</label>
<input class="form-control" type="text" name="driver"  id="driver" size="33" >
</div><br>

<label for="exampleFormControlInput1" class="form-label">Best Delivery Time  </label>
<select class="form-control" name="delti" id="delti"   >
<option ><?php echo $delivery_time ?></option>

</select>
<div class="mb-3 "  >
 <label for="exampleFormControlInput1" class="form-label">Cuid</label>
<input class="form-control" type="text" name="bu" value="<?php echo $id?>" id="business" size="33" >
</div><br>
<div class="mb-3 "  >
 <label for="exampleFormControlInput1" class="form-label">Account</label>
 <input class="form-control" type="text" name="bu" value="<?php echo $op?>" id="business" size="33" >
</div><br>
<!--div class="mb-3 "  >
 <label for="exampleFormControlInput1" class="form-label">Idf</label>
<input class="form-control" type="text" name="bu" value="<?php echo $idf?>" id="business" size="33" >
</div><br-->
         
</td>
<td  valign="top"   style="align:left"    >
<div class="mb-3 "  >
 <label for="exampleFormControlInput1" class="form-label">City</label>
<input class="form-control" type="text" name="cit"value="<?php echo $city?>"  id="city" size="33" >
</div><br>
<div class="mb-3 "  >
 <label for="exampleFormControlInput1" class="form-label">Zone</label>
 <input class="form-control" type="text"   value="<?php echo $zone?>" name="zon" id="zone"   size="33" >
</div><br>
<div class="mb-3 "  >
 <label for="exampleFormControlInput1" class="form-label">Street</label>
<input class="form-control" type="text" name="str" value="<?php echo $street?>" id="street" size="33" >
</div><br>


<div class="mb-3 "  >
 <label for="exampleFormControlInput1" class="form-label">Building</label>
 <input class="form-control" type="text"  value="<?php echo $building?>" name="bui" id="building"   size="33" >
</div><br>
<div class="mb-3 "  >
 <label for="exampleFormControlInput1" class="form-label">Apartment</label>
<input class="form-control" type="text" name="apa" value="<?php echo $apartment?>" id="apa" size="33" >
</div><br>

<div class="mb-3 "  >
 <label for="exampleFormControlInput1" class="form-label">Floor</label>
<input class="form-control" type="text" name="flo"  id="floor" value="<?php echo $floor?>"  size="33" >
</div><br>

<div class="mb-3 "  >
 <label for="exampleFormControlInput1" class="form-label">Near</label>
<input class="form-control" type="text" name="flo"  id="floor" value="<?php echo $floor?>"  size="33" >
</div><br>
<div class="mb-3 "  >
 <label for="exampleFormControlInput1" class="form-label">Address</label>
<textarea  class="form-control" name="ad" id="address"  rows="5" cols="34" ></textarea>
</div><br>
<div class="mb-3 "  >
 <label for="exampleFormControlInput1" class="form-label">Address</label>
<textarea  class="form-control" name="ad2" id="address2"  rows="5" cols="34" ></textarea>
</div><br>
<div class="mb-3 "  >
 <label for="exampleFormControlInput1" class="form-label">Request</label>
<textarea  class="form-control" name="rem"  id="remark"  rows="5" cols="34" ></textarea>
</div><br>


<input type="hidden" id="nam" value="<?php echo $name?>">
<input type="hidden" id="lnam" value="<?php echo $lname?>">
<input type="hidden" id="com" value="<?php echo $company?>">
<input type="hidden" id="num" value="<?php echo $num?>">
<input type="hidden" id="inu" value="<?php echo $inum?>">
<input type="hidden" id="ema" value="<?php echo $email?>">
<input type="hidden" id="bus" value="<?php echo $business?>">
<input type="hidden" id="add" value="<?php echo $address?>">
<input type="hidden" id="add2" value="<?php echo $address2?>">
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
<input type="hidden" id="grady" value="<?php echo $grade ?>">
<input type="hidden" id="driv" value="<?php echo $driv ?>">
<input type="hidden" id="loyl" value="<?php echo $loy ?>">
<input type="hidden" id="paye" value="<?php echo $pay ?>">
<input type="hidden" id="category" value="<?php echo $category?>">
<input type="hidden" id="src" value="<?php echo $source?>">
<input type="hidden" id="nd" value="<?php echo $s?>">




</td>
</tr>
<tr>
   <td>
   



   
   
   
   <button  class="whatsappbutton" type="button"  onclick="quit()">Quit</button>
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


