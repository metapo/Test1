<?php

namespace App\Device\Repositories;

use App\Models\Device;
use App\Repositories\Device\DeviceRepositoryInterface;
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
