<div>
	<div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
		<div class="sm:flex sm:items-start">
			<h3 class="text-lg leading-6 font-semibold text-gray-900" id="modal-title">
				{{$title}}
			</h3>
		</div>
		<div class="flex mt-4">
			<div class="w-1/2 mr-2 rounded">
				<div class="flex">
					<div class="mr-2">
						<x-jet-label class="font-bold">Identificación </x-jet-label>
						<x-jet-input id="nombre" class="block mt-1 w-full" type="text" value="{{$estudiante->numero_identificacion}}" disabled placeholder="nombre" autofocus />
					</div>
					<div class="mr-2 flex-grow">
						<x-jet-label class="font-bold">Nombre</x-jet-label>
						<x-jet-input id="nombre" class="block mt-1 w-full" type="text" value="{{$estudiante->nombre}}" placeholder="nombre" disabled autofocus />
					</div>
				</div>
				<div class="flex mt-2">
					<div class="mr-2">
						<x-jet-label class="font-bold">Dirección</x-jet-label>
						<x-jet-input id="nombre" class="block mt-1 w-full" type="text" value="{{$estudiante->numero_identificacion}}" disabled placeholder="identificacion" autofocus />
					</div>
					<div class="mr-2 flex-grow">
						<x-jet-label class="font-bold">Telefono</x-jet-label>
						<x-jet-input id="nombre" class="block mt-1 w-full" type="text" value="{{$estudiante->numero_telefono}}" placeholder="telefono" disabled autofocus />
					</div>
					<div class="mr-2 flex-grow">
						<x-jet-label class="font-bold">Email</x-jet-label>
						<x-jet-input id="nombre" class="block mt-1 w-full" type="text" value="{{$estudiante->correo}}" placeholder="email" disabled autofocus />
					</div>
				</div>
				<div class="flex mt-2">
					<div class="mr-2 flex-grow">
						<x-jet-label class="font-bold">Programa</x-jet-label>
						<x-jet-input id="nombre" class="block mt-1 w-full" type="text" value="{{$estudiante->programa->nombre}}" placeholder="programa" disabled autofocus />
					</div>
					<div class="mr-2">
						<x-jet-label class="font-bold">Semestre</x-jet-label>
						<x-jet-input id="nombre" class="block mt-1 w-full" type="text" value="{{$estudiante->semestre}}" placeholder="semestre" disabled autofocus />
					</div>
				</div>
				<div class="flex mt-2">
					<div class="mr-2">
						<x-jet-label class="font-bold">Sede</x-jet-label>
						<x-jet-input id="nombre" class="block mt-1 w-full" type="text" value="{{$estudiante->sede}}" placeholder="sede" disabled autofocus />
					</div>
					<div class="mr-2 flex-grow">
						<x-jet-label class="font-bold">Fecha de Ingreso</x-jet-label>
						<x-jet-input id="nombre" class="block mt-1 w-full" type="text" value="{{$estudiante->fecha_ingreso}}" placeholder="fecha de ingreso" disabled autofocus />
					</div>
					<div class="mr-2 flex-grow">
						<x-jet-label class="font-bold">Estado</x-jet-label>
						<x-jet-input id="nombre" class="block mt-1 w-full" type="text" value="{{strtoupper($estudiante->estado)}}" placeholder="estado" autofocus />
					</div>
				</div>
			</div>
			<div class="border-2 border-gray-100 w-1/2 rounded">
			</div>
		</div>
		<div class="flex w-full mt-4">
			<div class="mr-4 w-1/3 mr-2">
				<h3 class="font-semibold text-center">Intervenciones Grupales</h3>
				<x-table.table :header="['Taller','Fecha']">
					@foreach($estudiante->intervenciones_grupales as $intervencion)
					<x-table.td>{{$intervencion->taller->nombre}}</x-table.td>
					<x-table.td>{{$intervencion->fecha}}</x-table.td>
					@endforeach
				</x-table.table>
			</div>
			<div class="mr-4 w-1/3 mr-2">
				<h3 class="font-semibold text-center">Intervenciones Psicologicas</h3>
				<x-table.table :header="['Taller','Fecha']">
					@foreach($estudiante->intervenciones_grupales as $intervencion)
					<x-table.td>{{$intervencion->taller->nombre}}</x-table.td>
					<x-table.td>{{$intervencion->fecha}}</x-table.td>
					@endforeach
				</x-table.table>
			</div>
			<div class="mr-4 w-1/3">
				<h3 class="font-semibold text-center">Intervenciones Academicas</h3>
				<x-table.table :header="['Taller','Fecha']">
					@foreach($estudiante->intervenciones_grupales as $intervencion)
					<x-table.td>{{$intervencion->taller->nombre}}</x-table.td>
					<x-table.td>{{$intervencion->fecha}}</x-table.td>
					@endforeach
				</x-table.table>
			</div>
		</div>
	</div>
</div>
