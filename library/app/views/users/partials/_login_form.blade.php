<div class="row">
	<div class="col-xs-8 col-sm-offset-2">
		<h1 style="text-align:center;margin-right:25px; margin-top:0px;margin-bottom:0px;"> <span class="glyphicon glyphicon-log-in" aria-hidden="true" ></span> Zaloguj się </h1>
	</div>
</div>

<div class="row" >					
	<img class="hidden-sm hidden-xs" style="margin:0 auto;" src="/img/account.png" alt="Zaloguj się">								
</div>		
			
				
<div class="row" >
	<div class="col-md-10 col-sm-offset-1">
		<div class="col-md-6 col-md-offset-3 form-group">
			<form class="form-horizontal form-signin" action="users/login" method="POST" style="margin-left:0px;">
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-3 control-label" style="font-size:20px;">Email</label>
					<div class="col-sm-9">
						<input type="email" class="form-control" id="inputEmail3" placeholder="Podaj email" name="email" required>
					</div>
				</div>
				<div class="form-group">
					<label for="inputPassword3" class="col-sm-3 control-label" style="font-size:20px;">Hasło</label>
					<div class="col-sm-9">
						<input type="password" class="form-control" id="inputPassword3" placeholder="Podaj hasło" name="password" required>
					</div>
				</div>
				<div class="form-group" style="margin:-15px;">
					<div class="col-sm-offset-3 col-sm-10">
						<label>
							{{ HTML::link("/resend_password", 'Zapomniałeś hasła?') }}
						</label>						
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-3 col-sm-10" style="padding-right:43px;">
						<button type="submit" class="btn btn-lg btn-primary btn-block">Zaloguj</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
	
				

{{--
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

--}}