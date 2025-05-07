<?php
function send_response($status, $message, $data = null, $error = null) {
    header('Content-Type: application/json');

    $response = [
        "status" => $status,
        "message" => $message,
        "data" => $data
    ];

    if (!empty($error)) {
        $response["error"] = $error;
    }

    echo json_encode($response);
    exit;
}
?>