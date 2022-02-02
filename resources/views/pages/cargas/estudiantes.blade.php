@extends('layouts.app')

@section('content')
<x-breadcrumbs :items="[
      ['title' => 'Inicio', 'url' => 'dashboard'],
      ['title' => 'Carga Masiva de Estudiantes','url' => '']
   ]" />
<div class="w-4/5"></div>
<livewire:cargas.estudiantes />
@endsection
