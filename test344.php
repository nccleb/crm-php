<?php
session_start();

// Initialize session variables with default values
$idf = isset($_SESSION["idf"]) ? $_SESSION["idf"] : "";
$nam = isset($_SESSION["nam"]) ? $_SESSION["nam"] : "";
$idc = isset($_SESSION["idc"]) ? $_SESSION["idc"] : "";
$p = isset($_SESSION["pg"]) ? $_SESSION["pg"] : "";
$aidf = isset($_SESSION["aidf"]) ? $_SESSION["aidf"] : "";
$anam = isset($_SESSION["anam"]) ? $_SESSION["anam"] : "";

// Initialize form variables
$user = $fuser = $lcd = $agent = $status = $incident = $ta = $la = $pr = "";
?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php include('head.php'); ?>
<link rel="stylesheet" href="stylei.css">

<script>
function quit(){
    window.close();
}

function size(){
    window.resizeTo(600,900);
}
</script>

<style>
* {
    box-sizing: border-box;
}

@media only screen and (max-width: 2400px) {
    body {
        background-color: lightblue;
    }
}

#form{
    color:blue;
}

#for{
    color:red;
}

.container {
    padding: 20px;
    text-align: center;
}
</style>
</head>

<body onload="">
<div class="container text-center">
<?php
// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data with proper initialization
    $user = isset($_POST['user']) ? $_POST['user'] : "";
    $fuser = isset($_POST['fuser']) ? $_POST['fuser'] : "";
    $lcd = isset($_POST['lcd']) ? $_POST['lcd'] : "";
    $agent = isset($_POST['agent']) ? $_POST['agent'] : "";
    $status = isset($_POST['status']) ? $_POST['status'] : "";
    $incident = isset($_POST['incident']) ? $_POST['incident'] : "";
    $ta = isset($_POST['text']) ? $_POST['text'] : "";
    $la = isset($_POST['la']) ? $_POST['la'] : "";
    $pr = isset($_POST['pr']) ? $_POST['pr'] : "";

    // Basic cleaning of input data
    function clean_input($data) {
        if (!isset($data)) return '';
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    $user = clean_input($user);
    $fuser = clean_input($fuser);
    $lcd = clean_input($lcd);
    $agent = clean_input($agent);
    $status = clean_input($status);
    $incident = clean_input($incident);
    $ta = clean_input($ta);
    $la = clean_input($la);
    $pr = clean_input($pr);

    // Validate required fields
    if (empty($user) || empty($lcd) || empty($status) || empty($la) || empty($incident) || empty($ta) || empty($agent) || empty($pr)) {
        echo "<script>alert('Missing required fields!')</script>";
        echo "<script>location.replace('test264.php?page=$aidf&page1=$anam')</script>";
        exit();
    }

    // Database connection
    $idr = mysqli_connect("192.168.16.103", "root", "1Sys9Admeen72", "nccleb_test");
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }

    // Check if record exists
    $stmt = $idr->prepare("SELECT * FROM client c, crm d WHERE c.id = d.id AND idc = ?");
    $stmt->bind_param("i", $idc);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    if ($result->num_rows > 0) {
        // Update record
        $stmt = $idr->prepare("UPDATE crm SET task = ?, status = ?, la = ?, incident = ?, priority = ?, lcd = ?, idfc = ? WHERE idc = ?");
        $stmt->bind_param("sssssssi", $ta, $status, $la, $incident, $pr, $lcd, $agent, $idc);
        
        if ($stmt->execute()) {
            $affected_rows = $stmt->affected_rows;
            $stmt->close();
            
            if ($affected_rows > 0) {
                echo "<p id='form'>Data is updated successfully!</p>";
            } else {
                echo "<p id='for'>No changes were made to the data!</p>";
            }
        } else {
            echo "<p id='for'>Error updating data: " . $idr->error . "</p>";
        }
    } else {
        echo "<p id='for'>Record not found!</p>";
    }

    mysqli_close($idr);
} else {
    echo "<script>alert('No form data submitted!')</script>";
    echo "<script>location.replace('test264.php?page=$aidf&page1=$anam')</script>";
    exit();
}
?>

<button id="form" type="button" onclick="quit()">Quit</button>
<button id="form" type="button" onclick="window.location='test264.php?page=<?php echo $aidf; ?>&page1=<?php echo $anam; ?>'">Repeat</button>

</div>
</body>
</html>