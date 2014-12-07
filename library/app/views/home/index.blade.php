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
            
            $scope.checkName = function (){
                
                if(!$scope.regForm.username.$valid)
                    $('input[name="username"]').tooltip("show");
                else
                    $('input[name="username"]').tooltip("destroy");
            }
            $scope.checkLastName = function (){
                if(!$scope.regForm.lastname.$valid)
                    $('input[name="lastname"]').tooltip("show");
                else
                    $('input[name="lastname"]').tooltip("destroy");
            }
            $scope.checkEmail = function (){
                if(!$scope.regForm.email.$valid)
                    $('input[name="email"]').tooltip("show");
                else
                    $('input[name="email"]').tooltip("destroy");
            }

                //$('input[name="password"]').tooltip("show");
            $scope.checkPass = function(){                  
                if($scope.user.password1.length < 6){
                    $scope.regForm.password.$setValidity('tooShort',false);
                    $scope.regForm.password_confirmation.$setValidity('tooShort',false);
                    $('input[name="password"]').attr("title","Hasło powinno mieć co najmniej 6 znaków!");
                    $('input[name="password_confirmation"]').attr("title","Hasło powinno mieć co najmniej 6 znaków!");
                    $('input[name="password"]').tooltip("show");
                    $('input[name="password_confirmation"]').tooltip("show");
                } else {
                    $scope.regForm.password.$setValidity('tooShort',true);
                    $scope.regForm.password_confirmation.$setValidity('tooShort',true);
                    $('input[name="password"]').tooltip("destroy");
                    $('input[name="password_confirmation"]').tooltip("destroy");
                }
                if($scope.user.password1 != $scope.user.password2){
                    $scope.regForm.password.$setValidity('identical',false);
                    $scope.regForm.password_confirmation.$setValidity('identical',false);
                    $('input[name="password"]').attr("title","Hasła nie są takie same!");
                    $('input[name="password_confirmation"]').attr("title","Hasła nie są takie same!");
                    $('input[name="password"]').tooltip("show");
                    $('input[name="password_confirmation"]').tooltip("show");
                } else {
                    $scope.regForm.password.$setValidity('identical',true);
                    $scope.regForm.password_confirmation.$setValidity('identical',true);
                    $('input[name="password"]').tooltip("destroy");
                    $('input[name="password_confirmation"]').tooltip("destroy");
                }   
            };
            $scope.checkCity = function(){
                if(!$scope.regForm.city.$valid)
                    $('input[name="city"]').tooltip("show");
                else 
                    $('input[name="city"]').tooltip("destroy");
            }
            $scope.checkStreet = function(){
                if(!$scope.regForm.street.$valid)
                    $('input[name="street"]').tooltip("show");
                else 
                    $('input[name="street"]').tooltip("destroy");
            }
            $scope.checkHouseNr = function(){
                if(!$scope.regForm.houseNr.$valid)
                    $('input[name="houseNr"]').tooltip("show");
                else 
                    $('input[name="houseNr"]').tooltip("destroy");
            }
            $scope.checkZipCode = function(){
                if(!$scope.regForm.zipCode.$valid)
                    $('input[name="zipCode"]').tooltip("show");
                else 
                    $('input[name="zipCode"]').tooltip("destroy");
            }
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