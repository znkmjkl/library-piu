@extends('templates.layout')

@section('register')

    @include('home.angular')

    <div ng-controller="abc">
        <p><b># TODO</b></p>
        <p># Wyszukiwarka na pasku czy tutaj? Roboczo logowanie i rejestracja na stronie glownej (alt. /login i /register)</p>

        @include('users.partials._login_form')
        <br>
        @include('users.partials._register_form')
    </div>
    <script>
        function abc($scope) {
            $scope.regVisible = false;
            $scope.showReg = function(){
                $scope.regVisible = !$scope.regVisible;
            }
            $scope.checkPass = function(){    
                if($scope.user.password1 != $scope.user.password2)
                   $scope.regForm.password.$setValidity('identical',false);
                else
                   $scope.regForm.password.$setValidity('identical',true);
            };
            
        }
    </script>
@stop

<!-- @section('register')
	<div>
		@include('users.partials._login_form')
	</div>
	<div>
		@include('users.partials._register_form')
	</div>
@stop -->