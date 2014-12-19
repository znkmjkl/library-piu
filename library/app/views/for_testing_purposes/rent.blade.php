{{ Form::open(array('url' => 'rent', 'class' => 'form-signin')) }}
    {{ Form::text('rtl_bok_id', null, array('class' => 'form-control', 'placeholder' => 'rtl_bok_id', 'required' => true,)) }}
    {{ Form::text('rtl_usr_id', null, array('class' => 'form-control', 'placeholder' => 'rtl_usr_id', 'required' => true,)) }}
    {{ Form::submit('Rent', array('class' => 'btn btn-lg btn-primary btn-block')) }}
{{ Form::close() }}
