@extends('templates.layout')

@section('support')

@foreach ($search_results as $result)
    <p>BOOK</p>
    <p>ISBN: {{ $result->bok_isbn }}</p>
    <p>Tytul: <a href="/book/{{ $result->bok_id }} "> {{ $result->bok_title }}</a></p>
    <p>Autor: <a href="/author/{{ $result->wtr_id }} "> {{ $result->wtr_name }} {{ $result->wtr_surname }}</a></p>
    <p>Jezyk: <a href="/language/{{ $result->bok_lng_id }} "> {{ $result->lng_name }}</a></p>
    <p>Rodzaj: <a href="/kind/{{ $result->bok_knd_id }} "> {{ $result->knd_name }}</a></p>
    <hr>
@endforeach

@stop
