{{ Form::open(array('url' => 'search/basic', 'class' => 'navbar-form navbar-left', 'role' => 'search')) }}
    <!-- <div class="input-group"> -->
        <div class="form-group">
            {{ Form::text('bok_title', null, array('class' => 'form-control', 'style' => 'margin-bottom:0px; width:250px;', 'placeholder' => 'Wyszukaj książkę', 'required' => true)) }}
        </div>
        <div class="btn-group" role="group" aria-label="...">
            {{ Form::submit('Szukaj', array('class' => 'btn btn-default')) }}
            <button type="button" class="btn btn-default">
                <a href="/search"><span class="glyphicon glyphicon-cog"> </span></a>
            </button>
        </div>
    <!-- </div> -->
{{ Form::close() }}
