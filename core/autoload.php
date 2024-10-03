<?php

function autoload($class) {
    
    $fileName = __DIR__ . "/../models/$class.class.php";
    if (file_exists($fileName)) {
        require $fileName;
    }
}

spl_autoload_register('autoload');
