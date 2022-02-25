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
					<span class="ml-2">Nueva Intervención Grupal</span>
				</button>
			</div>
		</div>
	</div>
	<x-table.table :header="['Programa','Asignatura','Taller','# Participantes','Fecha','']">
		@foreach ($intervenciones as $intervencion)
		<tr class="text-gray-500">
			<x-table.td>{{$intervencion->programa->nombre}}</x-table-td>
            <x-table.td>{{$intervencion->asignatura->nombre}}</x-table-td>
			<x-table.td>{{$intervencion->taller->nombre}}</x-table-td>
			<x-table.td>{{$intervencion->estudiantes()->count()}}</x-table-td>
			<x-table.td>{{date('M j, Y H:i',strtotime($intervencion->fecha))}}</x-table-td>
			<td class="text-left">
			   <x-table.action type="edit" wire:click="edit({{$intervencion->id}})" />
			   <x-table.action type="delete" wire:click="delete({{$intervencion->id}})" />
			</td>
		</tr>
		@endforeach
	</x-table.table>
	<div class="my-2">
		{{$intervenciones->links()}}
	</div>
</div>
