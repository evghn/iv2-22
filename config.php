<?php

const FILE_DB = 'file.db';
const FORM_FILE = 'form.php';
const SCRIPT_FILE = 'main.php';
const TIME_EXPIRE = 3600;

$auth = isset($_GET['token']);
$reg = isset($_GET['register']);
$signin = isset($_GET['sign-in']);
$error = isset($_GET['error']) 
    ? $_GET['error']
    : null;

var_dump($auth, $reg, $signin, $_GET, $error);
