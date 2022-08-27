<?php

namespace App\Http\Livewire\Reportes;

use App\Models\Generales\Linea;
use App\Models\Generales\PeriodosAcademicos;
use App\Models\Generales\Programas;
use App\Models\Generales\Riesgo;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Riesgos extends Component
{
    use WithPagination;

    public $filtros = [
        'periodo' => '',
        'programa' => '',
        'sede' => ''
    ];

    public $header = ['PROGRAMA'];
    public $riesgos = [];

    public function mount()
    {
        $this->riesgos = Riesgo::all(['descripcion']);
        foreach ($this->riesgos as $riesgo) {
            $this->header[] = $riesgo->descripcion;
        }
    }

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

        $programas = Programas::orderBy('nombre', 'ASC')->get()->mapWithKeys(function ($item) {
            return [$item['id'] => $item];
        });

        $periodos = PeriodosAcademicos::orderBy('fecha_inicio', 'DESC')->get()->take(6)->mapWithKeys(function ($item) {
            return [$item['id'] => $item];
        });
        /*
         * SELECT p.nombre as programa, r.descripcion as riesgo, COUNT(*) FROM estudiantes e
           INNER JOIN programas p on e.programa_id  = p.id
           INNER JOIN historico h on e.id  = h.estudiante_id
           INNER JOIN riesgos r on r.id  = h.riesgo_id
           GROUP BY p.nombre, r.descripcion;
         */
        $query =  DB::table('estudiantes as e')
            ->select([
                'p.nombre as programa',
                'h.riesgo as riesgo',
                DB::raw('count(*) as cantidad')
            ])->join('programas as p', 'p.id', '=', 'e.programa_id')
            ->join('historico as h', 'e.id', '=', 'h.estudiante_id')
            ->groupBy('p.nombre', 'h.riesgo')
            ->when($this->filtros['periodo'], function ($query) {
                return $query->where('h.periodo_id', $this->filtros['periodo']);
            })
            ->when($this->filtros['programa'], function ($query) {
                return $query->where('p.id', $this->filtros['programa']);
            })
            ->get();
        $reporte = [];
        foreach ($query as $item) {
            $reporte[$item->programa][$item->riesgo] = $item->cantidad;
        }

        return view('livewire.reportes.riesgos', [
            'programas' => $programas,
            'periodos' => $periodos,
            'reporte' => $reporte
        ]);
    }
}
