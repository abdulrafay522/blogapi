<?php

$method_name = 'POST';
include 'configure.php';

$id = $data->id;

if (empty($id)) {
    send_response(false, "Blog ID is required", null, 400);
    exit;
}

$conn->query("DELETE FROM blogs WHERE id=$id");

send_response(true, "Blog deleted successfully", null, 200);
?>