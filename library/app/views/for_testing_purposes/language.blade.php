@extends('templates.layout')

@section('support')

<p>Dostepne jezyki</p>
<hr>
@foreach ($books_languages as $book)
    <p>Ksiazka</p>
    <p>ISBN: {{ $book->bok_isbn }}</p>
    <p>Tytul: <a href="/book/{{ $book->bok_id }} "> {{ $book->bok_title }}</a></p>
    <p>Autor: <a href="/author/{{ $book->wtr_id }} "> {{ $book->wtr_name }} {{ $book->wtr_surname }}</a></p>
    <p>Rodzaj: <a href="/kind/{{ $book->bok_knd_id }} "> {{ $book->knd_name }}</a></p>
    <hr>
@endforeach

@stop
