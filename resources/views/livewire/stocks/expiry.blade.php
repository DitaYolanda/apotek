<div>
    <x-adminlte-input
        name="search"
        label="Search"
        placeholder="search"
        igroup-size="md"
        wire:model="search"
    >
        <x-slot name="prependSlot">
            <div class="input-group-text">
                <i class="fas fa-search"></i>
            </div>
        </x-slot>
    </x-adminlte-input>

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nama Obat</th>
                    <th scope="col">No Batch</th>
                    <th scope="col">No Exp</th>
                    <th scope="col">Stok</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($expires as $expiry)
                    <tr scope="row">
                        <td>{{ $expiry->id }}</td>
                        <td>{{ $expiry->medicine->nama_obat }}</td>
                        <td>{{ $expiry->no_batch }}</td>
                        <td>{{ $expiry->no_exp }} <span class="font-italic">({{ Carbon\Carbon::parse($expiry->no_exp)->diffForHumans() }})</span></td>
                        <td>{{ $expiry->stok }}</td>
                        <td>
                            <span
                                @class([
                                    'badge',
                                    'badge-primary' => in_array($expiry->status, ['Active']),
                                    'badge-danger' => in_array($expiry->status, ['Expired']),
                                    'badge-success' => in_array($expiry->status, ['Almost Expired'])
                                ])
                            >
                                {{ $expiry->status }}
                            </span>
                        </td>
                        <td>
                            @can('gudang')
                                @if ($expiry->status === 'Active')
                                    <button
                                        class="btn btn-xs btn-default text-warning mx-1"
                                        title="Mark Almost Expired"
                                        wire:click="markAlmostExpired({{ $expiry->id }})"
                                    >
                                        <i class="fa fa-lg fa-fw fa-check"></i>
                                    </button>
                                @endif
                                @if ($expiry->status === 'Almost Expired')
                                    <button
                                        class="btn btn-xs btn-default text-danger mx-1"
                                        title="Mark Expired"
                                        wire:click="markExpired({{ $expiry->id }})"
                                    >
                                        <i class="fa fa-lg fa-fw fa-times"></i>
                                    </button>
                                @endif
                            @endcan
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">No Records found ...</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{ $expires->links() }}
</div>