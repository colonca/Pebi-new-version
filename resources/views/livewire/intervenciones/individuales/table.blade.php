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
					<span class="ml-2">Nueva Solicitud</span>
				</button>
			</div>
		</div>
	</div>

	<x-table.table :header="['Identificacion','Estudiante','Motivo','Estado','Fecha de Solicitud','Fecha de Remision','Acciones']">
		@foreach ($solicitudes as $solicitud)
		<tr class="text-gray-500">
			<x-table.td>{{$solicitud->estudianteRelation->tipo_documento. "-" . $solicitud->estudianteRelation->identificacion}}</x-table-td>
			<x-table.td>{{$solicitud->estudianteRelation->primer_nombre . " " . $solicitud->estudianteRelation->primer_apellido}}</x-table-td>
            <x-table.td>{{$solicitud->motivo}}</x-table-td>
			<x-table.td>{{$solicitud->estado}}</x-table-td>
			<x-table.td>{{date('M j, Y',strtotime($solicitud->fecha))}}</x-table-td>
			<x-table.td>{{$solicitud->fecha_remision ? date('M j, Y',strtotime($solicitud->fecha_remision)) : 'SIN REMISION'}}</x-table-td>
			<td class="text-left">
			   <x-table.action type="edit" wire:click="edit({{$solicitud->id}})" />
			   <x-table.action type="delete" wire:click="delete({{$solicitud->id}})" />
			   <button class="cursor-pointer" wire:click="remitir({{$solicitud->id}})">
				 <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
					<path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
				  </svg>
			   </button>
			</td>
		</tr>
		@endforeach
	</x-table.table>
	<div class="my-2">
		{{$solicitudes->links()}}
	</div>
</div>
