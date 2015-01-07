<?php

class RentalTableSeeder extends Seeder {

    public function run()
    {
        DB::table('rental')->delete();

        $book_id = DB::table('book')
                                ->select('bok_id')
                                ->where('bok_isbn', '9788372780005')
                                ->first()->bok_id;

        $user_id = DB::table('user')
                                ->select('id')
                                ->where('email', 'dratewka@gmail.com')
                                ->first()->id;

        Rental::create(
        	array(
        		'rtl_bok_id' => $book_id,
        		'rtl_usr_id' => $user_id,
        		'rtl_start_date' => new DateTime,
        		'rtl_end_date' => new DateTime('+30 days'),
                'rtl_is_returned' => false
        	));

        $book_id = DB::table('book')
                                ->select('bok_id')
                                ->where('bok_isbn', '9788379242573')
                                ->first()->bok_id;

        $user_id = DB::table('user')
                                ->select('id')
                                ->where('email', 'witek.j@op.pl')
                                ->first()->id;

        Rental::create(
        	array(
        		'rtl_bok_id' => $book_id,
        		'rtl_usr_id' => $user_id,
        		'rtl_start_date' => new DateTime('-50 days'),
        		'rtl_end_date' => new DateTime('-20 days'),
                'rtl_is_returned' => false
        	));
    }

}