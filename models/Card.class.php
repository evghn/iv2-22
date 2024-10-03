<?php

class Card
{
    private string $number = '';
    public string $owner = '';
    public string $expire = '';
    private string $CIV2 = '';
    private string $pin = '';
    public string $typeCard = '';
    public string $bank = '';


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
