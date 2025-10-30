<?php
session_start();

$s = $_SESSION["ses"];
$C = $_COOKIE["user"];
$o = $_GET['page1'];
$_SESSION["o"] = $o;
$p = $_GET['page'];
$_SESSION["p"] = $p;
$num9 = urldecode($_GET['page2']);
$contact = urldecode($_GET['page3']);
?>

<!DOCTYPE html>
<html>
<head>
    <?php include('head.php'); ?>
    <link rel="stylesheet" href="css/stylei.css">
    <link rel="stylesheet" href="css/stylei2.css">
    <link rel="stylesheet" href="css/whatsappButton.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/test371.js"></script>
</head>

<body>
<div class="jumboltron">
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">ADD-CRM</a>
            </div>
        </div>
    </nav>

    <div class="jumbotron">  
        <table>
            <tr>
                <td valign="top">  
                    <form method="post" action="<?php echo htmlspecialchars("test57.php"); ?>" id="form1">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Contact</label>
                            <input type="text" class="form-control" id="bp" placeholder="" value="<?php echo $contact ?>" name="id" id="id">
                        </div><br>

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Ticket Name</label>
                            <input type="text" class="form-control" placeholder="" value="<?php ?>" name="ta" id="ta">
                        </div><br>

                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Last Activity</label>
                            <textarea class="form-control" id="la" rows="3" name="la"></textarea>
                        </div><br>

                        <h5><strong>Complaints</strong></h5>

                        <?php
                        $idr = mysqli_connect("192.168.16.103", "root", "1Sys9Admeen72", "nccleb_test");
                        if (mysqli_connect_errno()) {
                            echo "Failed to connect to MySQL: " . mysqli_connect_error();
                            exit();
                        }
                        $req11 = @mysqli_query($idr, "SELECT * FROM comments ORDER BY id_co ASC");
                        $req12 = @mysqli_query($idr, "SELECT COUNT(id_co) AS arr FROM comments");
                        $lig = @mysqli_fetch_assoc($req12);
                        
                        for ($i = 1; $i <= $lig["arr"]; $i++) {
                            $lig1 = @mysqli_fetch_assoc($req11);
                            $_SESSION["$i"] = $lig1["comment_text"];
                            
                            echo "<div class=\"form-check\">
                                <input class=\"form-check-input complaint-radio\" type=\"radio\" name=\"in\" value='" . $_SESSION["$i"] . "' id=\"complaint_$i\">
                                <label class=\"form-check-label\" for=\"complaint_$i\">" . $_SESSION["$i"] . "</label>
                            </div>";
                        }
                        ?>
                        
                        <div class="form-check">
                            <input class="form-check-input complaint-radio" type="radio" name="in" value="other" id="flexRadioDefault11">
                            <label class="form-check-label" for="flexRadioDefault11">Other</label>
                        </div>
                        <br>
                        
                        <div id="other-complaint-container" style="display: none;">
                            <div class="mb-3">
                                <label for="other-complaint" class="form-label">Specify Other Complaint</label>
                                <input type="text" class="form-control" id="other-complaint" name="other_complaint" placeholder="Enter your complaint">
                            </div>
                        </div>
                        
                        <div id="pi"></div>

                        <p>Priority
                        <select class="form-control" name="pr">
                            <option value="" selected>Select something...</option>
                            <option>Low</option>
                            <option>Medium</option>
                            <option>High</option>
                        </select>
                        </p><br>

                        <h4><b>Status</b></h4>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="st" value="Not Resolved" id="flexRadioDefault3">
                            <label class="form-check-label" for="flexRadioDefault3">Not Resolved</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="st" value="In Progress" id="flexRadioDefault2">
                            <label class="form-check-label" for="flexRadioDefault2">In Progress</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" checked name="st" value="Resolved" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">Resolved</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="st" value="Closed" id="flexRadioDefault4">
                            <label class="form-check-label" for="flexRadioDefault4">Closed</label>
                        </div>

                        <input type="hidden" id="nd" value="<?php echo $s ?>">
                        <input class="btn btn-success" type="submit" value="Add" id="form">&nbsp;
                        <button class="btn btn-success" type="button" id="form" onclick="quit()">Quit</button>
                    </form><br/><br/>
                </td>
                <td></td>
            </tr>
        </table>
    </div>
</div>

<script>
// Handle the complaint radio button changes
$(document).ready(function() {
    // When any complaint radio button is changed
    $('.complaint-radio').change(function() {
        if ($(this).val() === 'other') {
            // Show the other complaint input field
            $('#other-complaint-container').show();
        } else {
            // Hide the other complaint input field
            $('#other-complaint-container').hide();
            $('#other-complaint').val(''); // Clear the other complaint field
        }
    });
    
    // Check if other was previously selected (after form submission with errors)
    if ($('input[name="in"]:checked').val() === 'other') {
        $('#other-complaint-container').show();
    }
});

// Function to handle form submission
function prepareForm() {
    // If "other" is selected, set its value to the custom input
    if ($('input[name="in"]:checked').val() === 'other') {
        // Create a hidden field to pass the other complaint value
        $('<input>').attr({
            type: 'hidden',
            name: 'in',
            value: $('#other-complaint').val()
        }).appendTo('#form1');
    }
}

// Attach the function to form submission
$('#form1').submit(function() {
    prepareForm();
    return true; // Allow form submission to continue
});

// Original post function (kept for compatibility)
function post() {
    var xhttp;
    if (window.XMLHttpRequest) {
        xhttp = new XMLHttpRequest();
    } else {
        xhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("pi").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "test375.php", true);
    xhttp.send();
}
</script>
</body>
</html>