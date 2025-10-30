


<?php
session_start();
   $id =  $_GET["id"];
   $_SESSION['id'] = $id;
   $pipeline = $_GET["pipeline"];
   $name=$_GET["name"];
   $description=$_GET["description"];
   $contact_date=$_GET["contact_date"];
   $stage=$_GET["stage"];
   $amount=$_GET["amount"];
   $close_date=$_GET["close_date"];
   $owner=$_GET["owner"];
   $contact=$_GET["contact"];
   $type=$_GET["type"];
   $priority=$_GET["priority"];
   
   
   
  
  
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

	
	 var id="<?php echo $id ?>" ;
  
  
  //alert(id);
	
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
  xhttp.open("GET","test445.php?id="+id, true);
 
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
<span id="so"><span>


<script>
function submit() {
    var form1 = document.forms['form1']
    
    
         form1.submit()
    
}
</script> 





 <table   >
<form method="post" action="<?php echo htmlspecialchars("test444.php");?>" >
<tr><td  valign="top"   style="align:left"  >  

<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Pipeline</label>
  <input type="text" class="form-control" id="user"  value="<?php echo $pipeline ?>"  placeholder="" name="pipeline"  readonly   >
</div><br>



<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Name</label>
  <input type="text" class="form-control" id="user"  value="<?php echo $name ?>"  placeholder="" name="name"     >
</div><br>




 




<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Description</label>
  <textarea      class="form-control" id="dd" rows="10"   name="description"> <?php echo $description ?></textarea>
</div><br>




<p >Deal stage

<select class="form-control"  required   name="stage">

<option value="<?php echo $stage ?>"  selected><?php echo $stage ?></option>
<?php

$idr = mysqli_connect("192.168.16.103", "root", "1Sys9Admeen72", "nccleb_test");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}



$stmt = $idr->prepare("SELECT * from pipeline ") ; 

   



$stmt->execute();

$result = $stmt ->get_result();

$stmt->close();






while($row=$result->fetch_assoc()){


 $y = $row[$pipeline];
 
 if($y!=NULL){ 
echo " <option value=\"$y\">".$y. " </option> "; 
 }


   
}

?>


</select>


</p></br>



<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Amount</label>
  <input type="text" class="form-control"  value="<?php echo $amount ?>"  id="st" placeholder="" name="amount"     >
</div><br>




<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Contact Date</label>
  <input  class="form-control" value="<?php echo $contact_date ?>" name="contact_date"   id="" placeholder=""      >
</div><br>




<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Close Date</label>
  <input  class="form-control" id="em" rows="5"  name="close_date"  value=" <?php echo $close_date ?>   "          ></input>
</div><br/>



 
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Owner</label>
  <input type="text" class="form-control"  value="<?php echo $owner ?> "  id="date" placeholder="" name="owner"     >
</div><br>


<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Contact</label>
  <input type="text" class="form-control"  value="<?php echo $contact ?> "  id="date" placeholder="" name="contact"     >
</div><br>



<p >Deal type
<select class="form-control"     name="deal_type">

<option value=""  selected><?php echo $type ?></option>

<option>New business</option>
<option>Existing Business</option>


</select>
<p></br>





<p> Priority
<select class="form-control"     name="priority">

<option value="<?php echo $priority ?>"  selected><?php echo $priority ?></option>

<option>Low</option>
<option>Medium</option>
<option>High</option>


</select>
<p></br>





 </br>
</td>
</tr>
<tr>
   <td>
   



   
   
   <input type="submit"  class="whatsappbutton"      value="Update" id="form">
   
   <button type="button"   class="whatsappbutton"       id="form" onclick="del()">Delete</button>
  <!--button id="form"   type="button"  class="whatsappbutton"     onclick="window.location='test421.php?page=<?php echo $aidf ?>&page1=<?php echo $anam ?> ' ">Repeat</button-->
   <button type="button" id="form"  class="whatsappbutton"        onclick="quit()">Quit</button>
   </form>
   </td>
  <td>
   </td> 
   
   
   </tr>
   
   
   


</table>





</fieldset>



<div>
</body>
</html>







 

   
        
   
       
   
   
   
   
   
    

 









		


		

		
								

		

		

		

		
		

		
		




		


	

		

		
	
	
	
	
	

		

				
				

		

		

	
	
		
	
	
	

		
		




		
		
		
		

		


		

		
								

		
		




		








   
    
    
    
    











       
        
        
    