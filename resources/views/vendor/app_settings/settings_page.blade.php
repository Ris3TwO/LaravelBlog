@extends('admin::layouts.master')

@section('header')
<div class="navbar-wrapper">
    <p class="navbar-brand">Configuraciones</p>
</div>
@stop

@section('content')
    @include('app_settings::_settings')
@endsection
