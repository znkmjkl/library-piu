 {{ Form::open(array('url' => 'addauthor', 'class' => 'form-signin')) }}
    {{ Form::text('author_name', null, array('class' => 'form-control', 'placeholder' => 'Imię')) }}
    {{ Form::text('author_surname', null, array('class' => 'form-control', 'placeholder' => 'Nazwisko')) }}
    {{ Form::text('birth_date', null, array('class' => 'form-control', 'placeholder' => 'Data urodziń (np.2014-01-01)')) }}
    <hr>
    {{ Form::submit('Dodaj Autora', array('class' => 'btn btn-lg btn-success btn-block')) }}

{{ Form::close() }}
