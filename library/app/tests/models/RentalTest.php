<?php

class RentalTest extends TestCase {

	protected $user;
	protected $rental;
	protected $book;

	public function setUp()
	{
    	parent::setUp();

    	$this->user = new User;
		$this->user->usr_name = 'Admin';
        $this->user->usr_surname = 'Administrator';
        $this->user->usr_adr_id = 2;
        $this->user->usr_phone = '123456789';
        $this->user->usr_number = '100000001';
        $this->user->usr_pesel = '12345678900';
        $this->user->usr_active = true;
        $this->user->usr_verified = true;
        $this->user->email = 'admin@admin.com';
        $this->user->password = Hash::make('admin12345');
        $this->user->usr_is_blocked = false;
		$this->user->save();

		$this->book = new Book;
		$this->book->bok_isbn = '9788379242573';
        $this->book->bok_title = 'Chłopcy';
        $this->book->bok_lng_id = 1;
        $this->book->bok_knd_id = 1;
        $this->book->bok_edition_date = new DateTime('2014-01-01');
        $this->book->bok_edition_number = 2;
        $this->book->bok_image_link = 'http://ecsmedia.pl/c/chlopcy-tom-1-b-iext26922174.jpg';
        $this->book->save();

		$this->rental = new Rental;
		$this->rental->rtl_bok_id = $this->book;
        $this->rental->rtl_usr_id = $this->user;
        $this->rental->rtl_start_date = new DateTime('-30 days');
        $this->rental->rtl_end_date = new DateTime;
        $this->rental->rtl_is_returned = false;
        $this->rental->save();

	}

	public function testExtendEndDate()
	{
		//Rental::extendEndDate($this->rental);

		$rental = DB::table('rental')->where('rtl_id', $this->rental)->first();

		$this->assertEquals(new DateTime, $this->rental->rtl_end_date);
	}
	
	public function testCheckRentalNumber()
	{
		$this->assertEquals(1, Rental::checkRentalNumber($this->user));
	}

	public function testIsBookReturned()
	{

		$this->assertEquals(0, Rental::isBookReturned($this->user, $this->book));
	}

}