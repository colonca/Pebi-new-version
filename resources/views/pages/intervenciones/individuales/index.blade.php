@extends('layouts.app')

@section('content')
<x-breadcrumbs :items="[
      ['title' => 'Inicio', 'url' => 'dashboard'],
      ['title' => 'Intervenciones Individuales','url' => '']
   ]" />
<div class="w-4/5"></div>
<livewire:intervenciones.individuales.table />
@endsection
