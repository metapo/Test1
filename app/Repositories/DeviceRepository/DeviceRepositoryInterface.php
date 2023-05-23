<?php

namespace App\Repositories\DeviceRepository;

use Illuminate\Support\Collection;

interface DeviceRepositoryInterface
{
    public function saveDevices(Collection $devices);
}
