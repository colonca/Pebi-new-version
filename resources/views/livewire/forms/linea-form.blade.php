<div>
	<div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
		<div class="sm:flex sm:items-start">
			<h3 class="text-lg leading-6 font-semibold text-gray-900" id="modal-title">
				{{$title}}
			</h3>
		</div>
		<form wire:submit.prevent="submit">
			<div class="mt-2">
				<x-jet-input id="nombre" class="block mt-1 w-full" type="text" wire:model="form.nombre" placeholder="nombre" autofocus />
			</div>

			<div class="mt-4">
				<x-jet-input id="slug" class="block mt-1 w-full" type="text" wire:model="form.slug" placeholder="slug" />
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
