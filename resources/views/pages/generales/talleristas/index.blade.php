@extends('layouts.app')

@section('content')
    <x-breadcrumbs :items="[
    ['title' => 'Inicio', 'url' => 'dashboard'],
    ['title' => 'Talleristas', 'url' => '']
  ]"/>
    <livewire:generales.talleristas/>
@endsection
