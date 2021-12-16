<?php
require_once 'controller/auth.php';

/**
 * Sample Capture payment by order Id
 */

$path = 'http://sandbox.moncashbutton.digicelgroup.com/Api/v1/RetrieveOrderPayment';

$data = json_encode([
    "orderId" => 12874820
]);

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $path);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

$headers = array();
$headers[] = 'Accept: application/json';
$headers[] = 'Authorization: Bearer '.$result["access_token"];
$headers[] = 'Content-Type: application/json';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);

$result = json_decode($result, true);

// var_dump($result["payment"]["reference"]);
// var_dump($result["payment"]["transaction_id"]);
// var_dump($result["payment"]["cost"]);
// var_dump($result["payment"]["message"]);
// var_dump($result["payment"]["payer"]);
