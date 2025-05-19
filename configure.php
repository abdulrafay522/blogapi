<?php


ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once 'ApiResponse.php';
require_once 'DataBaseClass.php';

$DB_Class = new DataBaseClass('localhost', 'root', '', 'blog_system');
$DB_Class->makeConnection();

// Add this line to make $conn available in your main script
$conn = $DB_Class->conn;

require_once 'routes_connection_post.php';

function dd($var){
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
    die();
}
?>
