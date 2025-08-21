
<?php $opic=   "c".":"."\\"."Mdr"."\\"."CallerID".date("Y")."-". date("m")."."."txt" ?>


<?php
session_start();
$s=$_SESSION["ses"];
$C=$_COOKIE["user"];
 $o=urldecode($_GET['page']);
$_SESSION["o"]=$o;
  $p=urldecode($_GET['page1']);
   $n=urldecode($_GET['page2']);
$_SESSION["p"]=$p;
$_SESSION["sos"]=$s;




$fichier="CaCallStatus.dat";
$xml=simplexml_load_file($fichier);
foreach($xml as $CallRecord){
    $ext=$show->ext;
    $inc=$CallRecord->CallerID;;
}

/*
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

 $inc = $_SESSION["userinc"];
*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
  
<?php include('head.php'); ?>
  <link rel="stylesheet" href="css/stylei.css">
  <link rel="stylesheet" href="css/stylei2.css">
   
  <link rel="stylesheet" href="css/whatsappButton.css" />

  <script type="text/javascript" src="js/test371.js"></script>

  
  <script>
   

   function fisa(str) {

    //let files = document.getElementById('fil');
     //var fil = "ujyuuyjyujjyu";
     //alert(fil);
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
 xhttp.open("GET","test20.php?q="+fil,true);
 xhttp.send();
}

   
   </script>




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
<form method="post" action="<?php echo htmlspecialchars("test20.php");?>"  onsubmit="" enctype="multipart/form-data"   >
<tr><td  valign="top"    >  

<p >Tel <input class="form-control" type="text" value="<?php echo $inc ?>" name="nu" id="bp" size="32" onclick="test()"><p><br/> 
 <p >Tel(Office)   <input class="form-control" type="text" name="inu" id="ibp" size="32"><p><br/>
 <p >Tel(Mobile)  <input class="form-control" type="text" name="tel" id="tel" size="32" ><p><br/> 
 <p >Tel(Other)   <input class="form-control" type="text" name="oth" id="oth" size="32"><p><br/>    
<p >First name  <input class="form-control" type="text" name="na" id="ap" size="32" ><p><br/>
<p>Last name  <input class="form-control" type="text" name="lna" id="lap" size="32" ><p><br/>






<!--div id="content"><p>Photo</p>
       
            <div class="form-group">
                <input class="form-control" type="file" id='fil' name="fileToUpload" value="1234" />
            </div>
            
        
    </div>

    <div id="display-image"-->
    <?php
        $query = " select * from client ";
        $result = mysqli_query($db, $query);
 
        while ($data = mysqli_fetch_assoc($result)) {
    ?>
        <img src="./image/<?php echo $data['filename']; ?>">
 
    <?php
        }
    ?>
    </div><br/>


<p >Company  <input class="form-control"  type="text" name="co" id="co" size="32" ><p><br/>
<p >Job Title  <input class="form-control"  type="text" name="job" id="job" size="32" ><p><br/>
<p>E-mail <input class="form-control" type="text" name="em" id="em" size="32" ><p><br/>
<p >Url  <input class="form-control" type="text" name="ur" id="ur" size="32" ><p><br/>
<p >Business   <input class="form-control" type="text" name="bu" id="bu" size="33" ><p><br/>

<p >Grade
<select class="form-control" name="gra">


<option>regular</option>
<option>gold</option>
<option>platinum</option>

</select>
<p></br>

<p >Loyalty card
<select class="form-control" name="loy">


<option></option>
<option>Yes</option>
<option>No</option>

</select>
<p></br>

<p >Community
<select class="form-control" name="com">


<option></option>
<option>Yes</option>
<option>No</option>

</select>
<p></br>



<p >Type of payment
<select class="form-control" name="pay">


<option></option>
<option>Cash</option>
<option>Visa</option>

</select><p></br>


<p >Category
<select class="form-control" name="cat">


<option></option>
<option  value="Existing Client"   >Existing Client</option>
<option   value="Ignore Call"     > Ignore Call</option>
<option   value="Lead"   >Lead</option>
</select><p></br>



<p >Source
<select class="form-control" name="blog">


<option></option>
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







</td>
<td  valign="top"   style="align:left"    >
<p >City <input class="form-control" type="text" name="cit" id="cit" size="33" ><p><br>
<p >Zone <input class="form-control" type="text" name="zon" id="zon" size="33" ><p><br/>
<p >Street <input class="form-control" type="text" name="str" id="str" size="32" ><p><br/>
<p >Building  <input class="form-control" type="text" name="bui" id="bui" size="32" ><p><br/>
<p >Apartment  <input class="form-control" type="text" name="apa" id="apa" size="32" ><p><br/>
<p >Floor 
<select class="form-control" name="flo">

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
<p>


<p >Near  <input  type="text" name="nea" id="nea" size="32" ><p><br/>
<p  >Address  <textarea  class="form-control" name="ad" id="cp"  rows="5" cols="34" ></textarea><br>
<p  >Address  <textarea  class="form-control" name="ad2" id="cp2"  rows="5" cols="34" ></textarea><br>
<p >Request <textarea  class="form-control" name="rem" id="rem"  rows="5" cols="34" ></textarea><br/><br/><br/>

<input type="hidden" id="nd" value="<?php echo $s?>">


<p >Specified Dispatcher  <p>

<select name="driv" id="user"  class="form-control">
 <option   value=""   ></option>



                        <?php
                        $idr = mysqli_connect("192.168.16.102", "root", "1Sys9Admeen72", "nccleb_test");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
                        $drivers_query = mysqli_query($idr, "SELECT idx, name_d, num_d FROM drivers ORDER BY name_d");
                        while($driver = mysqli_fetch_assoc($drivers_query)) {
                            echo "<option value='{$driver['idx']}' data-name='{$driver['name_d']}'>{$driver['name_d']} - {$driver['num_d']}</option>";
                        }
                        ?>
                    </select>
                
	



	  









   
  
  
  

  
  
  
  
  
   


  </select>

<p>Best Delivery Time</p>
<select class="form-control" name="delti">
<option></option>
<option>Morning (8AM-12PM)</option>
<option>Afternoon (12PM-6PM)</option>
<option>Evening (6PM-10PM)</option>
<option>Anytime</option>





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





</body>
</html>







 

   
        
   
       
   
   
   
   
   
    

 















   
    
    
    
    











       
        
        
    