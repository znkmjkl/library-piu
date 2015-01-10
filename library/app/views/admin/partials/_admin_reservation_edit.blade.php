											<table class="table booklist-table">
												<thead>
													<tr>
														<th>ISBN</th>
														<th>Imię</th>
														<th>Nazwisko</th>
														<th>Numer karty</th>
														<th>Data</th>
														<th>Status</th>
														<th></th>
														<th></th>
													</tr>
												</thead>
												<tbody>
													@foreach($reservations as $reservation)
													<tr>
														<td>{{ $reservation->bok_isbn }}</td>
														<td>{{ $reservation->usr_name}}</td>
														<td>{{ $reservation->usr_surname }}</td>
														<td>{{ $reservation->usr_number }}</td>
														<td>{{ $reservation->rvn_date }}</td>
														<td>
															@if($reservation->rvn_is_ready=="1")
															<span class="label label-success">DO ODBIORU</span>
															@else
															<span class="label label-warning">OCZEKUJE</span>
															@endif
														</td>
														<td> 
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
															<a href="{{ URL::to('/reservation/cancel/' . $reservation->rvn_id)}}" class="btn btn-danger"> 
																Anuluj
															</a>
														</td>
													</tr>
													
													
													
													@endforeach
												</tbody>
											</table>