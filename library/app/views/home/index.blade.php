@extends('templates.layout')

@section('register')

    <div ng-controller="indexController">
       
        @include('users.partials._login_form')
        <br>
        @include('users.partials._register_form')
    </div>
    <script>
        function indexController($scope) {
            $scope.regVisible = false;
            $scope.showReg = function(){
                $scope.regVisible = !$scope.regVisible;
            }
            $scope.checkPass = function(){    
                if($scope.user.password1 != $scope.user.password2){
                    $scope.regForm.password.$setValidity('identical',false);
                    $scope.regForm.password_confirmation.$setValidity('identical',false);
                } else {
                    $scope.regForm.password.$setValidity('identical',true);
                    $scope.regForm.password_confirmation.$setValidity('identical',true);
                }
                    
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