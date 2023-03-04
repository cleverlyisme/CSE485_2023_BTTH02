<?php
include 'views/includes/boostrap.php';
class LoginController{
    private $user;

    public function index(){
        include("views/login/login.php");
    }

    public function login() {        
        session_start();

        if (isset($_POST['btnLogin'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $remember = $_POST['remember'];

            $this->user = new User($username, $password);

            $data = $this->user->login();

            if($data){
                if ($remember) {
                    $_SESSION['username'] = $username;
                    $_SESSION['password'] = $password;
                } else {
                    unset($_SESSION['username']);
                    unset($_SESSION['password']);
                }

                $_SESSION['user'] = $data['username'];
                header("Location: ?controller=admin");
            } else{
                header("Location: ?controller=login&error='Invalid username or passowrd'");
            }
        }
    }
}