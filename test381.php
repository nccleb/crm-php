<?php
session_start();

// Validate session variables
$os = isset($_SESSION["o"]) ? $_SESSION["o"] : '';
$ps = isset($_SESSION["p"]) ? $_SESSION["p"] : '';
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

<body>
<?php
// Input validation function
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    return $data;
}

// Check if form was submitted
if (isset($_POST['na']) && !empty($_POST['na'])) {
    
    $na = test_input($_POST['na']);
    
    // Validate input is not just whitespace
    if (empty($na)) {
        showError("Comment cannot be empty!");
        exit();
    }
    
    // Check minimum length
    if (strlen($na) < 3) {
        showError("Comment must be at least 3 characters long!");
        exit();
    }
    
    // Check maximum length
    if (strlen($na) > 500) {
        showError("Comment is too long! Maximum 500 characters allowed.");
        exit();
    }
    
    // Improved regex pattern for validation
    // Allows letters, numbers, common punctuation, spaces, and Arabic text
    if (!preg_match("/^[\p{L}\p{N}\p{P}\p{S}\s]+$/u", $na)) {
        showError("Invalid comment format! Only letters, numbers, punctuation, and spaces are allowed.");
        exit();
    }
    
    // Database connection
    $idr = mysqli_connect("192.168.16.103", "root", "1Sys9Admeen72", "nccleb_test");
    if (mysqli_connect_errno()) {
        showError("Failed to connect to MySQL: " . mysqli_connect_error());
        exit();
    }
    
    // Check for duplicates using prepared statement (more efficient)
    $checkStmt = $idr->prepare("SELECT COUNT(*) as count FROM comments WHERE comment_text = ?");
    if (!$checkStmt) {
        showError("Database error: " . mysqli_error($idr));
        exit();
    }
    
    $checkStmt->bind_param("s", $na);
    $checkStmt->execute();
    $result = $checkStmt->get_result();
    $row = $result->fetch_assoc();
    $checkStmt->close();
    
    if ($row['count'] > 0) {
        showError("Duplicate complaint! This comment already exists.", true);
        exit();
    }
    
    // Insert new comment
    $insertStmt = $idr->prepare("INSERT INTO comments (comment_text, comment_status) VALUES (?, 0)");
    if (!$insertStmt) {
        showError("Database error: " . mysqli_error($idr));
        exit();
    }
    
    $insertStmt->bind_param("s", $na);
    
    if ($insertStmt->execute()) {
        $insertStmt->close();
        mysqli_close($idr);
        
        // Success message
        echo "<p id=\"p\" style=\"color:green;font-size:24px\">✓ Comment inserted successfully!</p>";
        
        if (!empty($os) && !empty($ps)) {
            echo "<a href=\"test380.php?page=" . urlencode($os) . "&page1=" . urlencode($ps) . "\">
                    <button id=\"form\">Insert Another Comment</button>
                  </a>";
        } else {
            echo "<a href=\"test380.php\"><button id=\"form\">Insert Another Comment</button></a>";
        }
        
        echo "<button id=\"id\" type=\"button\" onclick=\"quit()\">Quit</button>";
        
    } else {
        $error = mysqli_error($idr);
        $insertStmt->close();
        mysqli_close($idr);
        showError("Failed to insert comment: " . $error);
    }
    
} else {
    // No input provided
    echo "<script>alert('Missing Entry! Please provide a comment.');</script>";
    
    if (!empty($os) && !empty($ps)) {
        echo "<script>location.replace('test380.php?page=" . urlencode($os) . "&page1=" . urlencode($ps) . "');</script>";
    } else {
        echo "<script>location.replace('test380.php');</script>";
    }
    exit();
}

// Error display function
function showError($message, $showRetryButton = true) {
    global $os, $ps;
    
    echo "<p style=\"color:red;font-size:28px\">✗ " . htmlspecialchars($message) . "</p>";
    
    if ($showRetryButton) {
        if (!empty($os) && !empty($ps)) {
            echo "<a href=\"test380.php?page=" . urlencode($os) . "&page1=" . urlencode($ps) . "\">
                    <button id=\"form\">Try Again</button>
                  </a>";
        } else {
            echo "<a href=\"test380.php\"><button id=\"form\">Try Again</button></a>";
        }
    }
    
    echo "<button id=\"id\" type=\"button\" onclick=\"quit()\">Quit</button>";
}
?>

</body>
</html>