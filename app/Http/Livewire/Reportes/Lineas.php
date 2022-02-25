<?php

namespace App\Http\Livewire\Reportes;

use App\Models\Generales\Linea;
use App\Models\Generales\PeriodosAcademicos;
use App\Models\Generales\Programas;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Lineas extends Component
{
    use WithPagination;

    public $filtros = [
        'periodo' => '',
        'programa' => '',
        'sede' => ''
    ];

    public function filtro($filtro, $value)
    {
        if (!key_exists($filtro, $this->filtros))
            return;
        $this->filtros[$filtro] = $value;
    }

    public function limpiarFiltro($filtro)
    {
        if (!key_exists($filtro, $this->filtros))
            return;
        $this->filtros[$filtro] = '';
    }


    public function render()
    {

        $programas = Programas::orderBy('nombre','ASC')->get()->mapWithKeys(function ($item) {
            return [$item['id'] => $item];
        });

        $periodos = PeriodosAcademicos::orderBy('fecha_inicio','DESC')->get()->take(6)->mapWithKeys(function ($item) {
            return [$item['id'] => $item];
        });

        $query =  DB::table('intervenciones_grupales as i')
            ->select([
                'p.nombre as programa',
                'l.slug as linea',
                DB::raw('count(ge.estudiante_id) as cantidad')
            ])->join('programas as p','p.id','=','i.programa_id')
            ->join('lineas as l','l.id','=','i.linea_id')
            ->join('grupales_estudiante as ge','ge.grupal_id','=','i.id')
            ->groupBy('p.nombre','l.slug')
            ->when($this->filtros['periodo'], function ($query) {
                return $query->where('i.periodo_id',$this->filtros['periodo']);
            })
            ->when($this->filtros['programa'], function ($query) {
                return $query->where('i.programa_id',$this->filtros['programa']);
            })
            ->get();

        $reporte = [];
        foreach ($query as $item){
            $reporte[$item->programa][$item->linea] = $item->cantidad;
        }

        return view('livewire.reportes.lineas',[
            'programas' => $programas,
            'periodos' => $periodos,
            'reporte' => $reporte,
            'lineas' => Linea::all(['slug'])
        ]);
    }
}
