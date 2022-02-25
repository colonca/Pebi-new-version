@extends('layouts.app')

@section('content')
    <x-breadcrumbs :items="[
      ['title' => 'Inicio', 'url' => 'dashboard'],
      ['title' => 'Reportes','url' => 'dashboard'],
      ['title' => 'Riesgos','url' => '/reportes/riesgos']
   ]" />
    <livewire:reportes.riesgos/>
@endsection
