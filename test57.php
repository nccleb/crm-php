<?php
session_start();

  "os=".  $os=$_SESSION["o"];
 "ps=" .  $ps=$_SESSION["p"];
   
     $_SESSION["sun"];
?>




<!DOCTYPE html>
<html>
<head>
<?php include('head.php'); ?>
  <link rel="stylesheet" href="css/stylei.css">
  <link rel="stylesheet" href="css/stylei2.css">
   
  <link rel="stylesheet" href="css/whatsappButton.css" />
  <script src="js/test371.js"></script>










</head>


<?php
if (isset($_POST['ta'])&&!empty($_POST['id'])&&isset($_POST['id'])&&isset($_POST['la'])&&isset($_POST['in'])&&!empty($_POST['in'])&&isset($_POST['pr'])   ){
  $id=test_input($_POST['id']);
  $ca=test_input($_POST['ca']);
  $ba=test_input($_POST['ba']);
  $lc=test_input($_POST['lc']); 
   $la=test_input($_POST['la']); 
  $in=test_input($_POST['in']);
   $st=test_input($_POST['st']);
  $ca1=test_input($_POST['ca1']);
   $ta=test_input($_POST['ta']);
   $pr=test_input($_POST['pr']);

   



	}
else{
	
	echo"<script>alert('Missing Entry!')</script>";
	echo "<script>quit()</script>";
    }
	function test_input($data) {
		
  $data = trim($data,"/");
  
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


if (!preg_match("/^[0-9a-zA-Z'?!=;~+%`\[\]()$*\"|:.,#&_\s-\p{Arabic} ]*$/u",$pr)) {
  echo "<p style=\"color:red\">Invalid Priority format!</p>"."<br/>";
  echo "<button type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}


if (!preg_match("/^[0-9a-zA-Z'?!=;~+%`\[\]()$*\"|:.,#&_\s-\p{Arabic} ]*$/u",$ta)) {
  echo "<p style=\"color:red;font-size:28px\">Invalid Task format!</p>"."<br/>";
  echo "<button  id=\"id\"  type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}


if (!preg_match("/^[a-zA-Z.,\s ]*$/",$ca1)) {
  echo "<p style=\"color:red;font-size:28px\">Invalid Opportunity format!</p>"."<br/>";
  echo "<button  id=\"id\"  type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}

	

if (!preg_match("/^[a-zA-Z.,\s ]*$/",$ca)) {
  echo "<p style=\"color:red;font-size:28px\">Invalid Category format!</p>"."<br/>";
  echo "<button  id=\"id\"  type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}


if (!preg_match("/^[0-9a-zA-Z'?!=;~+%`\[\]()$*\"|:.,#&_\s-\p{Arabic} ]*$/u",$la)) {
  echo "<p style=\"color:red;font-size:28px\">Invalid Last Activity format!</p>"."<br/>";
  echo "<button  id=\"id\"  type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}
if (!preg_match("/^[0-9a-zA-Z'?!=;~+%`\[\]()$*\"|:.,#&_\s-\p{Arabic} ]*$/u",$in)) {
  echo "<p style=\"color:red;font-size:28px\">Invalid Incident format!</p>"."<br/>";
  echo "<button id=\"id\"  type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}
if (!preg_match("/^[0-9a-zA-Z.,\s ]*$/",$st)) {
  echo "<p style=\"color:red;font-size:28px\">Invalid Status format!</p>"."<br/>";
  echo "<button id=\"id\"  type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}
if (!preg_match("/^[0-9.,\s- ]*$/",$id)) {
  echo "<p style=\"color:red;font-size:28px\">Invalid ID format!</p>"."<br/>";
  echo "<button  id=\"id\"  type=\"button\" onclick=\"quit()\">Quit</button>";
  exit();  
}

$idr = mysqli_connect("192.168.22.105", "root", "1Sys9Admeen72", "nccleb_test");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

// First, find the client ID
$stmt = $idr->prepare("SELECT id FROM client WHERE number=? OR inumber=? OR telmobile=? OR telother=?");
$stmt->bind_param("iiii", $id, $id, $id, $id);
$stmt->execute();
$req2 = $stmt->get_result();
$stmt->close();

$id1 = null;
while($lig = @mysqli_fetch_assoc($req2)) {
    $id1 = $lig['id'];
    break; // Just get the first match
}

// If client not found, show error
if (!$id1) {
    echo "<script>alert('Client not found!')</script>";
    echo "<script>quit();</script>";
    mysqli_close($idr);
    exit();
}

// Insert into CRM
$stmt = $idr->prepare("INSERT INTO crm (task, la, incident, status, num, priority, id, idfc) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssss", $ta, $la, $in, $st, $id, $pr, $id1, $os);

$insertSuccess = $stmt->execute();
$stmt->close();

if ($insertSuccess) {
    // Send email only if insert was successful
    $to = "nccleb@gmail.com";
    $subject = "My subject";
    $txt = "Your ticket Name is: " . $ta . "\r\n" .
           "Your Complaint is: " . $in;
    $headers = "From: nccleb@gmail.com" . "\r\n" .
               "CC: info@nccleb.com";
    
    mail($to, $subject, $txt, $headers);

    echo "<p id=\"p\">Data is well inserted!</p>";
    echo "<a href=\"test56.php?page=$os&page1=$ps\">INSERT AGAIN</a>" . "<br/>";
    echo "<button id=\"id\" type=\"button\" onclick=\"quit()\">Quit</button>";
} else {
    echo "<script>alert('Failed to insert data into CRM!')</script>";
    echo "<script>quit();</script>";
}

mysqli_close($idr);
?>

