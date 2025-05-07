<?php
$method_name = 'POST';
include 'configer.php';
$id = $data->id;

$conn->query("DELETE FROM blogs WHERE id=$id");
echo json_encode(["message" => "Blog deleted"]);
?>