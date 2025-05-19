<?php

class ApiResponse {
    private bool $status;
    private string $message;
    private array|null $response;
    private int $statusCode;

    public function __construct(bool $status, string $message, array|null $response = null, int $statusCode = 200) {
        $this->status = $status;
        $this->message = $message;
        $this->response = $response;
        $this->statusCode = $statusCode;
    }

    public function send(): void {
        header('Content-Type: application/json');

 
        http_response_code($this->status ? $this->statusCode : ($this->statusCode ?: 400));

        $response_data = [
            "status"  => $this->status,
            "message" => $this->message,
        ];

        if ($this->status) {
            $response_data["data"] = $this->response;
        } else {
            $response_data["error"] = $this->response;
        }

        echo json_encode($response_data);
        exit;
    }
}
?>