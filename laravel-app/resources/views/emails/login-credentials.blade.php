@component('mail::message')
# Tus credenciales para acceder a {{ config('app.name') }}

Utiliza los siguientes datos para acceder al sistema.

@component('mail::table')
    | Usuario | Contraseña |
    |:---------|:------------|
    | {{ $user['email'] }} | {{ $password }} |
@endcomponent

@component('mail::button', ['url' => url('login')])
Ingresar
@endcomponent

Saludos,<br>
El Equipo de {{ config('app.name') }}
@endcomponent
