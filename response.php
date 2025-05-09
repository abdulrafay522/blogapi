<?php
// function send_response($status, $message, $data = null, $error = null) {
//     header('Content-Type: application/json');
  
//     $response = [
//         "status" => $status,
//         "message" => $message,
//         "data" => $data
//     ];

//     if (!empty($error)) {
//         $response["error"] = $error;
//     }

//     echo json_encode($response);
//     exit;
// }
function send_response($status, $message, $response = null) {
    header('Content-Type: application/json');
  
    if ($status == 'success') {
        http_response_code(200); 
    } else {
        http_response_code(405); 
    }

    $response_data = [
        "status" => $status,
        "message" => $message,
    ];


    if ($status == 'success') {
        $response_data["data"] = $response;
    } else {
        $response_data["error"] = $response;
    }

    echo json_encode($response_data);
    exit;
}
?>