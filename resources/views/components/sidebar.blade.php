 <div class="sidebar bg-gray-50 w-68 flex-none flex flex-col overflow-y-hiden">
     <div class="sidebar__logo flex justify-center mt-6">
         <img class="w-4/5" src="http://pebi.nikorriendo.com/public/images/logo.png" alt="logo PEBI">
     </div>
     <ul class="pt-12 pl-4 flex flex-col items-start flex-grow overflow-y-auto">
         <li class="sidebar__link__item sidebar__link__active {{request()->is('intervenciones_grupales*') ? 'sidebar__link__active' : ''}}">
             <a href="" class="flex">
                 <span>
                     <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                     </svg>
                 </span>
                 <span class="ml-4">{{__('Intervenciones Grupales')}}</span>
             </a>
         </li>

         <li class="sidebar__link__item {{request()->is('generales*') ? 'sidebar__link__active' : ''}}">
             <a href="" class="flex">
                 <span>
                     <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                     </svg>
                 </span>
                 <span class="ml-4">{{__('Generales')}}</span>
             </a>
         </li>
         <li class="sidebar__link__item  {{request()->is('users*') ? 'sidebar__link__active' : ''}}">
             <a href="" class="flex">
                 <span>
                     <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                     </svg>
                 </span>
                 <span class="ml-4">{{__('Usuarios')}}</span>
             </a>
         </li>

     </ul>
     <div class="logout pl-4 pb-4">
         <form action="{{route('logout')}}" method="POST">
             @csrf
             <button class="flex text-gray-700">
                 <span>
                     <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                     </svg>
                 </span>
                 <span class="ml-4">{{__('Cerrar Sesion')}}</span>
             </button>
         </form>
     </div>
 </div>
