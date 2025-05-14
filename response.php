<?php
// 
function send_response(bool $status, string $message, array|null $response = null, int $statusCode =200) {
    header('Content-Type: application/json');
  
    if ($status) {
        http_response_code($statusCode); 
    } else {
        http_response_code($statusCode ?? 400);
    }

    $response_data = [
        "status" => $status,
        "message" => $message,
    ];
    

    if ($status) {
        $response_data["data"] = $response;
    } else {
        $response_data["error"] = $response;
    }

    echo json_encode($response_data);
    exit;
}
?>