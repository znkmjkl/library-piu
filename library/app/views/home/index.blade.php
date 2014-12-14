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
            
            $scope.captchaRefresh = function(){
                var captchaSrc = $(".captcha_img").attr("src").split("?");
                var captchaSrcNew = captchaSrc[0] +"?"+ captchaSrc[1]+Math.random();
                $(".captcha_img").attr("src", captchaSrcNew);
            }

            $scope.showReg = function(){
                $scope.regVisible = !$scope.regVisible;
            }
            
            $scope.checkName = function (){
                
                if(!$scope.regForm.firstname.$valid){
                    console.log('tete');
                    tooltip("firstname", "show");                  
                }
                else{
                    tooltip("firstname", "");                    
                    console.log("xxx");
                }
            }
            $scope.checkLastName = function (){
                if(!$scope.regForm.lastname.$valid)
                    tooltip("lastname","show");
                else
                    tooltip("lastname","hide");
            }
            $scope.checkEmail = function (){
                if(!$scope.regForm.email.$valid)
                    tooltip("email","show");
                else
                    tooltip("email","hide");
            }
                
            $scope.checkPass = function(){
                if($scope.regForm.password.$modelValue.length < 6){                    
                    $scope.regForm.password.$setValidity('tooShort',false);
                    $scope.regForm.password_confirmation.$setValidity('tooShort',false);
                    $('input[ng-model="user.password1"]').attr("title","Hasło powinno mieć co najmniej 6 znaków!");
                    $('input[name="password_confirmation"]').attr("title","Hasło powinno mieć co najmniej 6 znaków!");
                    $('input[ng-model="user.password1"]').tooltip("show");
                    $('input[name="password_confirmation"]').tooltip("show");
                } else {
                    $scope.regForm.password.$setValidity('tooShort',true);
                    $scope.regForm.password_confirmation.$setValidity('tooShort',true);
                    $('input[ng-model="user.password1"]').tooltip("destroy");
                    $('input[name="password_confirmation"]').tooltip("destroy");
                }
                if($scope.regForm.password.$modelValue != $scope.regForm.password_confirmation.$modelValue){
                    $scope.regForm.password.$setValidity('identical',false);
                    $scope.regForm.password_confirmation.$setValidity('identical',false);
                    $('input[ng-model="user.password1"]').attr("title","Hasła nie są takie same!");
                    $('input[name="password_confirmation"]').attr("title","Hasła nie są takie same!");
                    $('input[ng-model="user.password1"]').tooltip("show");
                    $('input[name="password_confirmation"]').tooltip("show");
                } else {
                    $scope.regForm.password.$setValidity('identical',true);
                    $scope.regForm.password_confirmation.$setValidity('identical',true);
                    $('input[ng-model="user.password1"]').tooltip("disable");
                    $('input[name="password_confirmation"]').tooltip("disable");
                }   
            };
            $scope.checkCity = function(){                
                if(!$scope.regForm.city.$valid)                    
                    tooltip("city","show");                
                else                    
                    tooltip("city","hide");
            }
            $scope.checkStreet = function(){
                if(!$scope.regForm.street.$valid)
                    tooltip("street","show");                
                else 
                    tooltip("street","hide");
            }
            $scope.checkHouseNr = function(){
                if(!$scope.regForm.houseNr.$valid)
                    tooltip("houseNr", "show");
                else 
                    tooltip("houseNr", "hide");
            }
            $scope.checkZipCode = function(){
                if(!$scope.regForm.zipCode.$valid)
                    tooltip("zipCode","show");
                else 
                    tooltip("zipCode","hide");
            }
            function tooltip(name,action){
                if(action == "show"){                    
                    $('input[name='+name+']').tooltip("show");
                } else{                    
                    $('input[name="'+name+'"]').tooltip("disable");                    
                }
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