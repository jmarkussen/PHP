<?php
class DBAuthDemo {
    private $dsn = "mysql:host=localhost;dbname=auth_demo;charset=utf8mb4";
    private $user = "root";
    private $pass = "";
    public PDO $pdo;

    public function __construct() {
        $this->pdo = new PDO($this->dsn, $this->user, $this->pass, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ]);
    }
}
