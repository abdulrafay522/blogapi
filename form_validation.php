<?php
// include 'validate_method.php'; // for POST/GET method check
// validate_method('POST');

header('Content-Type: application/json');
include 'db.php';

$data = json_decode(file_get_contents("php://input"));
$errors = [];

if (empty($data->name)) {
    $errors[] = "Name is required";
}

if (empty($data->email)) {
    $errors[] = "Email is required";
} elseif (!filter_var($data->email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Email format is invalid";
}

if (empty($data->password)) {
    $errors[] = "Password is required";
}

if (!empty($errors)) {
    echo json_encode(["errors" => $errors]);
    exit;
}

$name = $data->name;
$email = $data->email;
$password = $data->password;

?>