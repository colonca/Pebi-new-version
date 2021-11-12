<div>
    <x-flash-message />
    <div class="flex">
        <div class="py-5 flex-grow bg-white">
            <x-table.table :header="['Nombre','Descripción','']">
                @foreach ($talleres as $taller)
                <tr class="text-gray-500">
                    <x-table.td>{{$taller->nombre}}</x-table-td>
                        <x-table.td>{{$taller->descripcion_corta}}</x-table-td>
                            <td class="text-left">
                                <x-table.action type="edit" wire:click="edit({{$taller->id}})" />
                                <x-table.action type="delete" wire:click="showModal({{$taller->id}})" />
                            </td>
                </tr>
                @endforeach
            </x-table.table>
            <div class="m-4">
                {{$talleres->links()}}
            </div>
        </div>
        <div class="w-1/3 px-2 py-6 rounded-md">
            <div class="shadow rounded">
                <div class="p-4">
                    <x-jet-validation-errors class="mb-4" />
                    @if($updateMode)
                    @include('livewire.generales.talleres-grupales.update')
                    @else
                    @include('livewire.generales.talleres-grupales.create')
                    @endif
                </div>
            </div>
        </div>
    </div>
    @if($confirmacion)
    <x-jet-confirmation-modal wire:model="confirmacion">
        <x-slot name="title">
            Eliminar Taller Grupal
        </x-slot>

        <x-slot name="content">
            Estas Segur@ que quieres eliminar este Taller ? Una vez eliminado, Todos los registros y datos seran permanentemente eliminados.
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('confirmacion')" wire:loading.attr="disabled">
                Cancelar
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-2" wire:click="delete" wire:loading.attr="disabled">
                Eliminar
            </x-jet-danger-button>
        </x-slot>
    </x-jet-confirmation-modal>
    @endif
</div>
