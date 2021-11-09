<?php

namespace Tests\Feature;

use App\Http\Livewire\Components\DeleteModal;
use App\Http\Livewire\Generales\TalleresGrupales;
use App\Models\User;
use App\Models\Generales\TalleresGrupales as Talleres;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class TalleresGrupalesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function la_pagina_talleres_grupales_continene_el_component_livewire()
    {
        Livewire::actingAs(User::factory()->create());
        $this->get('/generales/talleres-grupales')->assertSeeLivewire('generales.talleres-grupales');
    }

    /** @test */
    public function puede_crear_un_taller_grupal()
    {
        Livewire::actingAs(User::factory()->create());
        $taller = Talleres::factory()->make();
        Livewire::test(TalleresGrupales::class)
            ->set('nombre', $taller->nombre)
            ->set('descripcion', $taller->descripcion ?: '')
            ->call('store')
            ->assertSee('Taller grupal guardado correctamente');

        $this->assertTrue(Talleres::where('nombre', $taller->nombre)->exists());
    }

    /** @test */
    function nombre_is_required_al_momento_de_guardar()
    {
        Livewire::actingAs(User::factory()->create());

        Livewire::test(TalleresGrupales::class)
            ->set('nombre', '')
            ->call('store')
            ->assertHasErrors(['nombre' => 'required']);
    }

    /** @test */
    function nombre_is_required_al_momento_de_actualizar()
    {
        Livewire::actingAs(User::factory()->create());

        Livewire::test(TalleresGrupales::class)
            ->set('nombre', '')
            ->call('update')
            ->assertHasErrors(['nombre' => 'required']);
    }

    /** @test */
    public function puede_actualizar_un_taller_grupal()
    {
        Livewire::actingAs(User::factory()->create());
        $taller = Talleres::factory()->create();
        Livewire::test(TalleresGrupales::class)
            ->set('updateMode', true)
            ->set('taller_id', $taller->id)
            ->set('nombre', 'nombre actualizado')
            ->call('update')
            ->assertSee('Taller grupal actualizado correctamente');

        $this->assertTrue(Talleres::where('nombre', 'nombre actualizado')->exists());
    }

    /** @test */
    public function puede_cancelar_la_actualizacion_de_un_taller_grupal()
    {
        Livewire::actingAs(User::factory()->create());
        $taller = Talleres::factory()->create();
        Livewire::test(TalleresGrupales::class)
            ->set('updateMode', true)
            ->set('taller_id', $taller->id)
            ->set('nombre', $taller->nombre)
            ->set('descripcion', $taller->descripcion ?? '')
            ->call('cancelar');
    }

    /** @test */
    public function el_componente_talleres_grupales_muestra_el_modal_para_confirmar_la_eliminacion_del_taller()
    {
        Livewire::actingAs(User::factory()->create());
        $taller = Talleres::factory()->create();
        Livewire::test(TalleresGrupales::class)
            ->call('delete', $taller->id)
            ->assertEmitted('showModal');
    }


    /** @test */
    public function puede_eliminar_un_taller_grupal()
    {
        Livewire::actingAs(User::factory()->create());
        $taller = Talleres::factory()->create();
        Livewire::test(DeleteModal::class)
            ->call('open', ['id' => $taller->id, 'className' => get_class($taller)])
            ->call('delete');

        $this->assertDeleted('talleres_grupales', $taller->toArray());
    }
}
