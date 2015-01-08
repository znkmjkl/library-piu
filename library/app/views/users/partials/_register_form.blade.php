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
<div ng-controller="registerController">

{{ Form::open(array('url' => 'users/register', 'class' => 'form-signin', 'name'=>'regForm')) }}
		<h1 class="form-signin-heading" style="text-align:center;">Rejestracja </h1>
		<label style="text-align:center; font-size:1.2em; text-decoration:underline;">Dane osobowe*</label>
		{{ Form::text('firstname', "abc", array('class' => 'form-control', 'placeholder' => 'Podaj imię', 'required' => true,
		'ng-model' => 'firstname',"ng-pattern"=>"/^[A-Za-z'\-żźćńółęąśŻŹĆĄŚĘŁÓŃ]{1,20}$/",
		'ng-blur'=>'checkName()',"data-toggle"=>"tooltip", "data-placement"=>"right", "title"=>"Wprowadź poprawne imię")) }}		
		
		{{ Form::text('lastname', null, array('class' => 'form-control', 'placeholder' => 'Podaj nazwisko', 'required' => true,
		'ng-model' => 'lastname', "ng-pattern"=>"/^[A-Za-z'\-żźćńółęąśŻŹĆĄŚĘŁÓŃ]{1,20}$/",
		'ng-blur'=>'checkLastName()',"data-toggle"=>"tooltip", "data-placement"=>"right", "title"=>"Wprowadź poprawne nazwisko")) }}
		
		{{ Form::email('email', null, array('class' => 'form-control', 'placeholder' => 'Podaj adres email', 'required' => true,
		'ng-model' => 'email','ng-blur'=>'checkEmail()',"data-toggle"=>"tooltip", "data-placement"=>"right", "title"=>"Wprowadź poprawny adres email")) }}
		
		{{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Podaj hasło', 'required' => true,
		'ng-model' => 'user.password1', 'ng-blur' => 'checkPass()',
		"data-toggle"=>"tooltip", "data-placement"=>"right", "title"=>"Wprowadź takie same hasła!"))}}
		
		{{ Form::password('password_confirmation', array('class' => 'form-control', 'placeholder' => 'Potwierdź hasło', 'required' => true,
		'ng-model' => 'user.password2', 'ng-blur' => 'checkPass()', 
		"data-toggle"=>"tooltip", "data-placement"=>"right", "title"=>"Wprowadź takie same hasła!"))}}
		
		<label style="text-align:center; font-size:1.2em;text-decoration:underline;">Adres</label>
		
		{{ Form::text('city', null, array('class' => 'form-control', 'placeholder' => 'Podaj miasto',
		'ng-model' => 'city', "ng-pattern"=>"/^[A-Za-z'\-żźćńółęąśŻŹĆĄŚĘŁÓŃ]{0,30}$/",
		'ng-blur'=>'checkCity()',"data-toggle"=>"tooltip", "data-placement"=>"right", "title"=>"Wprowadź poprawne miasto")) }}
		
		{{ Form::text('street', null, array('class' => 'form-control', 'placeholder' => 'Podaj ulice',
		'ng-model' => 'street', 
		'ng-blur'=>'checkStreet()',"data-toggle"=>"tooltip", "data-placement"=>"right", "title"=>"Wprowadź poprawną ulice")) }}
		
		{{ Form::text('houseNr', null, array('class' => 'form-control', 'placeholder' => 'Podaj numer budynku',
		'ng-model' => 'houseNr',
		'ng-blur'=>'checkHouseNr()',"data-toggle"=>"tooltip", "data-placement"=>"right", "title"=>"Wprowadź numer domu")) }}
		
		{{ Form::text('zipCode', null, array('class' => 'form-control', 'placeholder' => 'Podaj kod pocztowy',
		'ng-blur'=>'checkZipCode()',"data-toggle"=>"tooltip", "data-placement"=>"right", "title"=>"Wprowadź poprawny kod pocztowy",
		'ng-model' => 'zipCode', "ng-pattern" => "/^[0-9]{2}-[0-9]{3}$/", )) }}
		<label>
			*należy wypełnić wszystkie pola
		</label>
		<div style="margin:5px;">
		{{HTML::image(Captcha::img(), 'alt text', array("class"=>"captcha_img",'style'=>'margin-bottom:5px;'))}}		
		<span class="glyphicon glyphicon-refresh" style="font-size:35px; top:15px; left:35px; cursor:pointer;" ng-click="captchaRefresh()"></span></div>
		<input type="text" class="form-control" ng-model="user.captcha_code" name="captcha" id="captcha_code" placeholder="Wprowadź kod z obraza" required="true"/> 

		<!-- <img id="captcha" src="../app/lib/SecureImage/securimage_show.php"  class="img-thumbnail .img-rounded:2px" style="margin-right:20px; margin-bottom:5px;" alt="CAPTCHA IMAGE" />
		<div style="display:inline-block;vertical-align:middle;float:none;">
			<a href="#" onclick="document.getElementById('captcha').src = '../app/lib/SecureImage/securimage_show.php?' + Math.random(); return false"> 
			<img id="reload-image" src="../app/lib/SecureImage/images/refresh.png" alt="Odśwież Obrazek" />
			</a> 
		</div>																															   
		<input type="text" class="form-control" ng-model="user.captcha_code" name="captcha_code" id="captcha_code" placeholder="Wprowadź kod znajdujący się na obrazku" required="true"/>  -->
		<label class="checkbox">							
			<input type="checkbox" ng-model="user.checkbox" required>			

			Akceptuję {{ HTML::link("/terms", 'Regulamin') }}	
		</label>
		{{ Form::submit('Zarejestruj', array('class' => 'btn btn-lg btn-primary btn-block','ng-disabled'=>'!regForm.$valid', "ng-model"=>"regFormSubmit",)) }}
 {{ Form::close() }}
 </div>
  <script>
        
        function registerController($scope) {
        
            $scope.firstname =<?php echo json_encode(Input::old("firstname")); ?>;
            $scope.lastname =<?php echo json_encode(Input::old("lastname")); ?>;
            $scope.email =<?php echo json_encode(Input::old("email")); ?>;
            $scope.city =<?php echo json_encode(Input::old("city")); ?>;
            $scope.street =<?php echo json_encode(Input::old("street")); ?>;
            $scope.houseNr =<?php echo json_encode(Input::old("houseNr")); ?>;
            $scope.zipCode =<?php echo json_encode(Input::old("zipCode")); ?>;
            
            $scope.captchaRefresh = function(){
                var captchaSrc = $(".captcha_img").attr("src").split("?");
                var captchaSrcNew = captchaSrc[0] +"?"+ captchaSrc[1]+Math.random();
                $(".captcha_img").attr("src", captchaSrcNew);
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