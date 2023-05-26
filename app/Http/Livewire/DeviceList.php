<?php

namespace App\Http\Livewire;

use App\Services\DeviceService;
use Livewire\Component;
use Livewire\WithPagination;

class DeviceList extends Component
{
    use WithPagination;

    public $sortBy = 'ip_address';
    public $sortDirection = 'asc';
    public $perPage = 5;
    protected $paginationTheme = 'bootstrap';
    public $filters = [];


    public function render(DeviceService $deviceService)
    {
        $devices = $deviceService
            ->filterDevices($this->filters)
            ->sortDevices($this->sortBy, $this->sortDirection)
            ->paginate($this->perPage);

        return view('livewire.devices.list', compact('devices'));
    }

    public function sortBy($columnName)
    {
        if ($this->sortBy === $columnName) {
            $this->sortDirection = $this->swapSortDirection();
        } else {
            $this->sortDirection = 'asc';
        }

        $this->sortBy = $columnName;
    }

    private function swapSortDirection()
    {
        return $this->sortDirection === 'asc' ? 'desc' : 'asc';
    }
}
