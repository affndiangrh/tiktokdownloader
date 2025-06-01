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

$headers = [
    "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36",
    "Accept: application/json"
];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $apiUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers); // ✅ INI YANG PENTING

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
    // Cek apakah valid JSON
    $json = json_decode($response, true);
    if ($json === null) {
        echo json_encode([
            "code" => -2,
            "msg" => "Invalid response from Tikwm (not JSON)",
            "raw" => $response
        ]);
    } else {
        echo json_encode($json);
    }
} else {
    echo json_encode([
        "code" => $httpCode,
        "msg" => "Failed to fetch from Tikwm API. HTTP Status: $httpCode"
    ]);
}
