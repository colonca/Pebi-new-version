@extends('layouts.app')

@section('content')
    <x-breadcrumbs :items="[
      ['title' => 'Inicio', 'url' => 'dashboard'],
      ['title' => 'Historias Psicologicas','url' => '']
   ]" />
    <div class="w-4/5"></div>
    <livewire:intervenciones.historias.table />
@endsection
