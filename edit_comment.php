<?php
include 'routes_canaction_post.php';
include 'db.php';
validate_method('POST');
header('Content-Type: application/json');
$data = json_decode(file_get_contents("php://input"));

$id = $data->id;
$comment = $data->comment;
$conn->query("UPDATE comments SET comment='$comment' WHERE id=$id");
echo json_encode(["message" => "Comment updated"]);
?>