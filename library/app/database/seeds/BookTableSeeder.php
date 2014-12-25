<?php

class BookTableSeeder extends Seeder {

    public function run()
    {
        DB::table('book')->delete();

        $language_id = DB::table('language')
                                ->select('lng_id')
                                ->where('lng_name', 'PL')
                                ->first()->lng_id;

        $author_id = DB::table('author')
                                ->select('atr_id')
                                ->where('atr_name', 'Jakub')
                                ->where('atr_surname', 'Ćwiek')
                                ->where('atr_birth_date', new DateTime('1982-06-24'))
                                ->first()->atr_id;

        $kind_id = DB::table('kind')
                                ->select('knd_id')
                                ->where('knd_name', 'fantastyka')
                                ->first()->knd_id;

        Book::create(
        	array(
        		'bok_isbn' => '9788379242573',
        		'bok_title' => 'Chłopcy',
        		'bok_lng_id' => $language_id,
        		'bok_atr_id' => $author_id,
        		'bok_knd_id' => $kind_id,
        		'bok_edition_date' => new DateTime('2014-01-01'),
        		'bok_edition_number' => 2
        	));

        $language_id = DB::table('language')
                                ->select('lng_id')
                                ->where('lng_name', 'PL')
                                ->first()->lng_id;

        $author_id = DB::table('author')
                                ->select('atr_id')
                                ->where('atr_name', 'John Ronald Reuel')
                                ->where('atr_surname', 'Tolkien')
                                ->where('atr_birth_date', new DateTime('1892-01-03'))
                                ->first()->atr_id;

        $kind_id = DB::table('kind')
                                ->select('knd_id')
                                ->where('knd_name', 'fantastyka')
                                ->first()->knd_id;

        Book::create(
        	array(
        		'bok_isbn' => '9788372006709',
        		'bok_title' => 'Władca pierścieni drużyna pierścienia',
        		'bok_lng_id' => $language_id,
        		'bok_atr_id' => $author_id,
        		'bok_knd_id' => $kind_id,
        		'bok_edition_date' => new DateTime('2001-01-01'),
        		'bok_edition_number' => 1
        	));

        $language_id = DB::table('language')
                                ->select('lng_id')
                                ->where('lng_name', 'PL')
                                ->first()->lng_id;

        $author_id = DB::table('author')
                                ->select('atr_id')
                                ->where('atr_name', 'David')
                                ->where('atr_surname', 'Safier')
                                ->where('atr_birth_date', new DateTime('1966-12-13'))
                                ->first()->atr_id;

        $kind_id = DB::table('kind')
                                ->select('knd_id')
                                ->where('knd_name', 'literatura piękna')
                                ->first()->knd_id;

        Book::create(
        	array(
        		'bok_isbn' => '9788324151912',
        		'bok_title' => 'Marna karma',
        		'bok_lng_id' => $language_id,
        		'bok_atr_id' => $author_id,
        		'bok_knd_id' => $kind_id,
        		'bok_edition_date' => new DateTime('2014-01-01'),
        		'bok_edition_number' => 1
        	));

        $language_id = DB::table('language')
                                ->select('lng_id')
                                ->where('lng_name', 'PL')
                                ->first()->lng_id;

        $author_id = DB::table('author')
                                ->select('atr_id')
                                ->where('atr_name', 'Vikas')
                                ->where('atr_surname', 'Swarup')
                                ->where('atr_birth_date', new DateTime('1963-01-01'))
                                ->first()->atr_id;

        $kind_id = DB::table('kind')
                                ->select('knd_id')
                                ->where('knd_name', 'literatura piękna')
                                ->first()->knd_id;

        Book::create(
        	array(
        		'bok_isbn' => '9788324151899',
        		'bok_title' => 'Siedem prób',
        		'bok_lng_id' => $language_id,
        		'bok_atr_id' => $author_id,
        		'bok_knd_id' => $kind_id,
        		'bok_edition_date' => new DateTime('2014-01-01'),
        		'bok_edition_number' => 1
        	));

        $language_id = DB::table('language')
                                ->select('lng_id')
                                ->where('lng_name', 'PL')
                                ->first()->lng_id;

        $author_id = DB::table('author')
                                ->select('atr_id')
                                ->where('atr_name', 'Suzanne')
                                ->where('atr_surname', 'Collins')
                                ->where('atr_birth_date', new DateTime('1962-08-10'))
                                ->first()->atr_id;

        $kind_id = DB::table('kind')
                                ->select('knd_id')
                                ->where('knd_name', 'literatura piękna')
                                ->first()->knd_id;

        Book::create(
        	array(
        		'bok_isbn' => '9788372786760',
        		'bok_title' => 'Igrzyska śmierci trylogia',
        		'bok_lng_id' => $language_id,
        		'bok_atr_id' => $author_id,
        		'bok_knd_id' => $kind_id,
        		'bok_edition_date' => new DateTime('2012-01-01'),
        		'bok_edition_number' => 3
        	));

        // $language_id = DB::table('language')
        //                         ->select('lng_id')
        //                         ->where('lng_name', 'PL')
        //                         ->first()->lng_id;

        // $author_id = DB::table('author')
        //                         ->select('atr_id')
        //                         ->where('atr_name', 'Anita')
        //                         ->where('atr_surname', 'Nawrocka')
        //                         ->where('atr_birth_date', new DateTime('2000-01-01'))
        //                         ->first()->atr_id;

        // $kind_id = DB::table('kind')
        //                         ->select('knd_id')
        //                         ->where('knd_name', 'film')
        //                         ->first()->knd_id;

        // Book::create(
        // 	array(
        // 		'bok_isbn' => '9788374142496',
        // 		'bok_title' => 'Świat Magdy M.',
        // 		'bok_lng_id' => $language_id,
        // 		'bok_atr_id' => $author_id,
        // 		'bok_knd_id' => $kind_id,
        // 		'bok_edition_date' => new DateTime('2006-01-01');,
        // 		'bok_edition_number' => 1
        // 	));

        $language_id = DB::table('language')
                                ->select('lng_id')
                                ->where('lng_name', 'PL')
                                ->first()->lng_id;

        $author_id = DB::table('author')
                                ->select('atr_id')
                                ->where('atr_name', 'Joanne')
                                ->where('atr_surname', 'Rowling')
                                ->where('atr_birth_date', new DateTime('1965-07-31'))
                                ->first()->atr_id;

        $kind_id = DB::table('kind')
                                ->select('knd_id')
                                ->where('knd_name', 'fantastyka')
                                ->first()->knd_id;


        Book::create(
        	array(
        		'bok_isbn' => '9788372780005',
        		'bok_title' => 'Harry Potter i kamień filozoficzny',
        		'bok_lng_id' => $language_id,
        		'bok_atr_id' => $author_id,
        		'bok_knd_id' => $kind_id,
        		'bok_edition_date' => new DateTime('2000-01-01'),
        		'bok_edition_number' => 2
        	));

        $language_id = DB::table('language')
                                ->select('lng_id')
                                ->where('lng_name', 'PL')
                                ->first()->lng_id;

        $author_id = DB::table('author')
                                ->select('atr_id')
                                ->where('atr_name', 'Joanne')
                                ->where('atr_surname', 'Rowling')
                                ->where('atr_birth_date', new DateTime('1965-07-31'))
                                ->first()->atr_id;

        $kind_id = DB::table('kind')
                                ->select('knd_id')
                                ->where('knd_name', 'fantastyka')
                                ->first()->knd_id;

        Book::create(
        	array(
        		'bok_isbn' => '9788372780072',
        		'bok_title' => 'Harry Potter i komnata tajemnic',
        		'bok_lng_id' => $language_id,
        		'bok_atr_id' => $author_id,
        		'bok_knd_id' => $kind_id,
        		'bok_edition_date' => new DateTime('2000-01-01'),
        		'bok_edition_number' => 1
        	));

        $language_id = DB::table('language')
                                ->select('lng_id')
                                ->where('lng_name', 'PL')
                                ->first()->lng_id;

        $author_id = DB::table('author')
                                ->select('atr_id')
                                ->where('atr_name', 'Katarzyna')
                                ->where('atr_surname', 'Grochola')
                                ->where('atr_birth_date', new DateTime('1957-07-18'))
                                ->first()->atr_id;

        $kind_id = DB::table('kind')
                                ->select('knd_id')
                                ->where('knd_name', 'romans')
                                ->first()->knd_id;

        Book::create(
        	array(
        		'bok_isbn' => '9788308043509',
        		'bok_title' => 'Kryształowy Anioł',
        		'bok_lng_id' => $language_id,
        		'bok_atr_id' => $author_id,
        		'bok_knd_id' => $kind_id,
        		'bok_edition_date' => new DateTime('2009-01-01'),
        		'bok_edition_number' => 1
        	));

        $language_id = DB::table('language')
                                ->select('lng_id')
                                ->where('lng_name', 'PL')
                                ->first()->lng_id;

        $author_id = DB::table('author')
                                ->select('atr_id')
                                ->where('atr_name', 'Lauren')
                                ->where('atr_surname', 'Weisberger')
                                ->where('atr_birth_date', new DateTime('1977-03-28'))
                                ->first()->atr_id;

        $kind_id = DB::table('kind')
                                ->select('knd_id')
                                ->where('knd_name', 'literatura współczesna')
                                ->first()->knd_id;

        Book::create(
        	array(
        		'bok_isbn' => '9788373591192',
        		'bok_title' => 'Diabeł ubiera się u Prady',
        		'bok_lng_id' => $language_id,
        		'bok_atr_id' => $author_id,
        		'bok_knd_id' => $kind_id,
        		'bok_edition_date' => new DateTime('2004-01-01'),
        		'bok_edition_number' => 1
        	));

        $language_id = DB::table('language')
                                ->select('lng_id')
                                ->where('lng_name', 'PL')
                                ->first()->lng_id;

        $author_id = DB::table('author')
                                ->select('atr_id')
                                ->where('atr_name', 'Rhonda')
                                ->where('atr_surname', 'Byrne')
                                ->where('atr_birth_date', new DateTime('1951-03-12'))
                                ->first()->atr_id;

        $kind_id = DB::table('kind')
                                ->select('knd_id')
                                ->where('knd_name', 'poradniki')
                                ->first()->knd_id;

        Book::create(
        	array(
        		'bok_isbn' => '9788375340884',
        		'bok_title' => 'Sekret',
        		'bok_lng_id' => $language_id,
        		'bok_atr_id' => $author_id,
        		'bok_knd_id' => $kind_id,
        		'bok_edition_date' => new DateTime('2007-01-01'),
        		'bok_edition_number' => 2
        	));

        $language_id = DB::table('language')
                                ->select('lng_id')
                                ->where('lng_name', 'PL')
                                ->first()->lng_id;

        $author_id = DB::table('author')
                                ->select('atr_id')
                                ->where('atr_name', 'Wojciech')
                                ->where('atr_surname', 'Mann')
                                ->where('atr_birth_date', new DateTime('1948-01-25'))
                                ->first()->atr_id;

        $kind_id = DB::table('kind')
                                ->select('knd_id')
                                ->where('knd_name', 'rozrywka')
                                ->first()->knd_id;

        Book::create(
        	array(
        		'bok_isbn' => '9788324022007',
        		'bok_title' => 'Kroniki wariata z kraju i ze świata',
        		'bok_lng_id' => $language_id,
        		'bok_atr_id' => $author_id,
        		'bok_knd_id' => $kind_id,
        		'bok_edition_date' => new DateTime('2012-01-01'),
        		'bok_edition_number' => 1
        	));
    }

}