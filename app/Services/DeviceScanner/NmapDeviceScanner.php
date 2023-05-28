<?php

namespace App\Services\DeviceScanner;

use Nmap\Nmap;

class NmapDeviceScanner implements ScannerInterface
{
    public function __construct()
    {}

    public function scan(string $ipRange, int $timeout): array
    {
        $hosts = Nmap::create($ipRange)
            ->setTimeout($timeout)
            ->scan([$ipRange]);

        return $this->formatDevices($hosts);
    }

    private function formatDevices(array $hosts) : array
    {
        $devices = [];
        foreach ($hosts ?? [] as $host) {
            $ports = [];
            foreach ($host->getOpenPorts() ?? [] as $port) {
                $ports[] = $port->getNumber();
            }
            $device = [
                'ip_address' => key($host->getIpv4Addresses()),
                'mac' => key($host->getMacAddresses()),
                'device_name' => $host->getHostnames()[0]->getName(),
                'open_ports' => $ports,
            ];
            $devices[] = $device;
        }
        return $devices;
    }
}
