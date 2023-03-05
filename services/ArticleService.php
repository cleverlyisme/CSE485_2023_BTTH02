<?php
class ArticleService {
    private $articleModel;

    public function __construct() {
        $this->articleModel = new Article();
    }

    public function get($id) {
        return $this->articleModel->get($id);
    }

    public function getAll() {
        return $this->articleModel->getAll();
    }

    public function insert() {
        $target_dir = "./assets/images/songs/";
        $target_file = $target_dir . basename($_FILES["imgUpload"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        
        if(isset($_POST["submit"])) {
            $tieude = $_POST["tieude"];
            $ten_bhat = $_POST["ten_bhat"];
            $ma_tloai = $_POST["ma_tloai"];
            $tomtat = $_POST["tomtat"];
            $noidung = $_POST["noidung"];
            $ma_tgia = $_POST["ma_tgia"];
            $ngayviet = $_POST["ngayviet"];

            if ($tieude == '' || $ten_bhat == '' || $tomtat == '' || $ngayviet == '') {
                header("Location: ?controller=article&action=add&error='Giá trị không hợp lệ'");
                exit();
            }
            
            if (!basename($_FILES["imgUpload"]["name"])) {    
                $result = $this->articleModel->insertWithoutImg([
                    'tieude' => $tieude, 
                    'ten_bhat' => $ten_bhat,
                    'ma_tloai' => $ma_tloai,
                    'tomtat' => $tomtat,
                    'noidung' => $noidung,
                    'ma_tgia' => $ma_tgia,
                    'ngayviet' => $ngayviet,
                ]);
                
                if ($result) header("Location: ?controller=article");
                else header("Location: ?controller=article&error='Theem thất bại'");
            } else {
                $check = getimagesize($_FILES["imgUpload"]["tmp_name"]);
                if(!$check) 
                    header("Location: ?controller=article&action=edit&id=$ma_bviet&error='File is not an image.'");
                
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif" ) 
                    header("Location: ?controller=article&action=edit&id=$ma_bviet&error='Sorry, only JPG, JPEG, PNG & GIF files are allowed.'");
            
                if (move_uploaded_file($_FILES["imgUpload"]["tmp_name"], $target_file)) {
                    $result = $this->articleModel->insert([
                        'tieude' => $tieude, 
                        'ten_bhat' => $ten_bhat,
                        'ma_tloai' => $ma_tloai,
                        'tomtat' => $tomtat,
                        'noidung' => $noidung,
                        'ma_tgia' => $ma_tgia,
                        'ngayviet' => $ngayviet,
                        'hinhanh' => basename($_FILES["imgUpload"]["name"])
                    ]);
 
                    if ($result) header("Location: ?controller=article");
                    else header("Location: ?controller=article&error='Thêm thất bại'");
                } else {
                    header("Location: ?controller=article&error='Thêm thất bại'");
                }
            }
        }
    }

    public function update() {
        $target_dir = './assets/images/songs/';
        $target_file = $target_dir . basename($_FILES["imgUpload"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if(isset($_POST["submit"])) {
            $ma_bviet = $_POST["ma_bviet"];
            $tieude = $_POST["tieude"];
            $ten_bhat = $_POST["ten_bhat"];
            $ma_tloai = $_POST["ma_tloai"];
            $tomtat = $_POST["tomtat"];
            $noidung = $_POST["noidung"];
            $ma_tgia = $_POST["ma_tgia"];
            $ngayviet = $_POST["ngayviet"];

            if ($tieude == '' || $ten_bhat == '' || $tomtat == '' || $ngayviet == '') {
                header("Location: ?controller=article&action=edit&id=$ma_bviet&error='Giá trị không hợp lệ'");
                exit();
            }
    
            if (!basename($_FILES["imgUpload"]["name"])) {
                $result = $this->articleModel->updateWithoutImg([
                    'tieude' => $tieude, 
                    'ten_bhat' => $ten_bhat,
                    'ma_tloai' => $ma_tloai,
                    'tomtat' => $tomtat,
                    'noidung' => $noidung,
                    'ma_tgia' => $ma_tgia,
                    'ngayviet' => $ngayviet,
                    'ma_bviet' => $ma_bviet
                ]);

                if ($result) header("Location: ?controller=article");
                else header("Location: ?controller=article&error='Cập nhật thất bại'");
            } else {
                $check = getimagesize($_FILES["imgUpload"]["tmp_name"]);
                if(!$check) 
                    header("Location: ?controller=article&action=edit&id=$ma_bviet&error='File is not an image.'");
                
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif" ) 
                    header("Location: ?controller=article&action=edit&id=$ma_bviet&error='Sorry, only JPG, JPEG, PNG & GIF files are allowed.'");

                if (move_uploaded_file($_FILES["imgUpload"]["tmp_name"], $target_file)) {
                    $result = $this->articleModel->update([
                        'tieude' => $tieude, 
                        'ten_bhat' => $ten_bhat,
                        'ma_tloai' => $ma_tloai,
                        'tomtat' => $tomtat,
                        'noidung' => $noidung,
                        'ma_tgia' => $ma_tgia,
                        'ngayviet' => $ngayviet,
                        'hinhanh' => basename($_FILES["imgUpload"]["name"]),
                        'ma_bviet' => $ma_bviet
                    ]);

                    if ($result) header("Location: ?controller=article");
                    else header("Location: ?controller=article&error='Cập nhật thất bại'"); 
                } else {
                    header("Location: ?controller=article&error='Cập nhật ảnh thất bại'");
                }
            }
        }
    }

    public function delete() {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if (!$id) header("Location: ?controller=article");

       $result = $this->articleModel->delete(['ma_bviet' => $id]);

       if ($result) header("Location: ?controller=article");
        else header("Location: ?controller=article&error='Xóa thất bại'");
    }
}