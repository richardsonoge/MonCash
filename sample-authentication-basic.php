<?php
/** Sample Authentication Basic */

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://60cac971ad41e99724d2e11a83eaebec:6aXNmZChWgLDySQ3mz1EPDIzMkTejWwb_s7orVYUiWD4Ln2rl7OR8HtBlnVqYJhO@sandbox.moncashbutton.digicelgroup.com/Api/oauth/token');
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

var_dump($result["access_token"]);
die();

/** END */
