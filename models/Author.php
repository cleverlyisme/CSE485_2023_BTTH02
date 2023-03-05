<?php
class Author {
    private $db;

    public function __construct() {
        $this->db = new Database();                               
    }
    public function get($id) { 

        $sql = "SELECT ma_tgia, ten_tgia FROM tacgia WHERE ma_tgia=:ma_tgia;" ;

       $arguments = ['ma_tgia' => $id];

       return $this->db->runSql($sql, $arguments)->fetch();
    }
    public function getAll(){
        $this->db = new Database();                               

        $sql = "SELECT * FROM tacgia;";

        return $this->db->runSql($sql)->fetchAll();
    }
    public function insert($arguments) {
        $sql = "INSERT INTO tacgia (ten_tgia,hinh_tgia) VALUES (:ten_tgia, :ten_tgia)";

       return $this->db->runSql($sql, $arguments);
    }
}