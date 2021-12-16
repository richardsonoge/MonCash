<?php
require_once 'controller/auth.php';

// Sample Create Payment

/**
 * PATH URL : https://sandbox.moncashbutton.digicelgroup.com/Api/v1/CreatePayment
 * GATEWAY BASE URL URL : https://sandbox.moncashbutton.digicelgroup.com/Moncash-middleware/Payment/Redirect?token=<payment-token>
 */

$path = 'https://sandbox.moncashbutton.digicelgroup.com/Api/v1/CreatePayment';

$data = json_encode([
    "amount"  => 100,
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

$gateway_base_url = 'https://sandbox.moncashbutton.digicelgroup.com/Moncash-middleware/Payment/Redirect?token='.$result["payment_token"]["token"];

?>

<a href="<?= $gateway_base_url ?>"><img src="src/img/MC_button_kr.png" height="30" alt="Button Api MonCash" ></a>
