<?php

class ATMv2 extends ATM
{
    private const COMPANY2 = 'ATM v2';

    public bool $giveCash = false;
    public string $display = '';
    public bool $NFC = false;

    public function companyInfo()
    {
        return self::COMPANY2;
    }
}
