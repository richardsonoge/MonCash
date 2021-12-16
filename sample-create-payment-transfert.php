<?php
require_once 'controller/auth.php';

/**
 * Sample Create Payment Transfert  
 */ 

$path = 'https://sandbox.moncashbutton.digicelgroup.com/Api/v1/Transfert';

$data = json_encode([
    "amount"  => 100,
    "receiver"  => 36043882,
    "desc" => 'Hello word'
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

/**
 * END  
 */ 

$gateway_base_url = 'https://sandbox.moncashbutton.digicelgroup.com/Moncash-middleware/Payment/Redirect?token='.$result["payment_token"]["token"];

?>

<a href="<?= $gateway_base_url ?>">Transfert l'argent sur MonCash</a>
