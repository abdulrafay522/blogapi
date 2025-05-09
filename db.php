<?php
$conn = new mysqli("localhost", "root", "", "blog_system");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$data = json_decode(file_get_contents("php://input"));
?> 