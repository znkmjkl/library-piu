@extends('templates.layout')

@section('support')

<p>Author's books:</p>
<hr>
@foreach ($books_authors as $book)
    <p>BOOK</p>
    <p>ISBN: {{ $book->bok_isbn }}</p>
    <p>Tytul: <a href="/book/{{ $book->bok_id }} "> {{ $book->bok_title }}</a></p>
    <p>Jezyk: <a href="/language/{{ $book->bok_lng_id }} "> {{ $book->lng_name }}</a></p>
    <p>Rodzaj: <a href="/kind/{{ $book->bok_knd_id }} "> {{ $book->knd_name }}</a></p>
    <hr>
@endforeach

@stop
