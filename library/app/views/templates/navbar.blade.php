<script>

function removeParam(key, sourceURL) {
    var rtn = sourceURL.split("?")[0],
        param,
        params_arr = [],
        queryString = (sourceURL.indexOf("?") !== -1) ? sourceURL.split("?")[1] : "";
    if (queryString !== "") {
        params_arr = queryString.split("&");
        for (var i = params_arr.length - 1; i >= 0; i -= 1) {
            param = params_arr[i].split("=")[0];
            if (param === key) {
                params_arr.splice(i, 1);
            }
        }
        rtn = rtn + "?" + params_arr.join("&");
    }
    return rtn;
}

function setLocale(loc) {

    var alteredUrl = removeParam("loc", window.location.href);

    if(alteredUrl.substr(alteredUrl.length -1) == '?') {
       alteredUrl = alteredUrl.substr(0, alteredUrl.length - 1) 
    }

    window.location.href = alteredUrl + "?loc=" + loc;
}

</script>

<div class="container">
    <div class="navbar-wrapper">
        <div class='container' style='padding-right: 0px; padding-bottom: 8px;'>
            <button class='pull-right' onClick='setLocale("pl")' <?php echo App::getLocale() == 'pl' ? 'disabled' : '' ?> >PL</button>
            <button class='pull-right' onClick='setLocale("en")' <?php echo App::getLocale() == 'en' ? 'disabled' : '' ?> >EN</button>
        </div>
        <div class="navbar navbar-inverse navbar-static-top">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">
                {{ HTML::image('img/logo_small.png', 'biblionetka logo', array("style" => "height:20px")) }}
                 Biblionetka
                 </a>
            </div>

            @include('templates.partials._basic_search_form')
            <div class="navbar-collapse collapse">                        
                <ul class="nav navbar-nav navbar-right">                        
                    <li> <a class="navbar-brand" href="/login"> <span class="glyphicon glyphicon-off" style='margin-right: 7px;'> </span><?php echo Lang::get('messages.logIn'); ?></a> </li>
                    <li> <a class="navbar-brand" href="/register"> <span class="glyphicon glyphicon-pencil" style='margin-right: 7px;'> </span><?php echo Lang::get('messages.register'); ?> </a> </li>                        
                </ul>                        
            </div>
        </div>
    </div>
</div>
