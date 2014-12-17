{{ Form::open(array('url' => 'search', 'class' => 'form-signin')) }}
    {{ Form::text('bok_isbn', null, array('class' => 'form-control', 'placeholder' => 'ISBN')) }}
    {{ Form::text('bok_title', null, array('class' => 'form-control', 'placeholder' => 'Title')) }}
    {{ Form::text('bok_lng', null, array('class' => 'form-control', 'placeholder' => 'Language')) }}
    {{ Form::text('bok_atr', null, array('class' => 'form-control', 'placeholder' => 'Author')) }}
    {{ Form::text('bok_knd', null, array('class' => 'form-control', 'placeholder' => 'Rodzaj')) }}
    {{ Form::text('bok_edition_date', null, array('class' => 'form-control', 'placeholder' => 'Data wydania')) }}
    {{ Form::text('bok_edition_number', null, array('class' => 'form-control', 'placeholder' => 'Numer wydania')) }}
    {{ Form::submit('Szukaj', array('class' => 'btn btn-lg btn-primary btn-block')) }}
{{ Form::close() }}

