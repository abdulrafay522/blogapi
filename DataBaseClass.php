<?php
// $conn = new mysqli("localhost", "root", "", "blog_system");
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }
class DataBaseClass {
    public $conn;
    public $host;
    public $user;
    public $password;
    public $database;
    public $query;

    function __construct($coming_host, $coming_user, $coming_password, $coming_database) {
        $this->host = $coming_host;
        $this->user = $coming_user;
        $this->password = $coming_password;
        $this->database = $coming_database;
    }

    function makeConnection() {
        $this->conn = new mysqli(
            $this->host,
            $this->user,
            $this->password,
            $this->database
        );

        $this->checkConnection();
    }

    function checkConnection() {
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    function setQuery($query) {
        $this->query = $query;
    }

    function runQuery() {
        $this->conn->query($this->query);
    }
}

// $data = json_decode(file_get_contents("php://input"));
?> 