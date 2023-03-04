<?php
class UserService {
    private $db;

    public function __construct() {
        $this->db = new Database();                               
    }

    public function get($username, $password){
       $sql = "SELECT * FROM users WHERE username=:username and password=:password";

       $arguments = ['username' => $username, 'password' => $password];

       return $this->db->runSql($sql, $arguments)->fetch();
    }
}