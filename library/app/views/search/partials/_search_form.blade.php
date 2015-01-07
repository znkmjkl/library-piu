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
                <form method="POST" action="http://localhost:8000/search" accept-charset="UTF-8"><input name="_token" type="hidden" value="IJCduGkZUbtdWzmAFl5zRufUJK9YMkLCWxK0jTX3">
                    <div class="col-xs-8" style="margin-top:10px;">
                        <div class="col-xs-3" style="padding:5px; padding-top:0px;"><input style="" class="form-control" placeholder="Tytuł" name="bok_title" type="text">                   </div>
                        <div class="col-xs-3" style="padding:5px; padding-top:0px;"><input style="" class="form-control" placeholder="Autor" name="bok_atr" type="text">                     </div>
                        <div class="col-xs-3" style="padding:5px; padding-top:0px;"><input style="" class="form-control" placeholder="ISBN" name="bok_isbn" type="text">                     </div>
                        <div class="col-xs-3" style="padding:5px; padding-top:0px;"><input style="" class="form-control" placeholder="Data wydania" name="bok_edition_date" type="text">     </div>
                        <div class="col-xs-3" style="padding:5px; padding-top:0px;"><input style="" class="form-control" placeholder="Gatunek" name="bok_knd" type="text">                    </div>
                        <div class="col-xs-3" style="padding:5px; padding-top:0px;"><input style="" class="form-control" placeholder="Język" name="bok_lng" type="text">                     </div>
                        <div class="col-xs-3" style="padding:5px; padding-top:0px;"><input style="" class="form-control" placeholder="Numer wydania" name="bok_edition_number" type="text">  </div>
                    </div>
                    <div class="col-xs-4" style="margin-top:10px;">
                        <input style="margin-top:45px;" class="btn btn-md btn-primary btn-block" type="submit" value="Szukaj">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
