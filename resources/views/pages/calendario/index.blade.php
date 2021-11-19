@extends('layouts.app')

@section('content')
<x-breadcrumbs :items="[
    ['title' => 'Inicio', 'url' => 'dashboard'],
    ['title' => 'Calendario', 'url' => '']
  ]" />
<livewire:components.calendario />
@endsection
