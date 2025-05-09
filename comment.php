<?php
// $method_name = 'POST';
// include 'configure.php';
// $errors = [];
 
// if (empty($data->blog_id)) {
//     $errors[] = "Blog ID is required";
// }

// if (empty($data->comment)) {
//     $errors[] = "Comment text is required";
// }

// if (!empty($errors)) {
//     send_response(["errors" => $errors]);
//     exit;
// }

// $user_id = $data->user_id;
// $blog_id = $data->blog_id;
// $comment = $data->comment;

// $conn->query("INSERT INTO comments (user_id, blog_id, comment) VALUES ('$user_id', '$blog_id', '$comment')");
// send_response(["message" => "Comment added"]);
$method_name = 'POST';
include 'configure.php';
$errors = [];
 
if (empty($data->blog_id)) {
    $errors[] = "Blog ID is required";
}

if (empty($data->comment)) {
    $errors[] = "Comment text is required";
}

if (!empty($errors)) {
    send_response(false, "Validation error", null, $errors);
    exit;
}

$user_id = $data->user_id;
$blog_id = $data->blog_id;
$comment = $data->comment;

$conn->query("INSERT INTO comments (user_id, blog_id, comment) VALUES ('$user_id', '$blog_id', '$comment')");
send_response(true, "Comment added");
?>