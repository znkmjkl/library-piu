@extends('templates.layout')

@section('support')
    <div style="margin-bottom:20px; margin-top:20px; margin-left:2%; width:96%;">

        <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> &nbsp Informacje o książce
                    </h4>
                </div>
                <div class="panel-body">

                    <div class="col-md-5">

                        <center>
                            <img src="{{ $book[0]->bok_image_link }}" alt="{{ $book[0]->bok_title }}" class="cover-big" style="margin: 0 auto;" />
                        </center>

                    </div>

                    <div class="col-md-7">

                        <table class="table" style="margin-top:20px;">
                            <tbody>
                                <tr>
                                    <td> <strong> Tytuł: </strong> </td>
                                    <td> {{ $book[0]->bok_title }} </td>
                                </tr>

                                <tr>
                                    <td> <strong> Autor: </strong> </td>
                                    <td> @foreach ($book as $author)
                                            <a href="/author/{{ $author->wtr_id }} "> {{ $author->wtr_name }} {{ $author->wtr_surname }}</a><span>, </span>
                                         @endforeach
                                    </td>
                                </tr>

                                <tr>
                                    <td> <strong> ISBN: </strong> </td>
                                    <td> {{ $book[0]->bok_isbn }} </td>
                                </tr>

                                <tr>
                                    <td> <strong> Data wydania: </strong> </td>
                                    <td> {{ date('Y', strtotime($book[0]->bok_edition_date)) }}r. </td>
                                </tr>

                                <tr>
                                    <td> <strong> Numer wydania: </strong> </td>
                                    <td> {{ $book[0]->bok_edition_number }} </td>

                                </tr>

                                <tr>
                                    <td> <strong> Gatunek: </strong> </td>
                                    <td> <a href="/kind/{{ $book[0]->bok_knd_id }} "> {{ $book[0]->knd_name }}</a> </td>
                                </tr>

                                <tr>
                                    <td> <strong> Język: </strong> </td>
                                    <td> <a href="/language/{{ $book[0]->bok_lng_id }} "> {{ $book[0]->lng_name }}</a> </td>
                                </tr>

                                <tr>
                                    <td> <strong> Dostępność: </strong> </td>
                                    @if (Auth::check())
                                        @if (!$book[0]->rvn_status)
                                        <td> <span class="label label-success">TAK</span> </td>
                                        @elseif ($book[0]->rvn_status && Auth::user()->id === $book[0]->rvn_usr_id)
                                        <td> <span class="label label-warning">NIE</span> </td>
                                        @else
                                        <td> <span class="label label-danger">NIE</span> </td>
                                        @endif
                                    @else
                                    <td> <a href="/login"><span class="label label-default">Zaloguj się</span></a> </td>
                                    @endif
                                </tr>
                            </tbody>
                        </table>

                    </div>

                </div>
        </div>

    </div>
    @if (Auth::check())
        <div class="col-md-6 col-md-offset-3">
        @if (!$book[0]->rvn_status)

            {{ Form::open(array('route' => array('reserve', $book[0]->bok_id), )) }}
                {{ Form::submit('Zarezerwuj', ['class' => 'btn btn-lg btn-success btn-block btn-bookbook']) }}
            {{ Form::close() }}

        @elseif ($book[0]->rvn_status && Auth::user()->id === $book[0]->rvn_usr_id)

            {{ Form::open(array('route' => array('resign', $book[0]->bok_id))) }}
                {{ Form::submit('Zrezygnuj z rezerwacji', ['class' => 'btn btn-lg btn-danger btn-block btn-bookbook']) }}
            {{ Form::close() }}

        @else
                <p style="text-align:center;">
                    <br>
                    <span class="glyphicon glyphicon-exclamation-sign text-warning"></span> Książka została już zarezerwowana
                    <br><br>
                </p>
        @endif
            <br><br>

        </div>
    @else
             <p style="text-align:center;">
                 <br>
                 <span class="glyphicon glyphicon-exclamation-sign text-danger"></span> Zaloguj się, aby sprawdzić dostępność i zarezerwować książkę.
                 <br><br>
             </p>
            <br><br>

        </div>
    @endif

@stop