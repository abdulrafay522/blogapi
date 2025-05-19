<?php
    
    // if ($_SERVER['REQUEST_METHOD'] !== strtoupper($method_name)) {
       
    //     send_response(
    //         false,
    //         "405 Not Allowed - {$method_name} required",
    //         ["method_used" => $_SERVER['REQUEST_METHOD']],
    //         405
    //     );
    // }
    if ($_SERVER['REQUEST_METHOD'] !== strtoupper($method_name)) {
        (new ApiResponse(
            false,
            "405 Not Allowed - {$method_name} required",
            ["method_used" => $_SERVER['REQUEST_METHOD']],
            405
        ))->send();
    }
?>