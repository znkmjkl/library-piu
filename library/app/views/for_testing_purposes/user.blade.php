@extends('templates.layout')

@section('support')

<p>Dane użytkownika</p>

<p>Imie: {{ $user[0]->usr_name }}</p>
<p>Nazwisko: {{ $user[0]->usr_surname }}</p>
<p>Ulica: {{  $user[0]->adr_street }} {{  $user[0]->adr_house_number }}</p>
<p>Miasto: {{  $user[0]->adr_city }}</p>
<p>Kod pocztowy: {{  $user[0]->adr_postal_code }}</p>
<p>Numer telefonu: {{ $user[0]->usr_phone }}</p>
<p>Numer użytkownika: 
@if(!empty($user[0]->usr_number))
{{ $user[0]->usr_number }}</p>
@else
<span class="label label-danger">Brak numeru</span>
@endif
<p>Pesel: {{ $user[0]->usr_pesel }}</p>
<p>Email: {{ $user[0]->email }}</p>
<p>Status:  
@if($user[0]->usr_active=="1")
<span class="label label-success">Aktywny</span>
@endif
@if($user[0]->usr_active=="0")
<span class="label label-danger">Nieaktywny</span>
@endif
@if($user[0]->usr_verified=="1")
<span class="label label-success">Zweryfikowany</span>
@endif
@if($user[0]->usr_verified=="0")
<span class="label label-danger">Niezweryfikowany</span>
@endif
</p>

<p><a href="{{ URL::to('user/edit/' . $user[0]->id)}}" class="btn btn-default"><i class="glyphicon glyphicon-edit"></i> 
Edytuj</a>
@if($user[0]->usr_active=="1")
<a href="{{ URL::to('user/block/' . $user[0]->id) }}" class="btn btn-danger"><i class="glyphicon glyphicon-ban-circle"></i>
Zablokuj</a>
@endif
@if($user[0]->usr_active=="0")
<a href="{{ URL::to('user/activate/' . $user[0]->id) }}" class="btn btn-success"><i class="glyphicon glyphicon-ok"></i>
Aktywuj</a>
@endif
@if($user[0]->usr_verified=="0")
<a href="{{ URL::to('user/verify/' . $user[0]->id) }}" class="btn btn-success"><i class="glyphicon glyphicon-check"></i>
Zweryfikuj</a>
@endif
@if($user[0]->usr_verified=="1")
<a href="{{ URL::to('user/verify/' . $user[0]->id) }}" class="btn btn-success disabled"><i class="glyphicon glyphicon-check"></i>
Zweryfikuj</a>
@endif
<a href="/users" class="btn btn-default"><i class="glyphicon glyphicon-check"></i>
Powrót</a>
</p>
@stop

