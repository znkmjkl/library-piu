@extends('templates.layout')

@section('support')
<div class="row">
	<div class="col-xs-9 col-sm-offset-1">
		<h1> <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> Lokalizacja i kontakt </h1>
	</div>	
</div>
<div class="row">
	<div class="col-md-5 col-md-offset-2" >	
		<p> <br> <span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span> Poniżej znajduje się mapa z zaznaczoną lokalizacją Biblionetki. <br> &nbsp&nbsp&nbsp&nbsp&nbsp Odwiedź nas lub skontaktuj się telefonicznie bądź mailowo. <br> </p>
		<p> <br> <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Odbiór zarezerwowanych książek tylko osobiście w siedzibie Biblionetki. <br><br> </p>
	</div>	
	<div class="col-md-5">
		<blockquote>
			<address>
				<strong>BIBLIONETKA FILIA NR 1</strong><br>
					Ulica Profesora Stanisława Łojasiewicza 11<br>
					32-239 Kraków, Polska<br><br>
				<abbr title="Telefon">Tel:</abbr> (123) 456-7890<br>
				<abbr title="Adres mailowy">&nbsp@:</abbr> &nbspkontakt@biblionetka.pl
			</address>
		</blockquote>
	</div>
	<div class="col-md-12">
		<iframe id="google-map" height="450" frameborder="0" style="width: 100%; border:0" src="https://www.google.com/maps/embed/v1/place?q=50.029493%2C%2019.906069&key=AIzaSyB6d7s8zarenD63I_8hsBOrhlDk2S_G1Y4&zoom=17"></iframe>												
	</div>
	<br><br>					
</div>
@stop
