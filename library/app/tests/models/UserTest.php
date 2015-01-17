<?php

class UserTest extends TestCase {

	public function testUserRules()
	{
		$validator = Validator::make(array(
									'firstname'=>'Edek',
								 	'lastname'=>'Wojtak',
								 	'email'=>'edek@edek.com',
								 	'password'=>'edek123',
								 	'password_confirmation'=>'edek123'
									), User::$rules);

        $this->assertTrue($validator->passes());
	}

	public function testUserRulesWithWrongConfirmationPassword()
	{
		$validator = Validator::make(array(
									'firstname'=>'Edek',
								 	'lastname'=>'Wojtak',
								 	'email'=>'edek@edek.com',
								 	'password'=>'edek123',
								 	'password_confirmation'=>'edek1455'
									), User::$rules);

        $this->assertFalse($validator->passes());
	}

	public function testUserRulesWithoutName()
	{
		$validator = Validator::make(array(
								 	'lastname'=>'Wojtak',
								 	'email'=>'edek@edek.com',
								 	'password'=>'edek123',
								 	'password_confirmation'=>'edek123'
									), User::$rules);

        $this->assertFalse($validator->passes());
	}

	public function testUserRulesWithoutEmail()
	{
		$validator = Validator::make(array(
									'firstname'=>'Edek',
								 	'lastname'=>'Wojtak',
								 	'password'=>'edek123',
								 	'password_confirmation'=>'edek123'
									), User::$rules);

        $this->assertFalse($validator->passes());
	}

	public function testUserRulesWithShortPassword()
	{
		$validator = Validator::make(array(
									'firstname'=>'Edek',
								 	'lastname'=>'Wojtak',
								 	'email'=>'edek@edek.com',
								 	'password'=>'ed',
								 	'password_confirmation'=>'ed'
									), User::$rules);

        $this->assertFalse($validator->passes());
	}

	public function testUserEditRules()
	{
		$validator = Validator::make(array(
									'firstname'=>'Edek',
								 	'lastname'=>'Wojtak',
								 	'password'=>'edek123',
								 	'password_confirmation'=>'edek123'
									), User::$editRules);

        $this->assertTrue($validator->passes());
	}

	public function testUserEditRulesWithoutPassword()
	{
		$validator = Validator::make(array(
									'firstname'=>'Edek',
								 	'lastname'=>'Wojtak',
									), User::$editRules);

        $this->assertTrue($validator->passes());
	}

	public function testUserEditRulesWithShortName()
	{
		$validator = Validator::make(array(
									'firstname'=>'E',
								 	'lastname'=>'Wojtak',
								 	'password'=>'edek123',
								 	'password_confirmation'=>'edek123'
									), User::$editRules);

        $this->assertFalse($validator->passes());
	}

	public function testUserChangePasswordRules()
	{
		$validator = Validator::make(array(
									'password'=>'edek123',
								 	'password_confirmation'=>'edek123'
									), User::$change_pass_rules);

        $this->assertTrue($validator->passes());
	}

	public function testUserChangePasswordRulesWithShortPassword()
	{
		$validator = Validator::make(array(
									'password'=>'edek',
								 	'password_confirmation'=>'edek'
									), User::$change_pass_rules);

        $this->assertFalse($validator->passes());
	}

	public function testUserChangePasswordRulesWithoutConfirmationPassword()
	{
		$validator = Validator::make(array(
									'password'=>'edek123'
									), User::$change_pass_rules);

        $this->assertFalse($validator->passes());
	}

	public function testIsAdmin()
	{
		$librarian = new Librarian;
		$librarian->lbn_usr_id = 1;
		$librarian->save();

		$user = new User;
		$user->usr_name = 'Admin';
        $user->usr_surname = 'Administrator';
        $user->usr_adr_id = 2;
        $user->usr_phone = '123456789';
        $user->usr_number = '100000001';
        $user->usr_pesel = '12345678900';
        $user->usr_active = true;
        $user->usr_verified = true;
        $user->email = 'admin@admin.com';
        $user->password = Hash::make('admin12345');
        $user->usr_is_blocked = false;
		$user->save();

		$this->assertTrue($user->isAdmin());
	}
	
}