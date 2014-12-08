{{ Form::open(array('url' => 'users/login', 'class' => 'form-signin')) }}
	<h2 class="form-signin-heading">Logowanie</h2>
		{{ Form::text('email', null, array('class' => 'form-control', 'placeholder' => 'Podaj adres email', 'required' => true, 'autofocus' => 'true')) }}
		{{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Podaj hasło', 'required' => true,)) }}
		<label class="checkbox">
			{{ Form::checkbox('remember-me', 'Remember me') }}
			Zapamiętaj mnie &middot; {{ HTML::link("/resend_password", 'Zapomniałeś hasła?') }}
		</label>
		{{ Form::submit('Zaloguj', array('class' => 'btn btn-lg btn-primary btn-block')) }}

{{ Form::close() }}