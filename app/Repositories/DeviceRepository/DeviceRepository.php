<?php

namespace App\Repositories\DeviceRepository;

use App\Models\Device;

use App\Repositories\RepositoryOptions;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

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
        $this->builder = Device::query()->select(['ip_address', 'mac', 'device_name', 'open_ports', 'created_at']);
        return $this->builder;
    }

    public function sort($query, $sortColumn, $sortOrder): Builder
    {
        switch ($sortColumn) {
            case 'ip_address':
                $sortColumn = DB::raw('INET_ATON(ip_address)');
                break;
            case 'mac':
                $sortColumn = DB::raw('CONV(REPLACE(mac, ":", ""), 16, 10)');
                break;
        }
        return $query->orderBy($sortColumn, $sortOrder);
    }
}
