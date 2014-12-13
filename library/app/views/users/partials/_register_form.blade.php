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

<h3 class="form-signin-heading" ng-click="showReg()" style="text-align:center;"><span class="click-reg">Kliknij by przejśc do</span> <b>rejestracji</b></h3>
{{ Form::open(array('url' => 'users/register', 'class' => 'form-signin', 'name'=>'regForm', "ng-show" => "regVisible")) }}
		<h1 class="form-signin-heading" style="text-align:center;">Rejestracja </h1>
		<label style="text-align:center; font-size:1.2em; text-decoration:underline;">Dane osobowe</label>
		{{ Form::text('firstname', null, array('class' => 'form-control', 'placeholder' => 'Podaj imię', 'required' => true,
		'ng-model' => 'user.name',"ng-pattern"=>"/^[A-Za-z'\-żźćńółęąśŻŹĆĄŚĘŁÓŃ]{1,20}$/",
		'ng-blur'=>'checkName()',"data-toggle"=>"tooltip", "data-placement"=>"right", "title"=>"Wprowadź poprawne imię")) }}

		{{ Form::text('lastname', null, array('class' => 'form-control', 'placeholder' => 'Podaj nazwisko', 'required' => true,
		'ng-model' => 'user.lastname', "ng-pattern"=>"/^[A-Za-z'\-żźćńółęąśŻŹĆĄŚĘŁÓŃ]{1,20}$/",
		'ng-blur'=>'checkLastName()',"data-toggle"=>"tooltip", "data-placement"=>"right", "title"=>"Wprowadź poprawne nazwisko")) }}

		{{ Form::email('email', null, array('class' => 'form-control', 'placeholder' => 'Podaj adres email', 'required' => true,
		'ng-model' => 'user.email','ng-blur'=>'checkEmail()',"data-toggle"=>"tooltip", "data-placement"=>"right", "title"=>"Wprowadź poprawny adres email")) }}

		{{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Podaj hasło', 'required' => true,
		'ng-model' => 'user.password1', 'ng-blur' => 'checkPass()',
		"data-toggle"=>"tooltip", "data-placement"=>"right", "title"=>"Wprowadź takie same hasła!"))}}

		{{ Form::password('password_confirmation', array('class' => 'form-control', 'placeholder' => 'Potwierdź hasło', 'required' => true,
		'ng-model' => 'user.password2', 'ng-blur' => 'checkPass()',
		"data-toggle"=>"tooltip", "data-placement"=>"right", "title"=>"Wprowadź takie same hasła!"))}}

		<label style="text-align:center; font-size:1.2em;text-decoration:underline;">Adres</label>

		{{ Form::text('city', null, array('class' => 'form-control', 'placeholder' => 'Podaj miasto',
		'ng-model' => 'user.city', "ng-pattern"=>"/^[A-Za-z'\-żźćńółęąśŻŹĆĄŚĘŁÓŃ]{1,30}$/",
		'ng-blur'=>'checkCity()',"data-toggle"=>"tooltip", "data-placement"=>"right", "title"=>"Wprowadź poprawne miasto")) }}

		{{ Form::text('street', null, array('class' => 'form-control', 'placeholder' => 'Podaj ulice',
		'ng-model' => 'user.street', "ng-pattern"=>"/^[A-Za-z'\-żźćńółęąśŻŹĆĄŚĘŁÓŃ]{1,30}$/",
		'ng-blur'=>'checkStreet()',"data-toggle"=>"tooltip", "data-placement"=>"right", "title"=>"Wprowadź poprawną ulice")) }}

		{{ Form::text('houseNr', null, array('class' => 'form-control', 'placeholder' => 'Podaj numer budynku',
		'ng-model' => 'user.houseNr',
		'ng-blur'=>'checkHouseNr()',"data-toggle"=>"tooltip", "data-placement"=>"right", "title"=>"Wprowadź numer domu")) }}

		{{ Form::text('zipCode', null, array('class' => 'form-control', 'placeholder' => 'Podaj kod pocztowy',
		'ng-model' => 'user.zipCode',
		'ng-blur'=>'checkZipCode()',"data-toggle"=>"tooltip", "data-placement"=>"right", "title"=>"Wprowadź poprawny kod pocztowy",
		'ng-model' => 'user.zipCode', "ng-pattern" => "/^[0-9]{2}-[0-9]{3}$/", )) }}
		<label>
			*należy wypełnić wszystkie pola
		</label>
		<label class="checkbox">
		<input type="checkbox" ng-model="user.checkbox" required>

		Akceptuję {{ HTML::link("/terms", 'Regulamin') }}
	</label>
		{{ Form::submit('Zarejestruj', array('class' => 'btn btn-lg btn-primary btn-block','ng-disabled'=>'!regForm.$valid', "ng-model"=>"regFormSubmit",)) }}
 {{ Form::close() }}