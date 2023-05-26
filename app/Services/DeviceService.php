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
        $this->loadAllDevices();
        $this->devices = $this->deviceRepository->filter($this->devices, $filters);
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
}
