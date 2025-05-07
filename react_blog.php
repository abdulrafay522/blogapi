<?php
$method_name = 'POST';
include 'configer.php';
$errors = [];

if (empty($data->blog_id)) {
    $errors[] = "Blog ID is required";
}

if (empty($data->reaction)) {
    $errors[] = "Reaction is required";
} elseif (!in_array($data->reaction, ['like', 'dislike'])) {
    $errors[] = "Reaction must be 'like' or 'dislike'";
}

if (!empty($errors)) {
    echo json_encode(["errors" => $errors]);
    exit;
}


$user_id = $data->user_id;
$blog_id = $data->blog_id;
$reaction = $data->reaction;

$conn->query("DELETE FROM reactions WHERE user_id=$user_id AND blog_id=$blog_id");
$conn->query("INSERT INTO reactions (user_id, blog_id, reaction) VALUES ('$user_id', '$blog_id', '$reaction')");

echo json_encode(["message" => "Reacted to blog"]);
?>