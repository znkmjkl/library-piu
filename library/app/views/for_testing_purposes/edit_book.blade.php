@extends('templates.layout')

@section('support')
<hr>

 {{ Form::open(array('url' => 'editbook/'.$book[0]->bok_id, 'class' => 'form-signin')) }}
    {{ Form::text('bok_isbn', $book[0]->bok_isbn, array('class' => 'form-control', 'placeholder' => 'ISBN')) }}
    {{ Form::text('bok_title', $book[0]->bok_title, array('class' => 'form-control', 'placeholder' => 'Tytuł')) }}
    <p>{{ Form::select('writer[]', $writers, $authors ,array('class' => 'form-control','multiple' => true ))}}</p>
    <p>{{ Form::select('language', $languages, $book[0]->bok_lng_id ,array('class' => 'form-control') )}}</p>
    <p>{{ Form::select('kind', $kinds, $book[0]->bok_knd_id ,array('class' => 'form-control') )}}</p>
    {{ Form::text('date', substr($book[0]->bok_edition_date,0,10), array('class' => 'form-control', 'placeholder' => 'Data edycji')) }}
    {{ Form::text('edition', $book[0]->bok_edition_number, array('class' => 'form-control', 'placeholder' => 'Numer edycji')) }}
    <p>{{ Form::submit('Zapisz', array('class' => 'btn btn-default')) }}
    	<a button href="/addauthor" type="button" class="btn btn-default">Dodaj nowego autora</a></p>

{{ Form::close() }}


@stop
