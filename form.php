<?php
require_once 'config.php';
require_once 'function.php';

    // register
if (isset($_GET['send'])) { 
    $result = $register();

    header('Location: ' 
        . SCRIPT_FILE 
        . ($result 
            ? '?' . $result
            : ''
        ) 
    );
    exit;
}

if (isset($_GET['signin'])) {
    $signin();
    exit;
}


if (isset($_GET['logout'])) {
    $logout();
    exit;
}



