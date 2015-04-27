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
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="glyphicon glyphicon-user"></i><span> {{ Auth::user()->usr_name }}</span>
                  <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="/account/main"><span class="glyphicon glyphicon-home"> </span> <?php echo Lang::get('messages.account'); ?></a></li>
                    <li><a href="/account/current_rentals"><span class="glyphicon glyphicon-book"> </span> <?php echo Lang::get('messages.yourBooks'); ?></a></li>
                    <li><a href="/help"><span class="glyphicon glyphicon-question-sign"> </span> <?php echo Lang::get('messages.help'); ?></a></li>
                    <li><hr></li>
                    <li><a href="/contact"><span class="glyphicon glyphicon-globe"> </span> <?php echo Lang::get('messages.contact'); ?></a></li>
                    <li><a href="/logout"><span class="glyphicon glyphicon-off"> </span> <?php echo Lang::get('messages.logout'); ?></a></li>
                  </ul>
                </li>
              </ul>
            </div>
        </div>
    </div>
</div>
