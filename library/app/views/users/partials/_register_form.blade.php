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
		<h1 class="form-signin-heading" style="text-align:center;">Rejstracja </h1>
		<label style="text-align:center; font-size:1.2em; text-decoration:underline;">Dane osobowe</label>
		{{ Form::text('username', null, array('class' => 'form-control', 'placeholder' => 'Podaj imię', 'required' => true,
		'ng-model' => 'user.name',"ng-pattern"=>"/^[A-Za-z'\-żźćńółęąśŻŹĆĄŚĘŁÓŃ]{1,20}$/",
		'ng-keyup'=>'checkName()',"data-toggle"=>"tooltip", "data-placement"=>"right", "title"=>"Wprowadź poprawne imię")) }}		
		
		{{ Form::text('lastname', null, array('class' => 'form-control', 'placeholder' => 'Podaj nazwisko', 'required' => true,
		'ng-model' => 'user.lastname', "ng-pattern"=>"/^[A-Za-z'\-żźćńółęąśŻŹĆĄŚĘŁÓŃ]{1,20}$/",
		'ng-keyup'=>'checkLastName()',"data-toggle"=>"tooltip", "data-placement"=>"right", "title"=>"Wprowadź poprawne nazwisko")) }}
		
		{{ Form::email('email', null, array('class' => 'form-control', 'placeholder' => 'Podaj adres email', 'required' => true,
		'ng-model' => 'user.email','ng-keyup'=>'checkEmail()',"data-toggle"=>"tooltip", "data-placement"=>"right", "title"=>"Wprowadź poprawny adres email")) }}
		
		{{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Podaj hasło', 'required' => true,
		'ng-model' => 'user.password1', 'ng-keyup' => 'checkPass()', 
		"data-toggle"=>"tooltip", "data-placement"=>"right", "title"=>"Wprowadź takie same hasła!"))}}
		
		{{ Form::password('password_confirmation', array('class' => 'form-control', 'placeholder' => 'Potwierdź hasło', 'required' => true,
		'ng-model' => 'user.password2', 'ng-keyup' => 'checkPass()', 
		"data-toggle"=>"tooltip", "data-placement"=>"right", "title"=>"Wprowadź takie same hasła!"))}}
		
		<label style="text-align:center; font-size:1.2em;text-decoration:underline;">Adres</label>
		
		{{ Form::text('city', null, array('class' => 'form-control', 'placeholder' => 'Podaj miasto', 'required' => true,
		'ng-model' => 'user.city', "ng-pattern"=>"/^[A-Za-z'\-żźćńółęąśŻŹĆĄŚĘŁÓŃ]{1,30}$/",
		'ng-keyup'=>'checkCity()',"data-toggle"=>"tooltip", "data-placement"=>"right", "title"=>"Wprowadź poprawne miasto")) }}
		
		{{ Form::text('street', null, array('class' => 'form-control', 'placeholder' => 'Podaj ulice', 'required' => true,
		'ng-model' => 'user.street', "ng-pattern"=>"/^[A-Za-z'\-żźćńółęąśŻŹĆĄŚĘŁÓŃ]{1,30}$/",
		'ng-keyup'=>'checkStreet()',"data-toggle"=>"tooltip", "data-placement"=>"right", "title"=>"Wprowadź poprawną ulice")) }}
		
		{{ Form::text('houseNr', null, array('class' => 'form-control', 'placeholder' => 'Podaj numer budynku', 'required' => true,
		'ng-model' => 'user.houseNr',
		'ng-keyup'=>'checkHouseNr()',"data-toggle"=>"tooltip", "data-placement"=>"right", "title"=>"Wprowadź numer domu")) }}
		
		{{ Form::text('zipCode', null, array('class' => 'form-control', 'placeholder' => 'Podaj kod pocztowy', 'required' => true,
		'ng-model' => 'user.zipCode',
		'ng-keyup'=>'checkZipCode()',"data-toggle"=>"tooltip", "data-placement"=>"right", "title"=>"Wprowadź kod pocztowy")) }}
		<label>
			*należy wypełnić wszystkie pola
		</label>
		<label class="checkbox">
	{{ Form::checkbox('terms', 'Terms') }}
		Akceptuje {{ HTML::link("/terms", 'Regulamin') }}
	</label>
		{{ Form::submit('Zarejestruj', array('class' => 'btn btn-lg btn-primary btn-block','ng-disabled'=>'!regForm.$valid', "ng-model"=>"regFormSubmit",)) }}
 {{ Form::close() }}