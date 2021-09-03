<form wire:submit.prevent="store" >
	<div>
		<x-jet-label for="nombre" value="{{ __('Nombre') }}" />
		<x-jet-input id="nombre" class="block mt-1 w-full" type="text" wire:model="nombre"  placeholder="taller" autofocus />
	</div>

	<div class="mt-4">
		<x-jet-label for="descripcion" value="{{ __('Descripción') }}" />
		<x-jet-input id="password" class="block mt-1 w-full" type="text" wire:model="descripcion" placeholder="descripcion" />
	</div>

	<div class="flex items-center justify-end mt-4">
		<x-jet-button  class="ml-4">
		   {{ __('Guardar') }}
		</x-jet-button>
	</div>
</form>   