


<?php
session_start();
  $id=$_GET["id"];
   $fid=$_GET["fid"];
   $idc=$_GET["idc"];
  $_SESSION["idc"]=$idc;
  $la=$_GET["la"];
  $lcd=$_GET["lcd"];
  $time=$_GET["time"];
  $agent=$_GET["agent"];
  $_SESSION["agent"]=$agent;
  $driver=$_GET["driver"];
  $status=$_GET["status"];
 // $status=$_GET["imp"];
  $task=$_GET["tas"];
   $cat=$_GET["category"];
  $opp=$_GET["opportunities"];
  $incident=$_GET["incident"];
  $pr=$_GET["priority"];
 $_SESSION["pg"]=$p;
$idf=$_GET["idf"];
  //$nam=$_GET["nam"];
  $_SESSION["idf"]=$idf;
 $_SESSION["nam"]=$nam;
  
  $aidf = $_SESSION["aidf"];
   $anam = $_SESSION["anam"];
  
    $_SESSION["aidf"]=$aidf ;
   $_SESSION["anam"]= $anam ;
  
  //$la= $_SESSION["la"];
  $nam= $_SESSION["incident"];
  
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
	



		

 
	















</head>

<body onload="">

<div class="container text-center"> 



<script>
function submit() {
    var form1 = document.forms['form1']
    
    
         form1.submit()
    
}
</script> 




<!--h1><p style="color:red"></p></h1>

<fieldset style="background:#f2f2f2;"-->
   
 <table   >
<form method="post" action="<?php echo htmlspecialchars("test344.php");?>" >
<tr><td  valign="top"   style="align:left"  >  
<!--p id="form">Name     &nbsp  &nbsp &nbsp &nbsp &nbsp <input class="form" type="text" name="user"  id="user" value="<?php echo $id?>"  size="32"><p><br/-->
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Name</label>
  <input type="text" class="form-control" id="user"  value="<?php echo $id. " " .$fid?>"  placeholder="" name="user"  readonly   >
</div><br>

<!--p id="form">Family     &nbsp  &nbsp &nbsp &nbsp &nbsp <input class="form" type="text" name="fuser"  id="fuser" value="<?php echo $fid?>"  size="32"><p><br/>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Tel(Office)</label>
  <input type="text" class="form-control"  value="<?php echo $fid?> "    id="fuser" placeholder="" name="fuser"     >
</div><br-->




<!--p id="form">Task    &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp <input class="form" type="text" value="<?php echo $task ?>" name="task" id="task" size="32" onclick="test()"><p><br/--> 
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Issue</label>
  <input type="text" class="form-control"  value="<?php echo $task ?> "  id="text" placeholder="" name="text"     >
</div><br>



<!--p id="form">Date   &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <input class="form" type="text" name="lcd" value="<?php echo $lcd ?>" id="st" size="32"><p><br/-->
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Last Contacted Date</label>
  <input type="text" class="form-control"  value="<?php echo $lcd ?>"  id="st" placeholder="" name="lcd"     >
</div><br>


<!--p id="form"> Activity     &nbsp &nbsp  &nbsp &nbsp <textarea  style="color:blue" name="la" id="em"  rows="5" cols="34"   id="la" size="32"><?php echo $la ?></textarea><p><br/-->
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Activity </label>
  <textarea class="form-control" id="em" rows="5"  name="la" ><?php echo $la ?></textarea>
</div><br/>



<!--p id="form">Comments    &nbsp &nbsp <textarea  style="color:blue" name="incident" id="em"  rows="5" cols="34"  name="incident" value="" id="time" size="32"><?php echo $incident ?></textarea><p><br/-->
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Complaint</label>
  <textarea class="form-control" id="em" rows="5"  name="incident" ><?php echo $incident ?></textarea>
</div><br/>






<p> Status
<select class="form-control"     name="status">

<option  value="<?php echo $status ?> "  selected><?php echo $status ?></option>

<option>Not Resolved</option>
<option>In Progress</option>
<option>Resolved</option>
<option>Closed</option>

</select>
<p></br>






<!--p id="form">Agent    &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <input class="form" type="text" name="agent"  id="calendar"  value="<?php echo $agent ?>"   size="32"><p><br/> 
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Priority</label>
  <input type="text" class="form-control" value="<?php echo $pr ?>"  id="pr" placeholder="" name="pr"     >
</div-->


<p> Priority
<select class="form-control"     name="pr">

<option value="<?php echo $pr ?>"  selected><?php echo $pr ?></option>

<option>Low</option>
<option>Medium</option>
<option>High</option>


</select>
<p></br>

<!--p id="form">Agent    &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <input class="form" type="text" name="agent"  id="calendar"  value="<?php echo $agent ?>"   size="32"><p><br/--> 
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Agent</label>
  <input type="text" class="form-control" value="<?php echo $agent ?>"  id="calendar" placeholder="" name="agent"     >
</div><br>



 </br>
</td>
</tr>
<tr>
   <td>
   



   
   
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







 

   
        
   
       
   
   
   
   
   
    

 









		


		

		
								

		

		

		

		
		

		
		




		


	

		

		
	
	
	
	
	

		

				
				

		

		

	
	
		
	
	
	

		
		




		
		
		
		

		


		

		
								

		
		




		








   
    
    
    
    











       
        
        
    