@extends('templates.base')

@section('layout')

    @if (Auth::check())

        @include('users.navbar')

    @else

        @include('templates.navbar')

    @endif

    <div class="container">
        <div class="container marketing about">
            @if (Session::get('flash_message1'))

                <div class="alert alert-success">
                    <a href="#" class="close" data-dismiss="alert"> &times; </a>
                    {{ Session::get('flash_message1') }}
                </div>
            @elseif (Session::get('flash_message2'))
                <div class="alert alert-danger">
                    <a href="#" class="close" data-dismiss="alert"> &times; </a>
                    {{ Session::get('flash_message2') }}
                </div>
            @elseif (Session::get('flash_message3'))
                <div class="alert alert-warning">
                    <a href="#" class="close" data-dismiss="alert"> &times; </a>
                    {{ Session::get('flash_message3') }}
                </div>
            @elseif (Session::get('flash_message4'))
                <div class="alert alert-info">
                    <a href="#" class="close" data-dismiss="alert"> &times; </a>
                    {{ Session::get('flash_message4') }}
                </div>

            @endif


         <br>

            @if (Auth::check())

                @yield('content')

            @else

                @yield('register')

            @endif

                @yield('support')
        <br>
        </div>
    </div>

    @include('templates.footer')

@stop