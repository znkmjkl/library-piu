{{ Form::open(array('url' => '/resend_password', 'class' => 'form-signin')) }}
	<h2 class="form-signin-heading">Type your email...</h2>
		{{ Form::text('email', null, array('class' => 'form-control', 'placeholder' => 'Email', 'required' => true, 'autofocus' => 'true')) }}
		<br>
		{{ Form::submit('Reset', array('class' => 'btn btn-lg btn-primary btn-block')) }}

{{ Form::close() }}