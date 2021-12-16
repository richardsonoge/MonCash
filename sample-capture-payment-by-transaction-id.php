<?php
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://HOST_REST_API/v1/');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "{ \" transactionId\": <\ntransactionId>}");

$headers = array();
$headers[] = 'Accept: application/json';
$headers[] = 'Authorization: Bearer <Access-token>';
$headers[] = 'Content-Type: application/json';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);
