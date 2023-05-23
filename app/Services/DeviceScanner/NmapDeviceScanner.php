<?php

namespace App\Services\DeviceScanner;



use App\Repositories\DeviceRepository\DeviceRepositoryInterface;

class NmapDeviceScanner implements ScannerInterface
{
    public function __construct(protected DeviceRepositoryInterface $deviceRepository)
    {}

    public function scan(): array
    {
        $devices = $this->retrieveDevices();
        $this->deviceRepository->saveAll($devices);
    }

    private function retrieveDevices(): array
    {
        // Return list of devices as an array
        return [
            [
                'ip_address' => '192.168.1.1',
                'mac_address' => '00:11:22:33:44:55',
                'device_name' => 'Router',
                'open_ports' => [80, 443],
            ],
            [
                'ip_address' => '192.168.1.2',
                'mac_address' => '00:11:22:33:44:66',
                'device_name' => 'Laptop',
                'open_ports' => [22, 80, 443],
            ],
        ];
    }
}
