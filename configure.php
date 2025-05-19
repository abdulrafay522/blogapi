<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// ✅ Use `require_once` instead of `include`
require_once 'ApiResponse.php';
require_once 'DataBaseClass.php';

$DB_Class = new DataBaseClass('localhost', 'root', '', 'blog_system');
$DB_Class->makeConnection();

require_once 'routes_connection_post.php';
?>
