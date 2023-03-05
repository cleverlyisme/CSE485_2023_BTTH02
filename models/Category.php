<?php
class Category {
    private $db;

    public function __construct() {
        $this->db = new Database();                               
    }

    public function getAll(){
        $this->db = new Database();                               

        $sql = "SELECT * FROM theloai;";

        return $this->db->runSql($sql)->fetchAll();
    }

    public function getCount() {
        $sql = "SELECT COUNT(*) as count FROM theloai;";

        return $this->db->runSql($sql)->fetch()['count'];
    }
}