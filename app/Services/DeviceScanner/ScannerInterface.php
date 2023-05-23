<?php

namespace App\Services\DeviceScanner;

interface ScannerInterface
{
    public function scan() : array;
}
