<?php

namespace App\Repositories\DeviceRepository;

use App\Models\Device;

use Illuminate\Support\Collection;

class DeviceRepository implements DeviceRepositoryInterface
{
    public function saveDevices(Collection $devices)
    {
        /** @var Device $device */
        foreach ($devices as $device) {
            //save device in Device model
//            Device::updateOrCreate(
        }
    }
}
