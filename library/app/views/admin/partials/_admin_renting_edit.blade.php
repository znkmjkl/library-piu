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
	@foreach($rentedBooks as $rentedBooks)
	<tbody>
			<tr>
				<td>{{$rentedBooks->bok_isbn}}</td>
				<td>{{$rentedBooks->usr_surname}}</td>		
				<td>{{$rentedBooks->usr_pesel}}</td>
				<td>{{substr($rentedBooks->rtl_start_date,0,10)}}</td>
				<td>{{substr($rentedBooks->rtl_end_date,0,10)}}</td>
				<td> <a href="{{ URL::to('/rented/. $rentedBooks->rtl_id. /returnbook'  ) }}" class="btn btn-success"> ZWRÓĆ </a> </td>
				@if(!$rentedBooks->rtl_is_returned)<td><span class="label label-warning">WYPOŻYCZONO</span></td> 
				@elseif(new DateTime('today') > $rentedBooks->rtl_end_date)<td><span class="label label-danger">PRZEKROCZONO</span></td>
				@else<td><span class="label label-success">ODDANO</span></td>@endif
				@if($rentedBooks->fne_amount > 0) <td> <a class="btn btn-sm btn-danger btn-block" data-toggle="collapse" data-parent="#accordion_{{$rentedBooks->rtl_id}}" href="#addFine_{{$rentedBooks->rtl_id}}"> {{$rentedBooks->fne_amount}} PLN <span class="glyphicon glyphicon-circle-arrow-down" aria-hidden="true"></span></a> </td>
				@else <td> <a class="btn btn-sm btn-default btn-block"  data-toggle="collapse" data-parent="#accordion_feeID4" href="#edit_feeID4"> 0 PLN <span class="glyphicon glyphicon-circle-arrow-down" aria-hidden="true"></span> </a> </td> @endif			
				@if($rentedBooks->fne_amount > 0)<td><a href="{{ URL::to('removefine/' . $rentedBooks->rtl_id ) }}" class="btn btn-sm btn-danger btn-block" onclick="if(!confirm('Na pewno chcesz anulować kare?')){return false;}; "> ANULUJ </a> </td>@endif
			</tr>
			<tr>
				<td colspan="8" style="border-top:0 solid;">
					<div id="accordion_{{$rentedBooks->rtl_id}}">
						<div class="row">
							<div id="addFine_{{$rentedBooks->rtl_id}}" class="panel-collapse collapse">
								 {{ Form::open(array('url' => 'addfine/'.$rentedBooks->rtl_id, 'class' => 'form-signin')) }}
   								 {{ Form::text('fine_amount', $rentedBooks->fne_amount , array('class' => 'form-control', 'placeholder' => 'Kara')) }}
   								 {{ Form::submit('Dodaj Kare', array('class' => 'btn btn-lg btn-danger btn-block')) }}
								 {{ Form::close() }}
							</div>
						</div>
					</div>
				</td>
			</tr>
	</tbody>
			@endforeach

</table> 
