<div style="margin-bottom:20px; margin-left:2%; width:96%;">
    <div class="panel-group" id="accordion" style="margin-top:20px;">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" style="line-height: 100%; display: block; text-decoration: none;">
                        <span class="glyphicon glyphicon-circle-arrow-down" aria-hidden="true"></span> &nbsp Filtry
                    </a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in">
                {{ Form::open(array('url' => '/search')) }}
                    <div class="col-xs-8" style="margin-top:10px;">
                        <div class="col-xs-3" style="padding:5px; padding-top:0px;"><input style="" class="form-control" placeholder="Tytuł" name="bok_title" type="text">                 </div>
                        <div class="col-xs-3" style="padding:5px; padding-top:0px;"><input style="" class="form-control" placeholder="Imię autora" name="bok_atr_name" type="text">        </div>
                        <div class="col-xs-3" style="padding:5px; padding-top:0px;"><input style="" class="form-control" placeholder="Nazwisko autora" name="bok_atr_surname" type="text"> </div>
                        <div class="col-xs-3" style="padding:5px; padding-top:0px;"><input style="" class="form-control" placeholder="ISBN" name="bok_isbn" type="text">                   </div>
                        <div class="col-xs-3" style="padding:5px; padding-top:0px;"><input style="" class="form-control" placeholder="Data wydania" name="bok_edition_date" type="text">   </div>
                        <div class="col-xs-3" style="padding:5px; padding-top:0px;">
                            <select name="bok_knd" class="form-control">
                                <option value="default">Wybierz gatunek</option>
                                @foreach($kinds as $kind)
                                    <option value="{{ $kind }}">{{ $kind }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xs-3" style="padding:5px; padding-top:0px;">
                            <select name="bok_lng" class="form-control">
                                <option value="default">Wybierz język</option>
                                @foreach($languages as $language)
                                    <option value="{{ $language }}">{{ $language }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xs-3" style="padding:5px; padding-top:0px;"><input style="" class="form-control" placeholder="Numer wydania" name="bok_edition_number" type="text">   </div>
                    </div>
                    <div class="col-xs-4" style="margin-top:10px;">
                        <a href="/search"><input style="margin-top:0px;" class="btn btn-md btn-danger btn-block" type="button" value="Wyczyść filtry"></a>
                        <input style="margin-top:10px;" class="btn btn-md btn-primary btn-block" type="submit" value="Szukaj">
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
