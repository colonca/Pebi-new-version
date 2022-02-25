<div>
    <x-flash-message />
    <div class="flex justify-end">
        <button class="bg-green-200 flex px-2 py-1 rounded ml-2" wire:click="create">
			<span>
				<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
					<path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
				</svg>
			</span>
            <span class="ml-2">Crear Nuevo Período Académico</span>
        </button>
    </div>
    <div class="flex">
        <div class="py-5 flex-grow bg-white">
            <x-table.table :header="['Período','Año','Fecha Inicio','Fecha Fin','Estado','Acciones']">
                @foreach ($periodos as $periodo)
                    <tr class="text-gray-500">
                        <x-table.td>{{$periodo->periodo}}</x-table.td>
                        <x-table.td>{{$periodo->anio}}</x-table.td>
                        <x-table.td>{{$periodo->fecha_inicio}}</x-table.td>
                        <x-table.td>{{$periodo->fecha_fin}}</x-table.td>
                        <x-table.td>{{$periodo->estado}}</x-table.td>
                        <td class="text-left">
                            <x-table.action type="edit" wire:click="edit({{$periodo->id}})" />
                            <x-table.action type="delete" wire:click="delete({{$periodo->id}})" />
                        </td>
                    </tr>
                @endforeach
            </x-table.table>
        </div>
    </div>
    <div class="m-4">
        {!!$periodos->links()!!}
    </div>
</div>
