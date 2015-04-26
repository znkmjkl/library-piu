<div style="margin-bottom:20px; margin-left:2%; width:96%;">
    <div class="panel-group" id="accordion" style="margin-top:20px;">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" style="line-height: 100%; display: block; text-decoration: none;">
                        <span class="glyphicon glyphicon-circle-arrow-down" aria-hidden="true"></span> &nbsp <?php echo Lang::get('messages.filter'); ?>
                    </a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in">
                {{ Form::open(array('url' => '/search')) }}
                    <div class="col-xs-8" style="margin-top:10px;">
                        <div class="col-xs-3" style="padding:5px; padding-top:0px;"><input style="" class="form-control" placeholder="<?php echo Lang::get('messages.bookTitle'); ?>" name="bok_title" type="text">                 </div>
                        <div class="col-xs-3" style="padding:5px; padding-top:0px;"><input style="" class="form-control" placeholder="<?php echo Lang::get('messages.authorsFirstname'); ?>" name="bok_atr_name" type="text">        </div>
                        <div class="col-xs-3" style="padding:5px; padding-top:0px;"><input style="" class="form-control" placeholder="<?php echo Lang::get('messages.authorsLastname'); ?>" name="bok_atr_surname" type="text"> </div>
                        <div class="col-xs-3" style="padding:5px; padding-top:0px;"><input style="" class="form-control" placeholder="<?php echo Lang::get('messages.isbn'); ?>" name="bok_isbn" type="text">                   </div>
                        <div class="col-xs-3" style="padding:5px; padding-top:0px;"><input style="" class="form-control" placeholder="<?php echo Lang::get('messages.releaseDate'); ?>" name="bok_edition_date" type="text">   </div>
                        <div class="col-xs-3" style="padding:5px; padding-top:0px;">
                            <select name="bok_knd" class="form-control">
                                <option value="default"><?php echo Lang::get('messages.chooseGenre'); ?></option>
                                @foreach($kinds as $kind)
                                    <option value="{{ $kind }}">{{ $kind }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xs-3" style="padding:5px; padding-top:0px;">
                            <select name="bok_lng" class="form-control">
                                <option value="default"><?php echo Lang::get('messages.chooseLanguage'); ?></option>
                                @foreach($languages as $language)
                                    <option value="{{ $language }}">{{ $language }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xs-3" style="padding:5px; padding-top:0px;"><input style="" class="form-control" placeholder="<?php echo Lang::get('messages.edition'); ?>" name="bok_edition_number" type="text">   </div>
                    </div>
                    <div class="col-xs-4" style="margin-top:10px;">
                        <a href="/search"><input style="margin-top:0px;" class="btn btn-md btn-danger btn-block" type="button" value="<?php echo Lang::get('messages.clearFilter'); ?>"></a>
                        <input style="margin-top:10px;" class="btn btn-md btn-primary btn-block" type="submit" value="<?php echo Lang::get('messages.search'); ?>">
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
