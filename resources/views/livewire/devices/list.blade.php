<div class="row">
    <div class="col">
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th scope="col">
                    IP Address
                    <span wire:click="sortBy('ip_address')" style="cursor: pointer">
                                <i class="bi bi-arrow-up float-end {{ $sortBy === 'ip_address' && $sortDirection === 'asc' ? 'text-info' : 'text-muted' }}"></i>
                                <i class="bi bi-arrow-down float-end {{ $sortBy === 'ip_address' && $sortDirection === 'desc' ? 'text-info' : 'text-muted' }}"></i>
                    </span>
                </th>
                <th scope="col">
                    MAC
                    <span wire:click="sortBy('mac')" style="cursor: pointer">
                                <i class="bi bi-arrow-up float-end float-end {{ $sortBy === 'mac' && $sortDirection === 'asc' ? 'text-info' : 'text-muted' }}"></i>
                                <i class="bi bi-arrow-down float-end {{ $sortBy === 'mac' && $sortDirection === 'desc' ? 'text-info' : 'text-muted' }}"></i>
                    </span>
                </th>
                <th scope="col">
                    Device Name
                    <span wire:click="sortBy('device_name')" style="cursor: pointer">
                               <i class="bi bi-arrow-up float-end {{ $sortBy === 'device_name' && $sortDirection === 'asc' ? 'text-info' : 'text-muted' }}"></i>
                               <i class="bi bi-arrow-down float-end {{ $sortBy === 'device_name' && $sortDirection === 'desc' ? 'text-info' : 'text-muted' }}"></i>
                   </span>
                </th>
                <th scope="col">
                    Open Ports
                    <span wire:click="sortBy('open_ports')" style="cursor: pointer">
                               <i class="bi bi-arrow-up float-end {{ $sortBy === 'open_ports' && $sortDirection === 'asc' ? 'text-info' : 'text-muted' }}"></i>
                               <i class="bi bi-arrow-down float-end {{ $sortBy === 'open_ports' && $sortDirection === 'desc' ? 'text-info' : 'text-muted' }}"></i>
                    </span>
                </th>
                <th scope="col">
                    Created At
                    <span wire:click="sortBy('created_at')" style="cursor: pointer">
                               <i class="bi bi-arrow-up float-end {{ $sortBy === 'created_at' && $sortDirection === 'asc' ? 'text-info' : 'text-muted' }}"></i>
                               <i class="bi bi-arrow-down float-end {{ $sortBy === 'created_at' && $sortDirection === 'desc' ? 'text-info' : 'text-muted' }}"></i>
                    </span>
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($devices as $device)
                <tr>
                    <td>{{ $device->ip_address }}</td>
                    <td>{{ $device->mac }}</td>
                    <td>{{ $device->device_name }}</td>
                    <td>{{ $device->open_ports ? implode(', ', $device->open_ports) : ''  }}</td>
                    <td>{{ $device->created_at }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-center">
            {{ $devices->links() }}
        </div>

    </div>
</div>

