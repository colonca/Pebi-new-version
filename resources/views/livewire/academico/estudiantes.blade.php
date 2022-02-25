<div>
	{{-- Success is as dangerous as failure. --}}
	<x-flash-message />
	<div class="text-gray-700 py-2">
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
					@if($filtros['programa'] !== '')
					<x-filters.label-close text="Programa: {{$filtros['programa'] !== '' ? $programas[$filtros['programa']]['nombre'] : '' }}" wire:click="limpiarFiltro('programa')" />
					@endif
					@if($filtros['estado'])
					<x-filters.label-close text="Estado: {{strtoupper($filtros['estado'])}}" wire:click="limpiarFiltro('estado')" />
					@endif
					@if($filtros['identificacion'])
					<x-filters.label-close text="Identificación: {{$filtros['identificacion']}}" wire:click="limpiarFiltro('identificacion')" />
					@endif
					@if($filtros['riesgo'])
					<x-filters.label-close text="Riesgo: {{strtoupper($filtros['riesgo'])}}" wire:click="limpiarFiltro('riesgo')" />
					@endif
				</div>
			</div>
		</div>
		<div class="flex py-2 px-2">
			<div class="filters flex flex-grow">
				<x-jet-dropdown width="96">
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
				<x-jet-dropdown width="48">
					<x-slot name="trigger">
						<button class="flex items-center bg-gray-100 px-2 py-1 mr-2 rounded">
							<span class="">
								<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z" />
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.879 16.121A3 3 0 1012.015 11L11 14H9c0 .768.293 1.536.879 2.121z" />
								</svg>
							</span>
							<span class="ml-2">Estado</span>
							<span class="ml-l">
								<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
									<path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
								</svg>
							</span>
						</button>
					</x-slot>
					<x-slot name="content">
						<div class="flex items-center p-2 dropdown__item" wire:click="filtro('estado','activo')">
							<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
							</svg><span class="ml-2">Activo</span>
						</div>
						<div class="flex items-center p-2 dropdown__item" wire:click="filtro('estado','inactivo')">
							<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14H5.236a2 2 0 01-1.789-2.894l3.5-7A2 2 0 018.736 3h4.018a2 2 0 01.485.06l3.76.94m-7 10v5a2 2 0 002 2h.096c.5 0 .905-.405.905-.904 0-.715.211-1.413.608-2.008L17 13V4m-7 10h2m5-10h2a2 2 0 012 2v6a2 2 0 01-2 2h-2.5" />
							</svg>
							<span class="ml-2">Inactivo</span>
						</div>
					</x-slot>
				</x-jet-dropdown>
				<x-jet-dropdown width="96">
					<x-slot name="trigger">
						<button class="flex items-center bg-gray-100 px-2 py-1 mr-2 rounded">
							<span class="">
								<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
								</svg>
							</span>
							<span class="ml-2">Riesgo</span>
							<span class="ml-2">
								<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
									<path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
								</svg>
							</span>
						</button>
					</x-slot>
					<x-slot name="content">
						<div class="flex items-center p-2 dropdown__item" wire:click="filtro('riesgo','Riesgo Super Alto')">
							<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z" />
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.879 16.121A3 3 0 1012.015 11L11 14H9c0 .768.293 1.536.879 2.121z" />
							</svg>
							<span class="ml-2">Riesgo Super Alto</span>
						</div>
						<div class="flex items-center p-2 dropdown__item" wire:click="filtro('riesgo','Riesgo Alto')">
							<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
							</svg><span class="ml-2">Riesgo Alto</span>
						</div>
						<div class="flex items-center p-2 dropdown__item" wire:click="filtro('riesgo','Riesgo Medio')">
							<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01" />
							</svg>
							<span class="ml-2">Riesgo Medio</span>
						</div>
						<div class="flex items-center p-2 dropdown__item" wire:click="filtro('riesgo','Riesgo Bajo')">
							<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 15.546c-.523 0-1.046.151-1.5.454a2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.701 2.701 0 00-1.5-.454M9 6v2m3-2v2m3-2v2M9 3h.01M12 3h.01M15 3h.01M21 21v-7a2 2 0 00-2-2H5a2 2 0 00-2 2v7h18zm-3-9v-2a2 2 0 00-2-2H8a2 2 0 00-2 2v2h12z" />
							</svg>
							<span class="ml-2">Riesgo Bajo</span>
						</div>
					</x-slot>
				</x-jet-dropdown>
			</div>
			<div class="button-file flex">
				<div class="flex items-center">
					<div class="relative border rounded-lg my-2 flex-grow">
						<input type="text" name="identificacion" autocomplete="false" wire:keydown.enter="search" wire:model="filtros.identificacion" class="border-none text-gray-500 w-full px-4 pl-8 py-2 focus:outline-none focus:shadow-outline rounded-lg" placeholder="Identificación" />
						<div class="absolute top-1 ml-1 mt-1">
							<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
							</svg>
						</div>
						<div class="absolute top-0 right-0">
							<button class="bg-green-200 py-1 px-2 mr-1 mt-1 rounded-lg text-gray-800">Search</button>
						</div>
					</div>
				</div>
			</div>
		</div>
			<div class="py-5 bg-white">
				<x-table.table :header="['Identificación','Nombre','Programa','E-mail','RIESGO','Acciones']">
					@foreach ($estudiantes as $estudiante)
					<tr class="text-gray-500">
						<x-table.td>{{$estudiante->numero_identificacion}}</x-table.td>
						<x-table.td>{{$estudiante->nombre}}</x-table.td>
						<x-table.td>{{$estudiante->programa_estudiante}}</x-table.td>
						<x-table.td>{{$estudiante->correo}}</x-table.td>
                        <x-table.td>{{$estudiante->riesgo}}</x-table.td>
						<td class="text-center">
							<x-table.action type="other" wire:click="infoEstudiante({{$estudiante->id}})">
								<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z" />
								</svg>
							</x-table.action>
						</td>
					</tr>
					@endforeach
				</x-table.table>
			</div>
		<div class="mt-4">
			{{$estudiantes->links()}}
		</div>
	</div>
</div>
