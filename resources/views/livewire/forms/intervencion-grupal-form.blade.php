<div>
    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
        <div class="sm:flex sm:items-start">
            <div class="mt-3 text-center sm:mt-0 sm:text-left w-full">

                <div class="form my-2">
                    <form class="my-2">
                        <div class="flex justify-between items-center">
                            <h3 class="text-lg leading-6 font-semibold text-gray-900" id="modal-title">
                                {{$title}}
                            </h3>
                            <div class="flex items-center">
                                <div class="w-1/2 mr-2">
                                        <x-jet-label for="nombre" value="{{ __('Tallerista') }}" />
                                        <div class="mt-2">
                                            <select name="programa" wire:model="form.programa_id" class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                                <option value="">Seleccione un Programa</option>
                                                @foreach ($programas as $programa)
                                                <option value='{{$programa->id}}'>{{$programa->nombre}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                </div>
                                <div>
                                    <x-jet-label for="fecha" value="{{ __('Fecha') }}" />
                                    <x-jet-input type="date" id="fecha" class="block mt-1 w-full" wire:model="form.fecha" placeholder="fecha" autofocus />
                                </div>
                            </div>
                        </div>
                        <x-jet-validation-errors class="mb-4" />
                        <div class="flex items-center justify-between mt-4">
                            <div class="w-1/2 mr-2">
                                <x-jet-label for="nombre" value="{{ __('Programa') }}" />
                                <div class="mt-2">
                                    <select name="programa" wire:model="form.programa_id" class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                        <option value="">Seleccione un Programa</option>
                                        @foreach ($programas as $programa)
                                        <option value='{{$programa->id}}'>{{$programa->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="w-1/2">
                                <x-jet-label for="nombre" value="{{ __('Asignatura') }}" />
                                <div class="mt-2">
                                    <select name="asignatura" wire:model="form.asignatura_id" class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                        <option value="">Seleccione una Asignatura</option>
                                        @foreach ($asignaturas as $asignatura)
                                        <option value='{{$asignatura->id}}'>{{$asignatura->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                       </div>
                        <div class="flex items-center justify-center mt-2">
                            <div class="w-1/2 mr-2">
                                <x-jet-label for="campanha" value="{{ __('Campaña') }}" />
                                <div class="mt-2">
                                    <select id="campanha" name="taller" wire:model="form.campanha_id" class="w-full max-w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                        <option value="">Seleccione campaña</option>
                                        @foreach ($campanhas as $campanha)
                                            <option value='{{$campanha->id}}'>{{$campanha->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="w-1/2 mr-2">
                                <x-jet-label for="taller" value="{{ __('Taller') }}" />
                                <div class="mt-2">
                                    <select id="taller" name="taller" wire:model="form.taller_id" class="w-full max-w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                        <option value="">Seleccione taller</option>
                                        @foreach ($talleres as $taller)
                                            <option value='{{$taller->id}}'>{{$taller->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                       </div>
                    </form>
                </div>
                <div class="">
                    <div class="font-semibold">Asistencia</div>
                    <x-flash-message />
                    <div class="flex items-center">
                        <div class="relative border rounded-lg my-2 flex-grow">
                            <input type="text" name="identificacion" wire:keydown.enter="search" wire:model="query" class="border-none text-gray-500 w-full px-4 pl-8 py-2 focus:outline-none focus:shadow-outline rounded-lg" placeholder="Search Student" />
                            <div class="absolute top-1 ml-1 mt-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </div>
                            <div class="absolute top-0 right-0">
                                <button wire:click="search" class="bg-green-200 py-1 px-2 mr-1 mt-1 rounded-lg text-gray-800">Search</button>
                            </div>
                        </div>
                        <div class="button-file flex  ml-2">
                            <button class="bg-blue-100 flex px-2 py-1 rounded">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                </svg>
                                <span class="ml-2">Importar</span>
                            </button>
                        </div>
                    </div>
                    <div class="max-h-80 overflow-y-auto">
                        <x-table.table :header="['Identificacion','Nombre','Telefono','Semestre','']">
                            @foreach($form['estudiantes'] as $estudiante)
                            <tr>
                                <x-table.td>{{$estudiante['identificacion']}}</x-table.td>
                                <x-table.td>{{$estudiante['primer_nombre'].' '.$estudiante['segundo_nombre']}}</x-table.td>
                                <x-table.td>{{$estudiante['telefono']}}</x-table.td>
                                <x-table.td>{{$estudiante['semestre']}}</x-table.td>
                                <td class="text-center">
                                    <x-table.action type="delete" wire:click="delete({{$estudiante['identificacion']}})" />
                                </td>
                            </tr>
                            @endforeach
                        </x-table.table>
                    </div>
                </div>
                <div class="flex justify-end mt-2">
                    <a href="" wire:click.prevent="cancelar" class="inline-flex items-center px-4 py-2 bg-red-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition ml-4">
                        {{ __('Cancelar') }}
                    </a>
                    <x-jet-button wire:click="submit" class="ml-2">
                        {{__('Guardar')}}
                    </x-jet-button>
                </div>
            </div>
        </div>
    </div>
</div>
