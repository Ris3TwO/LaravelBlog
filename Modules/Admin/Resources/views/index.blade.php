@extends('admin::layouts.master')

@section('header')
<div class="navbar-wrapper">
    <p class="navbar-brand">Panel de Control</p>
</div>
@stop

@section('content')
    <h1>Hello World</h1>
    <p>Usuario conectado: {{ auth()->user()->name }}</p>
@stop
