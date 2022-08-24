<div>
    <x-flash-message />

    <x-table.table :header="[
        'Identificacion',
        'Estudiante',
        'Motivo',
        'Estado',
        'Tallerista',
        'Cita',
        'Fecha Solicitud',
        'Acciones',
    ]">
        @foreach ($remisiones as $remision)
            @php
                $estudiante = $remision->solicitudRelation->estudianteRelation;
            @endphp
            <tr class="text-gray-500">
            <x-table.td>{{ $estudiante->tipo_documento . '-' . $estudiante->identificacion }}</x-table-td>
                <x-table.td>{{ $estudiante->primer_nombre . '-' . $estudiante->primer_apellido }}</x-table-td>
                <x-table.td>{{ $remision->area }}</x-table-td>
                <x-table.td>{{ $remision->estado }}</x-table-td>
                <x-table.td>{{ $remision->talleristaRelation->nombres }}</x-table-td>
                <x-table.td>{{ date('M j, Y', strtotime($remision->fecha_cita)) }}</x-table-td>
                <x-table.td>{{ date('M j, Y', strtotime($remision->solicitudRelation->fecha)) }}
                </x-table-td>
                <td>
                    <button title="remitir solicitud" class="cursor-pointer"
                        wire:click="remitir({{ $remision->solicitudRelation->id }})">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                        </svg>
                    </button>
                    <button title="atender estudiante" class="cursor-pointer"
                        wire:click="atender({{ $remision->id }})">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                          </svg>
                    </button>
                    <button title="atender estudiante" class="cursor-pointer"
                        wire:click="atender({{ $remision->id }})">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </button>
                </td>
            </tr>
        @endforeach
    </x-table.table>
    <div class="my-2">
        {{ $remisiones->links() }}
    </div>
</div>
