{{ Form::open(array('url' => 'users/login', 'class' => 'form-signin')) }}
	<h2 class="form-signin-heading">Please sign in...</h2>
		{{ Form::text('email', null, array('class' => 'form-control', 'placeholder' => 'Username or email address', 'required' => true, 'autofocus' => 'true')) }}
		{{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password', 'required' => true,)) }}
		<label class="checkbox">
			{{ Form::checkbox('remember-me', 'Remember me') }}
			Remember me &middot; {{ HTML::link("/resend_password", 'Forgot password?') }}
		</label>
		{{ Form::submit('Login', array('class' => 'btn btn-lg btn-primary btn-block')) }}

{{ Form::close() }}