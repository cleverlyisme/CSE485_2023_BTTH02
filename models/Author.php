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
}