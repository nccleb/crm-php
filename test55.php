<?php
session_start();

// Initialize session variables with proper checks
$id = isset($_SESSION["id"]) ? $_SESSION["id"] : "";
$idf = isset($_SESSION["idf"]) ? $_SESSION["idf"] : "";
$naa = isset($_SESSION["naa"]) ? $_SESSION["naa"] : "";
$inc = isset($_SESSION["q"]) ? $_SESSION["q"] : "";
$incc = isset($_SESSION["a3"]) ? $_SESSION["a3"] : "";

// Handle cookies safely with isset checks
if (isset($_GET["q"])) {
    $cookie_name = "enu";
    $cookie_value = $_GET["q"];
    setcookie($cookie_name, $cookie_value, time() + (86400 * 3600), "/");
}
$tes = isset($_COOKIE["enu"]) ? $_COOKIE["enu"] : "";

if (isset($_GET["qq"])) {
    $cookie_name = "enu2";
    $cookie_value = $_GET["qq"];
    setcookie($cookie_name, $cookie_value, time() + (86400 * 3600), "/");
}
$tes2 = isset($_COOKIE["enu2"]) ? $_COOKIE["enu2"] : "";

if (isset($_GET["qqq"])) {
    $cookie_name = "enu3";
    $cookie_value = $_GET["qqq"];
    setcookie($cookie_name, $cookie_value, time() + (86400 * 3600), "/");
}
$tes3 = isset($_COOKIE["enu3"]) ? $_COOKIE["enu3"] : "";

// Handle POST cookies safely
if (isset($_POST['nu'])) {
    $cookie_name = "nu";
    $cookie_value = $_POST['nu'];
    setcookie($cookie_name, $cookie_value, time() + (86400 * 3600), "/");
}

if (isset($_POST['inu'])) {
    $cookie_name = "inu";
    $cookie_value = $_POST['inu'];
    setcookie($cookie_name, $cookie_value, time() + (86400 * 3600), "/");
}

if (isset($_POST['tel'])) {
    $cookie_name = "tel";
    $cookie_value = $_POST['tel'];
    setcookie($cookie_name, $cookie_value, time() + (86400 * 3600), "/");
}

if (isset($_POST['oth'])) {
    $cookie_name = "oth";
    $cookie_value = $_POST['oth'];
    setcookie($cookie_name, $cookie_value, time() + (86400 * 3600), "/");
}

if (isset($_POST['ur'])) {
    $cookie_name = "url";
    $cookie_value = $_POST['ur'];
    setcookie($cookie_name, $cookie_value, time() + (86400 * 3600), "/");
}

// Session variables with checks
$snu = isset($_SESSION["nu"]) ? $_SESSION["nu"] : "";
$sinu = isset($_SESSION["inu"]) ? $_SESSION["inu"] : "";
$stel = isset($_SESSION["tel"]) ? $_SESSION["tel"] : "";
$soth = isset($_SESSION["oth"]) ? $_SESSION["oth"] : "";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('head.php'); ?>
<style>
#id{
background:lightgrey;
color:#303030;
border-color:lightblue;
}
#id1{
color:green;
}

#form{
	color:blue;
}
#fo{
	color:#303030;
}
#zp{
	color:red;
}

#uv {
font-family: Verdana, Geneva, sans-serif;
color: white;
border-style: none;
vertical-align: center;
text-align: center;
}

#uv1 {
font-family: Verdana, Geneva, sans-serif;
color: blue;
border-style: none;
vertical-align: center;
text-align: center;
}

#av{
  color:white;
background:#A9A9A9;
}
</style>	

<script>
function quit(){
	window.close();
}

function size(){
	window.resizeTo(600,900);
}

function add(){
	var myw;
	myw=window.open ("http://192.168.16.103/test275.php?page=<?php echo urlencode($naa) ?>&page1=<?php echo urlencode($idf)?>&page2=<?php echo urlencode($inc) ?>","","menubar=0,resizable=1,width=680,height=950");
}
</script>
</head>

<body onload="size()">

<div class="container text-center">
<?php
// Check if all required POST fields are present
$required_fields = ['nu', 'na', 'lna', 'company', 'inu', 'tel', 'oth', 'ur', 'bu', 'ad', 'ad2', 'em',
                   'cit', 'str', 'flo', 'delti', 'bui', 'zon', 'nea', 'rem', 'apa', 'grad', 'driver',
                   'pay', 'loy', 'disa', 'job', 'cat', 'src', 'community'];

