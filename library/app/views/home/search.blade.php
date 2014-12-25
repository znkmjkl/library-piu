@extends('templates.layout')

@section('support')

{{ Form::open(array('url' => 'search', 'class' => 'form-signin')) }}
    {{ Form::text('bok_isbn', null, array('class' => 'form-control', 'placeholder' => 'ISBN')) }}
    {{ Form::text('bok_title', null, array('class' => 'form-control', 'placeholder' => 'Tytuł')) }}
    {{ Form::text('bok_lng', null, array('class' => 'form-control', 'placeholder' => 'Język')) }}
    {{ Form::text('bok_atr', null, array('class' => 'form-control', 'placeholder' => 'Autor')) }}
    {{ Form::text('bok_knd', null, array('class' => 'form-control', 'placeholder' => 'Rodzaj')) }}
    {{ Form::text('bok_edition_date', null, array('class' => 'form-control', 'placeholder' => 'Data wydania')) }}
    {{ Form::text('bok_edition_number', null, array('class' => 'form-control', 'placeholder' => 'Numer wydania')) }}
    <hr>
    {{ Form::submit('Szukaj', array('class' => 'btn btn-lg btn-primary btn-block')) }}
{{ Form::close() }}

@stop
