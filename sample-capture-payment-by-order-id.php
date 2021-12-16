<?php
// Sample Authentication Basic

/**
 * Client Id: 60cac971ad41e99724d2e11a83eaebec
 * Client secret: 6aXNmZChWgLDySQ3mz1EPDIzMkTejWwb_s7orVYUiWD4Ln2rl7OR8HtBlnVqYJhO
 * HOST_REST_API for test : sandbox.moncashbutton.digicelgroup.com/Api
 * HOST_REST_API for live : moncashbutton.digicelgroup.com/Api
 */

$auth_moncash = 'https://60cac971ad41e99724d2e11a83eaebec:6aXNmZChWgLDySQ3mz1EPDIzMkTejWwb_s7orVYUiWD4Ln2rl7OR8HtBlnVqYJhO@sandbox.moncashbutton.digicelgroup.com/Api/oauth/token';

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $auth_moncash);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "scope=read,write&grant_type=client_credentials");

$headers = array();
$headers[] = 'Accept: application/json';
$headers[] = 'Content-Type: application/x-www-form-urlencoded';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);

$result = json_decode($result, true);

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