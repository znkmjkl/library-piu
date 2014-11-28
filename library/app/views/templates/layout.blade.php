@extends('templates.base')

@section('layout')

    @if (Auth::check())

        @include('users.navbar')

    @else

        @include('templates.navbar')

    @endif

    <div class="container">
        <div class="container marketing about">
            @if (Session::get('flash_message'))

                <div class="alert alert-info">
                    {{ Session::get('flash_message') }}
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