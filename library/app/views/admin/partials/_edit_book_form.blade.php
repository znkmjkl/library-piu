 {{ Form::open(array('url' => 'editbook/'.$book->bok_id, 'class' => 'form-signin')) }}
    {{ Form::text('bok_isbn', $book->bok_isbn, array('class' => 'form-control', 'placeholder' => 'ISBN')) }}
    {{Form::text('image', $book->bok_image_link , array('class' => 'form-control', 'placeholder' => 'Okładka')) }}
    {{ Form::text('bok_title', $book->bok_title, array('class' => 'form-control', 'placeholder' => 'Tytuł')) }}
    <p>{{ Form::select('writer[]', $writersList, $authorsArray[$book->bok_id] ,array('class' => 'form-control','multiple' => true ))}}</p>
    <p>{{ Form::select('language', $languages, $book->bok_lng_id ,array('class' => 'form-control') )}}</p>
    <p>{{ Form::select('kind', $kinds, $book->bok_knd_id ,array('class' => 'form-control') )}}</p>
    {{ Form::text('date', substr($book->bok_edition_date,0,4), array('class' => 'form-control', 'placeholder' => 'Data edycji')) }}
    {{ Form::text('edition', $book->bok_edition_number, array('class' => 'form-control', 'placeholder' => 'Numer edycji')) }}
    <p>{{ Form::submit('Dodaj książke', array('class' => 'btn btn-default')) }}

{{ Form::close() }}

