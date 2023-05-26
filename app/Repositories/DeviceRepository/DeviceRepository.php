<?php

namespace App\Repositories\DeviceRepository;

use App\Models\Device;

use App\Repositories\RepositoryOptions;
use Illuminate\Database\Eloquent\Builder;

class DeviceRepository implements DeviceRepositoryInterface
{
    use RepositoryOptions;

    protected $builder;

    public function saveAll(array $devices): void
    {
        /** @var array $device */
        foreach ($devices as $device) {
            Device::create($device);
        }
    }

    public function getAll(): Builder
    {
        $this->builder = Device::query();
        return $this->builder;
    }
}
