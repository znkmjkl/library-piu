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
        		'rvn_status' => true,
                'rvn_is_ready' => false,
                'rvn_date' => new DateTime
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
        		'rvn_status' => true,
                'rvn_is_ready' => false,
                'rvn_date' => new DateTime
        	));

        $book_id = DB::table('book')
                                ->select('bok_id')
                                ->where('bok_isbn', '9788126919207')
                                ->first()->bok_id;

        $user_id = DB::table('user')
                                ->select('id')
                                ->where('email', 'konieczna.weronika@gmail.com')
                                ->first()->id;

        Reservation::create(
            array(
                'rvn_bok_id' => $book_id,
                'rvn_usr_id' => $user_id,
                'rvn_status' => true,
                'rvn_is_ready' => true,
                'rvn_date' => new DateTime
            ));

        $book_id = DB::table('book')
                                ->select('bok_id')
                                ->where('bok_isbn', '9788315507853')
                                ->first()->bok_id;

        $user_id = DB::table('user')
                                ->select('id')
                                ->where('email', 'konieczna.weronika@gmail.com')
                                ->first()->id;

        Reservation::create(
            array(
                'rvn_bok_id' => $book_id,
                'rvn_usr_id' => $user_id,
                'rvn_status' => true,
                'rvn_is_ready' => false,
                'rvn_date' => new DateTime
            ));

        $book_id = DB::table('book')
                                ->select('bok_id')
                                ->where('bok_isbn', '9788310789674')
                                ->first()->bok_id;

        $user_id = DB::table('user')
                                ->select('id')
                                ->where('email', 'konieczna.weronika@gmail.com')
                                ->first()->id;

        Reservation::create(
            array(
                'rvn_bok_id' => $book_id,
                'rvn_usr_id' => $user_id,
                'rvn_status' => true,
                'rvn_is_ready' => false,
                'rvn_date' => new DateTime
            ));

        $book_id = DB::table('book')
                                ->select('bok_id')
                                ->where('bok_isbn', '9788365876206')
                                ->first()->bok_id;

        $user_id = DB::table('user')
                                ->select('id')
                                ->where('email', 'konieczna.weronika@gmail.com')
                                ->first()->id;

        Reservation::create(
            array(
                'rvn_bok_id' => $book_id,
                'rvn_usr_id' => $user_id,
                'rvn_status' => true,
                'rvn_is_ready' => false,
                'rvn_date' => new DateTime
            ));

        $book_id = DB::table('book')
                                ->select('bok_id')
                                ->where('bok_isbn', '9788315057136')
                                ->first()->bok_id;

        $user_id = DB::table('user')
                                ->select('id')
                                ->where('email', 'sterek.witek@gmail.com')
                                ->first()->id;

        Reservation::create(
            array(
                'rvn_bok_id' => $book_id,
                'rvn_usr_id' => $user_id,
                'rvn_status' => true,
                'rvn_is_ready' => false,
                'rvn_date' => new DateTime
            ));

        $book_id = DB::table('book')
                                ->select('bok_id')
                                ->where('bok_isbn', '9788313535988')
                                ->first()->bok_id;

        $user_id = DB::table('user')
                                ->select('id')
                                ->where('email', 'sterek.witek@gmail.com')
                                ->first()->id;

        Reservation::create(
            array(
                'rvn_bok_id' => $book_id,
                'rvn_usr_id' => $user_id,
                'rvn_status' => true,
                'rvn_is_ready' => false,
                'rvn_date' => new DateTime
            ));

        $book_id = DB::table('book')
                                ->select('bok_id')
                                ->where('bok_isbn', '9788326463025')
                                ->first()->bok_id;

        $user_id = DB::table('user')
                                ->select('id')
                                ->where('email', 'sterek.witek@gmail.com')
                                ->first()->id;

        Reservation::create(
            array(
                'rvn_bok_id' => $book_id,
                'rvn_usr_id' => $user_id,
                'rvn_status' => true,
                'rvn_is_ready' => false,
                'rvn_date' => new DateTime
            ));
    }

}