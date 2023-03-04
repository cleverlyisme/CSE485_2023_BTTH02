<?php
class ArticleService{
    public function getAllArticles(){
       $dbConn = new DBConnection();
       $conn = $dbConn->getConnection();

        $sql = "SELECT * FROM baiviet";
        $stmt = $conn->query($sql);

        $articles = [];
        while($row = $stmt->fetch()){
            $article = new Article($row['tieude'], $row['tomtat'], $row['noidung']);
            array_push($articles,$article);
        }

        return $articles;
    }
}