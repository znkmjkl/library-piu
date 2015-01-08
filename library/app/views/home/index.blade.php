@extends('templates.layout')

@section('register')
    <div class="row" style="width:95%; margin: 0 auto;">
                    <div class="col-md-5" >
                        <img src="img/logo_big.png" alt="Biblionetka logo" > 
                    </div>
                    <div class="col-md-7">
                    <p>
                        <br>
                        <br>
                        <strong>Witaj na stronie Biblionetki - Twojej biblioteki internetowej.</strong>
                    </p>
                    
                    <p>
                        Jest to najwygodniejszy sposób wypożyczania książek. Załóż konto, wyszukaj pozycję w naszej bazie, a następnie odbierz ją
                        w bibliotece. Masz pewność, że zastaniesz swoją książkę oraz dostęp do listy tych wypożyczonych. Wszystko w zasięgu
                        ręki!
                        <br>
                        <br>
                    </p>
                    
                    <p style="float:right;">
                        <a class="btn btn-primary btn-lg" href="/login" role="button">Zaloguj się</a>
                        <a class="btn btn-warning btn-lg" href="/register" role="button">Utwórz konto</a>
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
                                    <h3>Morze możliwości</h3>
                                    <p>Już dziś wybierz coś dla siebie z ponad 2000 pozycji!</p>
                                </div>
                            </div>

                            <div class="item">
                                <img src="img/servers.png" alt="Zdjecie serwerowni">
                                
                                <div class="carousel-caption">
                                    <h3>Piorunująca prędkość</h3>
                                    <p>Najnowsze technologie gwarantują szybkość działania serwisu - swoją ulubiona książkę znajdziesz w ułamek sekundy!</p>
                                </div>
                            </div>

                            <div class="item">
                                <img src="img/home.png" alt="Zdjecie domu">
                                
                                <div class="carousel-caption">
                                    <h3>Na wyciągnięcie ręki</h3>
                                    <p>Wymarzoną pozycję znajdziesz i zarezerwujesz z dowolnego miejsca - nawet nie musisz wychodzić z domu.</p>
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
    
       
        {{-- @include('users.partials._login_form') --}}
        <br>
        {{-- @include('users.partials._register_form') --}}
    
   
@stop

<!-- @section('register')
	<div>
		@include('users.partials._login_form')
	</div>
	<div>
		@include('users.partials._register_form')
	</div>
@stop -->