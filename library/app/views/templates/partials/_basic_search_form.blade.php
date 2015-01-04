{{ Form::open(array('url' => 'search/basic', 'class' => 'navbar-form navbar-left', 'role' => 'search')) }}
    <div class="input-group">
        <div class="form-group btn-group">
            {{ Form::submit('Szukaj', array('class' => 'btn btn-default')) }}
            {{ Form::text('bok_title', null, array('class' => 'form-control', 'style' => 'margin-bottom:0px; width:250px;', 'placeholder' => 'Tytuł książki', 'required' => true)) }}
        </div>
        <div class="btn-group" role="group" aria-label="...">
            <a href="/search">
                <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-cog"> </span></button>
            </a>
        </div>
    </div>
{{ Form::close() }}
