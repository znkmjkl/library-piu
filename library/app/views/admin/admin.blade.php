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
								<li role="presentation" ><a href="#autorzy" data-toggle="tab"> Autorzy </a></li>								
 								<li role="presentation" ><a href="#uzytkownicy" data-toggle="tab"> Użytkownicy </a></li>
								<li role="presentation" ><a href="#wypozyczenia" data-toggle="tab"> Wypożyczenia </a></li>
								<li role="presentation" ><a href="#rezerwacje" data-toggle="tab"> Rezerwacje </a></li>
							</ul>
						</div>
							
						<div class="col-md-10">	
							
							<div id="myTabContent" class="tab-content">
								
								<div class="tab-pane fade in active" id="ksiazki" style="margin-top:20px;">
								
									<div class="bs-example" data-example-id="table-within-panel">
										<div class="panel panel-info">
										
											<div class="panel-heading">Edycja książek</div>
											
											@include('admin.partials._admin_book_edit')
										</div>
									</div>
											
								</div>

								<div class="tab-pane fade" id="autorzy" style="margin-top:20px;">
								
									<div class="bs-example" data-example-id="table-within-panel">
										<div class="panel panel-info">
										
											<div class="panel-heading">Edycja autorów</div>
											
											@include('admin.partials._admin_authors_edit')
											
										</div>
									</div>
																
								</div>
								
								<div class="tab-pane fade" id="uzytkownicy" style="margin-top:20px;">
								
									<div class="bs-example" data-example-id="table-within-panel">
										<div class="panel panel-info">
										
											<div class="panel-heading">Edycja użytkowników</div>
											
											@include('admin.partials._admin_user_edit')
										</div>
									</div>
											
								</div>
								
<div class="tab-pane fade" id="wypozyczenia" style="margin-top:20px;">
								
									<div class="bs-example" data-example-id="table-within-panel">
										<div class="panel panel-info">
										
											<div class="panel-heading">Edycja wypożyczeń</div>
											
											<br>
											
											@include('admin.partials._admin_renting_edit')
											
										</div>
									</div>
																
								</div>
								
																<div class="tab-pane fade" id="rezerwacje" style="margin-top:20px;">
								
									<div class="bs-example" data-example-id="table-within-panel">
										<div class="panel panel-info">
										
											<div class="panel-heading">Edycja rezerwacji</div>
											
											<br>										
											@include('admin.partials._admin_reservation_edit')
										</div>
									</div>
																
								</div>
							
						</div>
						<!-- END OF PANEL BODY-->
					</div>
				
				</div>
						
			</div>
@stop
