<?php

class ReservationTableSeeder extends Seeder {

    public function run()
    {
        DB::table('reservation')->delete();

        $book_id = DB::table('book')
                                ->select('bok_id')
                                ->where('bok_isbn', '9788379242573')
                                ->first()->bok_id;

        $user_id = DB::table('user')
                                ->select('id')
                                ->where('email', 'sowa.klaudia@inteira.pl')
                                ->first()->id;

        Reservation::create(
        	array(
        		'rvn_bok_id' => $book_id,
        		'rvn_usr_id' => $user_id,
        		'rvn_date' => new DateTime,
        		'rvn_status' => true,
        	));

        $book_id = DB::table('book')
                                ->select('bok_id')
                                ->where('bok_isbn', '9788375340884')
                                ->first()->bok_id;

        $user_id = DB::table('user')
                                ->select('id')
                                ->where('email', 'konieczna.weronika@gmail.com')
                                ->first()->id;

        Reservation::create(
        	array(
        		'rvn_bok_id' => $book_id,
        		'rvn_usr_id' => $user_id,
        		'rvn_date' => new DateTime,
        		'rvn_status' => true,
        	));
    }

}