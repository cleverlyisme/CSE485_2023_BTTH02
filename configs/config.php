<?php
define('DEV', true); 
$this_folder   = substr(__DIR__, strlen($_SERVER['DOCUMENT_ROOT']));
$parent_folder = dirname($this_folder);
define("DOC_ROOT", $parent_folder . '/views/');


$type     = 'mysql';            
$server   = 'localhost';            
$db       = 'btth01_cse485';    
$port     = '3306';                    
$charset  = 'utf8mb4';               
$username = 'root';         
$password = '';         

$dsn = "$type:host=$server;dbname=$db;port=$port;charset=$charset"; // Create DSN

define('UPLOADS', dirname(__DIR__, 1) . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR); 
define('MEDIA_TYPES', ['image/jpeg', 'image/png', 'image/gif',]); 
define('FILE_EXTENSIONS', ['jpeg', 'jpg', 'png', 'gif',]);
define('MAX_SIZE', '5242880');