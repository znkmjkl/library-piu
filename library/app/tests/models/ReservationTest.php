<?php

class ReservationTest extends TestCase {

	protected $user;
	protected $book;
	protected $reservation;

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

        $this->reservation = new Reservation;
		$this->reservation->rvn_bok_id = $this->book;
        $this->reservation->rvn_usr_id = $this->user;
        $this->reservation->rvn_status = false;
        $this->reservation->rvn_is_ready = false;
		$this->reservation->save();
	}

	public function testIsAvailable()
	{
		$this->assertEquals(0, Reservation::isAvailable($this->book));
	}
	
	public function testSetAvailable()
	{
		DB::table('reservation')->where('rvn_bok_id', $this->reservation->rvn_bok_id)->update(array('rvn_status' => 1));

		Reservation::setAvailable($this->reservation->rvn_bok_id,  $this->reservation->rvn_usr_id);

		$reservation = DB::table('reservation')->where('rvn_bok_id', $this->reservation->rvn_bok_id)->first();

		$this->assertEquals(0, $reservation->rvn_status);
	}

	public function testSetReserved()
	{
		Reservation::setReserved($this->reservation->rvn_bok_id,  $this->reservation->rvn_usr_id);

		$reservation = DB::table('reservation')->where('rvn_bok_id', $this->reservation->rvn_bok_id)->first();

		$this->assertEquals(1, $reservation->rvn_status);
	}

	public function testCheckReservationNumber()
	{
		DB::table('reservation')->where('rvn_bok_id', $this->reservation->rvn_bok_id)->update(array('rvn_status' => 1));

		$this->assertEquals(1, Reservation::checkReservationNumber($this->reservation->rvn_usr_id));
	}
}