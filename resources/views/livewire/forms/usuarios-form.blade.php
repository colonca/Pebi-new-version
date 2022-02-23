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
				<div class="mr-2 flex-grow">
					<x-jet-label class="font-bold">Nombres<span class="text-red ml-2">*</span></x-jet-label>
					<x-jet-input id="name" class="block mt-1 w-full" type="text" wire:model="form.name" placeholder="nombres" />
				</div>
			</div>
			<div class="flex items-center mt-2">
				<div class="flex flex-grow">
					<div class="mr-2 w-full">
						<x-jet-label class="font-bold">Correo<span class="text-red ml-2">*</span></x-jet-label>
						<x-jet-input id="email" class="block mt-1 w-full" type="email" wire:model="form.email" placeholder="Correo Institucional" />
					</div>
				</div>
                <div class="">
                    <x-jet-label class="font-bold">Rol<span class="text-red ml-2">*</span></x-jet-label>
                    <div class="mt-2">
                        <select name="rol" wire:model="form.rol" class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                            <option value="">--Seleccione una opción--</option>
                            @foreach($roles as $key => $value)
                            <option value="{{$value}}">{{$value}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
			</div>
			<div class="flex mt-2">
				<div class="w-1/2 mr-2">
					<x-jet-label class="font-bold">Contraseña</x-jet-label>
					<x-jet-input id="password" class="block mt-1 w-full" type="password" wire:model="form.password" placeholder="contraseña" autofocus />
				</div>
				<div class="w-1/2">
					<x-jet-label class="font-bold">Confirmar Contraseña</x-jet-label>
					<x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" wire:model="form.password_confirmation" placeholder="confirmación de contraseña" autofocus />
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
