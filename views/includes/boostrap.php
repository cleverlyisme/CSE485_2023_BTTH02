<?php   
define('DEV', true);
define('APP_ROOT', dirname(__FILE__, 3));        

if (DEV === false) {
    set_exception_handler('handle_exception');        
    set_error_handler('handle_error');                   
    register_shutdown_function('handle_shutdown');    
}

spl_autoload_register(function($class) {
    $path = APP_ROOT . '/models/' . $class . '.php';       
    if (file_exists($path))          
        require $path;                     
});

spl_autoload_register(function($class) {
    $path = APP_ROOT . '/services/' . $class . '.php';       
    if (file_exists($path))          
        require $path;                     
});              

spl_autoload_register(function($class) {
    $path = APP_ROOT . '/configs/' . $class . '.php';       
    if (file_exists($path))          
        require $path;                     
});      