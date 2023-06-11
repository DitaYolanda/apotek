<div>
    <x-adminlte-modal
        id="edit-medicine"
        title="Edit Medicine"
        theme="blue"
        icon="fas fa-capsules"
        size='lg'
        v-centered
        wire:ignore.self
    >
        <form wire:submit.prevent="submit">
            <div class="d-flex flex-column">
                
                @if (session()->has('success'))
                    <x-adminlte-alert theme="success" title="Success">
                        {{ session()->get('success') }}
                    </x-adminlte-alert>
                @endif

                @if (session()->has('errorEdit'))
                    <x-adminlte-alert theme="danger" title="Error">
                        {{ session()->get('errorEdit') }}
                    </x-adminlte-alert>
                @endif
    
                <x-adminlte-input
                    autocomplete="no_batch"
                    name="no_batch"
                    label="No Batch"
                    placeholder="No Batch"
                    wire:model.defer="medicine.no_batch"
                    error-key="medicine.no_batch"
                >
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-clock"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>

                <x-adminlte-input
                    autocomplete="no_exp"
                    id="edit_no_exp"
                    name="no_exp"
                    label="No Exp"
                    type="date"
                    placeholder="No Exp"
                    wire:model.defer="medicine.no_exp"
                    error-key="medicine.no_exp"
                    x-data
                    x-on:click="$el.showPicker()"
                >
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-hourglass"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>

                <x-adminlte-input
                    autocomplete="name"
                    name="name"
                    label="Name"
                    placeholder="Name"
                    wire:model.defer="medicine.nama_obat"
                    error-key="medicine.nama_obat"
                >
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-edit"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>

                <x-adminlte-input
                    autocomplete="uom"
                    name="uom"
                    label="Unit of Measurement"
                    placeholder="Unit of Measurement"
                    wire:model.defer="medicine.satuan"
                    error-key="medicine.satuan"
                >
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-balance-scale"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>

                <x-adminlte-input
                    autocomplete="harga"
                    name="harga"
                    label="Price"
                    type="number"
                    placeholder="Price"
                    wire:model.defer="medicine.harga"
                    error-key="medicine.harga"
                >
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-dollar-sign"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>

                <x-adminlte-select
                    name="category"
                    label="Category"
                    wire:model.defer="medicine.kategori_id"
                    error-key="medicine.kategori_id"
                >
                    <option selected disabled>Select Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->kategori_id }}">{{ $category->nama_kategori }}</option>
                    @endforeach
                </x-adminlte-select>

                <x-adminlte-select
                    name="brand"
                    label="Brand"
                    wire:model.defer="medicine.merek_id"
                    error-key="medicine.merek_id"
                >
                    <option selected disabled>Select Brand</option>
                    @foreach ($brands as $brand)
                        <option value="{{ $brand->merek_id }}">{{ $brand->nama_merek }}</option>
                    @endforeach
                </x-adminlte-select>

                <x-adminlte-button
                    class="btn-flat"
                    type="submit"
                    label="Submit"
                    theme="primary"
                    icon="fas fa-lg fa-save"
                />
            </div>
        </form>
    </x-adminlte-modal>
</div>