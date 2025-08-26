<?php
session_start();
$mapo=$_SESSION["mapi"];
?>

<?php $opic=   "c".":"."\\"."Mdr"."\\"."CallerID".date("Y")."-". date("m")."."."txt" ?>

<?php

$fichier="CaCallStatus.dat";
$xml=simplexml_load_file($fichier);
foreach($xml as $CallRecord){
    $ext=$show->ext;
   $inc=$CallRecord->CallerID;;
   
}  

$inc = "81721326";

$idr = mysqli_connect("192.168.16.102", "root", "1Sys9Admeen72", "nccleb_test");
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
  
$nam=$_GET['pag'];
if($nam == ""){
    exit( "sorry! You have to login first in mypwca!"    );
}
$idf=$_GET['pag1'];

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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="js/test371.js"></script>

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

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

<style>
        .navbar-blue {
            background: linear-gradient(135deg, #1976D2 0%, #0D47A1 100%);
            border: none;
            border-radius: 0;
            margin-bottom: 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }
        
        .navbar-blue .navbar-brand {
            color: white !important;
            font-weight: bold;
            font-size: 20px;
        }
        
        .navbar-blue .navbar-nav > li > a {
            color: rgba(255, 255, 255, 0.9) !important;
            font-weight: 500;
            transition: all 0.3s ease;
            padding: 15px 20px;
        }
        
        .navbar-blue .navbar-nav > li > a:hover,
        .navbar-blue .navbar-nav > li > a:focus {
            color: white !important;
            background-color: rgba(255, 255, 255, 0.1);
            transform: translateY(-2px);
        }
        
        .navbar-blue .navbar-toggle {
            border-color: rgba(255, 255, 255, 0.5);
        }
        
        .navbar-blue .navbar-toggle .icon-bar {
            background-color: white;
        }
        
        .navbar-blue .navbar-toggle:hover,
        .navbar-blue .navbar-toggle:focus {
            background-color: rgba(255, 255, 255, 0.1);
        }
        
        .navbar-blue .dropdown-menu {
            background-color: white;
            border: none;
            border-radius: 4px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            padding: 0;
        }
        
        .navbar-blue .dropdown-menu > li > a {
            color: #333;
            padding: 12px 20px;
            transition: all 0.2s ease;
            border-bottom: 1px solid #f0f0f0;
        }
        
        .navbar-blue .dropdown-menu > li > a:hover {
            background-color: #f8f9fa;
            color: #1976D2;
            padding-left: 25px;
        }
        
        .navbar-blue .dropdown-menu > li:last-child > a {
            border-bottom: none;
        }
        
        .navbar-blue .navbar-text {
            color: white;
            margin-top: 15px;
            margin-bottom: 15px;
        }
        
        .navbar-blue .navbar-right > li > a {
            padding: 15px 15px;
        }
        
        .login-info {
            background-color: rgba(255, 255, 255, 0.15);
            border-radius: 4px;
            padding: 5px 12px;
            margin: 10px 5px;
            color: white;
            font-weight: 500;
        }
        
        .blue-subheader {
            background-color: #1976D2;
            color: white !important;
            font-weight: bold;
            padding: 10px 20px !important;
            margin-top: 5px;
            border-bottom: none !important;
        }
        
        .blue-subheader:hover {
            background-color: #1976D2 !important;
            color: white !important;
            cursor: default;
            padding-left: 20px !important;
        }
        
        .navbar-blue .dropdown-menu {
            min-width: 220px;
        }
        
        @media (max-width: 767px) {
            .navbar-blue .navbar-nav .open .dropdown-menu > li > a {
                color: #333;
                padding: 12px 20px;
            }
            
            .navbar-blue .navbar-nav .open .dropdown-menu > li > a:hover {
                color: #1976D2;
                background-color: #f8f9fa;
            }
            
            .login-info {
                margin: 5px 15px;
                display: inline-block;
            }
        }
</style>

<style>
        .btn-modern {
            border-radius: 10px;
            padding: 12px 25px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            border: none;
        }

        .btn-modern:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
        }

        .btn-primary-modern {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .btn-success-modern {
            background: linear-gradient(135deg, #059669 0%, #047857 100%);
        }

        .btn-warning-modern {
            background: linear-gradient(135deg, #d97706 0%, #b45309 100%);
        }

        .action-buttons {
            background: var(--light-bg);
            border-radius: 15px;
            padding: 20px;
        }
        
       
        
        .whatsapp-btn {
            background: linear-gradient(135deg, #25D366 0%, #128C7E 100%);
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        
        .whatsapp-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(37, 211, 102, 0.4);
        }
</style>
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
<body onload="on(); loadSavedNotes();">

<!-- Blue Navigation Bar -->
<nav class="navbar navbar-blue">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>   
                <span class="icon-bar"></span>       
            </button>
            <a class="navbar-brand" href="#">
                <i class="fas fa-headset"></i> NCC 
            </a>
        </div>

        <div>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <span class="login-info">
                        <i class="fas fa-user"></i> Login as <?php echo htmlspecialchars($nam) ?>
                    </span>
                    <li><a href="login200.php">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a></li>
                </li>
            </ul>
        </div>

        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fas fa-ellipsis-h"></i> More <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="#" onclick="javascript:search5()"><i class="fas fa-user"></i> First name</a></li>
                        <li><a href="#" onclick="javascript:search15()"><i class="fas fa-user-tag"></i> Last name</a></li>
                        <li><a href="#" onclick="javascript:search16()"><i class="fas fa-building"></i> Company</a></li>
                        <li><a href="#" onclick="javascript:search2()"><i class="fas fa-briefcase"></i> Business</a></li>
                        <li><a href="#" onclick="javascript:del()"><i class="fas fa-trash"></i> Delete</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fas fa-tasks"></i> Dispatcher <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="#" onclick="javascript:dispatch()"><i class="fas fa-plus-circle"></i> New Assignment</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fas fa-chart-bar"></i> Reports <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="#" onclick="javascript:list1()"><i class="fas fa-list"></i> Simple List(Clients)</a></li>
                        <li class="blue-subheader">Tickets</li>  
                        <li><a href="#" onclick="javascript:list79()"><i class="fas fa-ticket-alt"></i> Simple List(Tickets)</a></li>
                        <li><a href="#" onclick="javascript:tick79()"><i class="fas fa-folder-open"></i> Open Tickets</a></li>
                        <li><a href="#" onclick="javascript:incidents()"><i class="fas fa-info-circle"></i> Tickets Details</a></li>
                        <li><a href="#" onclick="javascript:incidents2()"><i class="fas fa-chart-pie"></i> Statistics(Tickets)</a></li> 
                    </ul>
                </li>

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fas fa-cog"></i> System <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="blue-subheader">Users</li>
                        <li><a href="#" onclick="javascript:add3()"><i class="fas fa-user-plus"></i> Add User</a></li>
                        <li><a href="#" onclick="javascript:add22()"><i class="fas fa-users"></i> Users</a></li>
                        
                        <li class="blue-subheader">Agents</li>
                        <li><a href="#" onclick="javascript:search10()"><i class="fas fa-user-tie"></i> Agent</a></li>
                        <?php if($nam=="user"): ?>
                            <!--li><a href="#" onclick="javascript:adag()"><i class="fas fa-user-plus"></i> Add Agent</a></li-->
                            <li><a href="#" onclick="javascript:delag()"><i class="fas fa-user-minus"></i> Delete Agent</a></li>
                            <li><a href="#" onclick="javascript:delal()"><i class="fas fa-users-slash"></i> Delete All</a></li>
                        <?php endif; ?>
                        
                        <li class="blue-subheader">Complaints</li>
                        <li><a href="#" onclick="javascript:add322()"><i class="fas fa-exclamation-triangle"></i> Complaints</a></li>
                        <li><a href="#" onclick="javascript:add33()"><i class="fas fa-plus"></i> Add Complaint</a></li>
                        <li><a href="#" onclick="javascript:del_ag1()"><i class="fas fa-trash-alt"></i> Delete Complaint</a></li>
                        <li><a href="#" onclick="javascript:del_al1()"><i class="fas fa-trash"></i> Delete All</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fas fa-database"></i> Data <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="blue-subheader">Import</li>
                        <li><a href="#" onclick="javascript:Import()"><i class="fas fa-file-import"></i> Import Client</a></li>
                        <li><a href="#" onclick="javascript:Importc1()"><i class="fas fa-file-import"></i> Import Complaints</a></li>
                        
                        <li class="blue-subheader">Export</li>
                        <li><a href="#" onclick="javascript:Exportd()"><i class="fas fa-file-export"></i> Export Client</a></li>
                        <li><a href="#" onclick="javascript:Exportc1()"><i class="fas fa-file-export"></i> Export Complaints</a></li>
                        
                        <li class="blue-subheader">Operations</li>
                        <li><a href="#" onclick="javascript:bb()"><i class="fas fa-save"></i> Backup</a></li>
                        <li><a href="#" onclick="javascript:ImportSql()"><i class="fas fa-undo"></i> Recovery</a></li>
                        
                        <?php if($nam=="user"): ?>
                            <li class="blue-subheader">Danger Zone</li>
                            <li><a href="#" onclick="javascript:delAll()" style="color: #dc3545;"><i class="fas fa-exclamation-triangle"></i> Delete All Clients</a></li>
                            <li><a href="#" onclick="javascript:delAll2()" style="color: #dc3545;"><i class="fas fa-exclamation-triangle"></i> Delete All Complaints</a></li>
                        <?php endif; ?>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>


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
                        <input type="text" class="form-control-enhanced" id="ap" placeholder="" name="ap">
                        <span class="input-icon"><i class="fas fa-user-circle"></i></span>
                    </div>
                </div>
            </th>

            <td style="vertical-align: top; width: 45%;">
                <div style="margin: 10px;">
                    <label for="cp" style="font-weight: bold; color: #1976D2; display: block; margin-bottom: 10px;">
                        <i class="fas fa-comments"></i> Customer Details
                    </label>
                    <textarea style="background: #f1f5f9; border: 2px solid #e3f2fd; border-radius: 8px; padding: 15px; font-size: 14px; line-height: 1.5;" 
                              class="form-control" id="cp" rows="35" name="cp" 
                              placeholder="Enter call details, customer concerns, resolution steps, follow-up actions..."></textarea>
                </div>
            </td>

            <td style="width:30%; vertical-align: top;">
                <div style="margin: 10px;">
                    <!-- Notes Section -->
                    <div style="margin-bottom: 20px;">
                        <label for="notesArea" style="font-weight: bold; color: #1976D2; display: block; margin-bottom: 8px;">
                            <i class="fas fa-sticky-note"></i> Agent Notes
                        </label>
                        <textarea class="form-control" id="notesArea" rows="4" 
                                  placeholder="Quick notes, reminders, follow-up tasks..." 
                                  style="background: #f1f5f9; border: 2px solid #e3f2fd; border-radius: 8px; padding: 12px; font-size: 13px;"></textarea>
                        <div class="autosave-indicator" id="autosaveIndicator">Auto-saved</div>
                        
                        <button class="save-button" onclick="saveNotes()">
                            <i class="fas fa-save"></i> Save Notes
                        </button>
                        
                        <div class="save-status" id="saveStatus"></div>
                    </div>

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


<script>
// Notes functionality
let notesSaveTimeout;
let currentClientId = "<?php echo isset($id) ? $id : 'default'; ?>";
let currentAgent = "<?php echo $nam; ?>";

function saveNotes() {
    const notesText = document.getElementById('notesArea').value;
    
    const formData = new FormData();
    formData.append('client_id', currentClientId);
    formData.append('agent', currentAgent);
    formData.append('notes', notesText);
    formData.append('action', 'save_notes');
    
    fetch('save_notes.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success && data.notes) {
            document.getElementById('notesArea').value = data.notes;
        }
    })
    .catch(error => {
        console.error('Error loading notes:', error);
    });
}

function setupAutoSave() {
    const notesArea = document.getElementById('notesArea');
    const autosaveIndicator = document.getElementById('autosaveIndicator');
    
    notesArea.addEventListener('input', function() {
        clearTimeout(notesSaveTimeout);
        
        notesSaveTimeout = setTimeout(function() {
            saveNotes();
            
            autosaveIndicator.style.display = 'block';
            setTimeout(() => {
                autosaveIndicator.style.display = 'none';
            }, 2000);
        }, 5000);
    });
}

document.addEventListener('DOMContentLoaded', function() {
    setupAutoSave();
});

window.addEventListener('beforeunload', function() {
    const notesText = document.getElementById('notesArea').value;
    if (notesText.trim() !== '') {
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'save_notes.php', false);
        
        const formData = new FormData();
        formData.append('client_id', currentClientId);
        formData.append('agent', currentAgent);
        formData.append('notes', notesText);
        formData.append('action', 'save_notes');
        
        xhr.send(formData);
    }
});

function copyLink() {
    var linkField = document.getElementById('mapsLink');
    linkField.select();
    document.execCommand('copy');
    alert('Link copied!');
}

function sendToWhatsApp() {
    var driverPhone = document.getElementById('driverPhone').value;
    if (!driverPhone) {
        alert('Please select a driver first!');
        return;
    }
    
    driverPhone = driverPhone.replace(/[^\d+]/g, '');
    if (!driverPhone.startsWith('+')) {
        if (driverPhone.length === 8) {
            driverPhone = '961' + driverPhone;
        }
    }
    
    var mapsLink = document.getElementById('mapsLink').value;
    var clientName = '<?php echo isset($name) ? preg_replace("/[^\w\s]/", "", $name) : "Client"; ?>';
    var clientPhone = '<?php echo isset($num) ? $num : ""; ?>';
    var address = '<?php echo "hazmieh municipality "; ?>';
    
    var message = 'DELIVERY ORDER\n\n' +
                 'Client: ' + clientName + ' (' + clientPhone + ')\n\n' +
                 'LOCATION:\n' + mapsLink + '\n\n' +
                 'Address: ' + address + '\n\n' +
                 'Time: ' + new Date().toLocaleString();
    
    try {
        var whatsappUrl = 'https://wa.me/' + driverPhone + '?text=' + encodeURIComponent(message);
        window.open(whatsappUrl, '_blank');
    } catch(e) {
        var simpleMessage = 'Location: ' + mapsLink;
        var fallbackUrl = 'https://wa.me/' + driverPhone + '?text=' + encodeURIComponent(simpleMessage);
        window.open(fallbackUrl, '_blank');
    }
}

function sendSimpleLocation() {
    var driverPhone = document.getElementById('driverPhone').value;
    if (!driverPhone) {
        alert('Please select a driver first!');
        return;
    }
    
    driverPhone = driverPhone.replace(/[^\d+]/g, '');
    if (!driverPhone.startsWith('+') && driverPhone.length === 8) {
        driverPhone = '961' + driverPhone;
    }
    
    var mapsLink = document.getElementById('mapsLink').value;
    var message = mapsLink;
    
    var whatsappUrl = 'https://wa.me/' + driverPhone + '?text=' + encodeURIComponent(message);
    window.open(whatsappUrl, '_blank');
}
</script>



<?php include 'footer.php';?>

<!-- jQuery and Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>




<script>
$(document).ready(function() {
    // Enhanced dropdown animations
    $('.dropdown').on('show.bs.dropdown', function() {
        $(this).find('.dropdown-menu').first().stop(true, true).slideDown(200);
    });
    
    $('.dropdown').on('hide.bs.dropdown', function() {
        $(this).find('.dropdown-menu').first().stop(true, true).slideUp(200);
    });
    
    // Add tooltips to buttons
    $('[title]').tooltip();
    
    // Focus on phone number field when page loads
    $('#bp').focus();
    
    console.log('jQuery initialized - Bootstrap dropdowns enhanced');
});
</script>

</body>
</html>
   