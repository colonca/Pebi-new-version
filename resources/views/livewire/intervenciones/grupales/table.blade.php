<div>
  <div class="text-gray-700 py-2">
	<div class="flex ">
	  <span class="">
		<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
		   <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
		</svg>  
	  </span>
	  <div class="ml-2 flex flex-grow">
          <div class="mr-2">Filters</div>
          <div class="flex items-center">
              <x-filters.label-close text="Programa: Admin Empresas"/>
              <x-filters.label-close text="Asignatura: Control" />
              <x-filters.label-close text="Taller: Motivación" />
              <x-filters.label-close text="Time: Last day" />
          </div>
      </div>
	</div>
	<div class="flex py-2 px-2">
	    <div class="filters flex flex-grow">
		<x-jet-dropdown width="48" >
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
              <div class="overflow-y-auto h-64">
                @foreach ($programas as $programa)
                    <div class="block px-4 py-2 text-xs text-gray-500 cursor-pointer hover:text-gray-800">
                        {{ __($programa->nombre) }}
                    </div>
                @endforeach 
             </div>
		  </x-slot>
		</x-jet-dropdown>
		<x-jet-dropdown>
		  <x-slot name="trigger">
		    <button class="flex items-center bg-gray-100 px-2 py-1 mr-2 rounded">
			<span class="">
				<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
				   <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
				</svg>	
			</span>
			<span class="ml-2">Asignaturas</span>
			<span class="ml-2">
				<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
				  <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
				</svg>
			</span>
		    </button>
	          </x-slot>
		  <x-slot name="content">

		  </x-slot>
		</x-jet-dropdown>
		<x-jet-dropdown width="48">
		  <x-slot name="trigger">
		    <button class="flex items-center bg-gray-100 px-2 py-1 mr-2 rounded">
			<span class="">
				<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
				   <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z" />
				</svg>	
			</span>
			<span class="ml-2">Taller</span>
			<span class="ml-l">
				<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
				  <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
				</svg>
			</span>
		    </button>
	          </x-slot>
		  <x-slot name="content">
                <div class="overflow-y-auto h-64">
                    @foreach ($talleres as $taller)
                       <div class="block px-4 py-2 text-xs text-gray-500 cursor-pointer hover:text-gray-800">
                          {{ __($taller->nombre) }}
                       </div>
                    @endforeach
                </div>
		  </x-slot>
		</x-jet-dropdown>
		<x-jet-dropdown >
		  <x-slot name="trigger">
		    <button class="flex items-center bg-gray-100 px-2 py-1 rounded">
			<span class="">
				<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
				</svg>	
			</span>
			<span class="ml-2">Last 30 days</span>
		    </button>
	          </x-slot>
		  <x-slot name="content">
               <div class="flex items-center p-2">
                  <x-jet-checkbox name="time"/>
                  <span class="ml-2">Last day</span>
               </div>
               <div class="flex items-center p-2">
                  <x-jet-checkbox name="time" />
                  <span class="ml-2">Last 15 days</span>
               </div>
               <div class="flex items-center p-2">
                  <x-jet-checkbox name="time" />
                  <span class="ml-2">Last 30 days</span>
               </div>
               <div class="flex items-center p-2">
                  <x-jet-checkbox name="time" />
                  <span class="ml-2">Last year</span>
               </div>
		  </x-slot>
		</x-jet-dropdown>
	    </div>
	    <div class="button-file flex">
		<button class="bg-blue-100 flex px-2 py-1 rounded">
		   <span>
			<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
			   <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
			</svg>   
		   </span> 
		   <span class="ml-2">Exportar</span>
		</button>
	    </div>
	</div>
  </div>
  <x-table.table :header="['Programa','Asignatura','Taller','# Participantes','Tallerista','Fecha','']">
		
  </x-table.table>
</div>
