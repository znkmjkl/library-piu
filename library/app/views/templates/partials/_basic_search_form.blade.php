{{ Form::open(array('url' => 'search/basic', 'class' => 'navbar-form navbar-left', 'role' => 'search')) }}
    <div class="input-group" style="width:100px;">
        <span class="input-group-btn">
            <button class="btn btn-default" type="submit"><?php echo Lang::get('messages.search'); ?></button>
        </span>
        <input class="form-control" style="margin-bottom:0px; width:250px;" placeholder="<?php echo Lang::get('messages.bookTitle'); ?>" required="1" name="bok_title" type="text">
        <span class="input-group-btn">        
            <button class="btn btn-default advancedSearch" type="button"><span class="glyphicon glyphicon-cog"> </span></button>
        </span>
    </div>    
{{ Form::close() }}


<script>

$(".advancedSearch").click(function(){
    location.href="/search";
});
</script>
