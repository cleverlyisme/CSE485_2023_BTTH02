<?php
class Author {
    private $db;

    public function __construct() {
        $this->db = new Database();                               
    }

    public function getAll(){
        $this->db = new Database();                               

        $sql = "SELECT * FROM tacgia;";

        return $this->db->runSql($sql)->fetchAll();
    }
    
    public function getCount() {
        $sql = "SELECT COUNT(*) as count FROM tacgia;";

        return $this->db->runSql($sql)->fetch()['count'];
    }
}