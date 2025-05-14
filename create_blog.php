<?php

$method_name = 'POST';
include 'configure.php';

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
    send_response(false, "Validation failed", $errors, 400);  // ✅ 400 instead of null
}

//  Assign variables
$user_id = $data->user_id;
$title = mysqli_real_escape_string($conn, $data->title);
$content = mysqli_real_escape_string($conn, $data->content);

$sql = "INSERT INTO blogs (user_id, title, content) VALUES ('$user_id', '$title', '$content')";

if ($conn->query($sql)) {
    $blogData = [
        "user_id" => $conn->insert_id,
        "title" => $title,
        "content" => $content
    ];
    send_response(true, "Blog created successfully", $blogData, 200);  // ✅ use 200 here
} else {
    send_response(false, "Failed to create blog", [$conn->error], 406);  // ✅ already fine
}
var_dump($user_id);
?>