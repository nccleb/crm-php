
	
	
	
	 
	

    

	
	 
	
	

   


<?php
session_start();
$id=$_GET["id"];
  $name=$_GET["name"];
   //$description=$_GET["descr"];
   $stage=$_GET["stage"];
   $amount=$_GET["amount"];
  $contact_date=$_GET["contact_date"];
  $close_date=$_GET["close_date"];
  $owner=$_GET["owner"];
  $contact=$_GET["contact"];
  $_SESSION["agent"]=$agent;
  $type=$_GET["type"];
  $status=$_GET["status"];
 
  $priority=$_GET["priority"];
  
 
 $_SESSION["pg"]=$p;
$idf=$_GET["idf"];
  //$nam=$_GET["nam"];
  $_SESSION["idf"]=$idf;
 $_SESSION["nam"]=$nam;
  
  $aidf = $_SESSION["aidf"];
   $anam = $_SESSION["anam"];
  
    $_SESSION["aidf"]=$aidf ;
   $_SESSION["anam"]= $anam ;
  $description=$_SESSION["de"];
 
  $_SESSION["id"]=$id;
?>

<?php
$fichier="CaCallStatus.dat";
$xml=simplexml_load_file($fichier);
foreach($xml as $CallRecord){
    $ext=$show->ext;
    $inc=$CallRecord->CallerID;
    
} 


?>
















<!DOCTYPE html>
<html lang="en">
<head>
  <?php include('head.php'); ?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="css/whatsappButton.css" />
		

<link rel="stylesheet" href="css/stylei.css">
<link rel="stylesheet" href="css/stylei2.css">
<script type="text/javascript" src="js/test371.js"></script>
 
	<script>
	
	
	
	
function del(str) {
	
	 var result = confirm("Want to delete?");
if (result) {
    //Logic to delete the item

	
	 var id="<?php echo $idc ?>" ;
  var idf="<?php echo $idf ?>" ;
  
  //alert(name+idf);
	
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
      document.getElementById("so").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET","test345.php?id="+id+"&idf="+idf, true);
 
  xhttp.send();
}

}                                                          
</script>

	
	
	
	
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
function test(){

fieldval = document.getElementById("daat").value;
		
        document.getElementById("dd").value = fieldval;	 

}


</script>

 
	















</head>

<body onload="test()">

<div class="container text-center"> 



<script>
function submit() {
    var form1 = document.forms['form1']
    
    
         form1.submit()
    
}
</script> 







   
 <table style="width:100%   ";  >

<tr><td  valign="top"   style="align:left"  >  
<form method="post"  action="<?php echo htmlspecialchars("test415.php");?>" > 


<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Name</label>
  <input type="text" class="form-control"  value="<?php echo $name ?> "    id="nam" placeholder="" name="nam"    >
</div><br>

<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Deal description</label>
 

  <textarea   style="  "   class="form-control" id="dd" rows="10"  name="dd"   ></textarea>
  </div>
<br>



<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Stage</label>
  <input type="text" class="form-control" id="sta" placeholder="" name="sta"  value="<?php echo $stage ?> "     >
</div><br>

<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Amount</label>
  <input type="text" class="form-control" id="amo" placeholder="" name="amo"  value="<?php echo $amount ?> "    >
</div><br>


<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Contact Date</label>
  <input type="text" class="form-control" id="date" placeholder="" name="date"  value="<?php echo $contact_date ?> "   >
</div>



<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Close Date</label>
  <input type="text" class="form-control" id="dat" placeholder="" name="dat"  value="<?php echo $close_date ?> "    >
</div>



<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Owner</label>
  <input type="text" class="form-control" readonly id="own" placeholder="" name="own"  value="<?php echo $owner ?> "   >
</div>



<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Contact</label>
  <input type="text" class="form-control" readonly id="con" placeholder="" name="con" value="<?php echo $contact ?> " >
</div>

<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Type</label>
  <input type="text" class="form-control" id="typ" placeholder="" name="typ" value="<?php echo $type ?> " >
</div><br>

<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Priority</label>
  <input type="text" class="form-control" id="pri" placeholder="" name="pri" value="<?php echo $priority ?> " >
</div><br>




 </br>
</td>
</tr>
<tr>
   <td>
   


   <input type="hidden" id="daat" value="<?php echo $description?>">
   
   
   <input type="submit"  class="whatsappbutton"      value="Update" id="form">
   
   <button type="button"   class="whatsappbutton"       id="form" onclick="del()">Delete</button>
  <button id="form"   type="button"  class="whatsappbutton"     onclick="window.location='test264.php?page=<?php echo $aidf ?>&page1=<?php echo $anam ?> ' ">Repeat</button>
   <button type="button" id="form"  class="whatsappbutton"        onclick="quit()">Quit</button>
   </form>
   </td>
  <td>
   </td> 
   
   
   </tr>
   
   
   


</table>





</fieldset>

<p id="so"></p>

<div>
</body>
</html>







 

   
        
   
       
   
   
   
   
   
    

 









		


		

		
								

		

		

		

		
		

		
		




		


	

		

		
	
	
	
	
	

		

				
				

		

		

	
	
		
	
	
	

		
		




		
		
		
		

		


		

		
								

		
		




		








   
    
    
    
    











       
        
        
    