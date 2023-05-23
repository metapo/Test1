<?php

namespace App\Repositories\Device;

use Illuminate\Support\Collection;

interface DeviceRepositoryInterface
{
    public function saveDevices(Collection $devices);
}
