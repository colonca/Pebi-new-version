<div>
    <div  class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
        <div>
            <div class="sm:flex sm:items-start">
                <h3 class="text-lg leading-6 font-semibold text-gray-900" id="modal-title">
                    {{$title}}
                </h3>
            </div>
            <form wire:submit.prevent="submit">
                <h3 class="font-bold">ESTUDIANTE</h3>
                <x-flash-message />
                @error('form.estudiante_id')
                <span class="text-red-500 mt-2">Por Favor seleccione un estudiante.</span>
                @enderror
                <x-jet-validation-errors class="mb-4" />
                <div class="flex items-end w-1/2">
                    <div class="relative border rounded-lg my-2 flex-grow">
                        <input type="text" name="identificacion" wire:keydown.enter="search" wire:model="query" class="border-none text-gray-500 w-full px-4 pl-8 py-2 focus:outline-none focus:shadow-outline rounded-lg" placeholder="Search Student" />
                        <div class="absolute top-1 ml-1 mt-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                        <div class="absolute top-0 right-0">
                            <button type="button" wire:click="search" class="bg-green-200 py-1 px-2 mr-1 mt-1 rounded-lg text-gray-800">Search</button>
                        </div>
                    </div>
                </div>
                @if(isset($estudiante))
                    <div>
                        <h3 class="mt-2 border-b-2 border-gray-200 font-bold" style="border-style: dashed">DATOS DEL ESTUDIANTE</h3>
                    </div>
                    <div class="flex mt-4">
                        <div class="flex-grow">
                            <label><span class="font-semibold">Nombre y Apellidos: </span>{{$estudiante ? $estudiante->nombre : ''}}</label>
                        </div>
                        <div class="w-1/3">
                            <label><span class="font-semibold">Programa: </span>{{$estudiante ? $estudiante->programa->nombre: '' }}</label>
                        </div>
                    </div>
                    <div class="flex my-4">
                        <div class="w-1/3">
                            <label><span class="font-semibold">Fecha de nacimiento: </span>{{$estudiante ? $estudiante->fecha_nacimiento: ''}}</label>
                        </div>
                        <div class="w-1/3">
                            <label><span class="font-semibold">Identificacion: </span>{{$estudiante ? $estudiante->identificacion: '' }}</label>
                        </div>
                        <div class="w-1/3">
                            <label><span class="font-semibold">Semestre: </span>{{$estudiante ? $estudiante->semestre: '' }}</label>
                        </div>
                    </div>
                    <div class="flex my-4">
                        <div class="w-1/3">
                            <label><span class="font-semibold">Riesgo: </span>{{$estudiante ? $estudiante->riesgo : ''}}</label>
                        </div>
                        <div class="w-1/3">
                            <label><span class="font-semibold">Celular: </span>{{$estudiante ? $estudiante->celular: '' }}</label>
                        </div>
                        <div class="w-1/3">
                            <label><span class="font-semibold">Correo: </span>{{$estudiante ? $estudiante->correo: '' }}</label>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <label class="font-semibold">Motivo de Solicitud de Atención: </label>
                        <select name="estado_civil" wire:model="form.motivo" class="ml-2 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                            <option value="ORIENTACION ACADEMICA">Orientación Academica </option>
                            <option value="ORIENTACION PSICOLOGICA">Orientación Psicologica</option>
                            <option value="ORIENTACION VOCACIONAL">Orientación Vocacional</option>
                            <option value="TUTORIAS">Tutorias</option>
                            <option value="OTRO">Otro</option>
                        </select>
                    </div>
                    <div class="flex my-4 items-center">
                        <div class="flex items-center">
                            <label class="font-semibold">Discapacidad</label>
                            <select name="estado_civil" wire:model="form.esDiscapacitado" class="ml-2 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                <option value="SI">SI</option>
                                <option value="NO">NO</option>
                            </select>
                        </div>
                        <div class="flex items-center flex-grow ml-4">
                            <label class="font-semibold">Cual:</label>
                            <x-jet-input class="ml-2 flex-grow" type="text" wire:model="form.discapacidad" placeholder="Cual" />
                        </div>
                    </div>
                    <div>
                        <h3 class="mt-2 border-b-2 border-gray-200 font-bold" style="border-style: dashed">DISPONIBILIDAD</h3>
                    </div>
                    <x-horario :disponibilidad="$disponibilidad" />

                @endif
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
        <div wire:loading.delay.longest class="flex items-center justify-center">
            <div>
                <img src="https://tradinglatam.com/wp-content/uploads/2019/04/loading-gif-png-4.gif" />
            </div>
        </div>
    </div>
</div>
