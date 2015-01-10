{{ Form::open(array('url' => '/resend_password', 'class' => 'form-signin')) }}
	<h2 class="form-signin-heading">Podaj login i email</h2>
		{{ Form::text('surname', null, array('class' => 'form-control', 'placeholder' => 'Nazwisko', 'required' => true,)) }}
		{{ Form::text('email', null, array('class' => 'form-control', 'placeholder' => 'Email', 'required' => true,)) }}
		<br>
		{{ Form::submit('Wyślij', array('class' => 'btn btn-lg btn-primary btn-block')) }}

{{ Form::close() }}