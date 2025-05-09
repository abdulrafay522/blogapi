<?php
include 'configure.php';
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
    send_response(["errors" => $errors]);
    exit;
}

$name = $data->name;
$email = $data->email;
$password = $data->password;

?>