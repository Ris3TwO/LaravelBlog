@extends('layouts.app')

@section('content')
    <div id="notfound">
		<div class="notfound">
			<div class="notfound-404">
				<h1>404</h1>
			</div>
			<h2>Oops! No se encontró nada.</h2>
            <p class="lead">Es posible que la página que busca haya sido eliminada si su nombre ha cambiado o no está disponible temporalmente.</p>
            <p class="lead"><a href="{{ route('pages.home') }}">Volver a la página de inicio</a></p>
		</div>
	</div>
@endsection

@push('styles')
    <link href="{{ asset('css/404.css') }}" rel="stylesheet">
@endpush