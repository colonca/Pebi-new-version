<div>
    @if($isOpen)
	   <x-jet-confirmation-modal wire:model="isOpen">
		 <x-slot name="title">
		    Eliminar 
		 </x-slot>
	
		 <x-slot name="content">
		    Estas Segur@ que quieres eliminar este registro? Una vez eliminado, Todos los registros y datos seran permanentemente eliminados.
		 </x-slot>
	
		 <x-slot name="footer">
			<x-jet-secondary-button wire:click="$toggle('isOpen')" wire:loading.attr="disabled">
				Cancelar
			</x-jet-secondary-button>
	
			<x-jet-danger-button class="ml-2" wire:click="delete" wire:loading.attr="disabled">
				Eliminar	
			</x-jet-danger-button>
		 </x-slot>
	  </x-jet-confirmation-modal>
   @endif
</div>
