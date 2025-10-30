<?php 
// Fixed file path construction
$opic = "c:\\Mdr\\CallerID" . date("Y") . "-" . date("m") . ".txt";
?>

<?php
session_start();

// Initialize variables to avoid undefined index warnings
$s = isset($_SESSION["ses"]) ? $_SESSION["ses"] : "";
$C = isset($_COOKIE["user"]) ? $_COOKIE["user"] : "";
$o = isset($_GET['page']) ? urldecode($_GET['page']) : "";
$p = isset($_GET['page1']) ? urldecode($_GET['page1']) : "";
$n = isset($_GET['page2']) ? urldecode($_GET['page2']) : "";


 $_SESSION["q"]=$n;
$_SESSION["o"] = $o;
$_SESSION["p"] = $p;
$_SESSION["sos"] = $s;

// Initialize variables for the form
$inc = ""; // Initialize caller ID variable

$fichier = "CaCallStatus.dat";
if (file_exists($fichier)) {
    $xml = simplexml_load_file($fichier);
    if ($xml) {
        foreach ($xml as $CallRecord) {
            if (isset($CallRecord->ext)) {
                $ext = $CallRecord->ext;
            }
            if (isset($CallRecord->CallerID)) {
                $inc = (string)$CallRecord->CallerID;
            }
        }
    }
}

// If no caller ID from XML, try to get from session
if (empty($inc) && isset($_SESSION["userinc"])) {
    $inc = $_SESSION["userinc"];
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

  
  <script>
   
   function fisa(str) {
     // Removed incorrect file access code
     alert("Function fisa called with: " + str);
   }

   function test(){
     fieldval = document.getElementById("nd").value;
     document.getElementById("bp").value = fieldval;
   }
   
   function quit() {
     window.close();
   }
  </script>
</head>

<body>

<div class="jumbotron"> 

<script>
function submitForm() {
    document.forms[0].submit();
}
</script> 

<table>
<form method="post" action="<?php echo htmlspecialchars("test20.php");?>" onsubmit="" enctype="multipart/form-data">
<tr><td valign="top">  
  <p>Tel <input class="form-control" type="text" value="<?php echo htmlspecialchars($n); ?>" name="nu" id="bp" size="32" onclick="test()"><p><br/> 
  <p>Tel(Office) <input class="form-control" type="text" name="inu" id="ibp" size="32"><p><br/>
  <p>Tel(Mobile) <input class="form-control" type="text" name="tel" id="tel" size="32"><p><br/> 
  <p>Tel(Other) <input class="form-control" type="text" name="oth" id="oth" size="32"><p><br/>    
  <p>First name <input class="form-control" type="text" name="na" id="ap" size="32"><p><br/>
  <p>Last name <input class="form-control" type="text" name="lna" id="lap" size="32"><p><br/>

  <p>Company <input class="form-control" type="text" name="co" id="co" size="32"><p><br/>
  <p>Job Title <input class="form-control" type="text" name="job" id="job" size="32"><p><br/>
  <p>E-mail <input class="form-control" type="text" name="em" id="em" size="32"><p><br/>
  
  <p>Business <input class="form-control" type="text" name="bu" id="bu" size="33"><p><br/>

  <p>Grade
  <select class="form-control" name="gra">
    <option>regular</option>
    <option>gold</option>
    <option>platinum</option>
  </select>
  <p></br>

  <p>Loyalty card
  <select class="form-control" name="loy">
    <option></option>
    <option>Yes</option>
    <option>No</option>
  </select>
  <p></br>

  <p>Community
  <select class="form-control" name="com">
    <option></option>
    <option>Yes</option>
    <option>No</option>
  </select>
  <p></br>

  <p>Type of payment
  <select class="form-control" name="pay">
    <option></option>
    <option>Cash</option>
    <option>Visa</option>
  </select><p></br>

  <p>Category
  <select class="form-control" name="cat">
    <option></option>
    <option value="Existing Client">Existing Client</option>
    <option value="Ignore Call">Ignore Call</option>
    <option value="Lead">Lead</option>
  </select><p></br>

  <p>Source
  <select class="form-control" name="blog">
    <option></option>
    <option value="Blog posts">Blog posts</option>
    <option value="Landing pages">Landing pages</option>
    <option value="Organic search traffic">Organic search traffic</option>
    <option value="Direct traffic">Direct traffic</option>
    <option value="PPC ads">PPC ads</option>
    <option value="Affiliate marketers">Affiliate marketers</option>
    <option value="Social media channels">Social media channels</option>
    <option value="Paid social ads">Paid social ads</option>
    <option value="Voice assistants">Voice assistants</option>
    <option value="Direct marketing">Direct marketing</option>
    <option value="Traditional marketing channels">Traditional marketing channels</option>
    <option value="Tradeshows">Tradeshows</option>
    <option value="Referrals">Referrals</option>
  </select><p></br>
</td>

<td valign="top" style="align:left">
  <p>Google Maps Url <input class="form-control" type="text" name="ur" id="ur" size="32"><p><br/>
  <p>City <input class="form-control" type="text" name="cit" id="cit" size="33"><p><br>
  <p>Zone <input class="form-control" type="text" name="zon" id="zon" size="33"><p><br/>
  <p>Street <input class="form-control" type="text" name="str" id="str" size="32"><p><br/>
  <p>Building <input class="form-control" type="text" name="bui" id="bui" size="32"><p><br/>
  <p>Apartment <input class="form-control" type="text" name="apa" id="apa" size="32"><p><br/>
  <p>Floor 
  <select class="form-control" name="flo">
    <?php for ($i = 0; $i <= 20; $i++): ?>
      <option><?php echo $i; ?></option>
    <?php endfor; ?>
  </select>
  <p>

  <p>Near <input type="text" name="nea" id="nea" size="32"><p><br/>
  <p>Address <textarea class="form-control" name="ad" id="cp" rows="5" cols="34"></textarea><br>
  <p>Address <textarea class="form-control" name="ad2" id="cp2" rows="5" cols="34"></textarea><br>
  <p>Notes <textarea class="form-control" name="rem" id="rem" rows="5" cols="34"></textarea><br/><br/><br/>

  <input type="hidden" id="nd" value="<?php echo htmlspecialchars($s); ?>">

  <!--p>Specified Dispatcher<p>
  <select name="driv" id="user" class="form-control">
    <option value=""></option>
    <?php
     // Database connection with error handling
   // $idr = @mysqli_connect("192.168.16.103", "root", "1Sys9Admeen72", "nccleb_test");
    //if ($idr) {
     // $drivers_query = mysqli_query($idr, "SELECT idx, name_d, num_d FROM drivers ORDER BY name_d");
     // if ($drivers_query) {
       // while($driver = mysqli_fetch_assoc($drivers_query)) {
        //  echo "<option value='{$driver['idx']}'>{$driver['name_d']} - {$driver['num_d']}</option>";
        //}
      //}
     // mysqli_close($idr);
   // } else {
      //echo "<option>Database connection failed</option>";
   // }
    ?>
  </select-->

  <p>Best Delivery Time</p>
  <select class="form-control" name="delti">
    <option></option>
    <option>Morning (8AM-12PM)</option>
    <option>Afternoon (12PM-6PM)</option>
    <option>Evening (6PM-10PM)</option>
    <option>Anytime</option>
  </select>
</td>
</tr>

<tr>
  <td>
    <input class="whatsappbutton" name="upload" type="submit" value="Add" id="form">
    <button class="whatsappbutton" type="button" id="form" onclick="quit()">Quit</button>
  </td>
  <td></td> 
</tr>
</form>
</table>

</div>
</body>
</html>