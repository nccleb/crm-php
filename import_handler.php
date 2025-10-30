<?php
session_start();
header('Content-Type: application/json');

// Database connection
$host = "localhost";
$user = "root";
$pass = "1Sys9Admeen72";
$db = "nccleb_test";

$response = ['success' => false, 'message' => '', 'count' => 0];

try {
    $idr = mysqli_connect($host, $user, $pass, $db);
    
    if (mysqli_connect_errno()) {
        throw new Exception("Database connection failed: " . mysqli_connect_error());
    }
    
    if ($_POST['action'] === 'import_csv') {
        $data = json_decode($_POST['data'], true);
        
        if (!is_array($data) || empty($data)) {
            throw new Exception("No data to import");
        }
        
        $successCount = 0;
        $errorCount = 0;
        
        foreach ($data as $row) {
            // Prepare values with defaults
            $nom = mysqli_real_escape_string($idr, $row['nom'] ?? '');
            $prenom = mysqli_real_escape_string($idr, $row['prenom'] ?? '');
            $category = mysqli_real_escape_string($idr, $row['category'] ?? '');
            $source = mysqli_real_escape_string($idr, $row['source'] ?? '');
            $grade = mysqli_real_escape_string($idr, $row['grade'] ?? 'regular');
            $payment = mysqli_real_escape_string($idr, $row['payment'] ?? '');
            $card = mysqli_real_escape_string($idr, $row['card'] ?? '');
            $community = mysqli_real_escape_string($idr, $row['community'] ?? '');
            $company = mysqli_real_escape_string($idr, $row['company'] ?? '');
            $job = mysqli_real_escape_string($idr, $row['job'] ?? '');
            $number = mysqli_real_escape_string($idr, $row['number'] ?? '');
            $inumber = mysqli_real_escape_string($idr, $row['inumber'] ?? '');
            $telmobile = mysqli_real_escape_string($idr, $row['telmobile'] ?? '');
            $telother = mysqli_real_escape_string($idr, $row['telother'] ?? '');
            $email = mysqli_real_escape_string($idr, $row['email'] ?? '');
            $url = mysqli_real_escape_string($idr, $row['url'] ?? '');
            $business = mysqli_real_escape_string($idr, $row['business'] ?? '');
            $city = mysqli_real_escape_string($idr, $row['city'] ?? '');
            $street = mysqli_real_escape_string($idr, $row['street'] ?? '');
            $floor = mysqli_real_escape_string($idr, $row['floor'] ?? '');
            $apartment = mysqli_real_escape_string($idr, $row['apartment'] ?? '');
            $building = mysqli_real_escape_string($idr, $row['building'] ?? '');
            $zone = mysqli_real_escape_string($idr, $row['zone'] ?? '');
            $near = mysqli_real_escape_string($idr, $row['near'] ?? '');
            $remark = mysqli_real_escape_string($idr, $row['remark'] ?? '');
            $address = mysqli_real_escape_string($idr, $row['address'] ?? '');
            $address_two = mysqli_real_escape_string($idr, $row['address_two'] ?? '');
            $best_delivery_time = mysqli_real_escape_string($idr, $row['best_delivery_time'] ?? '');
            
            $sql = "INSERT INTO client (
                nom, prenom, category, source, grade, payment, card, community,
                company, job, number, inumber, telmobile, telother, email, url,
                business, city, street, floor, apartment, building, zone, near,
                remark, address, address_two, best_delivery_time, con_date
            ) VALUES (
                '$nom', '$prenom', '$category', '$source', '$grade', '$payment',
                '$card', '$community', '$company', '$job', '$number', '$inumber',
                '$telmobile', '$telother', '$email', '$url', '$business', '$city',
                '$street', '$floor', '$apartment', '$building', '$zone', '$near',
                '$remark', '$address', '$address_two', '$best_delivery_time', NOW()
            )";
            
            if (mysqli_query($idr, $sql)) {
                $successCount++;
            } else {
                $errorCount++;
            }
        }
        
        mysqli_close($idr);
        
        if ($successCount > 0) {
            $response['success'] = true;
            $response['count'] = $successCount;
            $response['message'] = "Successfully imported $successCount records" . 
                                 ($errorCount > 0 ? " ($errorCount failed)" : "");
        } else {
            throw new Exception("Failed to import any records");
        }
    }
    
} catch (Exception $e) {
    $response['success'] = false;
    $response['message'] = $e->getMessage();
}

echo json_encode($response);
?>