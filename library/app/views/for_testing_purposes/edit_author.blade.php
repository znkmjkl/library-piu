@extends('templates.layout')

@section('support')
<hr>

 {{ Form::open(array('url' => 'editauthor/'.$writer[0]->wtr_id, 'class' => 'form-signin')) }}
    {{ Form::text('author_name', $writer[0]->wtr_name, array('class' => 'form-control', 'placeholder' => 'Imię')) }}
    {{ Form::text('author_surname', $writer[0]->wtr_surname, array('class' => 'form-control', 'placeholder' => 'Nazwisko')) }}
    {{ Form::text('birth_date', $writer[0]->wtr_birth_date, array('class' => 'form-control', 'placeholder' => 'Data urodziń')) }}
    <p>{{ Form::submit('Edytuj autora', array('class' => 'btn btn-default')) }}

{{ Form::close() }}


@stop
