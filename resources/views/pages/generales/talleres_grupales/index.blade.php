@extends('layouts.app')

@section('content')
  <x-breadcrumbs :items="[
    ['title' => 'Inicio', 'url' => 'dashboard'],
    ['title' => 'Talleres Grupales', 'url' => '']
  ]"/>
  <livewire:generales.talleres-grupales /> 
@endsection