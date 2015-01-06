@extends('templates.layout')

@section('support')
<hr>
	<p>ISBN: {{ $rentedBooks[0]->bok_isbn }}</p>
    <p>Tytuł: {{ $rentedBooks[0]->bok_title }}</p>
    <p>Wypożyczający: {{ $rentedBooks[0]->usr_name }} {{ $rentedBooks[0]->usr_surname }} , {{$rentedBooks[0]->email}}</p>
    <p>Data wypożyczenia: {{ $rentedBooks[0]->rtl_start_date }}</p>
    <p>Przewidywana data oddanai: {{ $rentedBooks[0]->rtl_end_date }}</p>
    <p>Obecnka kara : {{$rentedBooks[0]->fne_amount}} </p>

	

   {{ Form::open(array('url' => 'addfine/'.$rentedBooks[0]->rtl_id, 'class' => 'form-signin')) }}
    {{ Form::text('fine_amount', $fine, array('class' => 'form-control', 'placeholder' => 'Kara')) }}

    {{ Form::submit('Dodaj Kare', array('class' => 'btn btn-lg btn-primary btn-block')) }}
{{ Form::close() }}




@stop
