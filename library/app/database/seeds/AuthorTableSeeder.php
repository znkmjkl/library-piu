<?php

class AuthorTableSeeder extends Seeder {

    public function run()
    {
        DB::table('author')->delete();

        $writer_id = DB::table('writer')
                                ->select('wtr_id')
                                ->where('wtr_name', 'Jakub')
                                ->where('wtr_surname', 'Ćwiek')
                                ->where('wtr_birth_date', new DateTime('1982-06-24'))
                                ->first()->wtr_id;    

        $book_id = DB::table('book')
                                ->select('bok_id')
                                ->where('bok_isbn', '9788379242573')
                                ->first()->bok_id;                                   

        Author::create(
        	array(
        		'atr_bok_id' => $book_id,
        		'atr_wtr_id' => $writer_id
        	));

        $writer_id = DB::table('writer')
                                ->select('wtr_id')
                                ->where('wtr_name', 'John Ronald Reuel')
                                ->where('wtr_surname', 'Tolkien')
                                ->where('wtr_birth_date', new DateTime('1892-01-03'))
                                ->first()->wtr_id;

        $book_id = DB::table('book')
                                ->select('bok_id')
                                ->where('bok_isbn', '9788372006709')
                                ->first()->bok_id; 

        Author::create(
            array(
                'atr_bok_id' => $book_id,
                'atr_wtr_id' => $writer_id
            ));

        $writer_id = DB::table('writer')
                                ->select('wtr_id')
                                ->where('wtr_name', 'David')
                                ->where('wtr_surname', 'Safier')
                                ->where('wtr_birth_date', new DateTime('1966-12-13'))
                                ->first()->wtr_id;

        $book_id = DB::table('book')
                                ->select('bok_id')
                                ->where('bok_isbn', '9788324151912')
                                ->first()->bok_id;    

        Author::create(
            array(
                'atr_bok_id' => $book_id,
                'atr_wtr_id' => $writer_id
            ));

        $writer_id = DB::table('writer')
                                ->select('wtr_id')
                                ->where('wtr_name', 'Vikas')
                                ->where('wtr_surname', 'Swarup')
                                ->where('wtr_birth_date', new DateTime('1963-01-01'))
                                ->first()->wtr_id;

        $book_id = DB::table('book')
                                ->select('bok_id')
                                ->where('bok_isbn', '9788324151899')
                                ->first()->bok_id; 

        Author::create(
            array(
                'atr_bok_id' => $book_id,
                'atr_wtr_id' => $writer_id
            ));

        $writer_id = DB::table('writer')
                                ->select('wtr_id')
                                ->where('wtr_name', 'Suzanne')
                                ->where('wtr_surname', 'Collins')
                                ->where('wtr_birth_date', new DateTime('1962-08-10'))
                                ->first()->wtr_id;

        $book_id = DB::table('book')
                                ->select('bok_id')
                                ->where('bok_isbn', '9788372786760')
                                ->first()->bok_id; 

        Author::create(
            array(
                'atr_bok_id' => $book_id,
                'atr_wtr_id' => $writer_id
            ));

        $writer_id = DB::table('writer')
                                ->select('wtr_id')
                                ->where('wtr_name', 'Anita')
                                ->where('wtr_surname', 'Nawrocka')
                                ->where('wtr_birth_date', new DateTime('2000-01-01'))
                                ->first()->wtr_id;

        $book_id = DB::table('book')
                                ->select('bok_id')
                                ->where('bok_isbn', '9788374142496')
                                ->first()->bok_id; 

        Author::create(
            array(
                'atr_bok_id' => $book_id,
                'atr_wtr_id' => $writer_id
            ));

        $writer_id = DB::table('writer')
                                ->select('wtr_id')
                                ->where('wtr_name', 'Paweł')
                                ->where('wtr_surname', 'Trześniowski')
                                ->where('wtr_birth_date', new DateTime('2000-01-01'))
                                ->first()->wtr_id;

        $book_id = DB::table('book')
                                ->select('bok_id')
                                ->where('bok_isbn', '9788374142496')
                                ->first()->bok_id; 

        Author::create(
            array(
                'atr_bok_id' => $book_id,
                'atr_wtr_id' => $writer_id
            ));

        $writer_id = DB::table('writer')
                                ->select('wtr_id')
                                ->where('wtr_name', 'Joanne')
                                ->where('wtr_surname', 'Rowling')
                                ->where('wtr_birth_date', new DateTime('1965-07-31'))
                                ->first()->wtr_id;

        $book_id = DB::table('book')
                                ->select('bok_id')
                                ->where('bok_isbn', '9788372780005')
                                ->first()->bok_id; 

        Author::create(
            array(
                'atr_bok_id' => $book_id,
                'atr_wtr_id' => $writer_id
            ));

        $writer_id = DB::table('writer')
                                ->select('wtr_id')
                                ->where('wtr_name', 'Joanne')
                                ->where('wtr_surname', 'Rowling')
                                ->where('wtr_birth_date', new DateTime('1965-07-31'))
                                ->first()->wtr_id;

        $book_id = DB::table('book')
                                ->select('bok_id')
                                ->where('bok_isbn', '9788372780072')
                                ->first()->bok_id; 

        Author::create(
            array(
                'atr_bok_id' => $book_id,
                'atr_wtr_id' => $writer_id
            ));

        $writer_id = DB::table('writer')
                                ->select('wtr_id')
                                ->where('wtr_name', 'Katarzyna')
                                ->where('wtr_surname', 'Grochola')
                                ->where('wtr_birth_date', new DateTime('1957-07-18'))
                                ->first()->wtr_id;

        $book_id = DB::table('book')
                                ->select('bok_id')
                                ->where('bok_isbn', '9788308043509')
                                ->first()->bok_id; 

        Author::create(
            array(
                'atr_bok_id' => $book_id,
                'atr_wtr_id' => $writer_id
            ));

        $writer_id = DB::table('writer')
                                ->select('wtr_id')
                                ->where('wtr_name', 'Lauren')
                                ->where('wtr_surname', 'Weisberger')
                                ->where('wtr_birth_date', new DateTime('1977-03-28'))
                                ->first()->wtr_id;

        $book_id = DB::table('book')
                                ->select('bok_id')
                                ->where('bok_isbn', '9788373591192')
                                ->first()->bok_id; 

        Author::create(
            array(
                'atr_bok_id' => $book_id,
                'atr_wtr_id' => $writer_id
            ));

        $writer_id = DB::table('writer')
                                ->select('wtr_id')
                                ->where('wtr_name', 'Rhonda')
                                ->where('wtr_surname', 'Byrne')
                                ->where('wtr_birth_date', new DateTime('1951-03-12'))
                                ->first()->wtr_id;

        $book_id = DB::table('book')
                                ->select('bok_id')
                                ->where('bok_isbn', '9788375340884')
                                ->first()->bok_id; 

        Author::create(
            array(
                'atr_bok_id' => $book_id,
                'atr_wtr_id' => $writer_id
            ));

        $writer_id = DB::table('writer')
                                ->select('wtr_id')
                                ->where('wtr_name', 'Wojciech')
                                ->where('wtr_surname', 'Mann')
                                ->where('wtr_birth_date', new DateTime('1948-01-25'))
                                ->first()->wtr_id;

        $book_id = DB::table('book')
                                ->select('bok_id')
                                ->where('bok_isbn', '9788324022007')
                                ->first()->bok_id; 

        Author::create(
            array(
                'atr_bok_id' => $book_id,
                'atr_wtr_id' => $writer_id
            ));
       
    }

}