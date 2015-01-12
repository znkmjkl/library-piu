<!-- panel dodawania uzytkownikow-->
<div class="panel-heading">Administracja użytkownikami</div>


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

{{ Form::open(array('url' => 'admin/search/user', 'class' => 'navbar-form navbar-left', 'role' => 'search')) }}
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
															<td> <a class="btn  btn-primary " data-toggle="collapse" data-parent="#accordion_{{$user->id}}" href="#more_{{$user->id}}">Szczegóły</a> </td>					
														</td>
														<td> 
															@if($user->usr_active=="1")
															<a href="{{ URL::to('user/block/' . $user->id) }}" class="btn  btn-danger">
															Zablokuj</a>
															@endif
															@if($user->usr_active=="0")
															<a href="{{ URL::to('user/activate/' . $user->id) }}" class="btn  btn-success">
															Aktywuj</a>
															@endif
														</td>
														<td>
														<a class="btn  btn-info " data-toggle="collapse" data-parent="#accordion_{{$user->id}}" href="#edit_{{$user->id}}">Edytuj</a> </td>
														<td>@if($user->usr_verified=="0")
															<a href="{{ URL::to('user/verify/' . $user->id) }}" class="btn  btn-success">Zweryfikuj</a>
															@endif
															@if($user->usr_verified=="1")
															<a href="{{ URL::to('user/verify/' . $user->id) }}" class="btn  btn-success disabled">Zweryfikuj</a>
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
							<?php echo $users->links(); ?>