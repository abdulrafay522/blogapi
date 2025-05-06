<?php
include 'routes_canaction_post.php';
include 'db.php';
validate_method('POST');
header('Content-Type: application/json');
$data = json_decode(file_get_contents("php://input"));
$errors = [];

if (empty($data->blog_id)) {
    $errors[] = "Blog ID is required";
}

if (empty($data->comment)) {
    $errors[] = "Comment text is required";
}

if (!empty($errors)) {
    echo json_encode(["errors" => $errors]);
    exit;
}

$user_id = $data->user_id;
$blog_id = $data->blog_id;
$comment = $data->comment;

$conn->query("INSERT INTO comments (user_id, blog_id, comment) VALUES ('$user_id', '$blog_id', '$comment')");
echo json_encode(["message" => "Comment added"]);
?>