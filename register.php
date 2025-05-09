<?php
// $method_name = 'POST';
// include 'configure.php';
    
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
//     send_response(false, "Validation failed", null, $errors); // <-- yeh use karo
// }

// // Register user
// $name = $data->name;
// $email = $data->email;
// $password = password_hash($data->password, PASSWORD_BCRYPT);

// // SQL query
// $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";

// if ($conn->query($sql)) {
//     $user_data = [
//         "name" => $name,
//         "email" => $email

//     ];
//     send_response(true, "Registration successful", $user_data, 200); // <-- success response
// } else {
//    send_response(false, 'Validation failed', $errors, 422);
// }
$method_name = 'POST';
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

    send_response(false, "Validation failed", $errors, 422);
}


$name = $data->name;
$email = $data->email;
$password = password_hash($data->password, PASSWORD_BCRYPT);


$sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";

if ($conn->query($sql)) {
    $user_data = [
        "name" => $name,
        "email" => $email
    ];
    send_response(true, "Registration successful", $user_data, 200);
} else {
    send_response(false, 'Registration failed', [$conn->error], 500);
}
?>