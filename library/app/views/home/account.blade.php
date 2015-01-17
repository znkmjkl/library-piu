@extends('templates.layout')

@section('support')
<style>
.date-expired {
	background-color: #FF4A4A;
	font-weight: bold;
}
</style>	
<div ng-controller="AccountController">
	@foreach($rtls as $rtl)
	@if(date_diff(date_create(),date_create($rtl->rtl_end_date))->format("%R%a")<0)										
	<div class="alert alert-danger alert-dismissible" role="alert" style="margin-top:10px;">
		<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		<p> <strong> UWAGA! </strong> Termin wypożyczenia książki <i>{{$rtl->bok_title}}</i> minął <u><b>{{date_diff(date_create(),date_create($rtl->rtl_end_date))->format("%a dni ")}}</b></u>temu. Przejdź do strony <a href="/account/current_rentals" >Wypożyczenia</a> aby zobaczyć szczegóły. </p>
	</div>
	@elseif(date_diff(date_create(),date_create($rtl->rtl_end_date))->format("%a")>0 && date_diff(date_create(),date_create($rtl->rtl_end_date))->format("%a")<10)
	<div class="alert alert-warning alert-dismissible" role="alert" style="margin-top:10px;">
		<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		<p> <strong> UWAGA! </strong> Termin wypożyczenia książki <i>{{$rtl->bok_title}}</i> mija za <u><b>{{date_diff(date_create(),date_create($rtl->rtl_end_date))->format("%a dni")}}</b></u> . Przejdź do strony <a href="/account/current_rentals" >Wypożyczenia</a> aby zobaczyć szczegóły. </p>
	</div>
	@endif
	@endforeach
	<!-- <hr style="border-top: 3px solid #eeeeee;"> -->
	@foreach($rvns as $rvn )
	@if(date_diff(date_create(),date_add(date_create($rvn->rvn_date),date_interval_create_from_date_string("2 days")))->format("%a") >= 0 
		&& date_diff(date_create(),date_add(date_create($rvn->rvn_date),date_interval_create_from_date_string("2 days")))->format("%a") < 3 
		&& $rvn->rvn_is_ready)
	{{date_diff(date_create(),date_add(date_create($rvn->rvn_date),date_interval_create_from_date_string("2 days")))->format("%R%a")}}
	<div class="alert alert-warning alert-dismissible" role="alert" style="margin-top:10px;">
		<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		<p> <strong> UWAGA! </strong> Możesz już odebrać książkę <i>{{$rvn->bok_title}}</i>. 
		Jeżeli tego nie zrobisz w ciągu <u><b>
		{{date_diff(date_create(),date_add(date_create($rvn->rvn_date),date_interval_create_from_date_string("3 days")))
		->format("%a dni")}}</b></u> rezerwacja zostanie anulowana. </p>
		
		{{--
			{{date_create()->format("Y-m-d")}}<br/>
			{{date_add(date_create($rvn->rvn_date),date_interval_create_from_date_string("2 days"))->format("Y-m-d")}}
		--}}

	</div>
	@endif
	@endforeach
	@if($pageContent == 'main')
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
											<td class="udt-val-td"> 
											@if(!empty(Auth::user()->usr_phone))
												{{ Auth::user()->usr_phone }}
											@else
												brak danych
											@endif
											</td>
										</tr>
										
										<tr>
											<td> PESEL: </td>
											<td class="udt-val-td">
											@if(!empty(Auth::user()->usr_pesel))
												{{ Auth::user()->usr_pesel }}
											@else
												brak danych
											@endif
											</td>
										</tr>
																	
										<tr>
											<td> Miasto zamieszkania: </td>
											<td class="udt-val-td"> 
											@if(!empty($address[0]->adr_city))
												{{$address[0]->adr_city}}
											@else
												brak danych
											@endif
											</td>
										</tr>
										
										<tr>
											<td> Ulica: </td>
											<td class="udt-val-td">
											@if(!empty($address[0]->adr_street))
												{{$address[0]->adr_street}} 
											@else
												brak danych
											@endif
											
											</td>
										</tr>
										
										<tr>
											<td> Numer domu: </td>
											<td class="udt-val-td"> 
											@if(!empty($address[0]->adr_house_number))
												{{$address[0]->adr_house_number}}
											@else
												brak danych
											@endif
											</td>
										</tr>
										
										<tr>
											<td> Kod pocztowy: </td>
											<td class="udt-val-td">
											@if(!empty($address[0]->adr_postal_code))
												{{$address[0]->adr_postal_code}}
											@else
												brak danych
											@endif 
											</td>
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
							
								{{ Form::open(array('url' => 'changePass', 'class' => 'form-signin', 'name' => 'passForm')) }}
    							{{ Form::password('usr_oldPass', array('class' => 'form-control', 'ng-model' => 'oldPass', 'placeholder' => 'Wprowadź aktualne hasło', "required" => "true")) }}
    							{{ Form::password('password', array('class' => 'form-control', 'ng-model' => 'newPass1', 'ng-blur' => 'checkPass()', "data-placement"=>"right", 'placeholder' => 'Wprowadź nowe hasło', "required" => "true")) }}
    							{{ Form::password('password_confirmation', array('class' => 'form-control', 'ng-model' => 'newPass2', 'ng-blur' => 'checkPass()', "data-placement"=>"right", 'placeholder' => 'Powtórz nowe hasło', "required" => "true")) }}
		    
    							<hr>
    							{{ Form::submit('Zmień hasło', array('class' => 'btn btn-lg btn-danger btn-block', 'ng-disabled' => '!passForm.$valid' )) }}
    							<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" style="line-height: 100%; display: block; text-decoration: none;">
									<button type="button" class="btn btn-lg btn-primary btn-block" style="margin-top:5px;"> Anuluj </button>	
								</a>
								{{ Form::close() }}
								
							</div>
						</div>
					</div>
				</div>
			</div>
			@endif

			@if($pageContent != 'main')
			<div class="col-md-2" style="margin-top:20px;">
				<ul class="nav nav-pills  nav-stacked">
					@if($pageContent == 'current_rentals')
					<li role="presentation" class="active"><a href="/account/current_rentals" data-toggle="tab"> Wypożyczenia </a></li>
					@else 
					<li role="presentation" class=""><a href="/account/current_rentals" > Wypożyczenia </a></li>
					@endif

					@if($pageContent == 'old_rentals')
					<li role="presentation" class="active"><a href="/account/old_rentals" data-toggle="tab"> Historia wypożyczeń </a></li>
					@else
					<li role="presentation" ><a href="/account/old_rentals" > Historia wypożyczeń </a></li>
					@endif

					@if($pageContent == 'reservations')
					<li role="presentation" class="active"><a href="/account/reservations" data-toggle="tab"> Rezerwacje </a></li>
					@else
					<li role="presentation" ><a href="/account/reservations" > Rezerwacje </a></li>
					@endif
				</ul>
			</div>
				
			<div class="col-md-10" id="bottom">	
				
				<div id="myTabContent" class="tab-content">
					@if($pageContent == "current_rentals")	
					<div class="tab-pane fade in active" id="wypozyczenia" >
					
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
 													@if(date_diff(date_create(),date_create($rtl->rtl_end_date))->format("%a") < 90 && !$rtl->rvn_status)
 														{{ Form::open(array('route' => array('prolongate', $rtl->rtl_id, $rtl->bok_title), "style" => "display:inline-block;")) }}
	           												{{ Form::submit('Prolonguj', array("style"=>"display:inline-block")) }}
    													{{ Form::close() }}    													
    												@else
    												<span class="label label-danger">Nie możesz już prolongować</span>
    												@endif
 												@endif
											 <!-- <abbr title="Poproś o prolongatę"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> </abbr> </a>  -->
											 </td>
											<td>
											@if(!empty($rtl->fne_amount))
											{{$rtl->fne_amount}} 
											@else
											0
											@endif	
											zł
											</td> 
										</tr>
										@endforeach										
									</tbody>
								</table>
								@endif
							</div>
						</div>
													
					</div>
					@endif
					@if($pageContent == "old_rentals")
					<div class="tab-pane fade in active" id="historia" >
					
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
											<td><a href="/book/{{ $rtlOld->bok_id }} "><abbr title='{{$rtlOld->bok_title}} - zobacz stronę książki'> {{$rtlOld->bok_title}}</a></td>
											<td>{{date("d-m-y",strtotime($rtlOld->rtl_start_date))}}</td>
											<td>{{date("d-m-y",strtotime($rtlOld->rtl_end_date))}}</td>											
										</tr>
										@endforeach										
									</tbody>
								</table>
								@endif
							</div>
						</div>													
					</div>
					@endif
					@if($pageContent == "reservations")					
					<div class="tab-pane fade in active" id="rezerwacje">
					
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
	    										{{ Form::submit('Anuluj rezerwacje', array('class' => 'btn btn-danger','style'=>"padding:2px 5px; font-size:0.9em")) }}
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
					@endif

				</div>
			<br/>
			
			</div>
			@endif

