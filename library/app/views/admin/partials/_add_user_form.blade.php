<style>

	input.ng-invalid.ng-dirty{
    border-color: red;
  }

  input.ng-valid.ng-dirty {
    border-color: #cccccc; 
  }
  .click-reg:hover{
  	color:#428bca;
  	cursor:pointer;
  }
  
</style>
<div ng-controller="addUserController">
{{ Form::open(array('url' => '/adduser', 'class' => 'form-signin', 'name'=>'regForm', "ng-show" => "regVisible")) }}
		<label style="text-align:center; font-size:1.2em; text-decoration:underline;">Dane osobowe*</label>
		{{ Form::text('firstname', null, array('class' => 'form-control', 'placeholder' => 'Podaj imię', 'required' => true,
		'ng-model' => 'user.name',"ng-pattern"=>"/^[A-Za-z'\-żźćńółęąśŻŹĆĄŚĘŁÓŃ]{1,20}$/",
		'ng-blur'=>'checkName()',"data-toggle"=>"tooltip", "data-placement"=>"right", "title"=>"Wprowadź poprawne imię")) }}		
		
		{{ Form::text('lastname', null, array('class' => 'form-control', 'placeholder' => 'Podaj nazwisko', 'required' => true,
		'ng-model' => 'user.lastname', "ng-pattern"=>"/^[A-Za-z'\-żźćńółęąśŻŹĆĄŚĘŁÓŃ]{1,20}$/",
		'ng-blur'=>'checkLastName()',"data-toggle"=>"tooltip", "data-placement"=>"right", "title"=>"Wprowadź poprawne nazwisko")) }}
		
		{{ Form::email('email', null, array('class' => 'form-control', 'placeholder' => 'Podaj adres email', 'required' => true,
		'ng-model' => 'user.email','ng-blur'=>'checkEmail()',"data-toggle"=>"tooltip", "data-placement"=>"right", "title"=>"Wprowadź poprawny adres email")) }}
		
		{{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Podaj hasło', 'required' => true,
		'ng-model' => 'user.password1', 'ng-blur' => 'checkPass()',
		"data-toggle"=>"tooltip", "data-placement"=>"right", "title"=>"Wprowadź takie same hasła!"))}}
		
		{{ Form::password('password_confirmation', array('class' => 'form-control', 'placeholder' => 'Potwierdź hasło', 'required' => true,
		'ng-model' => 'user.password2', 'ng-blur' => 'checkPass()', 
		"data-toggle"=>"tooltip", "data-placement"=>"right", "title"=>"Wprowadź takie same hasła!"))}}
		
		<label style="text-align:center; font-size:1.2em;text-decoration:underline;">Adres</label>
		
		{{ Form::text('city', null, array('class' => 'form-control', 'placeholder' => 'Podaj miasto',
		'ng-model' => 'user.city', "ng-pattern"=>"/^[A-Za-z'\-żźćńółęąśŻŹĆĄŚĘŁÓŃ]{0,30}$/",
		'ng-blur'=>'checkCity()',"data-toggle"=>"tooltip", "data-placement"=>"right", "title"=>"Wprowadź poprawne miasto")) }}
		
		{{ Form::text('street', null, array('class' => 'form-control', 'placeholder' => 'Podaj ulice',
		'ng-model' => 'user.street', 
		'ng-blur'=>'checkStreet()',"data-toggle"=>"tooltip", "data-placement"=>"right", "title"=>"Wprowadź poprawną ulice")) }}
		
		{{ Form::text('houseNr', null, array('class' => 'form-control', 'placeholder' => 'Podaj numer budynku',
		'ng-model' => 'user.houseNr',
		'ng-blur'=>'checkHouseNr()',"data-toggle"=>"tooltip", "data-placement"=>"right", "title"=>"Wprowadź numer domu")) }}
		
		{{ Form::text('zipCode', null, array('class' => 'form-control', 'placeholder' => 'Podaj kod pocztowy',
		'ng-model' => 'user.zipCode',
		'ng-blur'=>'checkZipCode()',"data-toggle"=>"tooltip", "data-placement"=>"right", "title"=>"Wprowadź poprawny kod pocztowy",
		'ng-model' => 'user.zipCode', "ng-pattern" => "/^[0-9]{2}-[0-9]{3}$/", )) }}

        <label style="text-align:center; font-size:1.2em;text-decoration:underline;">Dane Dodatkowe</label>

        {{ Form::text('phone', null, array('class' => 'form-control', 'placeholder' => 'Podaj numer telefonu',
        'ng-model' => 'user.phone', "ng-pattern"=>"/^[+]{0,1}[0-9]{0,11}$/",
        'ng-blur'=>'checkPhoneNumber()',"data-toggle"=>"tooltip", "data-placement"=>"right", "title"=>"Wprowadź poprawny numer telefonu")) }}

        {{ Form::text('pesel', null, array('class' => 'form-control', 'placeholder' => 'Podaj pesel',
        'ng-model' => 'user.pesel', "ng-pattern"=>"/^[0-9]{11}$/",
        'ng-blur'=>'checkPesel()',"data-toggle"=>"tooltip", "data-placement"=>"right", "title"=>"Wprowadź poprawny pesel")) }}

		<label>
			*należy wypełnić wszystkie pola
		</label>
		{{ Form::submit('Dodaj użytkownika', array('class' => 'btn btn-lg btn-primary btn-block','ng-disabled'=>'!regForm.$valid', "ng-model"=>"regFormSubmit",)) }}
 {{ Form::close() }}
 </div>
  <script>
        
        function addUserController($scope) {
            $scope.regVisible = true;
            
            $scope.showReg = function(){
                $scope.regVisible = !$scope.regVisible;
            }
            
            $scope.checkName = function (){
                
                if(!$scope.regForm.firstname.$valid){
                    tooltip("firstname", "show");                  
                }
                else{
                    tooltip("firstname", "");                   
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
            $scope.checkPhoneNumber = function(){
                if(!$scope.regForm.phone.$valid)
                    tooltip("phone","show");
                else 
                    tooltip("phone","hide");
            }
            $scope.checkPesel = function(){
                if(!$scope.regForm.pesel.$valid)
                    tooltip("pesel","show");
                else 
                    tooltip("pesel","hide");
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
