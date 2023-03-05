<?php
class AuthorService {
    private $authorModel;

    public function __construct() {
        $this->authorModel = new Author();
    }

    public function getAll() {
        return $this->authorModel->getAll();
    }
    
    public function getCount() {
        return $this->authorModel->getCount();
    }
}
