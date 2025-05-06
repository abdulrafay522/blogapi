<?php
function send_response($status, $message, $data = null, $error = null) {
    header('Content-Type: application/json');
    echo json_encode([
        "status" => $status,
        "message" => $message,
        "data" => $data,
        "error" => $error
    ]);
    exit;
}
?>