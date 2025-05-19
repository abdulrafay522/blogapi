<?php

$method_name = 'POST';
include 'configure.php';

// Get POST data
$data = json_decode(file_get_contents('php://input'));

$errors = [];

if (empty($data->title)) {
    $errors[] = "Title is required";
}
if (empty($data->content)) {
    $errors[] = "Content is required";
}
if (empty($data->user_id)) {
    $errors[] = "User ID is required"; // Assuming user_id is mandatory
}

if (!empty($errors)) {
    (new ApiResponse(false, "Validation failed", $errors, 400))->send();
}

// Assign variables
$user_id = $data->user_id;
$title = mysqli_real_escape_string($conn, $data->title);
$content = mysqli_real_escape_string($conn, $data->content);

$sql = "INSERT INTO blogs (user_id, title, content) VALUES ('$user_id', '$title', '$content')";

if ($conn->query($sql)) {
    $blogData = [
        "id" => $conn->insert_id,  // use insert_id here (blog id)
        "user_id" => $user_id,
        "title" => $title,
        "content" => $content
    ];
    (new ApiResponse(true, "Blog created successfully", $blogData, 200))->send();
} else {
    (new ApiResponse(false, "Failed to create blog", [$conn->error], 406))->send();
}
?>