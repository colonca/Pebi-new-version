<div>
    <table class="border-collapse border border-gray-500 my-2 w-full">
        <thead class="text-white bg-green-500 rounded-full">
        <tr>
            @foreach($horarios as $day)
                <td class="border border-gray-50 p-2 font-semibold text-center">
                    {{$day}}
                </td>
            @endforeach
        </tr>
        </thead>
        <tbody>
        <?php $cont1 = $cont2 = 0; ?>
        @foreach($horas as $hora)
            <tr>
                <?php $cont1 = $cont1 + 1; $cont2 = 0;?>
                @foreach($horarios as $item)
                    <?php $cont2 = $cont2 + 1; ?>
                    @if($cont2 == 1)
                        <td class="border p-2 font-semibold">{{$hora}}</td>
                    @else
                        <td
                            wire:click="toggle('{{$item}}', {{explode(':', $hora)[0]}})"
                            class="border text-center text-gray-600 cursor-pointer {{array_key_exists($item.'-'.explode(':', $hora)[0], $disponibilidad) ? 'bg-green-200' : '' }}"
                            data-dia="{{$item}}"
                            data-hora="{{explode(':',$hora)[0]}}"
                            id="{{$item.explode(':',$hora)[0]}}"
                        >
                            {{array_key_exists($item.'-'.explode(':', $hora)[0], $disponibilidad) ? 'DISPONIBLE' : 'SIN ASIGNAR' }}
                        </td>
                    @endif
                @endforeach
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
