<?php
include 'views/includes/boostrap.php';
class AuthorController {
    private $authorService;
    public function __construct() {
        $this->authorService = new AuthorService();
    }
    public function index(){
        $data = $this->authorService->getAll();
        include("views/admin/author/author.php");
    }
    public function add() {
        include("views/admin/author/add_author.php");
    }
    public function insert() {
        $insert = $this->authorService->insert();
    }
    public function edit() {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if (!$id) header("Location: ?controller=author");

        $author = $this->authorService->get($id);
        include("views/admin/author/edit_author.php");
    }
    public function update() {
        $this->authorService->update();
    }
}