  <?php

// ???????????????????????????????????
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

// // If there are validation errors, send them in the response
// if (!empty($errors)) {
//     send_response(false, "Validation failed", null, $errors); // Passing errors to the response
// }

// // Sanitize
// $email = $data->email;
// $password = $data->password;

// // Check user from DB
// $sql = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
// $result = $conn->query($sql);

// if ($result && $result->num_rows === 1) {
//     $user = $result->fetch_assoc();

//     // Verify password
//     if (password_verify($password, $user['password'])) {
//         // Remove password before sending data
//         unset($user['password']);
//         send_response(true, "Login successful", $user, null);
//     } else {
//         send_response(false, "Incorrect password", null, ["Invalid credentials"]);
//     }
// } else {
//     send_response(false, "User not found", null, ["No account associated with this email"]);
// }
$method_name = 'POST';
include 'configure.php';

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
    // ✅ Corrected line
    send_response(false, "Validation failed", $errors, 422);
}

// Sanitize
$email = $data->email;
$password = $data->password;

// Check user from DB
$sql = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
$result = $conn->query($sql);

if ($result && $result->num_rows === 1) {
    $user = $result->fetch_assoc();

    // Verify password
    if (password_verify($password, $user['password'])) {
        unset($user['password']);
        send_response(true, "Login successful", $user, 200);
    } else {
        send_response(false, "Incorrect password", ["Invalid credentials"], 401);
    }
} else {
    send_response(false, "User not found", ["No account associated with this email"], 404);
}
?>