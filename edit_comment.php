<?php
$method_name = 'POST';
include 'configer.php';

$id = $data->id;
$comment = $data->comment;
$conn->query("UPDATE comments SET comment='$comment' WHERE id=$id");
echo json_encode(["message" => "Comment updated"]);
$id =$data->id;
$comment = $data->comment;
$conn->query("UPDATE comment SET comment='$comment' WHERE id=$id");

?>
