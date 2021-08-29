<div class="breadcrumbs flex text-gray-500 my-4">
    @foreach($items as $item)
    <div class="breadcrumbs__item flex items-center hover:text-gray-900 ">
        <a href="{{url($item['url'])}}" class="{{$loop->last ? 'text-gray-600 font-semibold' : ''}}">
            {{ $item['title']}}
        </a>
        @if(!$loop->last)
        <span>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
            </svg>
        </span>
        @endif
    </div>
    @endforeach
</div>
