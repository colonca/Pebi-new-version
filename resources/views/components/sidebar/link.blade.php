<div class="sidebar__link__item {{ $active ? 'sidebar__link__active' : ''}}">
    <a href="{{$link}}" class="flex">
        <span>
           {{$slot}}
        </span>
        <span class="ml-4 flex-grow">{{__($title)}}</span>
        @if($active)
            <span class="text-white font-semibold">|</span>
        @endif
    </a>
</div>
