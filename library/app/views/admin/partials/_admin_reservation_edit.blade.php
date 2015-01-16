<div class="panel-heading">Administracja rezerwacjami</div>
{{ Form::open(array('url' => 'admin/search/reservations', 'class' => 'navbar-form navbar-left', 'role' => 'search')) }}
    <div class="input-group" style="width:20%">
        
            
            {{ Form::text('searchInput', null, array('class' => 'form-control', 'style' => 'margin-bottom:0px; width:250px;', 'placeholder' => 'Podaj numer karty lub pesel', 'required' => true)) }}
            <span class="input-group-btn">
            {{ Form::submit('Szukaj', array('class' => 'btn btn-default')) }}
            </span>	
        
    </div>
{{ Form::close() }}


											<table class="table booklist-table">
												<thead>
													<tr>
														<th>#</th>
														<th>ISBN</th>
														<th>Imię</th>
														<th>Nazwisko</th>
														<th>Numer karty</th>
														<th>Data</th>
														<th>Status</th>
														<th style="text-align:center;">Zmiana statusu</th>
														<th></th>
													</tr>
												</thead>
												<tbody>
													<?php $i = 1; ?>
													@foreach($reservations as $reservation)
													<tr>
														<td style="font-weight:bold;">{{$i++}}</td>
														<td>{{ $reservation->bok_isbn }}</td>
														<td>{{ $reservation->usr_name}}</td>
														<td>{{ $reservation->usr_surname }}</td>
														<td>{{ $reservation->usr_number }}</td>
														<td>{{ date("d-m-Y", strtotime($reservation->rvn_date)) }}</td>
														<td>
															@if($reservation->rvn_is_ready=="1")
															<span class="label label-success">DO ODBIORU</span>
															@else
															<span class="label label-warning">OCZEKUJE</span>
															@endif
														</td>
														<td style="text-align:center;"> 
															@if($reservation->rvn_is_ready=="1")
																<a href="{{ URL::to('/reservation/rentbook/' . $reservation->rvn_id) }}" class="btn btn-sm btn-success">
																	Wypożycz
																</a> 
															@else
																<a href="{{ URL::to('/reservation/makeready/' . $reservation->rvn_id) }}" class="btn btn-sm btn-warning">
																	Gotowa do odbioru
																</a>
															@endif
														</td>
														<td>
															<a href="{{ URL::to('/reservation/cancel/' . $reservation->rvn_id)}}" class="btn btn-sm btn-danger" onclick="if(!confirm('Na pewno chcesz anulować rezerwacje?')){return false;};"> 
																Anuluj
															</a>
														</td>
													</tr>
													
													
													
													@endforeach
												</tbody>
											</table>
											
											<?php echo $reservations->links(); ?>