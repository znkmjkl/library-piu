@extends('templates.layout')

@section('support')

{{ Form::open(array('url' => 'searchRented', 'class' => 'form-signin')) }}
    {{ Form::text('bok_isbn', null, array('class' => 'form-control', 'placeholder' => 'ISBN')) }}
    {{ Form::submit('Szukaj', array('class' => 'btn btn-lg btn-primary btn-block')) }}
{{ Form::close() }}

<p>Wypożyczone książki</p>

<hr>
@foreach ($rentedBooks as $rented)
	@if(((new DateTime('today')) > new DateTime($rented->rtl_end_date )))
	   <p><span style="color:red">Nie oddano książki w terminie</span></p>
       @if(!is_null($rented->fne_id))
            <p><span style="color:red">Obecna kara to {{$rented->fne_amount}} zł</span></p>

       @else
            <p><span style="color:red">Brak kary</span></p>
       @endif
	@endif

    <p>ISBN: {{ $rented->bok_isbn }}</p>
    <p>Tytuł: {{ $rented->bok_title }}</p>
    <p>Wypożyczający: {{ $rented->usr_name }} {{ $rented->usr_surname }} , {{$rented->email}}</p>
    <p>Data wypożyczenia: {{ $rented->rtl_start_date }}</p>
    <p>Przewidywana data oddanai: {{ $rented->rtl_end_date }}</p>

	   <a button href="/rented/{{$rented->rtl_id}}/returnbook" type="button" class="btn btn-default">Oddaj książke</a>
    @if((new DateTime('today')) > (new DateTime($rented->rtl_end_date )))
       <a button href="/rented/{{$rented->rtl_id}}/addfine" type="button" class="btn btn-default">Dodaj/Edytuj kare</a>
    @endif
    @if(!is_null($rented->fne_id))
        <a button href="/removefine/{{$rented->rtl_id}}" type="button" class="btn btn-default">Anuluj kare</a>
    @endif
<hr>
@endforeach


@stop
