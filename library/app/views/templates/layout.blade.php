@extends('templates.base')

@section('layout')

    @include('templates.lang')

    @if (Auth::check())

        @if (Auth::user()->isAdmin()) 
            @include('admin.navbar')
        @else
            @include('users.navbar')
        @endif

    @else

        @include('templates.navbar')

    @endif

    <div class="container">
        <div class="container marketing about">
        @if (Auth::check())
            @if(!Auth::user()->usr_verified)
                <div class="alert alert-warning">
                    
                    Twoje dane nie zostały zweryfikowane! Przy 
                    pierwszym wypożyczeniu będzie wymagany dokument potwierdzający Twoje dane.
                </div>
            @endif
        @endif
            @if (Session::get('flash_message_success'))

                <div class="alert alert-success">
                    <a href="#" class="close" data-dismiss="alert"> &times; </a>
                    {{ Session::get('flash_message_success') }}
                </div>
            @elseif (Session::get('flash_message_danger'))
                <div class="alert alert-danger">
                    <a href="#" class="close" data-dismiss="alert"> &times; </a>
                    {{ Session::get('flash_message_danger') }}
                </div>
            @elseif (Session::get('flash_message_warning'))
                <div class="alert alert-warning">
                    <a href="#" class="close" data-dismiss="alert"> &times; </a>
                    {{ Session::get('flash_message_warning') }}
                </div>
            @elseif (Session::get('flash_message_info'))
                <div class="alert alert-info">
                    <a href="#" class="close" data-dismiss="alert"> &times; </a>
                    {{ Session::get('flash_message_info') }}
                </div>

            @endif


         <br>

            @if (Auth::check())

                @if (Auth::user()->isAdmin()) 
                    @yield('admin_content')
                @else
                    @yield('content')
                @endif

            @else

                @yield('register')

            @endif

                @yield('support')
        <br>
        </div>
    </div>

    @include('templates.footer')

@stop