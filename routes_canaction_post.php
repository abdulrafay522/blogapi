<?php
   
    function validate_method($method_name) {
        if ($_SERVER['REQUEST_METHOD'] !== strtoupper($method_name)) {
            http_response_code(404); 
            echo json_encode(["error" => "405  Not Allowed - {$method_name} required",
                "method_used" => $_SERVER['REQUEST_METHOD']
            ]);
            exit;
        }
    }
?>