<div>
 <div  class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
       <div class="sm:flex sm:items-start">
            <h3 class="text-lg leading-6 font-bold text-gray-900" id="modal-title">
                {{$title}}
            </h3>
       </div>
       <form wire:submit.prevent="submit">
            <div>
                <h3 class="my-2 border-b-2 border-gray-200 font-semibold" style="border-style: dashed">TRAZABILIDAD</h3>
            </div>
            <div class="flex">
                <div class="">
                    <label class="font-semibold block">Area</label>
                    <select id="area" name="estado_civil" wire:model="form.area" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        <option value="ORIENTACION PSICOLOGICA">Orientación Psicologica</option>
                        <option value="ORIENTACION VOCACIONAL">Orientación Vocacional</option>
                    </select>
                </div>
                <div class="mx-2">
                    <label class="font-semibold block">Profesional</label>
                    <select id="area" name="estado_civil" wire:model="form.tallerista" wire:change="disponibilidad($event.target.value)" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        <option value="">Seleccione un profesional</option>
                        @foreach ($talleristas as $tallerista)
                          <option value="{{$tallerista->id}}">{{$tallerista->nombres}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="">
                    <label class="font-semibold block">Horario</label>
                    <select id="area" name="estado_civil" wire:model="form.horario" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                          <option value="">Selecione la disponibilidad</option>
                          @foreach ($disponibilidad as $key => $value)
                            <option value="{{$key}}">{{$value}}</option>
                          @endforeach
                    </select>
                </div>
            </div>
            <div class="flex items-center justify-end mt-4">
                <a href="" wire:click.prevent="cancelar" class="inline-flex items-center px-4 py-2 bg-red-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition ml-4">
                    {{ __('Cancelar') }}
                </a>
                <div wire:loading.remove >
                    <x-jet-button wire:click="submit" class="ml-4">
                        {{ __('Guardar') }}
                    </x-jet-button>
                </div>
                <div wire:loading>
                    <img width="80px" height="80px" src="https://tradinglatam.com/wp-content/uploads/2019/04/loading-gif-png-4.gif" />
                </div>
            </div>
        </form>
 </div>
</div>

