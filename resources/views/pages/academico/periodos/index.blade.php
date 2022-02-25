@extends('layouts.app')

@section('content')
<x-breadcrumbs :items="[
    ['title' => 'Inicio', 'url' => 'dashboard'],
    ['title' => 'Período', 'url' => '']
]" />
<livewire:academico.periodo-academicos />
@endsection
