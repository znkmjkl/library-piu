{{ Form::open(array('url' => 'admin/search/renting', 'class' => 'navbar-form navbar-left', 'role' => 'search')) }}
    <div class="input-group" style="width:20%">         
        {{ Form::text('searchInput', null, array('class' => 'form-control', 'style' => 'margin-bottom:0px; width:250px;', 'placeholder' => 'Podaj numer ISBN', 'required' => true)) }}
            <span class="input-group-btn">
            	{{ Form::submit('Szukaj', array('class' => 'btn btn-default')) }}
            </span>	        
    </div>
{{ Form::close() }}

 <table class="table booklist-table">
	<thead>
		<tr>
			<th>ISBN</th>
			<th>Nazwisko</th>
			<th>PESEL</th>
			<th>Data Start</th>
			<th>Data Końca</th>
			<th>Oddaj</th>
			<th>Status</th>
			<th>Kara</th>
			<th></th>
		</tr>
	</thead>
	@foreach($rentedBooks as $rentedBook)
	<tbody>
			<tr>
				<td>{{$rentedBook->bok_isbn}}</td>
				<td>{{$rentedBook->usr_surname}}</td>		
				<td>{{$rentedBook->usr_pesel}}</td>
				<td>{{substr($rentedBook->rtl_start_date,0,10)}}</td>
				<td>{{substr($rentedBook->rtl_end_date,0,10)}}</td>
				<td> <a href="/rented/{{$rentedBook->rtl_id}}/returnbook" class="btn btn-success"> ZWRÓĆ </a> </td>
				@if(!$rentedBook->rtl_is_returned)<td><span class="label label-warning">WYPOŻYCZONO</span></td> 
				@elseif(new DateTime('today') > $rentedBook->rtl_end_date)<td><span class="label label-danger">PRZEKROCZONO</span></td>
				@else<td><span class="label label-success">ODDANO</span></td>@endif
				@if($rentedBook->fne_amount > 0) <td> <a class="btn btn-sm btn-danger btn-block" data-toggle="collapse" data-parent="#accordion_{{$rentedBook->rtl_id}}" href="#addFine_{{$rentedBook->rtl_id}}"> {{$rentedBook->fne_amount}} PLN <span class="glyphicon glyphicon-circle-arrow-down" aria-hidden="true"></span></a> </td>
				@else <td> <a class="btn btn-sm btn-default btn-block"  data-toggle="collapse" data-parent="#accordion_{{$rentedBook->rtl_id}}" href="#addFine_{{$rentedBook->rtl_id}}"> 0 PLN <span class="glyphicon glyphicon-circle-arrow-down" aria-hidden="true"></span> </a> </td> @endif			
				@if($rentedBook->fne_amount > 0)<td><a href="{{ URL::to('removefine/' . $rentedBook->rtl_id ) }}" class="btn btn-sm btn-danger btn-block" onclick="if(!confirm('Na pewno chcesz anulować kare?')){return false;}; "> ANULUJ </a> </td>@endif
			</tr>
			<tr>
				<td colspan="8" style="border-top:0 solid;">
					<div id="accordion_{{$rentedBook->rtl_id}}">
						<div class="row">
							<div id="addFine_{{$rentedBook->rtl_id}}" class="panel-collapse collapse">
								 {{ Form::open(array('url' => 'addfine/'.$rentedBook->rtl_id, 'class' => 'form-signin')) }}
   								 {{ Form::text('fine_amount', $rentedBook->fne_amount , array('class' => 'form-control', 'placeholder' => 'Kara')) }}
   								 {{ Form::submit('Dodaj Kare', array('class' => 'btn btn-lg btn-danger btn-block')) }}
								 {{ Form::close() }}
							</div>
						</div>
					</div>
				</td>
			</tr>
	</tbody>
			@endforeach
			{{$rentedBooks->links()}}
</table> 
