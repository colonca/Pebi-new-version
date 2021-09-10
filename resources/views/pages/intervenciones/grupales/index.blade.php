@extends('layouts.app')

@section('content')
  <x-breadcrumbs :items="[ 
      ['title' => 'Inicio', 'url' => 'dashboard'],
      ['title' => 'Intervenciones Grupales','url' => ''] 
   ]"/>

   <livewire:intervenciones.grupales.table />
@endsection