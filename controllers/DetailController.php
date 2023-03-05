<?php
include 'views/includes/boostrap.php';
class DetailController {
    private $articleService;

    public function __construct() {
        $this->articleService = new ArticleService();
    }

    public function index() {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if (!$id) header("Location: ?controller=home");

        $data = $this->articleService->get($id);
        
        include("views/detail/detail.php");
    }
}