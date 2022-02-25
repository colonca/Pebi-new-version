@extends('layouts.app')

@section('content')
<x-breadcrumbs :items="[
    ['title' => 'Inicio', 'url' => 'dashboard'],
    ['title' => 'Docentes', 'url' => '']
  ]" />
<livewire:generales.docentes />
@endsection
