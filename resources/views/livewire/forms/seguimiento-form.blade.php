<div>
    <div  class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
        <div>
            <div class="sm:flex sm:items-start">
                <h3 class="text-lg leading-6 font-semibold text-gray-900" id="modal-title">
                    {{$title}}
                </h3>
            </div>
            <form wire:submit.prevent="submit">
                <h3 class="font-bold mb-2">Seguimiento</h3>
                <p class="mb-2"><span class="font-semibold">ESTUDIANTE:</span> {{$estudiante['nombres']}} -<span class="font-semibold"> PROGRAMA:</span> {{$estudiante['programa']['nombre']}}</p>
                <div>
					<x-jet-label class="font-bold">DETALLE DEL SEGUIMINETO</x-jet-label>
                    <textarea class="w-full rounded-sm" placeholder="Escribe aquí" rows="5" wire:model="form.seguimiento"></textarea>
				</div>
                <div>
					<x-jet-label class="font-bold">CONCLUSION</x-jet-label>
					 <textarea class="w-full rounded-sm" placeholder="Escribe aquí" rows="5" wire:model="form.conclusion"></textarea>
				</div>
                <div class="">
					<x-jet-label class="font-bold">TALLERISTA</x-jet-label>
					<div class="mt-2">
						<select name="programa" wire:model="form.tallerista_id" class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
							<option value="">Seleccione un tallerista</option>
                            @foreach ($talleristas as $key => $value)
                               <option value="{{$key}}">{{$value}}</option>
                            @endforeach
						</select>
					</div>
				</div>
                <div class="flex mt-4 items-center">
                    <label><span class="font-semibold mr-2">SE REMITE ATENCIÓN PSÍCOLIA IPS: </span></label>
                    <div class="mt-2">
                        <label class="inline-flex items-center">
                            <input type="radio" wire:model="form.remision_ips"  class="form-radio" name="remision_ips" value="SI">
                            <span class="ml-2">Si</span>
                        </label>
                        <label class="inline-flex items-center ml-4">
                            <input type="radio" wire:model="form.remision_ips"  class="form-radio" name="remision_ips" value="NO">
                            <span class="ml-2">No</span>
                        </label>
                    </div>
                </div>
                <div class="flex items-center justify-end mt-4">
                    <a href="" wire:click.prevent="cancelar" class="inline-flex items-center px-4 py-2 bg-red-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition ml-4">
                        {{ __('Cancelar') }}
                    </a>
                    <div>
                        <x-jet-button  class="ml-4">
                            {{ __('Guardar') }}
                        </x-jet-button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
