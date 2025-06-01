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
$apiUrl = "https://tikwm.com/api?url=$tiktokUrl&hd=1&cache_bust=" . time();

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
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($httpCode === 200) {
    $json = json_decode($response, true);
    if ($json && isset($json['data']['play'])) {
        echo json_encode([
            "code" => 0,
            "data" => [
                "play" => $json['data']['play'],
                "wmplay" => $json['data']['wmplay'] ?? null
            ]
        ]);
    } else {
        echo json_encode([
            "code" => -2,
            "msg" => "Data tidak ditemukan atau format salah.",
            "raw" => $response
        ]);
    }
} else {
    echo json_encode([
        "code" => $httpCode,
        "msg" => "Gagal mengambil data dari Tikwm."
    ]);
}
