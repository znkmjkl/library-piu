

	{{ Form::open(array('url' => 'addbook', 'class' => 'form-signin')) }}
    {{ Form::text('bok_isbn', null, array('class' => 'form-control', 'placeholder' => 'ISBN')) }}
    {{FORM::file('plik', null, array('class' => 'form-control', 'placeholder' => 'Okładka')) }}
    {{ Form::text('bok_title', null, array('class' => 'form-control', 'placeholder' => 'Tytuł')) }}
     <p>{{ Form::select('writer[]', $writersList, null ,array('class' => 'form-control','multiple' => true ))}}</p>
    <p>{{ Form::select('language', $languages,null,array('class' => 'form-control') )}}</p>
    <p>{{ Form::select('kind', $kinds, null ,array('class' => 'form-control') )}}</p>
    {{ Form::text('date', null, array('class' => 'form-control', 'placeholder' => 'Data edycji')) }}
    {{ Form::text('edition', null, array('class' => 'form-control', 'placeholder' => 'Numer edycji')) }}
    <p>{{ Form::submit('Dodaj książke', array('class' => 'btn btn-default')) }}

{{ Form::close() }}