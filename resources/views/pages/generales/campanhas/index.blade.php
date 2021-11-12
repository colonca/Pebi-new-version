@extends('layouts.app')

@section('content')
<x-breadcrumbs :items="[
    ['title' => 'Inicio', 'url' => 'dashboard'],
    ['title' => 'Campañas', 'url' => '']
]" />
<livewire:generales.campanhas />
@endsection
