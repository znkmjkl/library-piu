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
{{ Form::open(array('url' => '/user/edit/'.$user->id, 'class' => 'form-signin', 'name'=>'regForm')) }}
		<label style="text-align:center; font-size:1.2em; text-decoration:underline;">Dane osobowe</label>
		{{ Form::text('firstname', $user->usr_name, array('class' => 'form-control', 'placeholder' => 'Podaj imię', 'required' => true)) }}		
		
		{{ Form::text('lastname', $user->usr_surname, array('class' => 'form-control', 'placeholder' => 'Podaj nazwisko', 'required' => true)) }}
		
		{{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Podaj hasło'))}}
		
		{{ Form::password('password_confirmation', array('class' => 'form-control', 'placeholder' => 'Potwierdź hasło'))}}
		
		<label style="text-align:center; font-size:1.2em;text-decoration:underline;">Adres</label>
		
		{{ Form::text('city', $user->adr_city, array('class' => 'form-control', 'placeholder' => 'Podaj miasto')) }}
		
		{{ Form::text('street', $user->adr_street, array('class' => 'form-control', 'placeholder' => 'Podaj ulice')) }}
		
		{{ Form::text('houseNr', $user->adr_house_number, array('class' => 'form-control', 'placeholder' => 'Podaj numer budynku')) }}
		
		{{ Form::text('zipCode', $user->adr_postal_code, array('class' => 'form-control', 'placeholder' => 'Podaj kod pocztowy')) }}

        <label style="text-align:center; font-size:1.2em;text-decoration:underline;">Dane Dodatkowe</label>

        {{ Form::text('phone', $user->usr_phone, array('class' => 'form-control', 'placeholder' => 'Podaj numer telefonu')) }}

        {{ Form::text('user_number', $user->usr_number, array('class' => 'form-control', 'placeholder' => 'Podaj numer użytkownika')) }}

        {{ Form::text('pesel', $user->usr_pesel, array('class' => 'form-control', 'placeholder' => 'Podaj pesel')) }}

        {{ Form::select('active', array('0' => 'Nieaktywny', '1' => 'Aktywny'), $user->usr_active, array('class' => 'form-control'))}}

        {{ Form::select('verified', array('0' => 'Niezweryfikowany', '1' => 'Zweryfikowany'), $user->usr_verified, array('class' => 'form-control'))}}

		{{ Form::submit('Zapisz', array('class' => 'btn btn-lg btn-primary btn-block','ng-disabled'=>'!regForm.$valid', "ng-model"=>"regFormSubmit",)) }}
 {{ Form::close() }}