<?php
//
$method_name = 'POST';
include 'configure.php';

$id = $data->id;
$comment = $data->comment;

// Optional: Validate inputs
if (empty($id) || empty($comment)) {
    send_response(false, "Validation error", ["ID and comment are required"], 400);
    exit;
}

// Update comment query
$conn->query("UPDATE comments SET comment='$comment' WHERE id=$id");

// Send success response
send_response(true, "Comment updated successfully", null, 200);

?>
 