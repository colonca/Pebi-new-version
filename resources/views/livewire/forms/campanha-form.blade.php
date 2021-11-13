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
                <x-jet-input id="poblacion" class="block mt-1 w-full" type="text" wire:model="form.poblacion" placeholder="población" />
            </div>

            <div class="mt-4">
                <x-jet-input id="imagen" class="block mt-1 w-full" type="file" wire:model="form.imagen" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button class="ml-4">
                    {{ __('Guardar') }}
                </x-jet-button>
            </div>
        </form>
    </div>
</div>
