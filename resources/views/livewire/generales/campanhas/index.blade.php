<div>
    <x-flash-message />
    <div class="flex justify-end">
        <button class="bg-green-200 flex px-2 py-1 rounded ml-2" wire:click="create">
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                </svg>
            </span>
            <span class="ml-2">Crear Nueva Campaña</span>
        </button>
    </div>
    <div class="flex">
        <div class="py-5 flex-grow bg-white">
            <x-table.table :header="['Nombre','Población','Acciones']">
                @foreach ($campanhas as $campanha)
                <tr class="text-gray-500">
                    <x-table.td>{{$campanha->nombre}}</x-table.td>
                    <x-table.td>{{$campanha->poblacion}}</x-table.td>
                    <td class="text-left">
                        <x-table.action type="edit" wire:click="edit({{$campanha->id}})" />
                        <x-table.action type="delete" wire:click="delete({{$campanha->id}})" />
                    </td>
                </tr>
                @endforeach
            </x-table.table>
            <div class="m-4">
                {{$campanhas->links()}}
            </div>
        </div>
    </div>
</div>
