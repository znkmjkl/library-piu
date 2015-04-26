@extends('templates.layout')

@if (!Auth::check())
    @section('register')
@else
    @section('support')
@endif
    <div class="row" style="width:95%; margin: 0 auto;">
                    <div class="col-md-5" >
                        <img src="img/logo_big.png" alt="Biblionetka logo" > 
                    </div>
                    <div class="col-md-7">
                    <p>
                        <br>
                        <br>
                        <strong style="font-size:1.4em"><?php echo Lang::get('messages.bannerHeader'); ?></strong>
                    </p>
                    
                    <p>
                        <?php echo Lang::get('messages.bannerContent'); ?>
                        <br>
                        <br>
                    </p>
                    
                    <p style="float:right;">
                        @if (!Auth::check())
                        <a class="btn btn-primary btn-lg" href="/login" role="button"><?php echo Lang::get('messages.logIn'); ?></a>
                        <a class="btn btn-warning btn-lg" href="/register" role="button"><?php echo Lang::get('messages.createAccount'); ?></a>
                        @else
                            <a class="btn btn-primary btn-lg" href="/search/results" role="button">
                                Katalog biblioteki  <span class="glyphicon glyphicon-folder-open"></span>  
                            </a>
                        @endif
                        <br>
                        <br>
                        <br>
                        <br>
                    </p>
                    </div>
        </div>                
                

                <div class="row hidden-xs hidden-sm" style="width:95%; margin:0 auto;">
                
                    <div id="carousel-example-generic2" class="carousel slide">
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-generic2" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic2" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic2" data-slide-to="2"></li>
                        </ol>

                        <div class="carousel-inner">
                        
                            <div class="item active">
                                <img src="img/library.png" alt="Zdjecie biblioteki">
                                
                                <div class="carousel-caption">
                                    <h3><?php echo Lang::get('messages.slide1header'); ?></h3>
                                    <p><?php echo Lang::get('messages.slide1content'); ?></p>
                                </div>
                            </div>

                            <div class="item">
                                <img src="img/servers.png" alt="Zdjecie serwerowni">
                                
                                <div class="carousel-caption">
                                    <h3><?php echo Lang::get('messages.slide2header'); ?></h3>
                                    <p><?php echo Lang::get('messages.slide2content'); ?></p>
                                </div>
                            </div>

                            <div class="item">
                                <img src="img/home.png" alt="Zdjecie domu">
                                
                                <div class="carousel-caption">
                                    <h3><?php echo Lang::get('messages.slide3header'); ?></h3>
                                    <p><?php echo Lang::get('messages.slide3content'); ?></p>
                                </div>
                            </div>

                        </div>

                        <a class="left carousel-control" href="#carousel-example-generic2" data-slide="prev">
                            <span class="icon-prev"></span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic2" data-slide="next">
                            <span class="icon-next"></span>
                        </a>
                    </div>
                </div>
    
       
        
    
   
@stop