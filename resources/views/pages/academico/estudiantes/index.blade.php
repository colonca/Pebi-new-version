@extends('layouts.app')

@section('content')
<x-breadcrumbs :items="[
      ['title' => 'Inicio', 'url' => 'dashboard'],
      ['title' => 'Estudiantes','url' => '']
   ]" />
<livewire:academico.estudiantes />
@endsection
