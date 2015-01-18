<div class="panel-heading">Administracja książkami</div>
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
				@include('admin.partials._add_book_form')
			</div>
		</div>
	</div>
</div>
											
<br><br>
			{{ Form::open(array('url' => 'admin/books', 'class' => 'navbar-form navbar-left', 'role' => 'search')) }}
    <div class="input-group" style="width:20%">
        
            
            {{ Form::text('searchInput', null, array('class' => 'form-control', 'style' => 'margin-bottom:0px; width:250px;', 'placeholder' => 'Podaj ISBN lub tytuł książki', 'required' => true)) }}
            <span class="input-group-btn">
            {{ Form::submit('Szukaj', array('class' => 'btn btn-default')) }}
            </span>	
        
    </div>
{{ Form::close() }}								
<table class="table booklist-table">
	<thead>
		<tr>
			<th>#</th>
			<th>Tytuł</th>
			<th>Autor</th>
			<th>ISBN</th>
			<th></th>
			<th></th>
			<th></th>
		</tr>
	</thead>
	
	<?php $i = 1 + (Paginator::getCurrentPage()-1)*15; ?>
	@foreach($books as $book)
	<tbody>
		<tr>
			<td style="font-weight:bold;">{{$i++}}</td>
			<td><a href="{{ URL::to('book/' . $book->bok_id ) }}"><abbr> {{substr($book->bok_title,0,20) }} @if(strlen($book->bok_title) > 20)...@endif </abbr> </a></td>
			<td>
				@foreach($autors as $autor)
					@if( $autor->atr_bok_id == $book->bok_id)
						<p>{{$writersList[$autor->atr_wtr_id]}}</p>
					@endif
				@endforeach													
			</td>
			<td>{{$book->bok_isbn}}</td>
			<td> <a class="btn btn-sm btn-primary btn-block" data-toggle="collapse" data-parent="#accordion_{{$book->bok_isbn}}" href="#more_{{$book->bok_isbn}}"> SZCZEGÓŁY </a> </td>
			<td> <a class="btn btn-sm btn-info btn-block" data-toggle="collapse" data-parent="#accordion_{{$book->bok_isbn}}" href="#edit_{{$book->bok_isbn}}"> EDYTUJ </a> </td>
			<td><a href="{{ URL::to('removebook/' . $book->bok_id ) }} " class="btn btn-sm btn-danger btn-block" onclick="if(!confirm('Na pewno chcesz usunąć książke?')){return false;}; ">Usuń</a> </td>
		</tr>
		<tr>
			<td colspan="6" style="border-top:0 solid;">
				<div id="accordion_{{$book->bok_isbn}}">
					<div class="row">
						<div id="more_{{$book->bok_isbn}}" class="panel-collapse collapse">
							<div class="col-lg-2">
								<center>
									<img src="{{$book->bok_image_link}}" alt="Tytuł książki - okładka" class="cover-big" style="width:90px; margin:0 auto;" />
								</center>
							</div>
							<div class="col-lg-5">
								<table class="table" style="margin:0px;">
									<tbody>									
										<tr>
											<td> <strong> Tytuł: </strong> </td>
											<td> {{$book->bok_title}} </td>
										</tr>
										<tr>
											<td> <strong> Autor: </strong> </td>
											<td> 
												@foreach($autors as $autor)
													@if($autor->atr_bok_id == $book->bok_id)
														<p>{{$writersList[$autor->atr_wtr_id]}}</p>
													@endif
												@endforeach
											</td>
										</tr>
										<tr>
											<td> <strong> ISBN: </strong> </td>
											<td> {{$book->bok_isbn}} </td>
										</tr>
										<tr>
											<td> <strong> Data wydania: </strong> </td>
											<td> {{substr($book->bok_edition_date,0,4)."r." }} </td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="col-lg-5">
								<table class="table">
									<tbody>									
										<tr>
											<td> <strong> Numer wydania: </strong> </td>
											<td> {{$book->bok_edition_number}} </td>
										</tr>
										<tr>
											<td> <strong> Gatunek: </strong> </td>
											<td> {{$kinds[$book->bok_knd_id - 1]}} </td>
										</tr>
										<tr>
											<td> <strong> Język: </strong> </td>
											<td> {{$languages[$book->bok_lng_id - 1]}} </td>
										</tr>
										<tr>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="row">
						<div id="edit_{{$book->bok_isbn}}" class="panel-collapse collapse">
							<div class="panel panel-info" style="width:90%; margin:0 auto;">
								<div class="panel-heading">
									<h4 class="panel-title">
										<span class="glyphicon glyphicon-cog" aria-hidden="true"></span> &nbsp Edytuj dane książki
											</h4>
								</div>
								<div class="panel-body">
									@include('admin.partials._edit_book_form')
								</div>
							</div>
						</div>
					</div>
				</td>
			</tr> 
		</tbody>
	@endforeach													
</table>					
<?php 
	if(method_exists($books, 'links'))
		echo $books->links(); 
?>
								