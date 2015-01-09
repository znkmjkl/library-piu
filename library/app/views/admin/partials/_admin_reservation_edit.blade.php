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
														<td><a href="{{ URL::to('/reservation/cancel/' . $reservation->rvn_id)}}" class="btn btn-danger"> Anuluj</a>
														</td>
														<td>
														@if($reservation->rvn_is_ready=="0")
														<a href="{{ URL::to('/reservation/makeready/' . $reservation->rvn_id) }}" class="btn btn-success">
														Gotowa</a>
														@endif
														@if($reservation->rvn_is_ready=="1")
														<a href="{{ URL::to('/reservation/rentbook/' . $reservation->rvn_id) }}" class="btn btn-success">
														Wypożycz</a>
														@endif
														</td>
														</tr>
														@endforeach
													<!-- ...CALOSC-->
												</tbody>
											</table>					
							