<div>			
<script>

function AccountController($scope){


	$scope.checkPass = function(){
		if($scope.newPass1.length < 6){
			$('input[name="password_confirmation"]').attr("title","Hasło powinno mieć co najmniej 6 znaków!");
			$('input[name="password"]').attr("title","Hasło powinno mieć co najmniej 6 znaków!");
			tooltip("password","show");
			tooltip("password_confirmation","show");
			$scope.passForm.password.$setValidity('length',false);
		} else {
			$scope.passForm.password.$setValidity('length',true);
			$('input[name="password"').tooltip("destroy");
            $('input[name="password_confirmation"').tooltip("destroy");

		}
		if($scope.newPass1 != $scope.newPass2){
			$('input[name="password_confirmation"]').attr("title","Hasła powinny być takie same!");
			$('input[name="password"]').attr("title","Hasła powinny być takie same!");
			tooltip("password","show");
			tooltip("password_confirmation","show");
			$scope.passForm.password.$setValidity('identical',false);
		} else {
			$scope.passForm.password.$setValidity('identical',true);
			$('input[name="password"').tooltip("destroy");
            $('input[name="password_confirmation"').tooltip("destroy");
		}
	}
	function tooltip(name,action){
    if(action == "show"){                    
           	$('input[name='+name+']').tooltip("show");
        } else{                    
            $('input[name="'+name+'"]').tooltip("disable");                    
        }
    }	
}
</script>
@stop

