<div>
<div class="flex">
     <div class="px-2 py-5 flex-grow">
	<div class='overflow-x-auto shadow'>
		<table class='mx-auto w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-300 overflow-hidden'>
			<thead class="bg-gray-800">
				<tr class="text-white text-left">
					<th class="font-semibold text-sm uppercase px-6 py-4"> 
						Nombre
					</th>
					<th class="font-semibold text-sm uppercase px-6 py-4">
						Descripción
					</th>
					<th class="font-semibold text-sm uppercase px-6 py-4">
						Acciones
					</th>
				</tr>
			</thead>
			<tbody class="divide-y divide-gray-200">
			    @foreach ($talleres as $taller)
				 <tr class="text-gray-500">
					<td class="px-6 py-4">
					    <p class="">{{$taller->nombre}}</p>
					</td>
					<td class="px-6 py-4">
					    <p class="">{{$taller->descripcion_corta}}</p>
					</td>
					<td class="px-6 py-4 text-center"> 
					    <button wire:click="edit({{$taller->id}})" class="text-blue-500 hover:text-blue-400">
						<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
						   <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
						</svg>
					    </button> 
					    <button wire:click="showModal({{$taller->id}})" class="text-red-500 hover:text-red-400">
						<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
						    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
						</svg>
					    </button> 
					</td>
				 </tr>
			    @endforeach
			</tbody>
		</table>
	</div>
	<div class="m-4">
	   {{$talleres->links()}}
        </div>
     </div>
     <div class="w-1/3 px-2 py-6 rounded-md">
	<div class="shadow rounded">
	   <div class="p-4">
		<x-jet-validation-errors class="mb-4" />
		@if (session('message'))
			<div class="mb-4 font-medium text-sm text-green-600">
				{{ session('message') }}
			</div>
		@endif   
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

