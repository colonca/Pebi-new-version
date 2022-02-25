@extends('layouts.app')

@section('content')
    <x-breadcrumbs :items="[
      ['title' => 'Inicio', 'url' => 'dashboard'],
      ['title' => 'Reportes','url' => 'dashboard'],
      ['title' => 'Lineas','url' => '/reportes/lineas']
   ]" />
    <livewire:reportes.lineas />
@endsection
