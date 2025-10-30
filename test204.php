<?php
session_start();
$mapo=$_SESSION["mapi"];
?>

<?php $opic=   "c".":"."\\"."Mdr"."\\"."CallerID".date("Y")."-". date("m")."."."txt" ?>

<?php

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
//$inc = "81721326";

$idr = mysqli_connect("192.168.16.103", "root", "1Sys9Admeen72", "nccleb_test");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

$stmt = $idr->prepare("SELECT  * FROM client 
      
       	where (number=? or inumber=? or telmobile=? or telother=? )   ");
	  
$stmt->bind_param("iiii",$inc,$inc,$inc,$inc );
$stmt->execute();
$result = $stmt ->get_result();
$stmt->close();

// Initialize variables with default values
$contact = "No contact found";
$name = "";
$lname = "";
$num = "";
$inum = "";
$id = "";
$company = "";
$email = "";
$business = "";
$grade = "";
$address = "";
$url = "";
$idf = "";
$city = "";
$street = "";
$floor = "";
$building = "";
$zone = "";
$near = "";
$remark = "";
$telmobile = "";
$telother = "";
$apartment = "";
$address2 = "";

while($row=$result->fetch_assoc()){
    $num=$row['number'];
    if(strlen($num)==7){
        $num="0".$num;
    }			  
    
    $inum=$row['inumber'];
    if(strlen($inum)==7){
        $inum="0".$inum;
    }			  
    
    $name=$row['nom']; 
    $lname=$row['prenom']; 
     $contact= $name." ".$lname." ".$num;
    $id=$row['id'];
    $_SESSION["id"]=$id;
    $company=$row['company'];
    $email=$row['email'];
    $business=$row['business'];
    $grade=$row['grade'];
    $address=$row['address'];
    $url=$row['url'];
    if($url) {
        $url = substr($url, 7);
    }
    $idf=$row['idf'];
    $city=$row['city'];
    $street=$row['street'];
    $floor=$row['floor'];
    $building=$row['building'];
    $zone=$row['zone'];
    $near=$row['near'];
    $remark=$row['remark'];
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

// Set session contact after processing
$_SESSION["contact"] = $contact;

// Build full address from existing variables
$simple_address = "";
if(isset($city) && $city) $simple_address .= $city. ", ";
if(isset($zone) && $zone) $simple_address .="Zone " . $zone. ", ";       
if(isset($street) && $street) $simple_address .="Street " . $street . ", ";
if(isset($building) && $building) $simple_address .= "Building " . $building . ", ";
if(isset($apartment) && $apartment) $simple_address .="Apartment " . $apartment . ", ";
if(isset($floor) && $floor) $simple_address .= "Floor " . $floor . ", ";
if(isset($near) && $near) $simple_address .="Near " . $near. ", ";
if(isset($address) && $address) $simple_address .= "address1 " . $address . ", ";
if(isset($address2) && $address2) $simple_address .= "address2 " . $address2;

?>

<?php
$_SESSION["ses"]=$_POST['bp'];
$s=$_SESSION["ses"];
$cookie_name = "user";
$cookie_value = $_POST['bp'];
setcookie($cookie_name, $cookie_value, time() + (86400 * 360), "/"); 
  
 $nam=$_GET['page'];
if($nam == ""){
    exit( "sorry! You have to login first in mypwca!"    );
}
 $idf=$_GET['page1'];

 $_SESSION["oop"]=$nam;
 $_SESSION["ooq"]=$idf;

$cookie_name = "oop";
$cookie_value =$nam;
setcookie($cookie_name, $cookie_value, time() + (86400 * 360), "/"); 

$cookie_name = "ooq";
$cookie_value = $idf;
setcookie($cookie_name, $cookie_value, time() + (86400 * 360), "/"); 

?>



<!DOCTYPE html>
<html lang="en">
<head>
<script type="text/javascript" src="js/test371.js"></script>

<style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .form-container {
            background: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            max-width: 600px;
            margin: 0 auto;
        }
        
        .form-title {
            color: #1976D2;
            font-weight: 600;
            margin-bottom: 25px;
            text-align: center;
            font-size: 24px;
            border-bottom: 2px solid #e3f2fd;
            padding-bottom: 15px;
        }
        
        .form-group-enhanced {
            margin-bottom: 25px;
            position: relative;
        }
        
        .form-label-enhanced {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #1565C0;
            font-size: 16px;
            transition: all 0.3s ease;
        }
        
        .form-control-enhanced {
            display: block;
            width: 100%;
            padding: 14px 16px;
            font-size: 16px;
            font-weight: 500;
            line-height: 1.5;
            color: #1976D2;
            background-color: #fff;
            background-clip: padding-box;
            border: 2px solid #BBDEFB;
            border-radius: 8px;
            transition: all 0.3s ease;
            box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.03);
        }
        
        .form-control-enhanced:focus {
            color: #0D47A1;
            background-color: #F5FBFF;
            border-color: #64B5F6;
            outline: 0;
            box-shadow: 0 0 0 3px rgba(33, 150, 243, 0.15), inset 0 1px 2px rgba(0, 0, 0, 0.03);
        }
        
        .form-control-enhanced::placeholder {
            color: #90CAF9;
            font-weight: 400;
        }
        
        .input-icon {
            position: absolute;
            right: 15px;
            top: 40px;
            color: #64B5F6;
            font-size: 18px;
        }
        
        .helper-text {
            display: block;
            margin-top: 6px;
            font-size: 13px;
            color: #546E7A;
            font-style: italic;
        }
        
        .input-highlight {
            display: inline-block;
            background-color: #E3F2FD;
            color: #1976D2;
            padding: 3px 6px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: 600;
            margin-top: 5px;
        }
        
        @keyframes pulse {
            0% { box-shadow: 0 0 0 0 rgba(33, 150, 243, 0.4); }
            70% { box-shadow: 0 0 0 10px rgba(33, 150, 243, 0); }
            100% { box-shadow: 0 0 0 0 rgba(33, 150, 243, 0); }
        }
        
        .form-control-enhanced:focus {
            animation: pulse 1.5s infinite;
        }
        
        @media (max-width: 576px) {
            .form-container {
                padding: 20px 15px;
            }
            
            .form-control-enhanced {
                padding: 12px 14px;
            }
        }
</style>

<style>
        .save-status {
            padding: 8px 12px;
            border-radius: 5px;
            margin-top: 10px;
            font-size: 14px;
            display: none;
            text-align: center;
        }
        
        .save-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        
        .save-error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        
        .save-button {
            background: linear-gradient(135deg, #0891b2 0%, #0e7490 100%);
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s ease;
            margin-top: 10px;
            width: 100%;
        }
        
        .save-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        
        .save-button:active {
            transform: translateY(0);
        }
        
        .autosave-indicator {
            font-size: 12px;
            color: #6b7280;
            text-align: right;
            margin-top: 5px;
            display: none;
        }
</style>



<link rel="stylesheet" href="css/stylei.css">
<link rel="stylesheet" href="css/stylei2.css">



<input type="hidden" id="demo" value="<?php echo $nam ?>"></input>
<input type="hidden" id="demo1" value="<?php echo $idf ?>"></input>
<input type="hidden" id="demo2" value="<?php echo $inc ?>"></input>
<input type="hidden" id="demo3" value="<?php echo $contact ?>"></input>

<script>
const global = document.getElementById("demo").value;
const global1 = document.getElementById("demo1").value;
const global2 = document.getElementById("demo2").value;
const global3 = document.getElementById("demo3").value;
</script>


<style>
/* Footer spacing fix */
html, body {
    margin: 0;
    padding: 0;
    height: 100%;
}

footer.container-fluid {
    margin: 0 !important;
    padding: 20px 0 0 0 !important;
    background: #343a40;
    color: white;
}

footer.container-fluid p {
    margin: 5px 0;
    color: white !important;
}
</style>

</head>
<body onload="on(); ">



<!DOCTYPE html>
<html lang="en">
<head>







<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">








</head>
<body onload="on() ">
<?php
include 'navbar.php';
?>


<div style="margin-bottom: 0; padding-bottom: 0;">
    <table style="background:#f8f8f8; margin-bottom: 0;" class="table" id="comment_form">
        <tr>
            <th style="width:20%;background:lightgrey">
                <div class="form-container">
                    <div class="form-group-enhanced">
                        <label for="bp" class="form-label-enhanced">
                            <i class="fas fa-phone"></i> INCOMING CALL
                        </label>
                        <input type="text" class="form-control-enhanced" id="bp" placeholder="" name="bp">
                        <span class="input-icon"><i class="fas fa-phone-volume"></i></span>
                    </div>
                    
                     <div class="form-group-enhanced">
                        <label for="ap" class="form-label-enhanced">
                            <i class="fas fa-user"></i> CUSTOMER NAME
                        </label>
                        <input type="text" style="background: #f1f5f9;font-weight: bold; border: 2px solid #e3f2fd;color: #1976D2; border-radius: 8px; padding: 15px; font-size: 14px; line-height: 1.5;"  class="form-control-enhanced" id="ap" placeholder="" name="ap">
                        <span class="input-icon"><i class="fas fa-user-circle"></i></span>
                    </div>
                </div>
            </th>

             <td style="vertical-align: top; width: 45%;">
                <div style="margin: 10px;">
                    <label for="cp"  class="form-label-enhanced">
                        <i class="fas fa-comments"></i> Customer Details
                    </label>
                    <textarea style="background: #f1f5f9;font-weight: bold; border: 2px solid #e3f2fd;color: #1976D2; border-radius: 8px; padding: 15px; font-size: 14px; line-height: 1.5;" 
                              class="form-control" id="cp" rows="35" name="cp" 
                              placeholder="Enter call details, customer concerns, resolution steps, follow-up actions..."></textarea>
                </div>
            </td>

            <td style="width:30%; vertical-align: top;">
                <div style="margin: 10px;">
                    <!-- Notes Section -->
                    <!--div style="margin-bottom: 20px;">
                        <label for="callNotesBox"  class="form-label-enhanced">
                            <i class="fas fa-sticky-note"></i> Agent Notes
                        </label>
                        <textarea class="form-control" id="callNotesBox" rows="4" 
                                  placeholder="Quick notes, reminders, follow-up tasks..." 
                                 style="background: #f1f5f9;font-weight: bold; border: 2px solid #e3f2fd;color: #1976D2; border-radius: 8px; padding: 15px; font-size: 14px; line-height: 1.5;" ></textarea>
                        
                        
                        
                        <div class="save-status" id="saveStatus"></div>
                    </div-->

                    <!-- Action Buttons -->
                    <div class="action-buttons" style="background: #f8f9fa; border-radius: 12px; padding: 15px; margin-bottom: 20px;">
                        <div class="d-grid gap-2">
                            <button class="btn btn-success btn-modern" style="width:100%; margin-bottom: 8px;" onclick="refresh()">
                                <i class="fas fa-sync-alt"></i> Refresh
                            </button>

                            <button class="btn btn-primary btn-modern" style="width:100%; margin-bottom: 8px;" onclick="javascript:add110()">
                                <i class="fas fa-user-plus"></i> New Client
                            </button>

                            <button class="btn btn-warning btn-modern" style="width:100%; margin-bottom: 8px;" onclick="javascript:number22()">
                                <i class="fas fa-search"></i> Search Client
                            </button>
                            
                            <button class="btn btn-primary btn-modern" style="width:100%; margin-bottom: 8px;" onclick="javascript:add()">
                                <i class="fas fa-ticket-alt"></i> New Complaint
                            </button>
                            
                            <button class="btn btn-warning btn-modern" style="width:100%; margin-bottom: 8px;" onclick="javascript:uro2()">
                                <i class="fas fa-search"></i> Search Ticket (Number)
                            </button>
                            
                            <button class="btn btn-primary btn-modern" style="width:100%; margin-bottom: 8px;" onclick="javascript:uro8()">
                                <i class="fas fa-search"></i> Search Ticket
                            </button>
                            
                            <button class="btn btn-info btn-modern" style="width:100%;" onclick="javascript:tick79()">
                                <i class="fas fa-folder-open"></i> Open Tickets
                            </button>
                        </div>
                    </div>
            </th>
        </tr>
    </table>
</div>






<script type="text/javascript" src="js/test371.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>



<?php include 'footer.php';?>

</body>
</html>
   