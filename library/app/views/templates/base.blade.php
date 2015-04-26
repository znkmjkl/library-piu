<!DOCTYPE html>
<html lang="en" ng-app="">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="library">
        <!-- <link rel="shortcut icon" href="img/favicon.png"> -->
        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
        <title>library - book your book...</title>

        <!-- core CSS -->

        {{ HTML::style('css/bootstrap.css') }}
        {{ HTML::style('css/carousel.css') }}
        {{ HTML::style('css/signin.css') }}
        {{ HTML::style('css/conversations.css') }}
        {{ HTML::style('css/main.css') }}
		{{ HTML::style('css/custom.css') }}
        {{ HTML::script('js/jquery.js') }}
        {{ HTML::script('js/bootstrap.min.js') }}
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="../../assets/js/html5shiv.js"></script>
        <script src="../../assets/js/respond.min.js"></script>
        <![endif]-->

        <!-- Custom styles for this template -->

        <style type="text/css">

            .navbar-wrapper {
                margin-top: 0px;
            }


        </style>

    </head>

    <body>

        <script type="text/javascript">

        function setLocale(loc) {

            var url = window.location.href;

            if(loc == 'pl') {
                url = url.replace('/en', '/pl');
            } else {
                url = url.replace('/pl', '/en');
            }

            window.location.href = url;
        }

        </script>

        @yield('layout')

    </body>

        <!-- core JavaScript -->
        <!-- Placed at the end of the document so the pages load faster -->

        
        
        {{ HTML::script('js/holder.js') }}
        {{ HTML::script('js/vendor/angular.min.js') }}
        {{ HTML::script('js/vendor/angular-resource.min.js') }}
        {{ HTML::script('js/vendor/angular-route.min.js') }}
    </body>
</html>
