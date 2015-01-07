@extends('templates.layout')
@section('content')
<p>Zarządzanie użytkownikami <a href="/adduser" class="btn btn-default">Dodaj użytkownika</a></p>
<table class="table table-striped table-bordered table-condensed
table">
<thead>
<tr>
<th>Imie</th>
<th>Nazwisko</th>
<th>Email</th>
<th>Pesel</th>
<th>Status</th>
<th>Akcja</th>
</tr>
</thead>
<tbody>
	@foreach($users as $user)
<tr onclick="location.href='{{ URL::to('user/' . $user->id)}}'">
<td>{{ $user->usr_name }}</td>
<td>{{ $user->usr_surname }}</td>
<td>{{ $user->email }}</td>
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
<td><a href="{{ URL::to('user/edit/' . $user->id)}}" class="btn btn-default"><i class="glyphicon glyphicon-edit"></i> Edytuj</a>
@if($user->usr_active=="1")
<a href="{{ URL::to('user/block/' . $user->id) }}" class="btn btn-danger"><i class="glyphicon glyphicon-ban-circle"></i>
Zablokuj</a>
@endif
@if($user->usr_active=="0")
<a href="{{ URL::to('user/activate/' . $user->id) }}" class="btn btn-success"><i class="glyphicon glyphicon-ok"></i>
Aktywuj</a>
@endif
@if($user->usr_verified=="0")
<a href="{{ URL::to('user/verify/' . $user->id) }}" class="btn btn-success"><i class="glyphicon glyphicon-check"></i>
Zweryfikuj</a>
@endif
</td>
</tr>
@endforeach
</tbody>
</table>
@stop