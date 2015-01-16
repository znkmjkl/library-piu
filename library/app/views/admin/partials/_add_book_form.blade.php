	{{ Form::open(array('url' => 'addbook', 'class' => 'form-signin', "required"=>'true')) }}
    {{ Form::text('bok_isbn', null, array('class' => 'form-control', 'placeholder' => 'ISBN',"required"=>'true')) }}
    {{Form::text('image', null, array('class' => 'form-control', 'placeholder' => 'Okładka',"required"=>'true')) }}
    {{ Form::text('bok_title', null, array('class' => 'form-control', 'placeholder' => 'Tytuł',"required"=>'true')) }}
     <p>{{ Form::select('writer[]', $writersList, null ,array('class' => 'form-control','multiple' => true ,"required"=>'true'))}}</p>
    <p>{{ Form::select('language', $languages,null,array('class' => 'form-control',"required"=>'true') )}}</p>
    <p>{{ Form::select('kind', $kinds, null ,array('class' => 'form-control') )}}</p>
    {{ Form::text('date', null, array('class' => 'form-control', 'placeholder' => 'Rok wydania (np.2014)',"required"=>'true')) }}
    {{ Form::text('edition', null, array('class' => 'form-control', 'placeholder' => 'Numer edycji',"required"=>'true')) }}
    <p>{{ Form::submit('Dodaj książke', array('class' => 'btn btn-default')) }}

{{ Form::close() }}