<?php
include 'routes_canaction_post.php';
include 'db.php';
$data = json_decode(file_get_contents("php://input"));
$id = $data->id;

$conn->query("DELETE FROM blogs WHERE id=$id");
echo json_encode(["message" => "Blog deleted"]);
?>