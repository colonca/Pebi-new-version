<div>
    <div  class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
        <div>
            <div class="sm:flex sm:items-start mb-2">
                <h3 class="text-lg leading-6 font-semibold text-gray-900" id="modal-title">
                    {{$title}}
                </h3>
            </div>
            <div class="flex ">
                <div class="w-1/2 p-2 border rounded mr-2">
                  <h3 class="font-semibold">Información del estudiante</h3>
                  <div class="my-2"">
                    <div class="flex">
                       <p class="flex-1">
                         <span class="font-semibold">Nombres:</span>
                        {{$historia['estudiante']['primer_nombre'].' '. $historia['estudiante']['segundo_nombre']. ' '. $historia['estudiante']['primer_apellido'].' '. $historia['estudiante']['segundo_apellido']}}
                        </p>
                        <p><span class="font-semibold">Identificación: </span>{{$historia['estudiante']['identificacion']}}</p>
                    </div>
                    <p class="mt-2">
                       <span class="font-semibold">Programa:</span>
                       {{$historia['estudiante']['programa']['nombre']}}
                    </p>
                  </div>
                  <h3 class="font-semibold mb-2">Seguimientos</h3>
                  <x-table.table :header="['Tallerista','Fecha','Acciones']">
                    @foreach ($historia['seguimientos'] as $seguimiento)
                      <tr class="text-gray-500">
                            <x-table.td>{{$seguimiento['tallerista']['nombres']}}</x-table-td>
                            <x-table.td>{{$seguimiento['created_at']}}</x-table-td>
                            <td class="text-left">
                                <x-table.action type="show" wire:click="ver_detalle({{$seguimiento['id']}})" />
                            </td>
                        </tr>
                    @endforeach
                  </x-table.table>
                </div>
                <div class="w-1/2 p-2 border rounded">
                  <h3 class="font-semibold ">Detalle del seguimiento</h3>
                  @isset($detalle)
                    <h4 class="font-semibold border-b-2">Seguimiento</h4>
                    <p>{{$detalle['seguimiento']}}</p>
                    <h4 class="font-semibold border-b-2">Conclusion</h4>
                    <p>{{$detalle['conclusion']}}</p>
                    <h4 class="font-semibold border-b-2">Tallerista</h4>
                    <p>{{$detalle['tallerista']['nombres']}}</p>
                    <p><span class="font-semibold">SE REMITE IPS : </span> {{$detalle['remision_ips']}}</p>
                  @endisset
                </div>
            </div>
        </div>
    </div>
</div>