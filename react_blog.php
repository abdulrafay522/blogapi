<?php
    

$method_name = 'POST';
include 'configure.php';

// Decode incoming JSON data


$errors = [];

if (empty($data->blog_id)) {
    $errors[] = "Blog ID is required";
}

if (empty($data->reaction)) {
    $errors[] = "Reaction is required";
} elseif (!in_array($data->reaction, ['like', 'dislike'])) {
    $errors[] = "Reaction must be 'like' or 'dislike'";
}

if (empty($data->user_id)) {
    $errors[] = "User ID is required";
}

if (!empty($errors)) {
    (new ApiResponse(false, "Validation errors", $errors, 400))->send();
}

$user_id = $data->user_id;
$blog_id = $data->blog_id;
$reaction = $data->reaction;

// First delete existing reaction (if any)
$conn->query("DELETE FROM reactions WHERE user_id=$user_id AND blog_id=$blog_id");

// Then insert new reaction
if ($conn->query("INSERT INTO reactions (user_id, blog_id, reaction) VALUES ('$user_id', '$blog_id', '$reaction')")) {
    (new ApiResponse(true, "Reacted to blog", null, 200))->send();
} else {
    (new ApiResponse(false, "Failed to react to blog", [$conn->error], 500))->send();
}
?>