<?php
class Article {
    private $db;

    public function __construct() {
        $this->db = new Database();                               
    }

    public function get($id) { 
        $sql = "SELECT ma_bviet, tieude, ten_bhat, ten_tloai, tomtat, noidung, ten_tgia, ngayviet, hinhanh FROM baiviet LEFT JOIN theloai ON baiviet.ma_tloai = theloai.ma_tloai LEFT JOIN tacgia ON baiviet.ma_tgia = tacgia.ma_tgia WHERE ma_bviet=:ma_bviet;";

       $arguments = ['ma_bviet' => $id];

       return $this->db->runSql($sql, $arguments)->fetch();
    }

    public function getByName($name) { 
        $sql = "SELECT ma_bviet, tieude, hinhanh FROM baiviet WHERE tieude REGEXP :tieude;";

       $arguments = ['tieude' => $name];

       return $this->db->runSql($sql, $arguments)->fetchAll();
    }

    public function getAll(){
        $sql = "SELECT ma_bviet, tieude, ten_bhat, ten_tloai, tomtat, ten_tgia, ngayviet, hinhanh FROM baiviet LEFT JOIN theloai ON baiviet.ma_tloai = theloai.ma_tloai LEFT JOIN tacgia ON baiviet.ma_tgia = tacgia.ma_tgia;";

        return $this->db->runSql($sql)->fetchAll();
    }
    
    public function getCount() {
        $sql = "SELECT COUNT(*) as count FROM baiviet;";

        return $this->db->runSql($sql)->fetch()['count'];
    }

    public function insertWithoutImg($arguments) {
        $sql = "INSERT INTO baiviet (tieude, ten_bhat, ma_tloai, tomtat, noidung, ma_tgia, ngayviet) VALUE (:tieude, :ten_bhat, :ma_tloai, :tomtat, :noidung, :ma_tgia, :ngayviet);";

       return $this->db->runSql($sql, $arguments);
    }

    public function insert($arguments) {
        $sql = "INSERT INTO baiviet (tieude, ten_bhat, ma_tloai, tomtat, noidung, ma_tgia, ngayviet, hinhanh) VALUE (:tieude, :ten_bhat, :ma_tloai, :tomtat, :noidung, :ma_tgia, :ngayviet, :hinhanh);";

       return $this->db->runSql($sql, $arguments);
    }

    public function updateWithoutImg($arguments) {
        $sql = "UPDATE baiviet SET tieude=:tieude, ten_bhat=:ten_bhat, ma_tloai=:ma_tloai, tomtat=:tomtat, noidung=:noidung, ma_tgia=:ma_tgia, ngayviet=:ngayviet WHERE ma_bviet=:ma_bviet;";

       return $this->db->runSql($sql, $arguments);
    }

    public function update($arguments) {
        $sql = "UPDATE baiviet SET tieude=:tieude, ten_bhat=:ten_bhat, ma_tloai=:ma_tloai, tomtat=:tomtat, noidung=:noidung, ma_tgia=:ma_tgia, ngayviet=:ngayviet, hinhanh=:hinhanh WHERE ma_bviet=:ma_bviet;";
        
       return $this->db->runSql($sql, $arguments);
    }

    public function delete($arguments) {
        $sql = "DELETE FROM baiviet WHERE ma_bviet=:ma_bviet;";

       return $this->db->runSql($sql, $arguments);
    }
}