<?php

namespace App\Repositories\DeviceRepository;

use App\Repositories\RepositoryInterface;

interface DeviceRepositoryInterface extends RepositoryInterface
{
    public function saveAll(array $devices);
}
