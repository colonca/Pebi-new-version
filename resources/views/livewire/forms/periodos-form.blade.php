<div>
	<div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
		<div class="sm:flex sm:items-start">
			<h3 class="text-lg leading-6 font-semibold text-gray-900" id="modal-title">
				{{$title}}
			</h3>
		</div>
		<form wire:submit.prevent="submit">
			<div class="mt-2">
				<x-jet-label class="font-bold">Período *</x-jet-label>
				<x-jet-input id="periodo" class="block mt-1 w-full" type="number" min="1" max="2" wire:model="form.periodo" placeholder="Período" autofocus />
			</div>

			<div class="mt-4">
				<x-jet-label class="font-bold">Año *</x-jet-label>
				<x-jet-input id="anio" class="block mt-1 w-full" type="number" wire:model="form.anio" placeholder="Año" />
			</div>

            <div class="mt-4">
                <x-jet-label class="font-bold">Fecha de inicio *</x-jet-label>
                <x-jet-input id="fecha_inicio" class="block mt-1 w-full" type="date" wire:model="form.fecha_inicio" placeholder="Fecha de inicio" />
            </div>
            <div class="mt-4">
                <x-jet-label class="font-bold">Fecha de fin *</x-jet-label>
                <x-jet-input id="fecha_fin" class="block mt-1 w-full" type="date" wire:model="form.fecha_fin" placeholder="Fecha de fin" />
            </div>
			<div class="">
				<div class="mt-4">
					<x-jet-label class="font-bold">Estado *</x-jet-label>
					<select name="estado" wire:model="form.estado" class="w-full mt-1 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
						<option value="">--Seleccione una opción--</option>
						<option value="ACTIVO">ACTIVO</option>
						<option value="INACTIVO">INACTIVO</option>
					</select>
				</div>
			</div>
			<div class="flex items-center justify-end mt-4">
				<a href="" wire:click.prevent="cancelar" class="inline-flex items-center px-4 py-2 bg-red-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition ml-4">
					{{ __('Cancelar') }}
				</a>
				<x-jet-button class="ml-4">
					{{ __('Guardar') }}
				</x-jet-button>
			</div>
		</form>
	</div>
</div>
