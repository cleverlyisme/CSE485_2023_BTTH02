<?php
include 'views/includes/boostrap.php';
class AuthController {
    private $userService;

    public function __construct() {
        $this->userService = new UserService();
    }

    public function index(){
        session_start();
        
        $username = isset($_SESSION['username']) ? $_SESSION['username'] : '';
        $password = isset($_SESSION['password']) ? $_SESSION['password'] : '';

        if (isset($_SESSION['user'])) header('Location: ?controller=admin');

        if(isset($_GET['error'])) {
            echo "<script>alert({$_GET['error']})</script>";
        }

        include("views/login/login.php");
    }

    public function login() {        
        session_start();

        if (isset($_POST['btnLogin'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $remember = $_POST['remember'];

            $data = $this->userService->login($username, $password);

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

    public function logout() {
        session_start();
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
            // session_destroy();
            header("Location: ?controller=auth");
        }
    } 
}