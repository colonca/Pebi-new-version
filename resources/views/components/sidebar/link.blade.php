<li class="sidebar__link__item {{ $active ? 'sidebar__link__active' : ''}}">
    <a href="{{$link}}" class="flex">
        <span>
           {{$slot}}
        </span>
        <span class="ml-4">{{__($title)}}</span>
    </a>
</li>
