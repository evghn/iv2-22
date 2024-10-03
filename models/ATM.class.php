<?php

class ATM
{
    const COMPANY = 'ATM corp.💰';
    public string $version = '';
    public int $height = 0;
    public int $width = 0;
    public int $deep = 0;
    public int $ip = 0;
    public int $weight = 0;
    public int $cashVolume = 0;


    public function __construct(array $data)
    {
        Assist::construct($this, $data);
    }


    public function getInfo(bool $toString = false, ?array $data = null): array|string
    {
        
        return Assist::getInfo($this, $toString, $data);
    }

    public function getParam(string $param, bool $toString = false): array|string|null
    {
        return Assist::getParam($this, $param, $toString);
    }
}
