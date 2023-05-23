<?php

namespace App\Services\DeviceScanner;


use App\Repositories\DeviceRepository\DeviceRepository;

class DeviceScannerFactory
{
    public function create(): ScannerInterface
    {
        switch (config('device-scanner.driver')) {
            case 'nmap':
                return new NmapDeviceScanner(new DeviceRepository());
            default:
                throw new \InvalidArgumentException('Invalid scanner type.');
        }
    }
}
