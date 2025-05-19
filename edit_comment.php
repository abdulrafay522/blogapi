<?php
//
$method_name = 'POST';
include 'configure.php';

// Decode JSON input
$data = json_decode(file_get_contents('php://input'));

$errors = [];

if (empty($data->id)) {
    $errors[] = "Comment ID is required";
}

if (empty($data->comment)) {
    $errors[] = "Updated comment text is required";
}

if (!empty($errors)) {
    (new ApiResponse(false, "Validation failed", $errors, 400))->send();
}

$comment_id = $data->id;
$comment_text = mysqli_real_escape_string($conn, $data->comment);

// Update query
$sql = "UPDATE comments SET comment='$comment_text' WHERE id=$comment_id";

if ($conn->query($sql)) {
    if ($conn->affected_rows > 0) {
        (new ApiResponse(true, "Comment updated successfully", null, 200))->send();
    } else {
        (new ApiResponse(false, "No comment found with this ID", null, 404))->send();
    }
} else {
    (new ApiResponse(false, "Failed to update comment", [$conn->error], 500))->send();
}
?>
 