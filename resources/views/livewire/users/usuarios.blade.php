<div>
    <x-flash-message />
    <div class="flex justify-end">
        <button class="bg-green-200 flex px-2 py-1 rounded ml-2" wire:click="create">
			<span>
				<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
					<path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
				</svg>
			</span>
            <span class="ml-2">Crear Nuevo Usuario</span>
        </button>
    </div>
    <div class="py-5 flex-grow bg-white">
        <x-table.table :header="['Id','Nombre','Correo','Rol','']">
            @foreach($usuarios as $usuario)
                <tr class="text-gray-500">
                    <x-table.td>{{$usuario->id}}</x-table.td>
                    <x-table.td>{{$usuario->name}}</x-table.td>
                    <x-table.td>{{$usuario->email}}</x-table.td>
                    <x-table.td>
                        <ul>
                        @foreach($usuario->getRoleNames() as $rol)
                            <li>{{$rol}}</li>
                        @endforeach
                        </ul>
                    </x-table.td>
                    <td class="text-left">
                        <x-table.action type="edit" wire:click="edit({{$usuario->id}})" />
                        <x-table.action type="delete" wire:click="delete({{$usuario->id}})" />
                    </td>
                </tr>
            @endforeach
        </x-table.table>
    </div>
    <div className="mt-4">
        {!!$usuarios->links()!!}
    </div>
</div>
