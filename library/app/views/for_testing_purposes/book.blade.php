@extends('templates.layout')

@section('support')

<p>KSIAZKA</p>

<p>ISBN: {{ $book->bok_isbn }}</p>
<p>Tytul: {{ $book->bok_title }}</p>
<p>Autor: <a href="/author/{{ $book->bok_atr_id }} "> {{ $book->atr_name }}</a></p>
<p>Jezyk: <a href="/language/{{ $book->bok_lng_id }} "> {{ $book->lng_name }}</a></p>
<p>Rodzaj: <a href="/kind/{{ $book->bok_knd_id }} "> {{ $book->knd_name }}</a></p>

@if (Auth::check())

    @if (!$book->rvn_status)

        {{ Form::open(array('route' => array('reserve', $book->bok_id))) }}
            {{ Form::submit('Reserve') }}
        {{ Form::close() }}

    @elseif ($book->rvn_status && Auth::user()->id === $book->rvn_usr_id)

        {{ Form::open(array('route' => array('resign', $book->bok_id))) }}
            {{ Form::submit('Resign') }}
        {{ Form::close() }}

    @else
        <p>Książka została już zarezerwowana.</p>

    @endif

@else

    <p>Zaloguj się, aby zarezerwować książkę.</p>

@endif

@stop
