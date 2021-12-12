 <div class="sidebar bg-gray-50 w-68 flex-none flex flex-col  overflow-y-hiden">
 	<div class="sidebar__logo flex justify-center mt-6">
 		<img class="w-4/5" src="http://pebi.nikorriendo.com/public/images/logo.png" alt="logo PEBI">
 	</div>
 	<div class="pt-12  flex flex-col items-start flex-grow overflow-y-auto">
 		<x-sidebar.link title="Calendario" :link="url('/calendario')" :active="request()->is('calendario*')">
 			<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
 				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
 			</svg>
 		</x-sidebar.link>
 		<x-sidebar.dropdown title="Generales" :active="true">
 			<x-slot name="icon">
 				<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
 					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
 					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
 				</svg>
 			</x-slot>
 			<x-slot name="items">
 				@can('docentes-permanencia.index')
 				<x-sidebar.link title="Docentes Pebi" :link="url('/generales/docentes-permanencia')" :active="request()->is('generales/docentes-permanencia*')">
 					<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
 						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
 					</svg>
 				</x-sidebar.link>
 				@endcan
 				@can('talleristas.index')
 				<x-sidebar.link title="Talleristas" :link="url('/generales/talleristas')" :active="request()->is('generales/talleristas*')">
 					<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
 						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
 					</svg>
 				</x-sidebar.link>
 				@endcan
 				@can('lineas.index')
 				<x-sidebar.link title="Lineas" :link="url('/generales/lineas')" :active="request()->is('generales/lineas*')">
 					<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
 						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
 					</svg>
 				</x-sidebar.link>
 				@endcan
 				@can('campanhas.index')
 				<x-sidebar.link title="Campañas" :link="url('/generales/campañas')" :active="request()->is('generales/campañas*')">
 					<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
 						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
 					</svg>
 				</x-sidebar.link>
 				@endcan
 				@can('talleres.index')
 				<x-sidebar.link title="Talleres Grupales" :link="url('/generales/talleres-grupales')" :active="request()->is('generales/talleres-grupales*')">
 					<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
 						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z" />
 					</svg>
 				</x-sidebar.link>
 				@endcan
 			</x-slot>
 		</x-sidebar.dropdown>
 		<x-sidebar.dropdown title="Academico" :active="true">
 			<x-slot name="icon">
 				<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
 					<path d="M12 14l9-5-9-5-9 5 9 5z" />
 					<path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
 					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
 				</svg>
 			</x-slot>
 			<x-slot name="items">
 				@can('estudiantes.index')
 				<x-sidebar.link title="Estudiantes" :link="url('/academico/estudiantes')" :active="request()->is('academico/estudiantes*')">
 					<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
 						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
 					</svg>
 				</x-sidebar.link>
 				@endcan
 			</x-slot>
 		</x-sidebar.dropdown>
 		<x-sidebar.dropdown title="Intervenciones" :active="true">
 			<x-slot name="icon">
 				<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
 					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
 				</svg>
 			</x-slot>
 			<x-slot name="items">
 				@can('intervenciones-grupales.index')
 				<x-sidebar.link title="Grupales" :link="url('/intervenciones/grupales/index')" :active="request()->is('intervenciones/grupales*')">
 					<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
 						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
 					</svg>
 				</x-sidebar.link>
 				@endcan
 				@can('intervenciones-individuales.index')
 				<x-sidebar.link title="Individuales" :link="url('intervenciones/individuales')" :active="request()->is('intervenciones/individuales*')">
 					<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
 						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
 					</svg>
 				</x-sidebar.link>
 				@endcan
 			</x-slot>
 		</x-sidebar.dropdown>
 		@can('usuarios.index')
 		<x-sidebar.link title="Usuarios" :link="url('users')" :active="request()->is('users*')">
 			<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
 				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
 			</svg>
 		</x-sidebar.link>
 		@endcan
 	</div>
 	<div class="logout pl-4 pb-4">
 		<form action="{{route('logout')}}" method="POST">
 			@csrf
 			<button class="flex text-gray-700">
 				<span>
 					<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
 						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
 					</svg>
 				</span>
 				<span class="ml-4 font-semibold">{{__('Cerrar Sesion')}}</span>
 			</button>
 		</form>
 	</div>
 </div>
