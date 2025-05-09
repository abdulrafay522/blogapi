<?php
// $method_name = 'POST';
// include 'configure.php';

// $id = $data->id;
// $comment = $data->comment;
// $conn->query("UPDATE comments SET comment='$comment' WHERE id=$id");
// send_response(["message" => "Comment updated"]);
// $id =$data->id;
// $comment = $data->comment;
// $conn->query("UPDATE comment SET comment='$comment' WHERE id=$id");
$method_name = 'POST';
include 'configure.php';

$id = $data->id;
$comment = $data->comment;

// Update comment query
$conn->query("UPDATE comments SET comment='$comment' WHERE id=$id");

// Send success response with a status code, assuming 200 for success
send_response(["message" => "Comment updated"], 200);


?>
 