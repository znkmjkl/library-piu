{{ Form::open(array('url' => 'settings/profile', 'class' => 'form-signin')) }}
	{{ Form::text('firstname', null, array('class' => 'form-control', 'placeholder' => 'Firstname', 'required' => true,)) }}
	{{ Form::text('lastname', null, array('class' => 'form-control', 'placeholder' => 'Lastname', 'required' => true,)) }}
	{{ Form::text('email', null, array('class' => 'form-control', 'placeholder' => 'Email', 'required' => true,)) }}
	{{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password', 'required' => true)) }}
	{{ Form::password('password_confirmation', array('class' => 'form-control', 'placeholder' => 'Confirm your password', 'required' => true)) }}
	{{ Form::submit('Update', array('class' => 'btn btn-lg btn-primary btn-block')) }}
{{ Form::close() }}
