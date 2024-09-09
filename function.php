<?php

    $file_write = fn(string|array $data) => file_put_contents(FILE_DB, json_encode($data));
    
    $file_load = function() use ($file_write): array {
        if (file_exists(FILE_DB)) {
            return json_decode(file_get_contents(FILE_DB), true);
        } else {            
            $file_write([]);
            return [];
        } 
    };

    $addUser = fn(array &$data, string $login, string $password) => 
        $data[$login] = [
            'password' => password_hash($password, PASSWORD_BCRYPT),
            'token' => bin2hex(random_bytes(25)),
            'expire' => time() + TIME_EXPIRE,
        ];
    

    $register = function() use ($addUser, $file_write, $file_load) {
        $login = $_GET['login'];
        $password = $_GET['password'];

        if ($login && $password) {
            if ($data = $file_load()) {
                
            } else {
                $addUser($data, $login, $password);
                $file_write($data);
            }
        }
    };


    $signin = function() use($file_load) {
        $login = $_GET['login'];
        $password = $_GET['password'];
        $url_data = 'error=user not found';

        if ($login && $password) {
            if (($data = $file_load()) && isset($data[$login])) {
                $user = $data[$login];
                if (password_verify($password, $user['password'])) {
                   $url_data = 'token=' . $user['token'];
                }
            }
        }

        header('Location: ' . SCRIPT_FILE . '?' . $url_data);        
    };