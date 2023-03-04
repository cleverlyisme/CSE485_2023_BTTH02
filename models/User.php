<?php
class User {
    private $us;

    private $username;
    private $password;


    public function __construct($username, $password){
        $this->username = $username;
        $this->password = $password;
    }

    public function login() {
        $this->us = new UserService();
 
        return $this->us->get($this->username, $this->password);
     }
}