<?php
session_start();
header('Content-Type: application/json');

// Database connection
$host = "192.168.16.103";
$user = "root";
$pass = "1Sys9Admeen72";
$db = "nccleb_test";

$response = ['success' => false, 'message' => ''];

try {
    $idr = mysqli_connect($host, $user, $pass, $db);
    
    if (mysqli_connect_errno()) {
        throw new Exception("Database connection failed: " . mysqli_connect_error());
    }
    
    $action = $_POST['action'] ?? '';
    
    if ($action === 'update') {
        $data = json_decode($_POST['data'], true);
        
        if (!isset($data['id']) || empty($data['id'])) {
            throw new Exception("No ID provided");
        }
        
        $id = intval($data['id']);
        
        // Escape all values
        $nom = mysqli_real_escape_string($idr, $data['nom'] ?? '');
        $prenom = mysqli_real_escape_string($idr, $data['prenom'] ?? '');
        $category = mysqli_real_escape_string($idr, $data['category'] ?? '');
        $source = mysqli_real_escape_string($idr, $data['source'] ?? '');
        $grade = mysqli_real_escape_string($idr, $data['grade'] ?? 'regular');
        $payment = mysqli_real_escape_string($idr, $data['payment'] ?? '');
        $card = mysqli_real_escape_string($idr, $data['card'] ?? '');
        $community = mysqli_real_escape_string($idr, $data['community'] ?? '');
        $company = mysqli_real_escape_string($idr, $data['company'] ?? '');
        $job = mysqli_real_escape_string($idr, $data['job'] ?? '');
        $number = mysqli_real_escape_string($idr, $data['number'] ?? '');
        $inumber = mysqli_real_escape_string($idr, $data['inumber'] ?? '');
        $telmobile = mysqli_real_escape_string($idr, $data['telmobile'] ?? '');
        $telother = mysqli_real_escape_string($idr, $data['telother'] ?? '');
        $email = mysqli_real_escape_string($idr, $data['email'] ?? '');
        $google_maps_url = mysqli_real_escape_string($idr, $data['google_maps_url'] ?? ''); // CHANGED: url to google_maps_url
        $business = mysqli_real_escape_string($idr, $data['business'] ?? '');
        $city = mysqli_real_escape_string($idr, $data['city'] ?? '');
        $street = mysqli_real_escape_string($idr, $data['street'] ?? '');
        $floor = mysqli_real_escape_string($idr, $data['floor'] ?? '');
        $apartment = mysqli_real_escape_string($idr, $data['apartment'] ?? '');
        $building = mysqli_real_escape_string($idr, $data['building'] ?? '');
        $zone = mysqli_real_escape_string($idr, $data['zone'] ?? '');
        $near = mysqli_real_escape_string($idr, $data['near'] ?? '');
        $remark = mysqli_real_escape_string($idr, $data['remark'] ?? '');
        $address = mysqli_real_escape_string($idr, $data['address'] ?? '');
        $address_two = mysqli_real_escape_string($idr, $data['address_two'] ?? '');
        $best_delivery_time = mysqli_real_escape_string($idr, $data['best_delivery_time'] ?? '');
        
        $sql = "UPDATE client SET 
                nom = '$nom',
                prenom = '$prenom',
                category = '$category',
                source = '$source',
                grade = '$grade',
                payment = '$payment',
                card = '$card',
                community = '$community',
                company = '$company',
                job = '$job',
                number = '$number',
                inumber = '$inumber',
                telmobile = '$telmobile',
                telother = '$telother',
                email = '$email',
                google_maps_url = '$google_maps_url', -- CHANGED: url to google_maps_url
                business = '$business',
                city = '$city',
                street = '$street',
                floor = '$floor',
                apartment = '$apartment',
                building = '$building',
                zone = '$zone',
                near = '$near',
                remark = '$remark',
                address = '$address',
                address_two = '$address_two',
                best_delivery_time = '$best_delivery_time'
                WHERE id = $id";
        
        if (mysqli_query($idr, $sql)) {
            $response['success'] = true;
            $response['message'] = 'Record updated successfully';
        } else {
            throw new Exception("Update failed: " . mysqli_error($idr));
        }
        
    } elseif ($action === 'delete') {
        $id = intval($_POST['id'] ?? 0);
        
        if ($id <= 0) {
            throw new Exception("Invalid ID");
        }
        
        $sql = "DELETE FROM client WHERE id = $id";
        
        if (mysqli_query($idr, $sql)) {
            $response['success'] = true;
            $response['message'] = 'Record deleted successfully';
        } else {
            throw new Exception("Delete failed: " . mysqli_error($idr));
        }
        
    } else {
        throw new Exception("Invalid action");
    }
    
    mysqli_close($idr);
    
} catch (Exception $e) {
    $response['success'] = false;
    $response['message'] = $e->getMessage();
}

echo json_encode($response);
?>