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
								