<div class="container">
    <div class="navbar-wrapper">
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
                    <li> <a class="navbar-brand" href="/login"> <span class="glyphicon glyphicon-off"> </span> Zaloguj </a> </li>
                    <li> <a class="navbar-brand" href="/register"> <span class="glyphicon glyphicon-pencil"> </span> Zarejestruj </a> </li>                        
                </ul>                        
            </div>
        </div>
    </div>
</div>
