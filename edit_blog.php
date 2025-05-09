<?php
$method_name = 'POST';
include 'configure.php';
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
    send_response(false, "Validation failed", null, $errors); // ✅ Correct usage
    exit;
}

$id = $data->id;
$title = mysqli_real_escape_string($conn, $data->title); // ✅ Prevent SQL error
$content = mysqli_real_escape_string($conn, $data->content);

$conn->query("UPDATE blogs SET title='$title', content='$content' WHERE id=$id");

send_response(true, "Blog updated successfully", null, null); // ✅ Correct usage
?>