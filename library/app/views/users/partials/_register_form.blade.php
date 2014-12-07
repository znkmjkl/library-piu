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
		'ng-model' => 'user.name', 'ng-keyup' => 'checkNames(user.name)',"ng-pattern"=>"/^[A-Za-z'\-żźćńółęąśŻŹĆĄŚĘŁÓŃ]{1,20}$/",
		)) }}		
		
		{{ Form::text('lastname', null, array('class' => 'form-control', 'placeholder' => 'Podaj nazwisko', 'required' => true,
		'ng-model' => 'user.lastname', 'ng-keyup' => 'checkNames(user.name)',"ng-pattern"=>"/^[A-Za-z'\-żźćńółęąśŻŹĆĄŚĘŁÓŃ]{1,20}$/")) }}
		
		{{ Form::email('email', null, array('class' => 'form-control', 'placeholder' => 'Podaj adres email', 'required' => true,
		'ng-model' => 'user.email', 'ng-keyup' => 'checkEmail()')) }}
		
		{{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Podaj hasło', 'required' => true,
		'ng-model' => 'user.password1', 'ng-keyup' => 'checkPass()', 'ng-minlength'=>'6',))}}
		
		{{ Form::password('password_confirmation', array('class' => 'form-control', 'placeholder' => 'Potwierdź hasło', 'required' => true,
		'ng-model' => 'user.password2', 'ng-keyup' => 'checkPass()', 'ng-minlength'=>'6',))}}
		
		<label style="text-align:center; font-size:1.2em;text-decoration:underline;">Adres</label>
		
		{{ Form::text('city', null, array('class' => 'form-control', 'placeholder' => 'Podaj miasto', 'required' => true,
		'ng-model' => 'user.city')) }}
		
		{{ Form::text('street', null, array('class' => 'form-control', 'placeholder' => 'Podaj ulice', 'required' => true,
		'ng-model' => 'user.street',)) }}
		
		{{ Form::text('houseNr', null, array('class' => 'form-control', 'placeholder' => 'Podaj numer budynku', 'required' => true,
		'ng-model' => 'user.houseNr', 'ng-keyup' => 'checkEmail()')) }}
		
		{{ Form::text('zipCode', null, array('class' => 'form-control', 'placeholder' => 'Podaj kod pocztowy', 'required' => true,
		'ng-model' => 'user.zipCode')) }}
		<label>
			*należy wypełnić wszystkie pola
		</label>
		<label class="checkbox">					
			{{ Form::checkbox('terms', 'Terms') }}
			Akceptuje {{ HTML::link("/terms", 'Regulamin') }}

		</label>
		{{ Form::submit('Zarejestruj', array('class' => 'btn btn-lg btn-primary btn-block','ng-disabled'=>'!regForm.$valid')) }}

{{ Form::close() }}
