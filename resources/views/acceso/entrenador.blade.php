@extends('layouts.template')


@section('title', 'Entrenador: ' . auth()->user()->usuario->u_nom)  


@section('content')
    
<div class="pagetitle">
    <h1>Entorno de Trabajo de {{ auth()->user()->usuario->u_nom }} {{ auth()->user()->usuario->u_app }}</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

@endsection