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
                @error('form.estudiante_id')
                <span class="text-red-500 mt-2">Por Favor seleccione un estudiante.</span>
                @enderror
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
                            <label><span class="font-semibold">Edad : </span>{{$estudiante ? $estudiante->edad : '' }}</label>
                        </div>
                    </div>
                    <div class="flex my-4">
                        <div class="flex-grow">
                            <label><span class="font-semibold">Fecha de nacimiento: </span>{{$estudiante ? $estudiante->fecha_nacimiento: ''}}</label>
                        </div>
                        <div class="w-1/3">
                            <label><span class="font-semibold">Identificacion: </span>{{$estudiante ? $estudiante->identificacion: '' }}</label>
                        </div>
                    </div>
                    <div class="flex mt-2">
                        <div class="flex-grow">
                            <div class="flex items-center">
                                <label class="font-semibold">Estado Civil: </label>
                                <select name="estado_civil" wire:model="form.estado_civil" class="ml-2 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                    <option value="">Seleccione el estado civil</option>
                                    @foreach ($estados as $estado)
                                        <option value='{{$estado->id}}'>{{$estado->estado_civil}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('form.estado_civil')
                            <span class="text-red-500 mt-2">El estado civil es requrido</span>
                            @enderror
                        </div>
                        <div class="w-1/3">
                            <label><span class="font-semibold">Celular: </span>{{$estudiante ? $estudiante->celular: '' }}</label>
                        </div>
                    </div>
                    <div>
                        <div class="flex mt-4 items-center">
                            <label class="font-semibold">Direccion de residencia:</label>
                            <x-jet-input id="slug" class="ml-2 flex-grow" type="text" wire:model="form.direccion" placeholder="Dirección" />
                        </div>
                        @error('form.direccion')
                        <span class="text-red-500 mt-2">La dirección es requrida</span>
                        @enderror
                    </div>
                    <div class="flex mt-4 items-center">
                        <label><span class="font-semibold">Procedencia: </span>{{$estudiante ? $estudiante->procedencia: '' }}</label>
                    </div>
                    <div class="flex mt-4 items-center">
                        <label><span class="font-semibold mr-2">Trabaja: </span></label>
                        <div class="mt-2">
                            <label class="inline-flex items-center">
                                <input type="radio" wire:model="form.trabaja"  class="form-radio" name="trabaja" value="SI">
                                <span class="ml-2">Si</span>
                            </label>
                            <label class="inline-flex items-center ml-4">
                                <input type="radio" wire:model="form.trabaja"  class="form-radio" name="trabaja" value="NO">
                                <span class="ml-2">No</span>
                            </label>
                        </div>
                        <div class="flex items-center ml-2">
                            <label class="font-semibold">Si su respuesta es No de donde proceden los recursos:</label>
                            <x-jet-input  class="ml-2 flex-grow" type="text" wire:model="form.procedencia_recursos" placeholder="procedencia de recursos" />
                        </div>
                    </div>
                    <div class="flex-grow my-2">
                        <div class="flex items-center">
                            <label class="font-semibold">Tipo de Familia: </label>
                            <select wire:model="form.tipo_familia" class="ml-2 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                <option value="">Seleccione el tipo de familia</option>
                                @foreach ($familias as $familia)
                                    <option value='{{$familia->id}}'>{{$familia->descripcion}}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('form.direccion')
                        <span class="text-red-500 mt-2">La dirección es requrida</span>
                        @enderror
                    </div>
                    <div>
                        <h3 class="font-semibold mt-2 border-b-2 border-gray-200" style="border-style: dashed">DATOS ACADEMICOS</h3>
                        <div class="flex mt-2 justify-between">
                            <div class="w-1/4">
                                <label><span class="font-semibold">Programa: </span>{{$estudiante ? $estudiante->programa->nombre: ''}}</label>
                            </div>
                            <div class="w-1/4">
                                <label><span class="font-semibold">Fecha de Ingreso: </span>{{$estudiante ? $estudiante->fecha_ingreso: '' }}</label>
                            </div>
                            <div class="w-1/4">
                                <label><span class="font-semibold">Semestre: </span>{{$estudiante ? $estudiante->semestre: '' }}</label>
                            </div>
                            <div class="w-1/4">
                                <label><span class="font-semibold">Riesgo: </span>{{$estudiante ? $estudiante->riesgo : '' }}</label>
                            </div>
                        </div>
                        <div class="my-4">
                            <div>
                                <label class="font-semibold">La relación con sus compañeros de clases es: </label>
                                <select wire:model="form.relacion_compañeros" name="relacion_compañeros" class="ml-2 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                    <option value="MALA">MALA</option>
                                    <option value="REGULAR">REGULAR</option>
                                    <option value="BUENA">BUENA</option>
                                    <option value="EXCELENTE">EXCELENTE</option>
                                </select>
                            </div>
                            @error('form.relacion_compañeros')
                            <span class="text-red-500 mt-2">El tipo de relación es requerido</span>
                            @enderror
                        </div>
                        <div>
                            <div>
                                <label class="font-semibold">La relación con sus docentes de clases es: </label>
                                <select wire:model="form.relacion_docente" name="relacion_compañeros" class="ml-2 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                    <option value="MALA">MALA</option>
                                    <option value="REGULAR">REGULAR</option>
                                    <option value="BUENA">BUENA</option>
                                    <option value="EXCELENTE">EXCELENTE</option>
                                </select>
                            </div>
                            @error('form.relacion_docente')
                            <span class="text-red-500 mt-2">El tipo de relación es requerido</span>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <h3 class="font-semibold mt-2 border-b-2 border-gray-200" style="border-style: dashed">PROBLEMATICAS EXISTENTES</h3>
                        @error('form.problemas')
                        <span class="text-red-500 mt-2">Debe seleccionar por lo menos un tipo de problematica.</span>
                        @enderror
                        <div class="mt-2 w-full flex flex-wrap items-center justify-between">
                            @foreach($problematicas as $key => $value)
                                <div class="w-1/3 my-2">
                                    <input id="problema.{{$key}}" wire:model="form.problemas" type="checkbox" value="{{$value->id}}">
                                    <label for="problema.{{$key}}" class="font-semibold ml-2">{{$value->descripcion}}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="mt-2">
                        <h3 class="font-semibold mt-2 border-b-2 border-gray-200" style="border-style: dashed">PLAN DE ACCIÓN</h3>
                        <textarea
                            class="
                            form-control
                            block
                            w-full
                            mt-2
                            px-3
                            py-1.5
                            text-base
                            font-normal
                            text-gray-700
                            bg-white bg-clip-padding
                            border border-solid border-gray-300
                            rounded
                            transition
                            ease-in-out
                            focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
                          "
                            rows="6"
                            placeholder="Descripción"
                            wire:model="form.plan_de_accion"
                        ></textarea>
                        @error('form.plan_de_accion')
                        <span class="text-red-500 mt-2">El plan de accion es requerido</span>
                        @enderror
                    </div>
                    <div class="mt-2">
                        <h3 class="font-bold mt-2 border-b-2 border-gray-200" style="border-style: dashed">CONCLUSIONES</h3>
                        <textarea
                            class="
                            form-control
                            block
                            w-full
                            mt-2
                            px-3
                            py-1.5
                            text-base
                            font-normal
                            text-gray-700
                            bg-white bg-clip-padding
                            border border-solid border-gray-300
                            rounded
                            transition
                            ease-in-out
                            focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
                          "
                            rows="6"
                            placeholder="Descripción"
                            wire:model="form.conclusiones"
                        ></textarea>
                    </div>
                    <div class="">
                        <h3 class="font-bold mt-2 border-b-2 border-gray-200" style="border-style: dashed">SOPORTE</h3>
                        <input type="file" class="mt-2" wire:model="soporte"/>
                    </div>
                @endif
                <div class="flex items-center justify-end mt-4">
                    <a href="" wire:click.prevent="cancelar" class="inline-flex items-center px-4 py-2 bg-red-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition ml-4">
                        {{ __('Cancelar') }}
                    </a>
                    <div wire:loading.remove >
                        <x-jet-button  class="ml-4">
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