$all_fields_present = true;
foreach ($required_fields as $field) {
    if (!isset($_POST[$field])) {
        $all_fields_present = false;
        break;
    }
}

if ($all_fields_present) {
    // Improved input sanitization function
    function test_input($data) {
        if (!isset($data)) return '';
        $data = trim($data);
        $data = trim($data, "/");
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // Process form data
    $nu = test_input($_POST['nu']);
    $photo = isset($_POST['pho']) ? test_input($_POST['pho']) : "";
    $inu = test_input($_POST['inu']);
    $na = test_input($_POST['na']);
    $lna = test_input($_POST['lna']);
    $em = test_input($_POST['em']);
    $ur = test_input($_POST['ur']);
    $ad = test_input($_POST['ad']);
    $ad2 = test_input($_POST['ad2']);
    $bu = test_input($_POST['bu']);
    $cat = test_input($_POST['cat']);
    $src = test_input($_POST['src']);
    $company = test_input($_POST['company']);
    $jo = test_input($_POST['job']);
    $ci = test_input($_POST['cit']);
    $st = test_input($_POST['str']);
    $fl = test_input($_POST['flo']);
    $bui = test_input($_POST['bui']);
    $zo = test_input($_POST['zon']);
    $ne = test_input($_POST['nea']);
    $re = test_input($_POST['rem']);
    $tel = test_input($_POST['tel']);
    $oth = test_input($_POST['oth']);
    $apa = test_input($_POST['apa']);
    $gra = test_input($_POST['grad']);
    $pay = test_input($_POST['pay']);
    $loy = test_input($_POST['loy']);
    $community = test_input($_POST['community']);
    $driv = test_input($_POST['driver']);
    $disa = test_input($_POST['disa']);
    $delti = test_input($_POST['delti']);

    // Initialize validation errors array
    $validation_errors = [];

    // FIXED VALIDATION PATTERNS - Using Unicode ranges instead of \p{Arabic}
    $arabic_pattern = "/^[0-9a-zA-Z'?!=;~+%`\[\]()$*\"|:.,#&_\s\-\x{0600}-\x{06FF}\x{0750}-\x{077F}\x{08A0}-\x{08FF}\x{FB50}-\x{FDFF}\x{FE70}-\x{FEFF}]*$/u";
    $simple_arabic_pattern = "/^[0-9a-zA-Z.,\s\x{0600}-\x{06FF}\x{0750}-\x{077F}\x{08A0}-\x{08FF}\x{FB50}-\x{FDFF}\x{FE70}-\x{FEFF}]*$/u";
    $number_pattern = "/^\d*$/";

    // Validate First Name
    if (!mb_check_encoding($na, 'UTF-8')) {
        $validation_errors[] = "Invalid First name encoding!";
    } elseif (!preg_match($arabic_pattern, $na)) {
        $validation_errors[] = "Invalid First name format!";
    }

    // Validate Photo filename
    if (!empty($photo) && !mb_check_encoding($photo, 'UTF-8')) {
        $validation_errors[] = "Invalid filename encoding!";
    } elseif (!empty($photo) && !preg_match($arabic_pattern, $photo)) {
        $validation_errors[] = "Invalid filename format!";
    }

    // Validate Last Name
    if (!mb_check_encoding($lna, 'UTF-8')) {
        $validation_errors[] = "Invalid Last name encoding!";
    } elseif (!preg_match($arabic_pattern, $lna)) {
        $validation_errors[] = "Invalid Last name format!";
    }

    // Validate Numbers
    if (!preg_match($number_pattern, $nu)) {
        $validation_errors[] = "Invalid Number format!";
    }

    if (!preg_match($number_pattern, $inu)) {
        $validation_errors[] = "Invalid Office Number format!";
    }

    // Validate Email
    if (!empty($em) && !filter_var($em, FILTER_VALIDATE_EMAIL)) {
        $validation_errors[] = "Invalid Email format!";
    }

    // Validate URL
    if (!empty($ur)) {
        $url_to_check = $ur;
        if (!preg_match("/^https?:\/\//i", $url_to_check)) {
            $url_to_check = "http://" . $url_to_check;
        }
        if (!filter_var($url_to_check, FILTER_VALIDATE_URL)) {
            $validation_errors[] = "Invalid URL format!";
        }
    }

    // Validate text fields with Arabic support
    $text_fields = [
        'cat' => 'Category',
        'src' => 'Source', 
        'company' => 'Company',
        'jo' => 'Job',
        'ad' => 'Address',
        'ad2' => 'Address 2',
        'bu' => 'Business',
        'ci' => 'City',
        'st' => 'Street',
        'fl' => 'Floor',
        'bui' => 'Building',
        'zo' => 'Zone',
        'ne' => 'Near',
        're' => 'Remark',
        'apa' => 'Apartment',
        'delti' => 'Delivery Time'
    ];

    foreach ($text_fields as $field => $label) {
        $value = ${$field};
        if (!empty($value)) {
            if (!mb_check_encoding($value, 'UTF-8')) {
                $validation_errors[] = "Invalid $label encoding!";
            } elseif (!preg_match($arabic_pattern, $value)) {
                $validation_errors[] = "Invalid $label format!";
            }
        }
    }

    // Validate simple fields
    $simple_fields = [
        'tel' => 'Mobile Phone',
        'oth' => 'Other Phone',
        'gra' => 'Grade',
        'pay' => 'Payment',
        'loy' => 'Loyalty Card',
        'community' => 'Community',
        'driv' => 'Driver'
    ];

    foreach ($simple_fields as $field => $label) {
        $value = ${$field};
        if (!empty($value)) {
            if (!mb_check_encoding($value, 'UTF-8')) {
                $validation_errors[] = "Invalid $label encoding!";
            } elseif (!preg_match($simple_arabic_pattern, $value)) {
                $validation_errors[] = "Invalid $label format!";
            }
        }
    }

    // Display validation errors if any
    if (!empty($validation_errors)) {
        echo "<div style='color:red;font-size:20px;'>";
        echo "<p>Validation Errors:</p>";
        echo "<ul>";
        foreach ($validation_errors as $error) {
            echo "<li>" . htmlspecialchars($error) . "</li>";
        }
        echo "</ul>";
        echo "<p style='font-size:14px;'>Debug Info:</p>";
        echo "<p style='font-size:12px;'>PHP Version: " . PHP_VERSION . "</p>";
        echo "<p style='font-size:12px;'>PCRE Version: " . PCRE_VERSION . "</p>";
        echo "<button type='button' onclick='quit()'>Quit</button>";
        echo "</div>";
        exit();
    }

    // Set city cookie
    if (isset($_POST['cit'])) {
        $cookie_name = "city";
        $cookie_value = $_POST['cit'];
        setcookie($cookie_name, $cookie_value, time() + (86400 * 360), "/");
    }

    // Database connection
    $idr = mysqli_connect("192.168.16.103", "root", "1Sys9Admeen72", "nccleb_test");
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }

    // Set charset for Unicode support
    mysqli_set_charset($idr, "utf8mb4");

    // Get existing client data
    $stmt = $idr->prepare("SELECT * FROM client WHERE (number=? OR inumber=? OR telmobile=? OR telother=?)");
    if (!$stmt) {
        echo "Database prepare error: " . mysqli_error($idr);
        exit();
    }

    $stmt->bind_param("ssss", $nu, $nu, $nu, $nu);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    $inum = $telmobile = $telother = $idt = "";
    while($row = $result->fetch_assoc()) {
        $inum = $row['inumber'];
        $telmobile = $row['telmobile'];
        $telother = $row['telother'];
        $idt = $row['id'];
    }

    // Check for duplicate numbers
    $req6 = mysqli_query($idr, "SELECT number, inumber, telmobile, telother FROM client");
    if ($req6) {
        while($lig = mysqli_fetch_assoc($req6)) {
            // Check duplicate for tes (enu cookie)
            if (!empty($tes)) {
                if ($tes == $lig['number'] || $tes == $lig['inumber'] || 
                    $tes == $lig['telmobile'] || $tes == $lig['telother']) {
                    echo "<script>alert('Duplicate Number2!');</script>";
                    echo "<script>location.replace('http://192.168.16.103/test275.php?page=" . urlencode($naa) . "&page1=" . urlencode($idf) . "&page2=" . urlencode($inc) . "');</script>";
                    exit();
                }
            }

            // Check duplicate for tes2 (enu2 cookie)
            if (!empty($tes2)) {
                if ($tes2 == $lig['number'] || $tes2 == $lig['inumber'] || 
                    $tes2 == $lig['telmobile'] || $tes2 == $lig['telother']) {
                    echo "<script>alert('Duplicate Number3!');</script>";
                    echo "<script>location.replace('http://192.168.16.103/test275.php?page=" . urlencode($naa) . "&page1=" . urlencode($idf) . "&page2=" . urlencode($inc) . "');</script>";
                    exit();
                }
            }

            // Check duplicate for tes3 (enu3 cookie)
            if (!empty($tes3)) {
                if ($tes3 == $lig['number'] || $tes3 == $lig['inumber'] || 
                    $tes3 == $lig['telmobile'] || $tes3 == $lig['telother']) {
                    echo "<script>alert('Duplicate Number4!');</script>";
                    echo "<script>location.replace('http://192.168.16.103/test275.php?page=" . urlencode($naa) . "&page1=" . urlencode($idf) . "&page2=" . urlencode($inc) . "');</script>";
                    exit();
                }
            }
        }
    }

    // Get driver information
    $req11 = mysqli_query($idr, "SELECT * FROM drivers ORDER BY idx ASC");
    $req12 = mysqli_query($idr, "SELECT COUNT(idx) as arr FROM drivers");
    
    if ($req12) {
        $lig = mysqli_fetch_assoc($req12);
        $driver_count = $lig["arr"];
        
        for ($i = 1; $i <= $driver_count; $i++) {
            if ($req11) {
                $lig1 = mysqli_fetch_assoc($req11);
                if ($lig1) {
                    $_SESSION["$i"] = $lig1["name_d"];
                    if ($_SESSION["$i"] == $driv) {
                        $driv = $i;
                    }
                }
            }
        }
    }

    // Set filename
    $filename = "";
    if (empty($filename)) {
        $filename = $photo;
    }

    // Update client record
    $test = 0;
    if ($id == $idt) {
        $stmt = $idr->prepare("UPDATE client SET nom=?, prenom=?, filename=?, category=?, source=?, company=?, job=?, number=?, inumber=?, email=?, business=?, grade=?, payment=?, card=?, community=?, telmobile=?, telother=?, url=?, city=?, street=?, floor=?, apartment=?, building=?, zone=?, near=?, remark=?, address=?, address_two=?, best_delivery_time=?, idx=? WHERE id=?");
        
        if (!$stmt) {
            echo "Database prepare error: " . mysqli_error($idr);
            exit();
        }

        $stmt->bind_param("ssssssssssssssssssssissssssssii", 
            $na, $lna, $filename, $cat, $src, $company, $jo, $nu, $inu, $em, 
            $bu, $gra, $pay, $loy, $community, $tel, $oth, $ur, $ci, $st, 
            $fl, $apa, $bui, $zo, $ne, $re, $ad, $ad2, $delti, $driv, $id);
        
        if ($stmt->execute()) {
            $test = mysqli_affected_rows($idr);
        } else {
            echo "Update error: " . $stmt->error;
        }
        $stmt->close();
    }

    // Handle results
    if ($test == 0) {
        echo "<script>
        var r = confirm('Missing Entry! Press OK to retry');
        if (r == true) {
            location.replace('http://192.168.16.103/test275.php?page=" . urlencode($naa) . "&page1=" . urlencode($idf) . "&page2=" . urlencode($incc) . "');
        } else {
            window.close();
        }
        </script>";
    } elseif ($test > 0) {
        echo "<p id='form' style='color:green;'>Data is well updated!</p>";
    } else {
        echo "<p id='form' style='color:red;'>Data is not updated!</p>";
    }

    echo "<button id='form' type='button' onclick='add()'>TRY AGAIN</button>";
    echo "<button id='form' type='button' onclick='quit()'>Quit</button>";

    // Handle photo cookie
    if (isset($size) && $size == 0 && !empty($photo)) {
        $filename = $photo;
        $cookie_name = "pho";
        $cookie_value = $photo;
        setcookie($cookie_name, $cookie_value, time() + (86400 * 3600), "/");
    }

    mysqli_close($idr);

} else {
    echo "<script>alert('Missing Entry1!');</script>";
    echo "<script>location.replace('numbersearch.php');</script>";
}
?>
</div>
</body>
</html>