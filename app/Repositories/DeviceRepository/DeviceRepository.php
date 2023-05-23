<?php

namespace App\Repositories\DeviceRepository;

use App\Models\Device;

use Illuminate\Support\Collection;

class DeviceRepository implements DeviceRepositoryInterface
{
    public function saveAll(array $devices)
    {
        /** @var array $device */
        foreach ($devices as $device) {
            Device::create($device);
        }
    }
}
