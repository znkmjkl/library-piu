@extends('templates.layout')

@section('support')
    
    <div class="col-md-5">
         <br><br>
        <img src="img/403.png" alt="Biblionetka - błąd strony" style="float:right; margin:30px;">
    </div>
    <div class="col-md-7">
        <br><br><br><br>
        <h1 style="font-size:50px;"> Błąd 403 </h1>
        <p style="font-size:1.4em; "> Nie masz uprawnien do przeglądania tej strony! </p>
    </div>
                
    <div class="col-md-6 col-md-offset-3">
        <br><br>
        <a href="/"> 
            <button type="button" class="btn-lg btn-success btn-block">
                <span class="glyphicon glyphicon-circle-arrow-left" aria-hidden="true"></span>
                Powrót do strony głównej
            </button> 
        </a>
            
        <br><br>
                
    </div>
   
@stop