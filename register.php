<?php
// 
$method_name = 'POST';
include 'configure.php';

// $errors = [];

// if (empty($data->name)) {
//     $errors[] = "Name is required";
// }

// if (empty($data->email)) {
//     $errors[] = "Email is required";
// } elseif (!filter_var($data->email, FILTER_VALIDATE_EMAIL)) {
//     $errors[] = "Email format is invalid";
// }

// if (empty($data->password)) {
//     $errors[] = "Password is required";
// }

// if (!empty($errors)) {

//     send_response(false, "Validation failed", $errors, 422);
// }


// $name = $data->name;
// $email = $data->email;
// $password = password_hash($data->password, PASSWORD_BCRYPT);


// $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
$sql = "INSERT INTO users (name, email, password) VALUES ('rafay', 'rafaykhan@gmail.com', '123456')";
$DB_Class->setQuery($sql);
$DB_Class->runQuery($sql);
echo "<pre>";
print_r($DB_Class);
die();
$result = $conn->query($sql);
// if ($conn->query($sql)) {
//     $user_data = [
//         "name" => $name,
//         "email" => $email
//     ];
//     send_response(true, "Registration successful", $user_data, 200);
// } else {
//     send_response(false, 'Registration failed', [$conn->error], 500);
// }
?>