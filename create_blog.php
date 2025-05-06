<?php
include 'db.php';
include 'routes_canaction_post.php';
include 'response.php'; 
validate_method('POST');
header('Content-Type: application/json');   
$data = json_decode(file_get_contents("php://input"));
$errors = [];

// ✅ Validation
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
    send_response(false, "Validation failed", null, $errors);
}

//  Assign variables
$user_id = $data->user_id; // Assuming author_id is the user_id
$title = $data->title;
$content = $data->content;


// ✅ Insert query
$sql = "INSERT INTO blogs (user_id, title, content) VALUES ('$user_id', '$title', '$content')";

if ($conn->query($sql)) {
    $blogData = [
        "user_id" => $conn->insert_id,
        "title" => $title,
        "content" => $content
      
    ];
    send_response(true, "Blog created successfully", $blogData, null);
} else {
    send_response(false, "Failed to create blog", null, [$conn->error]);
}
?>