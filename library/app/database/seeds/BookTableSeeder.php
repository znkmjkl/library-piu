<?php

class BookTableSeeder extends Seeder {

    public function run()
    {
        DB::table('book')->delete();

        $language_id = DB::table('language')
                                ->select('lng_id')
                                ->where('lng_name', 'PL')
                                ->first()->lng_id;

        $kind_id = DB::table('kind')
                                ->select('knd_id')
                                ->where('knd_name', 'fantastyka')
                                ->first()->knd_id;

        Book::create(
        	array(
        		'bok_isbn' => '9788379242573',
        		'bok_title' => 'Chłopcy',
        		'bok_lng_id' => $language_id,
        		'bok_knd_id' => $kind_id,
        		'bok_edition_date' => new DateTime('2014-01-01'),
        		'bok_edition_number' => 2
        	));

        $language_id = DB::table('language')
                                ->select('lng_id')
                                ->where('lng_name', 'PL')
                                ->first()->lng_id;

        $kind_id = DB::table('kind')
                                ->select('knd_id')
                                ->where('knd_name', 'fantastyka')
                                ->first()->knd_id;

        Book::create(
        	array(
        		'bok_isbn' => '9788372006709',
        		'bok_title' => 'Władca pierścieni drużyna pierścienia',
        		'bok_lng_id' => $language_id,
        		'bok_knd_id' => $kind_id,
        		'bok_edition_date' => new DateTime('2001-01-01'),
        		'bok_edition_number' => 1
        	));

        $language_id = DB::table('language')
                                ->select('lng_id')
                                ->where('lng_name', 'PL')
                                ->first()->lng_id;

        $kind_id = DB::table('kind')
                                ->select('knd_id')
                                ->where('knd_name', 'literatura piękna')
                                ->first()->knd_id;

        Book::create(
        	array(
        		'bok_isbn' => '9788324151912',
        		'bok_title' => 'Marna karma',
        		'bok_lng_id' => $language_id,
        		'bok_knd_id' => $kind_id,
        		'bok_edition_date' => new DateTime('2014-01-01'),
        		'bok_edition_number' => 1
        	));

        $language_id = DB::table('language')
                                ->select('lng_id')
                                ->where('lng_name', 'PL')
                                ->first()->lng_id;

        $kind_id = DB::table('kind')
                                ->select('knd_id')
                                ->where('knd_name', 'literatura piękna')
                                ->first()->knd_id;

        Book::create(
        	array(
        		'bok_isbn' => '9788324151899',
        		'bok_title' => 'Siedem prób',
        		'bok_lng_id' => $language_id,
        		'bok_knd_id' => $kind_id,
        		'bok_edition_date' => new DateTime('2014-01-01'),
        		'bok_edition_number' => 1
        	));

        $language_id = DB::table('language')
                                ->select('lng_id')
                                ->where('lng_name', 'PL')
                                ->first()->lng_id;

        $kind_id = DB::table('kind')
                                ->select('knd_id')
                                ->where('knd_name', 'literatura piękna')
                                ->first()->knd_id;

        Book::create(
        	array(
        		'bok_isbn' => '9788372786760',
        		'bok_title' => 'Igrzyska śmierci trylogia',
        		'bok_lng_id' => $language_id,
        		'bok_knd_id' => $kind_id,
        		'bok_edition_date' => new DateTime('2012-01-01'),
        		'bok_edition_number' => 3
        	));

        $language_id = DB::table('language')
                                ->select('lng_id')
                                ->where('lng_name', 'PL')
                                ->first()->lng_id;

        $kind_id = DB::table('kind')
                                ->select('knd_id')
                                ->where('knd_name', 'film')
                                ->first()->knd_id;

        Book::create(
        	array(
        		'bok_isbn' => '9788374142496',
        		'bok_title' => 'Świat Magdy M.',
        		'bok_lng_id' => $language_id,
        		'bok_knd_id' => $kind_id,
        		'bok_edition_date' => new DateTime('2006-01-01'),
        		'bok_edition_number' => 1
        	));

        $language_id = DB::table('language')
                                ->select('lng_id')
                                ->where('lng_name', 'PL')
                                ->first()->lng_id;

        $kind_id = DB::table('kind')
                                ->select('knd_id')
                                ->where('knd_name', 'fantastyka')
                                ->first()->knd_id;


        Book::create(
        	array(
        		'bok_isbn' => '9788372780005',
        		'bok_title' => 'Harry Potter i kamień filozoficzny',
        		'bok_lng_id' => $language_id,
        		'bok_knd_id' => $kind_id,
        		'bok_edition_date' => new DateTime('2000-01-01'),
        		'bok_edition_number' => 2
        	));

        $language_id = DB::table('language')
                                ->select('lng_id')
                                ->where('lng_name', 'PL')
                                ->first()->lng_id;

        $kind_id = DB::table('kind')
                                ->select('knd_id')
                                ->where('knd_name', 'fantastyka')
                                ->first()->knd_id;

        Book::create(
        	array(
        		'bok_isbn' => '9788372780072',
        		'bok_title' => 'Harry Potter i komnata tajemnic',
        		'bok_lng_id' => $language_id,
        		'bok_knd_id' => $kind_id,
        		'bok_edition_date' => new DateTime('2000-01-01'),
        		'bok_edition_number' => 1
        	));

        $language_id = DB::table('language')
                                ->select('lng_id')
                                ->where('lng_name', 'PL')
                                ->first()->lng_id;

        $kind_id = DB::table('kind')
                                ->select('knd_id')
                                ->where('knd_name', 'romans')
                                ->first()->knd_id;

        Book::create(
        	array(
        		'bok_isbn' => '9788308043509',
        		'bok_title' => 'Kryształowy Anioł',
        		'bok_lng_id' => $language_id,
        		'bok_knd_id' => $kind_id,
        		'bok_edition_date' => new DateTime('2009-01-01'),
        		'bok_edition_number' => 1
        	));

        $language_id = DB::table('language')
                                ->select('lng_id')
                                ->where('lng_name', 'PL')
                                ->first()->lng_id;

        $kind_id = DB::table('kind')
                                ->select('knd_id')
                                ->where('knd_name', 'literatura współczesna')
                                ->first()->knd_id;

        Book::create(
        	array(
        		'bok_isbn' => '9788373591192',
        		'bok_title' => 'Diabeł ubiera się u Prady',
        		'bok_lng_id' => $language_id,
        		'bok_knd_id' => $kind_id,
        		'bok_edition_date' => new DateTime('2004-01-01'),
        		'bok_edition_number' => 1
        	));

        $language_id = DB::table('language')
                                ->select('lng_id')
                                ->where('lng_name', 'PL')
                                ->first()->lng_id;

        $kind_id = DB::table('kind')
                                ->select('knd_id')
                                ->where('knd_name', 'poradniki')
                                ->first()->knd_id;

        Book::create(
        	array(
        		'bok_isbn' => '9788375340884',
        		'bok_title' => 'Sekret',
        		'bok_lng_id' => $language_id,
        		'bok_knd_id' => $kind_id,
        		'bok_edition_date' => new DateTime('2007-01-01'),
        		'bok_edition_number' => 2
        	));

        $language_id = DB::table('language')
                                ->select('lng_id')
                                ->where('lng_name', 'PL')
                                ->first()->lng_id;

        $kind_id = DB::table('kind')
                                ->select('knd_id')
                                ->where('knd_name', 'rozrywka')
                                ->first()->knd_id;

        Book::create(
        	array(
        		'bok_isbn' => '9788324022007',
        		'bok_title' => 'Kroniki wariata z kraju i ze świata',
        		'bok_lng_id' => $language_id,
        		'bok_knd_id' => $kind_id,
        		'bok_edition_date' => new DateTime('2012-01-01'),
        		'bok_edition_number' => 1
        	));
    }

}