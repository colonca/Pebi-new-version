<div x-data="{open : {{$active ? 'true' : 'false'}}}" class="sidebar__link__item">
    <div @click="open = !open" class="flex items-center cursor-pointer w-full">
        <span>
            {{$icon}}
        </span>
        <span class="ml-4 flex-grow">{{__($title)}}</span>
        <span>
            <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
            <svg x-show="open" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z" clip-rule="evenodd" />
            </svg>
        </span>
    </div>
    <div x-show="open" class="pl-4 pt-2 flex flex-col items-start flex-grow overflow-y-auto">
        {{$items}} 
    </div>
</div>
