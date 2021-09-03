<form wire:submit.prevent="update">
	<div>
		<x-jet-label for="nombre" value="{{ __('Nombre') }}" />
		<x-jet-input id="nombre" class="block mt-1 w-full" type="text" wire:model="nombre"  placeholder="nombre" autofocus />
	</div>

	<div class="mt-4">
		<x-jet-label for="descripcion" value="{{ __('Descripción') }}" />
		<x-jet-input id="password" class="block mt-1 w-full" type="text" wire:model="descripcion" placeholder="descripcion" />
	</div>

	<div class="flex items-center justify-end mt-4">
		<a href="" wire:click.prevent="cancelar" class="inline-flex items-center px-4 py-2 bg-red-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition ml-4">
		   {{ __('Cancelar') }}
		</a>
		<x-jet-button class="ml-4">
		   {{ __('Actualizar') }}
		</x-jet-button>
	</div>
</form>   