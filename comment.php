<?php

$method_name = 'POST';
include 'configure.php';

// Decode input JSON
$data = json_decode(file_get_contents('php://input'));

$errors = [];

if (empty($data->blog_id)) {
    $errors[] = "Blog ID is required";
}

if (empty($data->comment)) {
    $errors[] = "Comment text is required";
}

if (empty($data->user_id)) {
    $errors[] = "User ID is required";
}

if (!empty($errors)) {
    (new ApiResponse(false, "Validation error", $errors, 400))->send();
}

$user_id = $data->user_id;
$blog_id = $data->blog_id;
$comment = mysqli_real_escape_string($conn, $data->comment); // Sanitize input

$sql = "INSERT INTO comments (user_id, blog_id, comment) VALUES ('$user_id', '$blog_id', '$comment')";

if ($conn->query($sql)) {
    $commentData = [
        "comment_id" => $conn->insert_id,
        "user_id"    => $user_id,
        "blog_id"    => $blog_id,
        "comment"    => $comment
    ];
    (new ApiResponse(true, "Comment added", $commentData, 200))->send();
} else {
    (new ApiResponse(false, "Failed to add comment", [$conn->error], 500))->send();
}
?>
