<?php


$method_name = 'POST';
include 'configure.php';



if (empty($data->id)) {
    (new ApiResponse(false, "Blog ID is required", null, 400))->send();
}

$id = $data->id;

// Delete the blog
$sql = "DELETE FROM blogs WHERE id=$id";
if ($conn->query($sql)) {
    if ($conn->affected_rows > 0) {
        (new ApiResponse(true, "Blog deleted successfully", null, 200))->send();
    } else {
        (new ApiResponse(false, "No blog found with this ID", null, 404))->send();
    }
} else {
    (new ApiResponse(false, "Failed to delete blog", [$conn->error], 500))->send();
}
?>