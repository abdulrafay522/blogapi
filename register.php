<?php

$method_name = 'POST';
include 'configure.php'; 

// Get raw JSON input
// $input = file_get_contents("php://input");
// $data = json_decode($input);

// Basic validation
$errors = [];

if (empty($data->name)) {
    $errors[] = "Name is required";
}
if (empty($data->email)) {
    $errors[] = "Email is required";
} elseif (!filter_var($data->email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Invalid email format";
}
if (empty($data->password)) {
    $errors[] = "Password is required";
}

if (!empty($errors)) {
    (new ApiResponse(false, "Validation failed", $errors, 422))->send();
}

// Assign values
$name = $data->name;
$email = $data->email;
$password = password_hash($data->password, PASSWORD_BCRYPT);

// Insert into database
$sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";

try {
    $DB_Class->setQuery($sql);
    $DB_Class->runQuery();

    $user_data = [
        "name" => $name,
        "email" => $email
    ];

    (new ApiResponse(true, "Registration successful", $user_data, 200))->send();
} catch (Exception $e) {
    (new ApiResponse(false, "Registration failed", [$e->getMessage()], 500))->send();
}
?>