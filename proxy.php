<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

if (!isset($_GET['url'])) {
    echo json_encode([
        "code" => -1,
        "msg" => "'url' is required."
    ]);
    exit;
}

$tiktokUrl = urlencode($_GET['url']);
$apiUrl = "https://tikwm.com/api?url=$tiktokUrl&cache_bust=" . time(); 
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $apiUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);

$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo json_encode([
        "code" => -1,
        "msg" => "cURL error: " . curl_error($ch)
    ]);
    curl_close($ch);
    exit;
}
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($httpCode === 200) {
    echo $response;
} else {
    echo json_encode([
        "code" => $httpCode,
        "msg" => "Failed to fetch from Tikwm API. HTTP Status: $httpCode"
    ]);
}
