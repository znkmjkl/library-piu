@extends('templates.layout')

@section('admin_content')
			<style>
				.nav-tabs > li.active > a,.nav-tabs > li.active > a:hover{
					font-weight: bold;
					border-width: 2px;
					/*background-color:rgb(190, 190, 190);*/
				}
				.nav-tabs.nav-justified > li > a{
					border-width: 2px;
					margin:0px;
				}
			</style>
			<div style="margin-bottom:20px; margin-top:20px; margin-left:2%; width:96%;">
			
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
							<span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> &nbsp Panel administratora
						</h4>
					</div>
					<div class="panel-body">
					
						<!-- PANEL BODY -->
						<div class="col-xs-12" style="margin-top:20px;">
							<ul class="nav nav-tabs nav-justified">	
								@if($pageContent=="books")							
									<li role="presentation" class="active"><a href="/admin/books" data-toggle="tab"> Książki </a></li>								
								@else
									<li role="presentation" ><a href="/admin/books"> Książki </a></li>								
								@endif
								
								@if($pageContent=="authors")							
									<li role="presentation" class="active"><a href="/admin/authors" data-toggle="tab"> Autorzy </a></li>								
								@else
									<li role="presentation" ><a href="/admin/authors"> Autorzy </a></li>								
								@endif
								
								@if($pageContent=="users")							
									<li role="presentation" class="active"><a href="/admin/users" data-toggle="tab"> Użytkownicy </a></li>
								@else
									<li role="presentation" ><a href="/admin/users"> Użytkownicy </a></li>
								@endif
								
								@if($pageContent=="rentals")							
									<li role="presentation" class="active"><a href="/admin/rentals" data-toggle="tab"> Wypożyczenia </a></li>
								@else
									<li role="presentation" ><a href="/admin/rentals"> Wypożyczenia </a></li>
								@endif
								
								@if($pageContent=="reservations")							
									<li role="presentation" class="active" ><a href="/admin/reservations" data-toggle="tab"> Rezerwacje </a></li>
								@else
									<li role="presentation" ><a href="/admin/reservations"> Rezerwacje </a></li>					
								@endif
								
								
								
								
							</ul>
						</div>
							
						<div class="col-xs-12">	
							
							<div id="myTabContent" class="tab-content">
								
								<div class="tab-pane fade in active" id="ksiazki" style="margin-top:20px;">
								
									<div class="bs-example" data-example-id="table-within-panel">
										<div class="panel panel-info">
																					
											
											@if($pageContent == 'books')
												@include('admin.partials._admin_book_edit')
											@elseif($pageContent == 'authors')
												@include('admin.partials._admin_authors_edit')
											@elseif($pageContent == 'users')
												@include('admin.partials._admin_user_edit')
											@elseif($pageContent == 'rentals')
												@include('admin.partials._admin_renting_edit')
											@elseif($pageContent == 'reservations')
												@include('admin.partials._admin_reservation_edit')
											@endif
										</div>
									</div>
											
								</div>
							</div>
						<!-- END OF PANEL BODY-->
						</div>
				
					</div>
						
				</div>
			</div>
@stop
