<?php

    if ($_SERVER['REQUEST_METHOD'] !== strtoupper($method_name)) {
        (new ApiResponse(
            false,
            "405 Not Allowed - {$method_name} required",
            ["method_used" => $_SERVER['REQUEST_METHOD']],
            405
        ))->send();
    }
    $input = file_get_contents("php://input");
$data = json_decode($input);
?>