{{ Form::open(array('url' => 'users/register', 'class' => 'form-signin')) }}
	<h2 class="form-signin-heading">...or register</h2>
		{{ Form::text('username', null, array('class' => 'form-control', 'placeholder' => 'Username', 'required' => true,)) }}
		{{ Form::text('firstname', null, array('class' => 'form-control', 'placeholder' => 'Firstname', 'required' => true,)) }}
		{{ Form::text('lastname', null, array('class' => 'form-control', 'placeholder' => 'Lastname', 'required' => true,)) }}
		{{ Form::text('email', null, array('class' => 'form-control', 'placeholder' => 'Email', 'required' => true,)) }}
		{{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password', 'required' => true)) }}
		{{ Form::password('password_confirmation', array('class' => 'form-control', 'placeholder' => 'Confirm your password', 'required' => true)) }}
		<label class="checkbox">
			{{ Form::checkbox('terms', 'Terms') }}
			I agree to library's {{ HTML::link("/terms", 'terms') }}
		</label>
		{{ Form::submit('Register', array('class' => 'btn btn-lg btn-primary btn-block')) }}

{{ Form::close() }}
