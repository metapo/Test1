<?php

namespace App\Repositories\DeviceRepository;

use App\Models\Device;

use Illuminate\Support\Collection;

class DeviceRepository implements DeviceRepositoryInterface
{
    public function saveAll(array $devices)
    {
        /** @var Device $device */
        foreach ($devices as $device) {
            //save device in Device model
//            Device::updateOrCreate(
        }
    }
}
