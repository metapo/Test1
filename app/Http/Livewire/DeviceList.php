<?php

namespace App\Http\Livewire;

use App\Services\DeviceService;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Livewire\Component;
use Livewire\WithPagination;

class DeviceList extends Component
{
    use WithPagination;

    public $sortBy = 'ip_address';
    public $sortDirection = 'asc';
    public $perPage = 20;
    protected $paginationTheme = 'bootstrap';
    public $queryStrings;

    public function render(DeviceService $deviceService, Request $request)
    {
        $this->getQueryStrings($request);

        $devices = $deviceService
            ->filterDevices($this->queryStrings)
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

    private function getQueryStrings(Request $request)
    {
        if (!$this->queryStrings) {
            $this->queryStrings = $request->only(['keyword', 'type']);
        }
    }
}
