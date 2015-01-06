@extends('templates.layout')

@section('support')
<style>
.date-expired {
	background-color: #FF4A4A;
	font-weight: bold;
}
</style>
 <h4>Dane użytkownika</h4>
 imię: {{ Auth::user()->usr_name }}<br/>
 nazwisko: {{ Auth::user()->usr_surname }}<br/>
 telefon: {{ Auth::user()->usr_phone }}<br/>
 numer: {{ Auth::user()->usr_number }}<br/>
 pesel: {{ Auth::user()->usr_pesel }}<br/>

 Miasto {{$address[0]->adr_city}}<br/>
 Ulica {{$address[0]->adr_street}}<br/>
 Numer domu {{$address[0]->adr_house_number}}<br/>
 Kod pocztowy {{$address[0]->adr_postal_code}}<br/>


 @if( Auth::user()->usr_verified )
 	<span class="label label-success">Dane zweryfikowane</span>
 @else
 	<span class="label label-warning">Dane niezweryfikowane</span>
 @endif
 <br/>
 <h4>Rezerwacje</h4>
 @if(count($rvns)==0)
 	brak rezerwacji
 @endif
 
 <br/>
 <h4>Wypożyczenia</h4>
 @if(count($rtls)==0)
 	brak wypożyczeń
 @endif
 @foreach ($rtls as $rtl)
 	{{date("d-m-y",strtotime($rtl->rtl_start_date))}}<br/>
 	{{date("d-m-y",strtotime($rtl->rtl_end_date))}}<br/>
 	{{$rtl->bok_title}}<br/>
 	{{$rtl->fne_amount}}<br/>
 	opóżnienie: 

 	@if(date_diff(date_create(),date_create($rtl->rtl_end_date))->format("%R%a")<0)
 		przetrzymano!
 	@else
 		jest ok!
 	@endif
 	
 	<br/>
 	<br/>
 	{{ Form::open(array('route' => array('prolongate', $rtl->rtl_id, $rtl->bok_title))) }}
            {{ Form::submit('Prolongate', array()) }}
    {{ Form::close() }}

 	<br/><br/>


 <br/><br/>
 @endforeach

<br/><br/>


