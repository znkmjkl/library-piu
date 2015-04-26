@extends('templates.layout')

@section('support')

{{ Form::open(array('url' => 'search', 'class' => 'form-signin')) }}
    {{ Form::text('bok_isbn', null, array('class' => 'form-control', 'placeholder' => Lang::get('messages.isbn'))) }}
    {{ Form::text('bok_title', null, array('class' => 'form-control', 'placeholder' => Lang::get('messages.title'))) }}
    {{ Form::text('bok_lng', null, array('class' => 'form-control', 'placeholder' => Lang::get('messages.language') )) }}
    {{ Form::text('bok_atr', null, array('class' => 'form-control', 'placeholder' => Lang::get('messages.bookAuthor') )) }}
    {{ Form::text('bok_knd', null, array('class' => 'form-control', 'placeholder' => 'Rodzaj' )) }}
    {{ Form::text('bok_edition_date', null, array('class' => 'form-control', 'placeholder' => Lang::get('messages.releaseDate') )) }}
    {{ Form::text('bok_edition_number', null, array('class' => 'form-control', 'placeholder' => 'Numer wydania' )) }}
    <hr>
    {{ Form::submit(Lang::get('messages.search'), array('class' => 'btn btn-lg btn-primary btn-block')) }}
{{ Form::close() }}

@stop
