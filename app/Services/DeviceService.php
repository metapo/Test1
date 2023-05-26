<?php

namespace App\Services;

use App\Repositories\DeviceRepository\DeviceRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;

class DeviceService
{
    private ?Builder $devices = null;

    public function __construct(protected DeviceRepositoryInterface $deviceRepository)
    {}

    private function loadAllDevices(): void
    {
        if (!$this->devices) {
            $this->devices = $this->deviceRepository->getAll();
        }
    }

    public function filterDevices($filters): self
    {
        $filters = $this->prepareFilters($filters);
        if ($filters) {
            $this->loadAllDevices();
            $this->devices = $this->deviceRepository->filter($this->devices, $filters);
        }

        return $this;
    }

    public function sortDevices($sortColumn, $sortOrder): self
    {
        $this->loadAllDevices();
        $this->devices = $this->deviceRepository->sort($this->devices, $sortColumn, $sortOrder);
        return $this;
    }

    public function paginate($perPage = 10): Paginator
    {
        $this->loadAllDevices();
        return $this->deviceRepository->paginate($this->devices, $perPage);
    }

    private function prepareFilters($filters)
    {
        if (key_exists('type', $filters) and  key_exists('keyword', $filters)) {
            if (!empty($filters['keyword']) and !empty($filters['type'])) {
                if (in_array($filters['type'], ['ip_address', 'mac', 'device_name', 'open_ports'])) {
                    return [$filters['type'] => $filters['keyword']];
                }
            }
        }
        return [];
    }
}
