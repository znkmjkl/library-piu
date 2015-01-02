@extends('templates.layout')

@section('support')

<p>KSIAZKA</p>

<p>ISBN: {{ $book[0]->bok_isbn }}</p>
<p>Tytul: {{ $book[0]->bok_title }}</p>
<p>Autor:
@foreach ($book as $author)
    <a href="/author/{{ $author->wtr_id }} "> {{ $author->wtr_name }} {{ $author->wtr_surname }}</a><span>, </span>
@endforeach
<p>Jezyk: <a href="/language/{{ $book[0]->bok_lng_id }} "> {{ $book[0]->lng_name }}</a></p>
<p>Rodzaj: <a href="/kind/{{ $book[0]->bok_knd_id }} "> {{ $book[0]->knd_name }}</a></p>

@if (Auth::check())

    @if (!$book[0]->rvn_status)

        {{ Form::open(array('route' => array('reserve', $book[0]->bok_id))) }}
            {{ Form::submit('Reserve') }}
        {{ Form::close() }}

    @elseif ($book[0]->rvn_status && Auth::user()->id === $book[0]->rvn_usr_id)

        {{ Form::open(array('route' => array('resign', $book[0]->bok_id))) }}
            {{ Form::submit('Resign') }}
        {{ Form::close() }}

    @else
        <p>Książka została już zarezerwowana.</p>

    @endif

@else

    <p>Zaloguj się, aby zarezerwować książkę.</p>

@endif

@stop

