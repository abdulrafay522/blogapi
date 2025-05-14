<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

include 'response.php';     
include 'DataBaseClass.php';

$DB_Class = new DataBaseClass('localhost', 'root', '', 'blog_system');
$DB_Class->makeConnection();
include 'routes_connection_post.php';
?> 