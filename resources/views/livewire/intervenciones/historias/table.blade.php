<div>
    <div>
        <x-flash-message />
        <div class="text-gray-700 py-2">
            <div class="flex justify-end py-2 px-2">
                <div class="button-file flex">
                    <button wire:click.prevent="create" class="bg-green-200 flex px-2 py-1 rounded ml-2">
                         <span>
                              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                  <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                              </svg>
                         </span>
                        <span class="ml-2">Nueva Orientación Psicosocial</span>
                    </button>
                </div>
            </div>
        </div>
        <x-table.table :header="['Identificación','Estudiante','Riesgo','Numero de Seguimientos','Fecha','Acciones']">
            @foreach ($historias as $historia)
                <tr class="text-gray-500">
                    <x-table.td>{{$historia->estudiante->identificacion}}</x-table-td>
                    <x-table.td>{{$historia->estudiante->nombre}}</x-table-td>
                    <x-table.td>{{$historia->estudiante->riesgo}}</x-table-td>
                    <x-table.td>{{$historia->seguimientos->count()}}</x-table-td>
                    <x-table.td>{{$historia->created_at}}</x-table-td>
                    <td class="text-left">
                        <button class="cursor-pointer" wire:click="seguimiento({{$historia->id}})">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                            </svg>
                        </button>
                       <x-table.action type="show" wire:click="ver_detalle({{$historia->id}})" />
                    </td>
                </tr>
            @endforeach
        </x-table.table>
        <div class="my-2">
            {{$historias->links()}}
        </div>
    </div>
</div>
