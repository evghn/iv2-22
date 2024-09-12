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
        $result = null;        
        if ($login && $password) {
            if ($data = $file_load()) {
                if (! isset($data[$login])) {
                    //user not exist
                    $addUser($data, $login, $password);
                    $file_write($data); 
                } else {
                    //user exist
                    $result = "error=user: $login is exist";
                }
            } else {
                $addUser($data, $login, $password);
                $file_write($data);
            }
        }

        return $result;
    };


    $signin = function($login, $password) use($file_load) {        
        $result = 'error=user not found';        
        if ($login && $password) {
            if (($data = $file_load()) && isset($data[$login])) {
                $user = $data[$login];
                if (password_verify($password, $user['password'])) {
                   $result = 'token=' . $user['token'];
                }
            }
        }

        return $result;
    };

    $logout = function($token) use($file_load) {
        if ($token && ($data = $file_load())) {
            if ($user = array_filter($data, function($val) use($token) {
                return $val['token'] == $token;   
            })) {
                
            }
        }
    };

