@extends('templates.layout')

@section('support')
<style>

	input.ng-invalid.ng-dirty{
    border-color: red;
  }

  input.ng-valid.ng-dirty {
    border-color: #cccccc; 
  }
  .click-reg:hover{
  	color:#428bca;
  	cursor:pointer;
  }
  
</style>
{{ Form::open(array('url' => '/user/edit/'.$user[0]->id, 'class' => 'form-signin', 'name'=>'regForm')) }}
		<h1 class="form-signin-heading" style="text-align:center;">Podaj nowe dane: </h1>
		<label style="text-align:center; font-size:1.2em; text-decoration:underline;">Dane osobowe</label>
		{{ Form::text('firstname', $user[0]->usr_name, array('class' => 'form-control', 'placeholder' => 'Podaj imię', 'required' => true)) }}		
		
		{{ Form::text('lastname', $user[0]->usr_surname, array('class' => 'form-control', 'placeholder' => 'Podaj nazwisko', 'required' => true)) }}
		
		{{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Podaj hasło'))}}
		
		{{ Form::password('password_confirmation', array('class' => 'form-control', 'placeholder' => 'Potwierdź hasło'))}}
		
		<label style="text-align:center; font-size:1.2em;text-decoration:underline;">Adres</label>
		
		{{ Form::text('city', $address[0]->adr_city, array('class' => 'form-control', 'placeholder' => 'Podaj miasto')) }}
		
		{{ Form::text('street', $address[0]->adr_street, array('class' => 'form-control', 'placeholder' => 'Podaj ulice')) }}
		
		{{ Form::text('houseNr', $address[0]->adr_house_number, array('class' => 'form-control', 'placeholder' => 'Podaj numer budynku')) }}
		
		{{ Form::text('zipCode', $address[0]->adr_postal_code, array('class' => 'form-control', 'placeholder' => 'Podaj kod pocztowy')) }}

        <label style="text-align:center; font-size:1.2em;text-decoration:underline;">Dane Dodatkowe</label>

        {{ Form::text('phone', $user[0]->usr_phone, array('class' => 'form-control', 'placeholder' => 'Podaj numer telefonu')) }}

        {{ Form::text('user_number', $user[0]->usr_number, array('class' => 'form-control', 'placeholder' => 'Podaj numer użytkownika')) }}

        {{ Form::text('pesel', $user[0]->usr_pesel, array('class' => 'form-control', 'placeholder' => 'Podaj pesel')) }}

        {{ Form::select('active', array('0' => 'Nieaktywny', '1' => 'Aktywny'), $user[0]->usr_active, array('class' => 'form-control'))}}

		{{ Form::submit('Zapisz', array('class' => 'btn btn-lg btn-primary btn-block','ng-disabled'=>'!regForm.$valid', "ng-model"=>"regFormSubmit",)) }}
 {{ Form::close() }}
@stop
