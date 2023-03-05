<?php
class AuthorService {
    private $authorModel;

    public function __construct() {
        $this->authorModel = new Author();
    }
    public function get($id) {
        
        return $this->authorModel->get($id);
    }
    public function getAll() {
        return $this->authorModel->getAll();
    }
    
    public function getCount() {
        return $this->authorModel->getCount();
    }

    public function insert() {
        if(isset($_POST)) {
            $ten_tgia = $_POST["ten_tgia"];
            $hinh_tgia = $_POST["hinh_tgia"];


            if ($ten_tloai == '') {
                header("Location: ?controller=author&action=add&error='Giá trị không hợp lệ'");
                exit();
            }

                    $result = $this->authorModel->insert([
                        'ten_tloai' => $ten_tloai,
                        'hinh_tgia' => $hinh_tgia,
                    ]);

                    if ($result) header("Location: ?controller=author");
                    else header("Location: ?controller=author&error='Thêm thất bại'");
                    header("Location: ?controller=author&error='Thêm thất bại'");
                }
    }
}