@extends('templates.layout')

@section('support')
 <h4>Dane użytkownika</h4>
 imię: {{ Auth::user()->usr_name }}<br/>
 nazwisko: {{ Auth::user()->usr_surname }}<br/>
 telefon: {{ Auth::user()->usr_phone }}<br/>
 numer: {{ Auth::user()->usr_number }}<br/>
 pesel: {{ Auth::user()->usr_pesel }}<br/>

 Miasto {{$address[0]->adr_city}}<br/>
 Ulica {{$address[0]->adr_street}}<br/>
 Numer domu {{$address[0]->adr_house_number}}<br/>
 Kod pocztowy {{$address[0]->adr_postal_code}}<br/>


 @if( Auth::user()->usr_verified )
 	<span class="label label-success">Dane zweryfikowane</span>
 @else
 	<span class="label label-warning">Dane niezweryfikowane</span>
 @endif
 <br/>
 <h4>Rezerwacje</h4>
 @if(count($rvns)==0)
 	brak rezerwacji
 @endif
 @foreach ($rvns as $rvn)
 	@if($rvn->rvn_status)
 		Status: {{$rvn->rvn_status}}<br/>
 		Data rezerwacji: {{date("d-m-Y", strtotime($rvn->rvn_date))}}<br/>
 		Czy gotowa? : {{$rvn->rvn_is_ready}}<br/>
 		Tytul: <a href="/book/{{ $rvn->bok_id }} "> {{ $rvn->bok_title }}</a><br/>
	<br/>

	 	{{ Form::open(array('route' => array('resign', $rvn->bok_id))) }}
	    {{ Form::submit('Resign') }}
	    {{ Form::close() }}
	@endif
 @endforeach
 <br/>
 <h4>Wypożyczenia</h4>
 @if(count($rtls)==0)
 	brak wypożyczeń
 @endif
 @foreach ($rtls as $rtl)
 	{{date("d-m-y",strtotime($rtl->rtl_start_date))}}<br/>
 	{{date("d-m-y",strtotime($rtl->rtl_end_date))}}<br/>
 	{{$rtl->bok_title}}<br/>
 	{{$rtl->fne_amount}}<br/>
 	opóżnienie: 

 	@if(date_diff(date_create(),date_create($rtl->rtl_end_date))->format("%R%a")<0)
 		przetrzymano!
 	@else
 		jest ok!
 	@endif
 	
 	<br/>
 	<br/>
 	{{ Form::open(array('route' => array('prolongate', $rtl->rtl_id, $rtl->bok_title))) }}
            {{ Form::submit('Prolongate', array()) }}
    {{ Form::close() }}

 	<br/><br/>


 <br/><br/>
 @endforeach

<br/><br/>


<br/>		
{{ Form::open(array('url' => 'changePass', 'class' => 'form-signin')) }}
    {{ Form::password('usr_oldPass', array('class' => 'form-control', 'placeholder' => 'Wprowadź aktualne hasło', "required" => "true")) }}
    {{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Wprowadź nowe hasło', "required" => "true")) }}
    {{ Form::password('password_confirmation', array('class' => 'form-control', 'placeholder' => 'Powtórz nowe hasło', "required" => "true")) }}
    
    <hr>
    {{ Form::submit('Zmień hasło', array('class' => 'btn btn-lg btn-danger btn-block')) }}
{{ Form::close() }}

@stop