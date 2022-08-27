<div>
    <div  class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
        <div>
            <div class="sm:flex sm:items-start">
                <h3 class="text-lg leading-6 font-semibold text-gray-900" id="modal-title">
                    {{$title}}
                </h3>
            </div>
			<p class="mt-2">¿Esta seguro que desea cancelar la remision para {{$estudiante}}?</p>
        </div>
		<div class="flex justify-end">
			<x-jet-secondary-button wire:click="cancel" wire:loading.attr="disabled">
				No,Cancelar
			</x-jet-secondary-button>
			<x-jet-danger-button class="ml-2" wire:click="submit" wire:loading.attr="disabled">
                Si, Cancelar
			</x-jet-danger-button>
		</div>
    </div>
</div>
