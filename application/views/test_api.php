<?php

$url = "https://ravesandboxapi.flutterwave.com/v2/kyc/bvn/88999?seckey=FLWSECK-6afb26eb4e6df11555af7c314eb1fd38-X";
$header = array('Accept-Language: en');
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_HEADER, false);
curl_setopt($curl, CURLOPT_HTTPHEADER, $header);

$response = curl_exec($curl);
//            $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
curl_close($curl);
$json = json_decode($response);

print_r($json);

