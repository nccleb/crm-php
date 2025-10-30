<?php
session_start();

// Initialize variables to avoid undefined index warnings
$os = isset($_SESSION["o"]) ? $_SESSION["o"] : "";
$ps = isset($_SESSION["p"]) ? $_SESSION["p"] : "";
$inc = "";

// Set cookie if parameter exists
if (isset($_GET["q"])) {
    $cookie_name = "hjk";
    $cookie_value = $_GET["q"];
    setcookie($cookie_name, $cookie_value, time() + (86400 * 3600), "/"); 
}

// Read XML file if it exists
$fichier = "CaCallStatus.dat";
if (file_exists($fichier)) {
    $xml = simplexml_load_file($fichier);
    if ($xml) {
        foreach ($xml as $CallRecord) {
            if (isset($CallRecord->CallerID)) {
                $inc = (string)$CallRecord->CallerID;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>p20</title>

<?php include('head.php'); ?>
  <link rel="stylesheet" href="css/stylei.css">
  <link rel="stylesheet" href="css/stylei2.css">
   
  <link rel="stylesheet" href="css/whatsappButton.css" />

  <script type="text/javascript" src="js/test371.js"></script>

</head>

<body>
  
<?php
// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Define required fields
    $required_fields = ['nu', 'na', 'lna'];
    
    // Check if required fields are present and not empty
    $missing_required = false;
    foreach ($required_fields as $field) {
        if (!isset($_POST[$field]) || empty(trim($_POST[$field]))) {
            $missing_required = true;
            break;
        }
    }
    
    if ($missing_required) {
        echo "<script>
        if (confirm('Missing required fields! Please fill in all required fields.')) {
            myw = window.open('http://192.168.16.103/test19.php?page=$os&page1=$ps&page2=$inc', '', 'menubar=0,resizable=1,width=600,height=800');
            setTimeout(function() { window.close(); }, 100);
        } else {
            setTimeout(function() { window.close(); }, 100);
        }
        </script>";
        exit();
    }

    function test_input($data) {
        if (!isset($data)) return '';
        $data = trim($data);    
        $data = trim($data, "/");
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // Process all form fields with default values for optional fields
    $nu = test_input($_POST['nu']);
    $inu = isset($_POST['inu']) ? test_input($_POST['inu']) : "";
    $na = test_input($_POST['na']);
    $lna = test_input($_POST['lna']);
    $em = isset($_POST['em']) ? test_input($_POST['em']) : ""; 
    $ur = isset($_POST['ur']) ? test_input($_POST['ur']) : ""; 
    $ad = isset($_POST['ad']) ? test_input($_POST['ad']) : "";
    $ad2 = isset($_POST['ad2']) ? test_input($_POST['ad2']) : "";
    $bu = isset($_POST['bu']) ? test_input($_POST['bu']) : "";
    $gra = isset($_POST['gra']) ? test_input($_POST['gra']) : "";
    $pay = isset($_POST['pay']) ? test_input($_POST['pay']) : "";
    $loy = isset($_POST['loy']) ? test_input($_POST['loy']) : "";
    $com = isset($_POST['com']) ? test_input($_POST['com']) : "";
    $cat = isset($_POST['cat']) ? test_input($_POST['cat']) : "";
    $source = isset($_POST['blog']) ? test_input($_POST['blog']) : "";
    $co = isset($_POST['co']) ? test_input($_POST['co']) : "";
    $jo = isset($_POST['job']) ? test_input($_POST['job']) : "";
    $ci = isset($_POST['cit']) ? test_input($_POST['cit']) : "";
    $st = isset($_POST['str']) ? test_input($_POST['str']) : "";
    $fl = isset($_POST['flo']) ? test_input($_POST['flo']) : "";
    $zo = isset($_POST['zon']) ? test_input($_POST['zon']) : ""; 
    $ne = isset($_POST['nea']) ? test_input($_POST['nea']) : "";
    $re = isset($_POST['rem']) ? test_input($_POST['rem']) : "";
    $bui = isset($_POST['bui']) ? test_input($_POST['bui']) : "";
    $tel = isset($_POST['tel']) ? test_input($_POST['tel']) : "";
    $oth = isset($_POST['oth']) ? test_input($_POST['oth']) : "";
    $apa = isset($_POST['apa']) ? test_input($_POST['apa']) : "";
    $driv = isset($_POST['driv']) ? test_input($_POST['driv']) : "";
    $delti = isset($_POST['delti']) ? test_input($_POST['delti']) : "";
    $filename = ""; // Initialize filename variable

    // Input validation with FIXED REGEX PATTERNS
    $validation_errors = [];
    
    // Fixed regex for names (Arabic and Latin characters)
    // Using mb_check_encoding for better Unicode support
    if (!mb_check_encoding($na, 'UTF-8')) {
        $validation_errors[] = "Invalid First name encoding!";
    } elseif (!preg_match("/^[0-9a-zA-Z'?!=;~+%`\[\]()$*\"|:.,#&_\s\-\x{0600}-\x{06FF}\x{0750}-\x{077F}\x{08A0}-\x{08FF}\x{FB50}-\x{FDFF}\x{FE70}-\x{FEFF}]*$/u", $na)) {
        $validation_errors[] = "Invalid First name format!";
    }

    if (!mb_check_encoding($lna, 'UTF-8')) {
        $validation_errors[] = "Invalid Last name encoding!";
    } elseif (!preg_match("/^[0-9a-zA-Z'?!=;~+%`\[\]()$*\"|:.,#&_\s\-\x{0600}-\x{06FF}\x{0750}-\x{077F}\x{08A0}-\x{08FF}\x{FB50}-\x{FDFF}\x{FE70}-\x{FEFF}]*$/u", $lna)) {
        $validation_errors[] = "Invalid Last name format!";
    }

    // Fixed regex for numbers - more specific
    if (!preg_match("/^\d*$/", $nu)) {
        $validation_errors[] = "Invalid Number format!";
    }

    if (!empty($inu) && !preg_match("/^\d*$/", $inu)) {
        $validation_errors[] = "Invalid Office Number format!";
    }

    // Enhanced email validation
    if (!empty($em)) {
        if (!filter_var($em, FILTER_VALIDATE_EMAIL)) {
            $validation_errors[] = "Invalid Email format!";
        }
    }

    // Enhanced URL validation
    if (!empty($ur)) {
        // Allow URLs without protocol
        $url_to_check = $ur;
        if (!preg_match("/^https?:\/\//i", $url_to_check)) {
            $url_to_check = "http://" . $url_to_check;
        }
        if (!filter_var($url_to_check, FILTER_VALIDATE_URL)) {
            $validation_errors[] = "Invalid URL format!";
        }
    }

    // Additional phone number validations
    if (!empty($tel) && !preg_match("/^\d*$/", $tel)) {
        $validation_errors[] = "Invalid Mobile Phone format!";
    }

    if (!empty($oth) && !preg_match("/^\d*$/", $oth)) {
        $validation_errors[] = "Invalid Other Phone format!";
    }

    // If there are validation errors, display them
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
        echo "<button type='button' onclick='window.close()'>Quit</button>";
        echo "</div>";
        exit();
    }

    // Database connection
    $idr = mysqli_connect("192.168.16.103", "root", "1Sys9Admeen72", "nccleb_test");
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }

    // Check for duplicate numbers
    $stmt = $idr->prepare("SELECT * FROM client");
    if (!$stmt) {
        echo "Prepare failed: " . $idr->error;
        exit();
    }
    
    $stmt->execute();
    $result = $stmt->get_result();

    $duplicate_found = false;
    while ($lig = $result->fetch_assoc()) {
        if ($nu != "" && ($nu == $lig['number'] || $nu == $lig['inumber'] || $nu == $lig['telmobile'] || $nu == $lig['telother'])) {
            $duplicate_found = true;
            break;
        }
        
        if ($inu != "" && ($inu == $lig['number'] || $inu == $lig['inumber'] || $inu == $lig['telmobile'] || $inu == $lig['telother'])) {
            $duplicate_found = true;
            break;
        }
        
        if ($tel != "" && ($tel == $lig['number'] || $tel == $lig['inumber'] || $tel == $lig['telmobile'] || $tel == $lig['telother'])) {
            $duplicate_found = true;
            break;
        }
        
        if ($oth != "" && ($oth == $lig['number'] || $oth == $lig['inumber'] || $oth == $lig['telmobile'] || $oth == $lig['telother'])) {
            $duplicate_found = true;
            break;
        }
    }
    
    if ($duplicate_found) {
        echo "<script>alert('Duplicate phone number found!'); window.close();</script>";
        exit();
    }

    // Insert new record
    $stmt = $idr->prepare("INSERT INTO client (nom, prenom, filename, category, source, company, job, number, inumber, email, url, business, grade, payment, card, community, telmobile, telother, city, street, apartment, building, zone, floor, near, remark, address, address_two, best_delivery_time, idf, idx) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    if (!$stmt) {
        echo "<p style='color:red;font-size:20px;'>Prepare failed: " . $idr->error . "</p>";
        echo "<button type='button' onclick='window.close()'>Quit</button>";
        exit();
    }

    $stmt->bind_param("sssssssssssssssssssssssisssssii", $na, $lna, $filename, $cat, $source, $co, $jo, $nu, $inu, $em, $ur, $bu, $gra, $pay, $loy, $com, $tel, $oth, $ci, $st, $apa, $bui, $zo, $fl, $ne, $re, $ad, $ad2, $delti, $ps, $driv);
    
    if ($stmt->execute()) {
        // Get the inserted ID
        $new_id = $stmt->insert_id;
        $stmt->close();
        
        echo "<p id='p' style='color:green;font-size:20px;'>Data successfully inserted! Record ID: $new_id</p>";
        echo "<a href='test19.php?page=$os&page1=$ps'>INSERT AGAIN</a><br/>";
        echo "<button type='button' onclick='window.close()'>Quit</button>";
    } else {
        echo "<p style='color:red;font-size:20px;'>Error inserting data: " . $idr->error . "</p>";
        echo "<button type='button' onclick='window.close()'>Quit</button>";
    }

    mysqli_close($idr);
} else {
    echo "<script>
    if (confirm('No form data submitted!')) {
        window.close();
    } else {
        window.close();
    }
    </script>";
}
?>
</body>
</html>