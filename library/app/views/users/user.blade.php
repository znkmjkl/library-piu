@extends('templates.layout')

@section('content')

<div class="container">
    <div class="row">
		<br>
		<br>
    	<div class="span3 well">
        	<center>
	        	<img src="http://www.gravatar.com/avatar/{{ md5($user->email) }}" alt="{{ $user->email }}" width="100" height="100" class="img-circle">
				<h3>{{ $user->firstname }} {{ $user->lastname }}</h3>
				<br>
				<div class="span2">
					<div class="btn-group">
						<a class="btn dropdown-toggle btn-primary" data-toggle="dropdown" href="#">
							Poke
							<span class="icon-cog icon-white"></span><span class="caret"></span>
						</a>
		                <ul class="dropdown-menu">
							<li><a href="#"><span class="icon-wrench"></span>
								{{ Form::open(array('url' => 'user/' . $user->username )) }}
									{{ Form::submit('Follow', array('class' => 'btn btn-sm btn-primary btn-block')) }}
								{{ Form::close() }}
								</a></li>
							<li><a href="/inbox"><span class="icon-trash"></span>Message</a></li>
						</ul>
					</div>
				</div>
			</center>
		</div>
	</div>
</div>

@stop