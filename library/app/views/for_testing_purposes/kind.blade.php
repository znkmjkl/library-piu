@extends('templates.layout')

@section('support')

<p>RODZAJE:</p>
<hr>
@foreach ($books_kinds as $book)
    <p>Ksiazka</p>
    <p>ISBN: {{ $book->bok_isbn }}</p>
    <p>Tytul: <a href="/book/{{ $book->bok_id }} "> {{ $book->bok_title }}</a></p>
    <p>Autor: <a href="/author/{{ $book->wtr_id }} "> {{ $book->wtr_name }} {{ $book->wtr_surname }}</a></p>
    <p>Jezyk: <a href="/language/{{ $book->bok_lng_id }} "> {{ $book->lng_name }}</a></p>
    <hr>
@endforeach

@stop