<br/>		

	

	<div style="margin-bottom:20px; margin-left:2%; width:96%;">
		
				<div class="panel-group" id="accordion" style="margin-top:20px;">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" style="line-height: 100%; display: block; text-decoration: none;">
									<span class="glyphicon glyphicon-circle-arrow-down" aria-hidden="true"></span> &nbsp {{ Auth::user()->usr_name }}  {{ Auth::user()->usr_surname }} - dane użytkownika
								</a>
							</h4>
						</div>
						<div id="collapseOne" class="panel-collapse collapse in">
							<div class="panel-body">
								<div class="col-md-6">

									<table class="user-data-table">
									
										<tr>
											<td> Adres email: </td>
											<td class="udt-val-td">  {{ Auth::user()->email }} </td>
										</tr>
										
										<tr>
											<td> Numer telefonu: </td>
											<td class="udt-val-td"> {{ Auth::user()->usr_phone }} </td>
										</tr>
										
										<tr>
											<td> PESEL: </td>
											<td class="udt-val-td"> {{ Auth::user()->usr_pesel }} </td>
										</tr>
																	
										<tr>
											<td> Miasto zamieszkania: </td>
											<td class="udt-val-td"> {{$address[0]->adr_city}} </td>
										</tr>
										
										<tr>
											<td> Ulica: </td>
											<td class="udt-val-td"> {{$address[0]->adr_street}} </td>
										</tr>
										
										<tr>
											<td> Numer domu: </td>
											<td class="udt-val-td"> {{$address[0]->adr_house_number}} </td>
										</tr>
										
										<tr>
											<td> Kod pocztowy: </td>
											<td class="udt-val-td"> {{$address[0]->adr_postal_code}} </td>
										</tr>
									
									</table>
								
								</div>
								
								<div class="col-md-6">
								
									<table  class="user-data-table">
										<tr>
											<td> <p> <abbr title="Jest to Twój indywidualny numer karty bibliotecznej, nadany przez system i niemożliwy do zmiany">Numer karty:</abbr> </p> </td>
											<td class="udt-val-td" style="display:block"> {{ Auth::user()->usr_number }} </td>
										</tr>
																				
										<tr>
											<td> <p> <abbr title="Weryfikacja konta odbywa się poprzez okazanie dokumentu tożsamości przy pierwszej wizycie w naszej bibliotece.">Konto zweryfikowane:</abbr> </p> </td>
											<td class="udt-val-td" style="display:block"> 
												@if( Auth::user()->usr_verified )
												<span class="label label-success">ZWERYFIKOWANE</span>
 												@else			
 												<span class="label label-danger">NIE ZWERYFIKOWANE</span>
 												@endif
 											</td>
										</tr>
									</table>
								
								</div>
								
								<div class="col-md-3 col-md-offset-9" style="text-align:right;">
									<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" style="line-height: 100%; display: block; text-decoration: none;">
										<button type="button" class="btn btn-primary"> <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Zmień hasło</button>
									</a>
								</div>
							</div>
						</div>
						
						<div id="collapseTwo" class="panel-collapse collapse">
							<div class="panel-body">
							
								{{ Form::open(array('url' => 'changePass', 'class' => 'form-signin')) }}
    							{{ Form::password('usr_oldPass', array('class' => 'form-control', 'placeholder' => 'Wprowadź aktualne hasło', "required" => "true")) }}
    							{{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Wprowadź nowe hasło', "required" => "true")) }}
    							{{ Form::password('password_confirmation', array('class' => 'form-control', 'placeholder' => 'Powtórz nowe hasło', "required" => "true")) }}
		    
    							<hr>
    							{{ Form::submit('Zmień hasło', array('class' => 'btn btn-lg btn-danger btn-block')) }}
    							<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" style="line-height: 100%; display: block; text-decoration: none;">
									<button type="button" class="btn btn-lg btn-primary btn-block" style="margin-top:5px;"> Anuluj </button>	
								</a>
								{{ Form::close() }}
								
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="col-xs-10 col-sm-offset-1" style="margin-bottom:20px;">			
				<hr>
			</div>
			
			<div class="col-md-2" style="margin-top:20px;">
				<ul class="nav nav-pills  nav-stacked">
					<li role="presentation" class="active"><a href="#wypozyczenia" data-toggle="tab"> Wypożyczenia </a></li>
					<li role="presentation" ><a href="#historia" data-toggle="tab"> Historia wypożyczeń </a></li>
					<li role="presentation" ><a href="#rezerwacje" data-toggle="tab"> Rezerwacje </a></li>
				</ul>
			</div>
				
			<div class="col-md-10">	
				
				<div id="myTabContent" class="tab-content">
					
					<div class="tab-pane fade in active" id="wypozyczenia" style="margin-top:20px;">
					
						<div class="bs-example" data-example-id="table-within-panel">
							<div class="panel panel-info">
							
								<div class="panel-heading">Twoje wypożyczenia</div>
								@if(count($rtls)==0)
								<div class="panel-body"> <!--klasa hidden jesli ilosc wypozyczen != 0-->
									<p><strong>Niczego jeszcze nie wypożyczyłeś!</strong> Skorzystaj z szybkiego wyszukiwania u góry strony lub przejdź do <a href="/search">Wyszukiwania Zaawansowanego</a> </p>
									<span class="label label-warning">Kara zapłacona</span> <span class="label label-danger">Kara nie zapłacona</span>
								</div>
								@else
								<table class="table">
									<thead>
										<tr>
											<th>Tytuł</th>
											<th>Data wypożyczenia</th>
											<th>Data zwrotu</th>
											<th>Pozostało</th>
											<th>Kara</th>
										</tr>
									</thead>
									<tbody>	
										@foreach ($rtls as $rtl)
										@if(date_diff(date_create(),date_create($rtl->rtl_end_date))->format("%R%a")<0)								
										<tr class="date-expired">
										@else
										<tr>
										@endif
											<td><a href="/book/{{ $rtl->bok_id }} "><abbr title='{{$rtl->bok_title}} - zobacz stronę książki'> {{$rtl->bok_title}}</a></td>
											<td>{{date("d-m-y",strtotime($rtl->rtl_start_date))}}</td>
											<td>{{date("d-m-y",strtotime($rtl->rtl_end_date))}}</td>
											<td>
												@if(date_diff(date_create(),date_create($rtl->rtl_end_date))->format("%R%a")<0)
 													Termin minął {{date_diff(date_create(),date_create($rtl->rtl_end_date))->format("%a dni ")}}temu
 												@else
 													{{date_diff(date_create(),date_create($rtl->rtl_end_date))->format("%a dni")}}
 													@if(date_diff(date_create(),date_create($rtl->rtl_end_date))->format("%a") < 90)
 													{{ Form::open(array('route' => array('prolongate', $rtl->rtl_id, $rtl->bok_title), "style" => "display:inline-block;")) }}
           												{{ Form::submit('Prolonguj', array("style"=>"display:inline-block")) }}
    												{{ Form::close() }}
    												@else
    												<span class="label label-danger">Nie możesz już prolongować</span>
    												@endif
 												@endif
											 <!-- <abbr title="Poproś o prolongatę"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> </abbr> </a>  -->
											 </td>
											<td>{{$rtl->fne_amount}} zł</td> 
										</tr>
										@endforeach
										<tr style="color:red;">
											<td><a><abbr title='"Przepisy babci Grażynki na każdy dzień" - zobacz stronę książki'> Przepisy babci...</a></td>
											<td>12-12-2014r.</td>
											<td></td>
											<td style="color:red;"><abbr title=" &middot Wypożyczono: 20-12-2014r. &#10; &middot Termin zwrotu: 14-01-2015r."> TERMIN MINĄŁ </abbr> &nbsp&nbsp <span class="label label-danger">1,20PLN</span> &nbsp&nbsp <a> <abbr title="Poproś o prolongatę"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> </abbr> </a> </td>
											<!-- <td>WYPOŻYCZONA</td> -->
											<td></td>
										</tr>
									</tbody>
								</table>
								@endif
							</div>
						</div>
													
					</div>
					
					<div class="tab-pane fade" id="historia" style="margin-top:20px;">
					
						<div class="bs-example" data-example-id="table-within-panel">
							<div class="panel panel-info">
							
								<div class="panel-heading">Archiwalne wypożyczenia</div>
								@if(count($rtlsOld) == 0)
								<div class="panel-body"> <!--klasa hidden jesli ilosc wypozyczen != 0-->
									<p><strong>Nie ma żadnych wypożyczeń w archiwum!</strong></p>
									<span class="label label-warning">Kara zapłacona</span> <span class="label label-danger">Kara nie zapłacona</span>
								</div>
								@else
								<table class="table">
									<thead>
										<tr>
											<th>Tytuł</th>
											<th>Data wypożyczenia</th>
											<th>Data zwrotu</th>
										</tr>
									</thead>
									<tbody>	
										@foreach ($rtlsOld as $rtlOld)								
										<tr>
											<td><a><abbr title='"O psie który jeździł koleją" - zobacz stronę książki'> O psie który jeździł...</a></td>
											<td>12-12-2014r.</td>
											<td><abbr title=" &middot Wypożyczono: 20-12-2014r. &#10; &middot Termin zwrotu: 14-01-2015r."> 10 DNI </abbr> &nbsp&nbsp </td>
										</tr>
										@endforeach
										<tr>
											<td><a><abbr title='"Przepisy babci Grażynki na każdy dzień" - zobacz stronę książki'> Przepisy babci...</a></td>
											<td>12-12-2014r.</td>
											<td>30-12-2014r. &nbsp&nbsp <span class="label label-warning">1,20PLN</span> &nbsp&nbsp </td>
										</tr>
									</tbody>
								</table>
								@endif
							</div>
						</div>
													
					</div>
					
					<div class="tab-pane fade" id="rezerwacje" style="margin-top:20px;">
					
						<div class="bs-example" data-example-id="table-within-panel">
							<div class="panel panel-info">
							
								<div class="panel-heading">Twoje rezerwacje</div>
								@if(count($rvns) == 0)
								<div class="panel-body"> <!--klasa hidden jesli ilosc wypozyczen != 0-->
									<p><strong>Niczego aktualnie nie zarezerwowałeś!</strong> </p>
								</div>
								@else
								<table class="table">
									<thead>
										<tr>
											<th>Tytuł</th>
											<th>Data rezerwacji</th>
											<th>Status</th>
											<th> </th>
										</tr>
									</thead>
									<tbody>	
										@foreach ($rvns as $rvn)
										<tr>
											<td><a href="/book/{{ $rvn->bok_id }}"><abbr title='{{ $rvn->bok_title }} - zobacz stronę książki'>{{ $rvn->bok_title }}</a></td>
											<td>{{date("d-m-Y", strtotime($rvn->rvn_date))}}</td>
											<td>
											@if(!$rvn->rvn_is_ready)
											<span class="label label-info">Oczekująca</span>
											@else
											<span class="label label-success">Do odbioru</span>	
											@endif
											</td>
											<td> 
												{{ Form::open(array('route' => array('resign', $rvn->bok_id))) }}
	    										{{ Form::submit('Anuluj rezerwacje', array('class' => 'btn btn-sm btn-danger','style'=>"padding:2px 5px;")) }}
	    										{{ Form::close() }}
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
								@endif
							</div>
						</div>
													
					</div>

				</div>
			<br/>
			//sprawdzanie w wypozyczonych czy oddane czy nie - 2 array old i activ
			</div>
			
@stop