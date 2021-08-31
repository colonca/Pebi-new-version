@extends('layouts.app')

@section('content')
<x-breadcrumbs :items="[
  ['title' => 'Inicio', 'url' => 'dashboard'],
  ['title' => 'Menu Generales', 'url' => 'generales/menu']
]" />

<div class="menu__generales mt-2">

</div>
@endsection
