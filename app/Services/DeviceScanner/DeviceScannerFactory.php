<?php

namespace App\Services\DeviceScanner;

class DeviceScannerFactory
{
    public function create(): ScannerInterface
    {
        switch (config('device-scanner.driver')) {
            case 'nmap':
                return new NmapDeviceScanner();
            default:
                throw new \InvalidArgumentException('Invalid scanner type.');
        }
    }
}
