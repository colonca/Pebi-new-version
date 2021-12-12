@props(['close' => ''])

<div>
	<div class="text-xs bg-indigo-100 rounded-lg px-2 py-1 mr-2">
		<span>{{$text}}</span>
		<span {!! $attributes->merge(['class' => "cursor-pointer ml-2 text-red-500"]) !!}>x</span>
	</div>
</div>
