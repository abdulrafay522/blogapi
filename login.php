<?php
// $method_name = 'POST';
// include 'configure.php';

// $errors = [];

// if (empty($data->email)) {
//     $errors[] = "Email is required";
// } elseif (!filter_var($data->email, FILTER_VALIDATE_EMAIL)) {
//     $errors[] = "Email format is invalid";
// }

// if (empty($data->password)) {
//     $errors[] = "Password is required";
// }

// if (!empty($errors)) {
//     // ✅ Corrected line
//     send_response(false, "Validation failed", $errors, 422);
// }

// Sanitize
// $email = $data->email;
// $password = $data->password;

// Check user from DB
// $sql = "SELECT * FROM users WHERE email = 'rafaykhan22@gmail.com' LIMIT 1";
// // $sql = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
// $DB_Class->setQuery($sql);
// $DB_Class->runQuery($sql);
// echo "<pre>";
// print_r($DB_Class);
// die();
// $result = $conn->query($sql);


// if ($result && $result->num_rows === 1) {
//     $user = $result->fetch_assoc();

//     // Verify password
//     if (password_verify($password, $user['password'])) {
//         unset($user['password']);
//         send_response(true, "Login successful", $user, 200);
//     } else {
//         send_response(false, "Incorrect password", ["Invalid credentials"], 401);
//     }
// } 
// else {
//     send_response(false, "User not found", ["No account associated with this email"], 404);
// }

// $sql = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
// $DB_Class->setQuery($sql);
// $result = $DB_Class->runQuery(); 

// if ($result && $result->num_rows === 1) {
//     $user = $result->fetch_assoc();

//     // Verify password
//     if (password_verify($password, $user['password'])) {
//         unset($user['password']);
//         (new ApiResponse(true, "Login successful", $user, 200))->send();
//     } else {
//         (new ApiResponse(false, "Incorrect password", ["Invalid credentials"], 401))->send();
//     }

// } else {
//     (new ApiResponse(false, "User not found", ["No account associated with this email"], 404))->send();
// }

$method_name = 'POST';
include 'configure.php';

// ✅ Get JSON input from Postman
$inputJSON = file_get_contents('php://input');
$data = json_decode($inputJSON);

// ✅ Validate input
$errors = [];

if (empty($data->email)) {
    $errors[] = "Email is required";
} elseif (!filter_var($data->email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Email format is invalid";
}

if (empty($data->password)) {
    $errors[] = "Password is required";
}

if (!empty($errors)) {
    (new ApiResponse(false, "Validation failed", $errors, 422))->send();
}

// ✅ Sanitize
$email = $data->email;
$password = $data->password;

// ✅ Query DB
$sql = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
$DB_Class->setQuery($sql);
$result = $DB_Class->runQuery();

if ($result && $result->num_rows === 1) {
    $user = $result->fetch_assoc();

    // ✅ Verify password
    if (password_verify($password, $user['password'])) {
        unset($user['password']);
        (new ApiResponse(true, "Login successful", $user, 200))->send();
    } else {
        (new ApiResponse(false, "Incorrect password", ["Invalid credentials"], 401))->send();
    }

} else {
    (new ApiResponse(false, "User not found", ["No account associated with this email"], 404))->send();
}

?>