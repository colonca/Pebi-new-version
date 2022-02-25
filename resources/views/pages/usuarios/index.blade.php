@extends('layouts.app')

@section('content')
<x-breadcrumbs :items="[
    ['title' => 'Inicio', 'url' => 'dashboard'],
    ['title' => 'Usuarios', 'url' => '']
  ]" />
<livewire:users.usuarios />
@endsection
