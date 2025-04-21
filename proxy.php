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
$apiUrl = "https://tikwm.com/api?url=$tiktokUrl";

$response = file_get_contents($apiUrl);
echo $response;
