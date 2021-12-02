@extends('layouts.app')

@section('content')
<x-breadcrumbs :items="[
      ['title' => 'Inicio', 'url' => 'dashboard'],
      ['title' => 'Linea','url' => '']
   ]" />
<livewire:generales.lineas />
@endsection
