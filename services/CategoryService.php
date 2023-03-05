<?php
class CategoryService {
    private $categoryModel;

    public function __construct() {
        $this->categoryModel = new Category();
    }

    public function getAll() {
        return $this->categoryModel->getAll();
    }

    public function getCount() {
        return $this->categoryModel->getCount();
    }
}