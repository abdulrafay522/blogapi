<?php
    
    if ($_SERVER['REQUEST_METHOD'] !== strtoupper($method_name)) {
        http_response_code(405);
        send_response(
            'error',
            "405 Not Allowed - {$method_name} required",
            null,
            ["method_used" => $_SERVER['REQUEST_METHOD']]
        );
    }
?>