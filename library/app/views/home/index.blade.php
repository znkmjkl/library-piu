@extends('templates.layout')

@section('register')
    <div>
        <p><b># TODO</b></p>
        <p># Wyszukiwarka na pasku czy tutaj? Roboczo logowanie i rejestracja na stronie glownej (alt. /login i /register)</p>

        @include('users.partials._login_form')
        <br>
        @include('users.partials._register_form')
    </div>
@stop

<!-- @section('register')
	<div>
		@include('users.partials._login_form')
	</div>
	<div>
		@include('users.partials._register_form')
	</div>
@stop -->