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
	  
	 
	  $idr = mysqli_connect("192.168.20.107", "root", "1Sys9Admeen72", "nccleb_test");
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
			  
			 $apartment=$row['apartment'];
			  $idx=$row['idx'];
			  
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
	
 window.open ("http://192.168.20.107//search.php","","menubar=0,resizable=1,width=480,height=620");
	
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

<p >Tel      <input  class="form-control"   type="text" value="<?php echo $num?>" name="nu" id="bp" size="32" onclick="test()"><p><br/> 
 <p >Tel(Office)      <input  class="form-control"       type="text" name="inu" value="<?php echo $inum?>" id="ibp" size="32"><p><br/>
 <p >Tel(Mobile)     <input class="form-control" type="text" name="tel" value="<?php echo $telmobile?>" id="tel" size="32" onclick="test()"><p><br/> 
 <p >Tel(Other)     <input class="form-control" type="text" name="oth" value="<?php echo $telother?>" id="oth" size="32"><p><br/>    
<p >First name        <input class="form-control" type="text" name="na" id="name" value="<?php echo $name?>" size="32" ><p><br/>
<p >Last name        <input class="form-control" type="text" name="lna" id="lname" value="<?php echo $lname?>" size="32" ><p><br/>
<p >Company       <input class="form-control"  type="text" name="co" id="company" value="<?php echo $company?>" size="32" ><p><br/>
<p >Category       <input class="form-control"  type="text" name="co" id="company" value="<?php echo $category?>" size="32" ><p><br/>
<p >Source       <input class="form-control"  type="text" name="co" id="source" value="<?php echo $source?>" size="32" ><p><br/>
<p >E-mail       <input class="form-control" value="<?php echo $email?>" type="text" name="em" id="email" size="32" ><p><br/>
<p >Url            <input class="form-control" type="text" value="<?php echo $url?>" name="ur" id="url" size="32" ><p><br/>
<p >Business       <input class="form-control" type="text" name="bu" value="<?php echo $business?>" id="business" size="33" ><p><br/>
<p >Grade          <input class="form-control" type="text" name="grad"  id="grad" size="33" ><p><br/>
<p >Payment       <input class="form-control" type="text" name="pay"  id="pay" size="33" ><p><br/>
<p >Loyalty card        <input class="form-control" type="text" name="loy"  id="loy" size="33" ><p><br/>
<p >Salesman          <input class="form-control" type="text" name="driver"  id="driver" size="33" ><p><br/>

<p >Cuid        <input class="form-control" type="text" name="bu" value="<?php echo $id?>" id="business" size="33" ><p><br/>
<p >Account       <input class="form-control" type="text" name="bu" value="<?php echo $op?>" id="business" size="33" ><p><br/>
<p >Idf           <input class="form-control" type="text" name="bu" value="<?php echo $idf?>" id="business" size="33" ><p><br/>
</td>
<td  valign="top"   style="align:left"    >
<p >City    <input class="form-control" type="text" name="cit"value="<?php echo $city?>"  id="city" size="33" ><p><br>
<p >Zone    <input class="form-control" value="<?php echo $zone?>" type="text" name="zon" id="zone" size="33" ><p><br/>
<p >Street   <input class="form-control" type="text" name="str" value="<?php echo $street?>" id="street" size="32" ><p><br/>
<p >Building  <input class="form-control" type="text" value="<?php echo $building?>" name="bui" id="building" size="32" ><p><br/>
<p >Apartment  <input class="form-control" type="text" name="apa" value="<?php echo $apartment?>" id="apa" size="32" ><p><br/>
<p >Floor   
<select class="form-control"  name="flo"  id="floor">



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

<p>


<p >Near     <input   class="form-control" type="text" value="<?php echo $near?>" name="nea" id="nea" size="32" ></p><br/>

<p  >Address  <textarea  class="form-control" name="ad" id="address"  rows="5" cols="34" ></textarea><br>
<p  >Address  <textarea  class="form-control" name="ad2" id="address2"  rows="5" cols="34" ></textarea><br>
<p >Request  <textarea  class="form-control" name="rem"  id="remark"  rows="5" cols="34" ></textarea></p><br/><br/><br/>

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


