<?php

// $method_name = 'POST';
// include 'configure.php';
// $errors = [];

// if (empty($data->id)) {
//     $errors[] = "Blog ID is required";
// }

// if (empty($data->title)) {
//     $errors[] = "Title is required";
// }

// if (empty($data->content)) {
//     $errors[] = "Content is required";
// }

// if (!empty($errors)) {
//     send_response(false, "Validation failed", null, 400); // ❗400 Bad Request
//     exit;
// }

// $id = $data->id;
// $title = mysqli_real_escape_string($conn, $data->title);
// $content = mysqli_real_escape_string($conn, $data->content);

// $conn->query("UPDATE blogs SET title='$title', content='$content' WHERE id=$id");

// send_response(true, "Blog updated successfully", null, 200);
// $method_name = 'POST';
// include 'configure.php';



// $errors = [];

// if (empty($data->id)) {
//     $errors[] = "Blog ID is required";
// }
// if (empty($data->title)) {
//     $errors[] = "Title is required";
// }
// if (empty($data->content)) {
//     $errors[] = "Content is required";
// }

// if (!empty($errors)) {
//     (new ApiResponse(false, "Validation failed", $errors, 400))->send();
// }

// $id = $data->id;
// $title = mysqli_real_escape_string($conn, $data->title);
// $content = mysqli_real_escape_string($conn, $data->content);

// // Make sure to check if update was successful
// $sql = "UPDATE blogs SET title='$title', content='$content' WHERE id=$id";
// if ($conn->query($sql)) {
//     (new ApiResponse(true, "Blog updated successfully", null, 200))->send();
// } else {
//     (new ApiResponse(false, "Failed to update blog", [$conn->error], 500))->send();
// }

$method_name = 'POST';
include 'configure.php';

// Decode JSON input


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