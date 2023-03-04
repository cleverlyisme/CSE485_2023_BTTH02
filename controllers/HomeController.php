<?php
include("services/ArticleService.php");
class HomeController{
    public function index(){
        $articelService = new ArticleService();
        include("views/home/index.php");
    }
}