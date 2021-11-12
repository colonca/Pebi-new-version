<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class CampanhaTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function la_pagina_campanha_contiene_el_componente_livewire()
    {
        Livewire::actingAs(User::factory()->create());
        $this->get('/generales/campañas')
            ->assertSeeLivewire('generales.campanha');
    }

    /** @test */
    public function mostrar_modal_para_crear_una_nueva_campanha()
    {
        Livewire::actingAs(User::factory()->create());
        Livewire::test(Campanhas::class)
            ->call('create')
            ->assertSee('Crear nueva campaña');
    }
}
