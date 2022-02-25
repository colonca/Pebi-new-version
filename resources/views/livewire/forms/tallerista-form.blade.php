<div>
	<x-flash-message />
	<div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
		<div class="sm:flex sm:items-start">
			<h3 class="text-lg leading-6 font-semibold text-gray-900" id="modal-title">
				{{$title}}
			</h3>
		</div>
		<form wire:submit.prevent="submit">
			<x-jet-validation-errors class="mb-4" />
			<div class="flex items-center mt-2">
				<div class="mr-2">
					<x-jet-label class="font-bold">Identificacion<span class="text-red ml-2">*</span></x-jet-label>
					<x-jet-input id="identificacion" class="block mt-1 w-full" type="text" wire:model="form.identificacion" placeholder="identificacion" autofocus />
				</div>
				<div class="mr-2 flex-grow">
					<x-jet-label class="font-bold">Nombres<span class="text-red ml-2">*</span></x-jet-label>
					<x-jet-input id="nombres" class="block mt-1 w-full" type="text" wire:model="form.nombres" placeholder="nombres" />
				</div>
			</div>
			<div class="flex items-center mt-2">
				<div class="flex flex-grow">
					<div class="mr-2 w-full">
						<x-jet-label class="font-bold">Correo Institucional<span class="text-red ml-2">*</span></x-jet-label>
						<x-jet-input id="correo_institucional" class="block mt-1 w-full" min=0 type="text" wire:model="form.correo_institucional" placeholder="Correo Institucional" />
					</div>
				</div>
				<div class="">
					<x-jet-label class="font-bold">Tipo<span class="text-red ml-2">*</span></x-jet-label>
					<div class="mt-2">
						<select name="programa" wire:model="form.tipo" class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
							<option value="">Tipo de Tallerista</option>
							<option value='PRACTICANTE'>Practicante</option>
							<option value="PROFESIONAL">Profesional</option>
						</select>
					</div>
				</div>
			</div>
			<div class="flex mt-2">
				<div class="w-1/2 mr-2">
					<x-jet-label class="font-bold">Celular</x-jet-label>
					<x-jet-input id="celular" class="block mt-1 w-full" type="text" wire:model="form.celular" placeholder="celular" autofocus />
				</div>
				<div class="w-1/2">
					<x-jet-label class="font-bold">Numero de Horas Semanales Disponibles</x-jet-label>
					<x-jet-input id="numero_horas_semanales" class="block mt-1 w-full" type="number" wire:model="form.numero_horas_semanales" placeholder="horas disponibles" autofocus />
				</div>
			</div>
            <div class="my-2">
                <h2 class="font-semibold text-center my-4">DISPONIBILIDAD</h2>
                <x-horario :disponibilidad="$disponibilidad" />
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
