<?php
class CMS
{
    protected $db        = null;                  
    protected $article   = null;    
    protected $author   = null;                 
    protected $category  = null;                   
    protected $user    = null;                   

    public function __construct($dsn, $username, $password)
    {
        $this->db = new Database($dsn, $username, $password); 
    }

    // public function getArticle()
    // {
    //     if ($this->article === null) {                       
    //         $this->article = new Article($this->db);         
    //     }
    //     return $this->article;                               
    // }

    // public function getAuthor()
    // {
    //     if ($this->author === null) {                       
    //         $this->author = new Author($this->db);         
    //     }
    //     return $this->author;                               
    // }

    // public function getCategory()
    // {
    //     if ($this->category === null) {                       
    //         $this->category = new Category($this->db);        
    //     }
    //     return $this->category;                             
    // }

    // public function getUser()
    // {
    //     if ($this->user === null) {               
    //         $this->user = new User($this->db);         
    //     }
    //     return $this->user;                          
    // }
}