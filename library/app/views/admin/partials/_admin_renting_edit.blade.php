<!-- 										<td><span class="label label-warning">WYPOŻYCZONO</span></td>
										<td><span class="label label-danger">PRZEKROCZONO</span></td>
										<td><span class="label label-success">ODDANO</span></td>
										<td><span class="label label-default">ANULOWANO</span></td>


 -->
					 <table class="table booklist-table">
												<thead>
													<tr>
														<th>ISBN</th>
														<th>Nazwisko</th>
														<th>PESEL</th>
														<th>Data Start</th>
														<th>Data Końca</th>
														<th>Status</th>
														<th>Kara</th>
														<th></th>
													</tr>
												</thead>
												<tbody>
													@foreach($rentedBooks as $rentedBooks)
													<tr>
														<td>{{$rentedBooks->bok_isbn}}</td>
														<td>{{$rentedBooks->usr_surname}}</td>		
														<td>{{$rentedBooks->usr_pesel}}</td>
														<td>{{substr($rentedBooks->rtl_start_date,0,10)}}</td>
														<td>{{substr($rentedBooks->rtl_end_date,0,10)}}</td>
														<td><span class="label label-danger">PRZEKROCZONO</span></td>

														<td> <a class="btn btn-sm btn-danger btn-block" data-toggle="collapse" data-parent="#accordion_{{$rentedBooks->rtl_id}}" href="#edit_{{$rentedBooks->rtl_id}}"> {{$rentedBooks->fne_amount}}  </a> </td>
														<td> <a class="btn btn-sm btn-danger btn-block"> ANULUJ </a> </td>
													</tr>
													
													<tr>
													
														<td colspan="8" style="border-top:0 solid;">
															<div id="accordion_{{$rentedBooks->rtl_id}}">
																
																<div class="row">
																<div id="edit_{{$rentedBooks->rtl_id}}" class="panel-collapse collapse">
																	
																adasdasdasdasdasdas
																</div>
															</div>
																</div>
															</div>
														</td>
													
													</tr>
													
													
																				
																				
													@endforeach
												</tbody>
											</table> 