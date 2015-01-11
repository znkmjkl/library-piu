 {{ Form::open(array('url' => 'editauthor/'.$writer->wtr_id, 'class' => 'form-signin')) }}
    {{ Form::text('author_name', $writer->wtr_name, array('class' => 'form-control', 'placeholder' => 'Imię')) }}
    {{ Form::text('author_surname', $writer->wtr_surname, array('class' => 'form-control', 'placeholder' => 'Nazwisko')) }}
    {{ Form::text('birth_date', substr($writer->wtr_birth_date,0,10), array('class' => 'form-control', 'placeholder' => 'Data urodziń (np.2014-01-01)')) }}
    <p>{{ Form::submit('Edytuj autora', array('class' => 'btn btn-lg btn-info btn-block')) }}

{{ Form::close() }}