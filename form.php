<?php
require_once 'config.php';
require_once 'function.php';

    // register
if (isset($_GET['send'])) { 
    $register();

    header('Location: ' . SCRIPT_FILE);
    exit;
}

if (isset($_GET['signin'])) {
    $signin();
    exit;
}
