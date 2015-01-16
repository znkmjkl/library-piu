<div class="panel-heading">Administracja autorami</div>
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
				@include('admin.partials._add_author_form')
				<!-- 	</form> -->
			</div>
		</div>
	</div>
</div>
	<br><br>										
<table class="table booklist-table">
	<thead>
		<tr>
			<th>#</th>
			<th>Imię</th>
			<th>Nazwisko</th>
			<th>Data urodzin</th>
			<th></th>
			<th></th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php $i = 1 + (Paginator::getCurrentPage()-1)*15; ?>
		@foreach($writers as $writer)
			<tr>
				<td style="font-weight:bold;">{{$i++}}</td>
				<td>{{$writer->wtr_name}}</td>
				<td>{{$writer->wtr_surname}}</td>
				<td>{{$writer->wtr_name}}</td>
				<td> <a class="btn btn-sm btn-info btn-block" data-toggle="collapse" data-parent="#accordion_{{$writer->wtr_id}}" href="#edit_{{$writer->wtr_id}}"> EDYTUJ </a> </td>
				<td> <a href="{{ URL::to('removeauthor/' . $writer->wtr_id ) }}" class="btn btn-sm btn-danger btn-block" onclick="if(!confirm('Na pewno chcesz usunąć autora?')){return false;}; "> USUŃ </a> </td>
			</tr>
			<tr>
				<td colspan="6" style="border-top:0 solid;">
					<div id="accordion_{{$writer->wtr_id}}">
						<div class="row">
							<div id="edit_{{$writer->wtr_id}}" class="panel-collapse collapse">
								<div class="panel panel-info" style="width:90%; margin:0 auto;">
									<div class="panel-heading">
										<h4 class="panel-title">
											<span class="glyphicon glyphicon-cog" aria-hidden="true"></span> &nbsp Edytuj dane autora
										</h4>
									</div>
									<div class="panel-body">
										@include('admin.partials._edit_author_form')
										<!-- </form> -->
									</div>
								</div>
							</div>
						</div>
					</div>
				</td>
			</tr>
		@endforeach													
	</tbody>
</table>
<?php echo $writers->links(); ?>
