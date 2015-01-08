@extends('templates.layout')

@section('admin_content')

			<div style="margin-bottom:20px; margin-top:20px; margin-left:2%; width:96%;">
			
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
							<span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> &nbsp Panel administratora
						</h4>
					</div>
					<div class="panel-body">
					
						<!-- PANEL BODY -->
						<div class="col-md-2" style="margin-top:20px;">
							<ul class="nav nav-pills  nav-stacked">
								<li role="presentation" class="active"><a href="#ksiazki" data-toggle="tab"> Książki </a></li>								
								<li role="presentation" ><a href="#uzytkownicy" data-toggle="tab"> Użytkownicy </a></li>
								<li role="presentation" ><a href="#rezerwacje" data-toggle="tab"> Rezerwacje </a></li>
								<li role="presentation" ><a href="#kary" data-toggle="tab"> Kary </a></li>
							</ul>
						</div>
							
						<div class="col-md-10">	
							
							<div id="myTabContent" class="tab-content">
								
								<div class="tab-pane fade in active" id="ksiazki" style="margin-top:20px;">
								
									<div class="bs-example" data-example-id="table-within-panel">
										<div class="panel panel-info">
										
											<div class="panel-heading">Edycja książek</div>
											
											<!-- panel dodawania ksiazki-->
											<div class="panel-group" id="addBookAccordion" style="width:50%; margin:0 auto; margin-top:20px;">
												<div class="panel panel-success">
													<div class="panel-heading">
														<h4 class="panel-title">
															<a data-toggle="collapse" data-parent="#addBookAccordion" href="#addBookCollapseOne" style="line-height: 100%; display: block; text-decoration: none;">
																<span class="glyphicon glyphicon-book" aria-hidden="true"></span> &nbsp Dodaj książkę
																<span class="glyphicon glyphicon-plus-sign" aria-hidden="true" style="float:right;"></span>
															</a>
														</h4>
													</div>
													<div id="addBookCollapseOne" class="panel-collapse collapse">
														<div class="panel-body">
														
															<form method="POST" action="http://localhost:8000/addbook" accept-charset="UTF-8" class="form-signin"><input name="_token" type="hidden" value="Sxt2TIIpAPehauPtiTRZZTRRP9t5lw3KJFmGJHEJ">
																
																<input class="form-control" placeholder="Okładka" name="bok_cover_thumbnail" type="file">
																<p class="help-block">&nbspOkładka książki.</p>
																															
																<input class="form-control" placeholder="ISBN" name="bok_isbn" type="text">
																<input class="form-control" placeholder="Tytuł" name="bok_title" type="text">
																<p><select class="form-control" multiple="1" name="writer[]"></select></p>
																<p><select class="form-control" name="language"></select></p>
																<p><select class="form-control" name="kind"></select></p>
																<input class="form-control" placeholder="Data wydania" name="date" type="text">
																<input class="form-control" placeholder="Numer wydania" name="edition" type="text">

																<hr>
																<input class="btn btn-lg btn-success btn-block" type="submit" value="Dodaj książkę">
															</form>

														
														</div>
													</div>
												</div>
											</div>
											
											<!-- panel dodawania autora-->
											<div class="panel-group" id="addAuthorAccordion" style="width:50%; margin:0 auto; margin-top:20px;">
												<div class="panel panel-success">
													<div class="panel-heading">
														<h4 class="panel-title">
															<a data-toggle="collapse" data-parent="#addAuthorAccordion" href="#addAuthorCollapseOne" style="line-height: 100%; display: block; text-decoration: none;">
																<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> &nbsp Dodaj autora
																<span class="glyphicon glyphicon-plus-sign" aria-hidden="true" style="float:right;"></span>
															</a>
														</h4>
													</div>
													<div id="addAuthorCollapseOne" class="panel-collapse collapse">
														<div class="panel-body">
														
															<!-- UWAGA TU SKOPIOWALEM FORMA Z SEARCH - na pewno trzeba go troche zmodyfikowac -->
															<form method="POST" action="http://localhost:8000/addauthor" accept-charset="UTF-8" class="form-signin"><input name="_token" type="hidden" value="Sxt2TIIpAPehauPtiTRZZTRRP9t5lw3KJFmGJHEJ">
																<input class="form-control" placeholder="Imię" name="author_name" type="text">
																<input class="form-control" placeholder="Nazwisko" name="author_surname" type="text">
																<input class="form-control" placeholder="Data urodziń" name="birth_date" type="text">
																<hr>
																<input class="btn btn-lg btn-success btn-block" type="submit" value="Dodaj Autora">
															</form>

														</div>
													</div>
												</div>
											</div>
											
											<br><br>
											
											
											<table class="table booklist-table">
												<thead>
													<tr>
														<th>Tytuł</th>
														<th>Autor</th>
														<th>ISBN</th>
														<th></th>
														<th></th>
														<th></th>
													</tr>
												</thead>
												<tbody>
													<!--UWAGA TO JEST...-->
													<tr>
														<td><a><abbr title='"O psie który jeździł koleją" - zobacz stronę książki'> O psie który jeździł...</a></td>
														<td>Jan Kowalski</td>
														<td>978-3-16-148410-0</td>
														<td> <a class="btn btn-sm btn-primary btn-block" data-toggle="collapse" data-parent="#accordion_TUTAJNRISBN" href="#more_TUTAJNRISBN"> SZCZEGÓŁY </a> </td>
														<td> <a class="btn btn-sm btn-info btn-block" data-toggle="collapse" data-parent="#accordion_TUTAJNRISBN" href="#edit_TUTAJNRISBN"> EDYTUJ </a> </td>
														<td> <a class="btn btn-sm btn-danger btn-block"> USUŃ </a> </td>
													</tr>
													
													<tr>
														<td colspan="6" style="border-top:0 solid;">
															<div id="accordion_TUTAJNRISBN">
																<div class="row">
																<div id="more_TUTAJNRISBN" class="panel-collapse collapse">
																
																	<div class="col-lg-2">
																	
																		<center>
																			<img src="img/cover1.jpg" alt="Tytuł książki - okładka" class="cover-big" style="width:90px; margin:0 auto;" />
																		</center>
																	</div>
																	
																	<div class="col-lg-5">
																	
																		<table class="table" style="margin:0px;">
																			<tbody>									
																				<tr>
																					<td> <strong> Tytuł: </strong> </td>
																					<td> O psie który jeździł koleją </td>
																				</tr>
																				
																				<tr>
																					<td> <strong> Autor: </strong> </td>
																					<td> Jan Kowalski </td>
																				</tr>
																				
																				<tr>
																					<td> <strong> ISBN: </strong> </td>
																					<td> 978-3-16-148410-0 </td>
																				</tr>
																				
																				<tr>
																					<td> <strong> Data wydania: </strong> </td>
																					<td> 2013r. </td>
																				</tr>
																			</tbody>
																		</table>
																	
																	</div>
																	
																	<div class="col-lg-5">
																	
																		<table class="table">
																			<tbody>									
																				<tr>
																					<td> <strong> Numer wydania: </strong> </td>
																					<td> 1 </td>
																				</tr>
																				
																				<tr>
																					<td> <strong> Gatunek: </strong> </td>
																					<td> Horror </td>
																				</tr>
																				
																				<tr>
																					<td> <strong> Język: </strong> </td>
																					<td> Polski </td>
																				</tr>
																				
																				<tr>
																					<td> <strong> Dostępność: </strong> </td>
																					<td> 
																						<span class="label label-success">TAK</span>
																						<span class="label label-warning"> <abbr title="Książka nie jest dostępna ale możesz ją zarezerwować">NIE</abbr></span>
																						<span class="label label-danger">NIE</span>
																						<!-- ofc tylko jedno naraz :) -->
																					</td>
																				</tr>
																			</tbody>
																		</table>
																	
																	</div>
																	
																</div>
																</div>
																
																<div class="row">
																<div id="edit_TUTAJNRISBN" class="panel-collapse collapse">
																	
																	<div class="panel panel-info" style="width:90%; margin:0 auto;">
																		<div class="panel-heading">
																			<h4 class="panel-title">
																				<span class="glyphicon glyphicon-cog" aria-hidden="true"></span> &nbsp Edytuj dane książki
																			</h4>
																		</div>
																		<div class="panel-body">
														
																			<!-- UWAGA TU SKOPIOWALEM FORMA Z GÓRY - na pewno trzeba go troche zmodyfikowac -->
																			<form method="POST" action="http://localhost:8000/addbook" accept-charset="UTF-8" class="form-signin"><input name="_token" type="hidden" value="Sxt2TIIpAPehauPtiTRZZTRRP9t5lw3KJFmGJHEJ">
																
																				<input class="form-control" placeholder="Okładka" name="bok_cover_thumbnail" type="file">
																				<p class="help-block">&nbspOkładka książki.</p>
																																			
																				<input class="form-control" placeholder="ISBN" name="bok_isbn" type="text">
																				<input class="form-control" placeholder="Tytuł" name="bok_title" type="text">
																				<p><select class="form-control" multiple="1" name="writer[]"></select></p>
																				<p><select class="form-control" name="language"></select></p>
																				<p><select class="form-control" name="kind"></select></p>
																				<input class="form-control" placeholder="Data wydania" name="date" type="text">
																				<input class="form-control" placeholder="Numer wydania" name="edition" type="text">

																				<hr>
																				<input class="btn btn-lg btn-info btn-block" type="submit" value="Zmień dane">
																			</form>
																		</div>
																	</div>
																	
																</div>
																</div>
															</div>
														</td>
													</tr>
													<!-- ...CALOSC-->
												</tbody>
											</table>
										</div>
									</div>
																
								</div>
								
								<div class="tab-pane fade" id="uzytkownicy" style="margin-top:20px;">
								
									<div class="bs-example" data-example-id="table-within-panel">
										<div class="panel panel-info">
										
											<div class="panel-heading">Edycja użytkowników</div>
											
											<!-- panel dodawania uzytkownikow-->
											<div class="panel-group" id="addUserAccordion" style="width:50%; margin:0 auto; margin-top:20px;">
												<div class="panel panel-success">
													<div class="panel-heading">
														<h4 class="panel-title">
															<a data-toggle="collapse" data-parent="#addUserAccordion" href="#addUserCollapseOne" style="line-height: 100%; display: block; text-decoration: none;">
																<span class="glyphicon glyphicon-user" aria-hidden="true"></span> &nbsp Dodaj użytkownika
																<span class="glyphicon glyphicon-plus-sign" aria-hidden="true" style="float:right;"></span>
															</a>
														</h4>
													</div>
													<div id="addUserCollapseOne" class="panel-collapse collapse">
														<div class="panel-body">
														
															@include('admin.partials._add_user_form')
														
														</div>
													</div>
												</div>
											</div>
											
											<br><br>

											<table class="table booklist-table">
												<thead>
													<tr>
														<th>Imię</th>
														<th>Nazwisko</th>
														<th>PESEL</th>
														<th>Status konta</th>
														<th></th>
														<th></th>
														<th></th>
														<th></th>
													</tr>
												</thead>
												<tbody>
													<!--UWAGA TO JEST...-->
													@foreach($users as $user)
													
													<tr>
														<td>{{ $user->usr_name }}</td>
														<td>{{ $user->usr_surname }}</td>
														<td>{{ $user->usr_pesel }}</td>
														<td>@if($user->usr_active=="1")
														<span class="label label-success">Aktywny</span>
														@endif
														@if($user->usr_active=="0")
														<span class="label label-danger">Nieaktywny</span>
														@endif
														@if($user->usr_verified=="1")
														<span class="label label-success">Zweryfikowany</span>
														@endif
														@if($user->usr_verified=="0")
														<span class="label label-danger">Niezweryfikowany</span>
														@endif
														</td>
														<td>
															<td> <a class="btn btn-sm btn-primary btn-block" data-toggle="collapse" data-parent="#accordion_{{$user->id}}" href="#more_{{$user->id}}">Szczegóły</a> </td>					
														</td>
														<td> 
															@if($user->usr_active=="1")
															<a href="{{ URL::to('user/block/' . $user->id) }}" class="btn btn-sm btn-danger">
															Zablokuj</a>
															@endif
															@if($user->usr_active=="0")
															<a href="{{ URL::to('user/activate/' . $user->id) }}" class="btn btn-sm btn-success">
															Aktywuj</a>
															@endif
														</td>
														<td>
														<a class="btn btn-sm btn-info btn-block" data-toggle="collapse" data-parent="#accordion_{{$user->id}}" href="#edit_{{$user->id}}">Edytuj</a> </td>
														<td>@if($user->usr_verified=="0")
															<a href="{{ URL::to('user/verify/' . $user->id) }}" class="btn btn-sm btn-success">Zweryfikuj</a>
															@endif
															@if($user->usr_verified=="1")
															<a href="{{ URL::to('user/verify/' . $user->id) }}" class="btn btn-sm btn-success disabled">Zweryfikuj</a>
															@endif
														</td>
													</tr>
													
													<tr>
														<td colspan="6" style="border-top:0 solid;">
															<div id="accordion_{{$user->id}}">
																<div class="row">
																<div id="more_{{$user->id}}" class="panel-collapse collapse">
																																		
																	<div class="col-lg-8">
																	
																		<table class="table">
																			<tbody>		
																				<tr>
																					<td> <strong> Ulica: </strong> </td>
																					<td> {{ $user->adr_street.' '.$user->adr_house_number }} </td>
																				</tr>							
																				<tr>
																					<td> <strong> Miasto: </strong> </td>
																					<td> {{ $user->adr_postal_code.' '.$user->adr_city }} </td>
																				</tr>
																				<tr>
																					<td> <strong> Numer karty: </strong> </td>
																					<td> {{ $user->usr_number }} </td>
																				</tr>
																				<tr>
																					<td> <strong> Adres email: </strong> </td>
																					<td> {{ $user->email }} </td>
																				</tr>
																				<tr>
																					<td> <strong> Telefon: </strong> </td>
																					<td> {{ $user->usr_phone }} </td>
																				</tr>
																			</tbody>
																		</table>
																	
																	</div>

																</div>
																</div>
																
																<div class="row">
																<div id="edit_{{$user->id}}" class="panel-collapse collapse">
																	
																	<div class="panel panel-info" style="width:90%; margin:0 auto;">
																		<div class="panel-heading">
																			<h4 class="panel-title">
																				<span class="glyphicon glyphicon-cog" aria-hidden="true"></span> &nbsp Edytuj dane użytkownika
																			</h4>
																		</div>
																		<div class="panel-body">
														
																			@include('admin.partials._edit_user_form')
																			
																		</div>
																	</div>
																	
																</div>
																</div>
															</div>
														</td>
													</tr>
													@endforeach
													<!-- ...CALOSC-->
												</tbody>
											</table>
											
										</div>
									</div>
																
								</div>
								
								<div class="tab-pane fade" id="rezerwacje" style="margin-top:20px;">
								
									<div class="bs-example" data-example-id="table-within-panel">
										<div class="panel panel-info">
										
											<div class="panel-heading">Edycja rezerwacji</div>
											
											<br>
											
											<table class="table booklist-table">
												<thead>
													<tr>
														<th>ISBN</th>
														<th>Użytkownik</th>
														<th>Pesel</th>
														<th>Data</th>
														<th>Status</th>
														<th></th>
														<th></th>
													</tr>
												</thead>
												<tbody>
													<!--UWAGA TO JEST...-->
													@foreach($reservations as $reservation)
														<tr>
														<td>{{ $reservation->bok_isbn }}</td>
														<td>{{ $reservation->usr_name.' '.$reservation->usr_surname}}</td>
														<td>{{ $reservation->usr_pesel }}</td>
														<td>{{ $reservation->rvn_date }}</td>
														<td>@if($reservation->rvn_status=="1")
														<span class="label label-success">Aktywna</span>
														@endif
														@if($reservation->rvn_status=="0")
														<span class="label label-danger">Nieaktywna</span>
														@endif
														@if($reservation->rvn_is_ready=="1")
														<span class="label label-success">Gotowa do odbioru</span>
														@endif
														@if($reservation->rvn_is_ready=="0")
														<span class="label label-danger">W przygotowaniu</span>
														@endif
														</td>
														<td><a href="{{ URL::to('/reservation/cancel/' . $reservation->rvn_id)}}" class="btn btn-danger"><i class="glyphicon glyphicon-ban-circle"></i> Anuluj</a>
														</td>
														<td>
														@if($reservation->rvn_is_ready=="0")
														<a href="{{ URL::to('/reservation/makeready/' . $reservation->rvn_id) }}" class="btn btn-success"><i class="glyphicon glyphicon-check"></i>
														Gotowa</a>
														@endif
														@if($reservation->rvn_is_ready=="1")
														<a href="{{ URL::to('/reservation/rentbook/' . $reservation->rvn_id) }}" class="btn btn-default"><i class="glyphicon glyphicon-ok"></i>
														Wypożycz</a>
														@endif
														</td>
														</tr>
														@endforeach
													<!-- ...CALOSC-->
												</tbody>
											</table>
											
										</div>
									</div>
																
								</div>
								
								<div class="tab-pane fade" id="kary" style="margin-top:20px;">
								
									<div class="bs-example" data-example-id="table-within-panel">
										<div class="panel panel-info">
										
											<div class="panel-heading">Edycja kar</div>
											
											<!-- panel dodawania uzytkownikow-->
											<div class="panel-group" id="feeAccordion" style="width:50%; margin:0 auto; margin-top:20px;">
												<div class="panel panel-success">
													<div class="panel-heading">
														<h4 class="panel-title">
															<a data-toggle="collapse" data-parent="#feeAccordion" href="#feeCollapseOne" style="line-height: 100%; display: block; text-decoration: none;">
																<span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> &nbsp Dodaj karę
															</a>
														</h4>
													</div>
													<div id="feeCollapseOne" class="panel-collapse collapse">
														<div class="panel-body">
														
															tutaj formularz dodawania kar - nie mam zielonego pojecia jak powinien wygladac - ale chyba powinien zawierac PESEL, ISBN oraz Datę
														
														</div>
													</div>
												</div>
											</div>
											
											<br><br>

											<table class="table booklist-table">
												<thead>
													<tr>
														<th>PESEL</th>
														<th>ISBN</th>
														<th>Data</th>
														<th>Kwota</th>
														<th></th>
														<th></th>
														<th></th>
													</tr>
												</thead>
												<tbody>
													<!-- tu dane -->
												</tbody>
											</table>
											
										</div>
									</div>
																
								</div>
								
							</div>
							
						</div>
						<!-- END OF PANEL BODY-->
					</div>
				
				</div>
						
			</div>
@stop
