<div class="row">
    <div class="col">
        <div class="my-3">
            <form action="{{route('home')}}" method="get">
                @csrf
                <div class="btn-toolbar justify-content-between col-6 " role="toolbar" aria-label="Toolbar with button groups">
                    <div class="btn-group" role="toolbar" aria-label="First group">
                        <div class="input-group-text" id="btnGroupAddon">Filter By</div>
                        <div class="btn-group" role="toolbar" aria-label="Basic radio toggle button group">
                            <input type="radio" value="ip_address" class="btn-check" id="btnradioip" autocomplete="off" name="type" {{ (!isset($queryStrings['type']) or ($queryStrings['type'] == 'ip_address')) ? 'checked' : '' }}>
                            <label class="btn btn-outline-primary" for="btnradioip">IP Address</label>

                            <input type="radio" value="mac" class="btn-check" id="btnradiomac" autocomplete="off" name="type" {{ (isset($queryStrings['type']) and ($queryStrings['type'] == 'mac')) ? 'checked' : ''}}>
                            <label class="btn btn-outline-primary" for="btnradiomac">MAC</label>

                            <input type="radio" value="device_name" class="btn-check" id="btnradiodevicename" autocomplete="off" name="type" {{ (isset($queryStrings['type']) and ($queryStrings['type'] == 'device_name')) ? 'checked' : '' }}>
                            <label class="btn btn-outline-primary" for="btnradiodevicename">Device Name</label>

                            <input type="radio" value="open_ports" class="btn-check" id="btnradioopenoprt" autocomplete="off" name="type" {{ (isset($queryStrings['type']) and ($queryStrings['type'] == 'open_ports')) ? 'checked' : '' }}>
                            <label class="btn btn-outline-primary" for="btnradioopenoprt">Open Ports</label>
                        </div>
                    </div>
                    <div class="input-group my-3">
                        <input type="text" class="form-control" placeholder="Type here" aria-label="Type here" aria-describedby="btnGroupAddon" name="keyword" value="{{ $queryStrings['keyword'] ?? '' }}">
                        <button type="submit" class="btn btn-success">Filter</button>
                        <a class="btn btn-light" href="{{ route('home') }}">Reset Filter</a>
                    </div>
                </div>
            </form>
        </div>
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

