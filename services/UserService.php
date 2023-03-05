<?php
class UserService {
    private $userModel;

    public function __construct() {
        $this->userModel = new User();                               
    }

    public function login($username, $password) {
        return $this->userModel->get($username, $password);
    }
}