{{ Form::open(array('url' => 'search/basic', 'class' => 'navbar-form', 'role' => 'search')) }}
    <div class="form-group">
        {{ Form::text('bok_title', null, array('class' => 'form-control', 'placeholder' => 'Wyszukaj książkę', 'required' => true)) }}
    </div>
    {{ Form::submit('Szukaj', array('class' => 'btn btn-default')) }}
{{ Form::close() }}
