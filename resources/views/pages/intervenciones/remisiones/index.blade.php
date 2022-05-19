@extends('layouts.app')

@section('content')
<x-breadcrumbs :items="[
      ['title' => 'Inicio', 'url' => 'dashboard'],
      ['title' => 'Remisiones','url' => '']
   ]" />
<div class="w-4/5"></div>
<livewire:intervenciones.remisiones.table />
@endsection

