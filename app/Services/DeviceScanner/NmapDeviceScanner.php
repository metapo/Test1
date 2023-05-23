<?php

namespace App\Services\DeviceScanner;



use App\Models\Device;

class NmapDeviceScanner implements ScannerInterface
{
    public function __construct()
    {}

    public function scan(): array
    {
        return Device::factory(4)->make()->map(function ($device) {
            return collect($device->toArray())->all();
        })->all();
    }


}
