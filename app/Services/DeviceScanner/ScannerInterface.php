<?php

namespace App\Services\DeviceScanner;

interface ScannerInterface
{
    public function scan(string $ipRange, int $timeout) : array;
}
