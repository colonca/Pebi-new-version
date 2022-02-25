<div>
    <x-flash-message />
    <div class="flex ">
			<span class="">
				<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
				</svg>
			</span>
        <div class="ml-2 flex flex-grow">
            <div class="mr-2">Filtros</div>
            <div class="flex items-center">
                @if($filtros['sede'] !== '')
                    <x-filters.label-close text="Sede: {{strtoupper($filtros['sede'])}}" wire:click="limpiarFiltro('sede')" />
                @endif
                @if($filtros['periodo'] !== '')
                    <x-filters.label-close text="Periodo: {{$filtros['periodo'] !== '' ? $periodos[$filtros['periodo']]['anio'].'-'.$periodos[$filtros['periodo']]['periodo'] : '' }}" wire:click="limpiarFiltro('periodo')" />
                @endif
                @if($filtros['programa'] !== '')
                    <x-filters.label-close text="Programa: {{$filtros['programa'] !== '' ? $programas[$filtros['programa']]['nombre'] : '' }}" wire:click="limpiarFiltro('programa')" />
                @endif
            </div>
        </div>
    </div>
    <div class="mt-4 flex">
        <x-jet-dropdown>
            <x-slot name="trigger">
                <button class="flex items-center bg-gray-100 px-2 py-1 mr-2 rounded">
							<span class="">
								<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
								</svg>
							</span>
                    <span class="ml-2">Sede</span>
                    <span class="ml-2">
								<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
									<path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
								</svg>
							</span>
                </button>
            </x-slot>
            <x-slot name="content">
                <div class="flex items-center p-2 dropdown__item" wire:click="filtro('sede','Valledupar')">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z" />
                    </svg>
                    <span class="ml-2">Valledupar</span>
                </div>
                <div class="flex items-center p-2 dropdown__item" wire:click="filtro('sede','Aguachica')">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z" />
                    </svg>
                    <span class="ml-2">Aguachica</span>
                </div>
            </x-slot>
        </x-jet-dropdown>
        <x-jet-dropdown>
            <x-slot name="trigger">
                <button class="flex items-center bg-gray-100 px-2 py-1 mr-2 rounded">
                  <span class="">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                           <path d="M12 14l9-5-9-5-9 5 9 5z" />
                           <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                      </svg>
                  </span>
                  <span class="ml-2">Periodo</span>
                  <span class="ml-2">
                       <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                         <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                       </svg>
				  </span>
                </button>
            </x-slot>
            <x-slot name="content">
                @foreach($periodos as $periodo)
                    <div class="flex items-center p-2 dropdown__item" wire:click="filtro('periodo',{{$periodo->id}})">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="ml-2">{{$periodo->anio. '-'.$periodo->periodo}}</span>
                    </div>
                @endforeach
            </x-slot>
        </x-jet-dropdown>
        <x-jet-dropdown width="96 dropdown">
            <x-slot name="trigger">
                <button class="flex items-center bg-gray-100 px-2 py-1 mr-2 rounded">
							<span class="">
								<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
									<path d="M12 14l9-5-9-5-9 5 9 5z" />
									<path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
								</svg>
							</span>
                    <span class="ml-2">Programa</span>
                    <span class="ml-2">
								<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
									<path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
								</svg>
							</span>
                </button>
            </x-slot>
            <x-slot name="content">
                @foreach($programas as $programa)
                    <div class="flex items-center p-2 dropdown__item" wire:click="filtro('programa',{{$programa->id}})">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="ml-2">{{$programa->nombre}}</span>
                    </div>
                @endforeach
            </x-slot>
        </x-jet-dropdown>
    </div>
    <div class="flex">
        <div class="py-5 flex-grow bg-white">
            <x-table.table :header="['Programa','POVS','POA','POVAU']">
                @foreach($reporte as $key => $value)
                    <tr>
                        <x-table.td>{{$key}}</x-table.td>
                        @foreach($lineas as $linea)
                            <x-table.td>{{array_key_exists($linea->slug, $value) ? $value[$linea->slug] : '0'}}</x-table.td>
                        @endforeach
                    </tr>
                @endforeach
            </x-table.table>
        </div>
    </div>
    <div class="mt-4">
    </div>
</div>

