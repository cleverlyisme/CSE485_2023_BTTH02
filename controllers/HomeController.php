<?php
include 'views/includes/boostrap.php';
class HomeController{
    private $articleService;

    public function __construct() {
        $this->articleService = new ArticleService();
    }

    public function index(){
        $data = $this->articleService->getAll();
        
        include("views/home/index.php");
    }

    public function search() {
        if (isset($_POST['search'])) 
            $data=$_POST['search'] != '' ? 
                $this->articleService->getByName($_POST['search']) 
                    : $this->articleService->getAll();
        else $data = $this->articleService->getAll();

        include("views/home/index.php");
    }

}

