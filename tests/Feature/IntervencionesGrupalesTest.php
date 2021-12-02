<?php

namespace Tests\Feature;

use App\Http\Livewire\Forms\IntervencionGrupalForm;
use App\Models\Generales\Asignaturas;
use App\Models\Generales\Estudiantes;
use App\Models\Generales\Programas;
use App\Models\Generales\TalleresGrupales;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class IntervencionesGrupalesTest extends TestCase
{

    use RefreshDatabase;

    /** @test */
    public function puede_crear_una_intervencion_grupal()
    {
        Livewire::actingAs(User::factory()->create());
        Programas::factory()->count(10)->create();
        $asignatura = Asignaturas::factory()->create();
        $taller = TalleresGrupales::factory()->create();
        Estudiantes::factory()->count(10)->create();
        $estudiantes = Estudiantes::all();
        $date = date('d-m-Y');
        Livewire::test(IntervencionGrupalForm::class)
            ->set('form.programa_id', $asignatura->programa->id)
            ->set('form.asignatura_id', $asignatura->id)
            ->set('form.taller_id', $taller->id)
            ->set('form.fecha', $date)
            ->set('form.estudiantes', $estudiantes)
            ->call('submit');
    }
}
