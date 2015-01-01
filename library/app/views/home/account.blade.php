@extends('templates.layout')

@section('support')
 imię: {{ Auth::user()->usr_name }}<br/>
 nazwisko: {{ Auth::user()->usr_surname }}<br/>
 telefon: {{ Auth::user()->usr_phone }}<br/>
 numer: {{ Auth::user()->usr_number }}<br/>
 pesel: {{ Auth::user()->usr_pesel }}<br/>
 @if( Auth::user()->usr_verified )
 	<span class="label label-success">Dane zweryfikowane</span>
 @else
 	<span class="label label-warning">Dane niezweryfikowane</span>
 @endif
 
{{ Form::open(array('url' => 'changePass', 'class' => 'form-signin')) }}
    {{ Form::password('usr_oldPass', array('class' => 'form-control', 'placeholder' => 'Wprowadź aktualne hasło', "required" => "true")) }}
    {{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Wprowadź nowe hasło', "required" => "true")) }}
    {{ Form::password('password_confirmation', array('class' => 'form-control', 'placeholder' => 'Powtórz nowe hasło', "required" => "true")) }}
    
    <hr>
    {{ Form::submit('Zmień hasło', array('class' => 'btn btn-lg btn-danger btn-block')) }}
{{ Form::close() }}

@stop