<?php
include 'routes_canaction_post.php';
include 'db.php';
validate_method('POST');
header('Content-Type: application/json');
$data = json_decode(file_get_contents("php://input"));
$errors = [];

if (empty($data->id)) {
    $errors[] = "Blog ID is required";
}

if (empty($data->title)) {
    $errors[] = "Title is required";
}

if (empty($data->content)) {
    $errors[] = "Content is required";
}

if (!empty($errors)) {
    echo json_encode(["errors" => $errors]);
    exit;
}

$data = json_decode(file_get_contents("php://input"));

$id = $data->id;
$title = $data->title;
$content = $data->content;

$conn->query("UPDATE blogs SET title='$title', content='$content' WHERE id=$id");
echo json_encode(["message" => "Blog updated"]);
?>