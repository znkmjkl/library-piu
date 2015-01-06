@extends('templates.layout')

@section('support')
<hr>

 {{ Form::open(array('url' => 'addauthor', 'class' => 'form-signin')) }}
    {{ Form::text('author_name', null, array('class' => 'form-control', 'placeholder' => 'Imię')) }}
    {{ Form::text('author_surname', null, array('class' => 'form-control', 'placeholder' => 'Nazwisko')) }}
    {{ Form::text('birth_date', null, array('class' => 'form-control', 'placeholder' => 'Data urodziń')) }}
    <p>{{ Form::submit('Dodaj Autora', array('class' => 'btn btn-default')) }}

{{ Form::close() }}


@stop
