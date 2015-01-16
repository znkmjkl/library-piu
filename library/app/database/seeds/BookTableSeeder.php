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
        		'bok_edition_number' => 2,
                'bok_image_link' => 'http://ecsmedia.pl/c/chlopcy-tom-1-b-iext26922174.jpg'
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
        		'bok_edition_number' => 1,
                'bok_image_link' => 'http://ecsmedia.pl/c/wladca-pierscieni-tom-1-druzyna-pierscienia-b-iext3809186.jpg'
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
        		'bok_edition_number' => 1,
                'bok_image_link' => 'http://ecsmedia.pl/c/marna-karma-b-iext27373458.jpg'
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
        		'bok_edition_number' => 1,
                'bok_image_link' => 'http://ecsmedia.pl/c/siedem-prob-b-iext27373459.jpg'
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
        		'bok_edition_number' => 3,
                'bok_image_link' => 'http://ecsmedia.pl/c/trylogia-igrzyska-smierci-b-iext27365865.jpg'
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
        		'bok_edition_number' => 1,
                'bok_image_link' => 'http://ecsmedia.pl/c/magda-m-seria-1-b-iext2950758.jpg'
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
        		'bok_edition_number' => 2,
                'bok_image_link' => 'http://ecsmedia.pl/c/harry-potter-i-kamien-filozoficzny-tom-1-b-iext6311971.jpg'
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
        		'bok_edition_number' => 1,
                'bok_image_link' => 'http://ecsmedia.pl/c/harry-potter-i-komnata-tajemnic-tom-2-b-iext4833422.jpg'
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
        		'bok_edition_number' => 1,
                'bok_image_link' => 'http://ecsmedia.pl/c/krysztalowy-aniol-b-iext3807937.jpg'
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
        		'bok_edition_number' => 1,
                'bok_image_link' => 'http://ecsmedia.pl/c/diabel-ubiera-sie-u-prady-b-iext23856999.jpg '
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
        		'bok_edition_number' => 2,
                'bok_image_link' => 'http://ecsmedia.pl/c/sekret-b-iext3652011.jpg'
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
        		'bok_edition_number' => 1,
                'bok_image_link' => 'http://ecsmedia.pl/c/kroniki-wariata-z-kraju-i-ze-swiata-b-iext12197117.jpg'
        	));

        $language_id = DB::table('language')
                                ->select('lng_id')
                                ->where('lng_name', 'PL')
                                ->first()->lng_id;

        $kind_id = DB::table('kind')
                                ->select('knd_id')
                                ->where('knd_name', 'literatura faktu')
                                ->first()->knd_id;

        Book::create(
            array(
                'bok_isbn' => '9788159811035',
                'bok_title' => 'Ameryka po kaWałku',
                'bok_lng_id' => $language_id,
                'bok_knd_id' => $kind_id,
                'bok_edition_date' => new DateTime('2014-01-01'),
                'bok_edition_number' => 1,
                'bok_image_link' => 'http://ecsmedia.pl/c/ameryka-po-kawalku-b-iext27412498.jpg'
            ));

        $language_id = DB::table('language')
                                ->select('lng_id')
                                ->where('lng_name', 'PL')
                                ->first()->lng_id;

        $kind_id = DB::table('kind')
                                ->select('knd_id')
                                ->where('knd_name', 'literatura faktu')
                                ->first()->knd_id;

        Book::create(
            array(
                'bok_isbn' => '9788126919207',
                'bok_title' => 'Dowód. Prawdziwa historia neurochirurga, który przekroczył granicę śmierci i odkrył Niebo',
                'bok_lng_id' => $language_id,
                'bok_knd_id' => $kind_id,
                'bok_edition_date' => new DateTime('2013-01-01'),
                'bok_edition_number' => 1,
                'bok_image_link' => 'http://ecsmedia.pl/c/dowod-prawdziwa-historia-neurochirurga-ktory-przekroczyl-granice-smierci-i-odkryl-niebo-b-iext21013943.jpg'
            ));

        $language_id = DB::table('language')
                                ->select('lng_id')
                                ->where('lng_name', 'PL')
                                ->first()->lng_id;

        $kind_id = DB::table('kind')
                                ->select('knd_id')
                                ->where('knd_name', 'literatura faktu')
                                ->first()->knd_id;

        Book::create(
            array(
                'bok_isbn' => '9788315507853',
                'bok_title' => 'Mapa nieba',
                'bok_lng_id' => $language_id,
                'bok_knd_id' => $kind_id,
                'bok_edition_date' => new DateTime('2014-01-01'),
                'bok_edition_number' => 1,
                'bok_image_link' => 'http://ecsmedia.pl/c/mapa-nieba-b-iext26335619.jpg'
            ));

        $language_id = DB::table('language')
                                ->select('lng_id')
                                ->where('lng_name', 'PL')
                                ->first()->lng_id;

        $kind_id = DB::table('kind')
                                ->select('knd_id')
                                ->where('knd_name', 'literatura faktu')
                                ->first()->knd_id;

        Book::create(
            array(
                'bok_isbn' => '9788310789674',
                'bok_title' => 'Busem przez świat',
                'bok_lng_id' => $language_id,
                'bok_knd_id' => $kind_id,
                'bok_edition_date' => new DateTime('2014-01-01'),
                'bok_edition_number' => 2,
                'bok_image_link' => 'http://ecsmedia.pl/c/busem-przez-swiat-wyprawa-pierwsza-b-iext6175488.jpg'
            ));

        $language_id = DB::table('language')
                                ->select('lng_id')
                                ->where('lng_name', 'PL')
                                ->first()->lng_id;

        $kind_id = DB::table('kind')
                                ->select('knd_id')
                                ->where('knd_name', 'literatura obyczajowa')
                                ->first()->knd_id;

        Book::create(
            array(
                'bok_isbn' => '9788365876206',
                'bok_title' => 'Tata@home',
                'bok_lng_id' => $language_id,
                'bok_knd_id' => $kind_id,
                'bok_edition_date' => new DateTime('2010-01-01'),
                'bok_edition_number' => 1,
                'bok_image_link' => 'http://ecsmedia.pl/c/tata-home-b-iext10203633.jpg'
            ));

        $language_id = DB::table('language')
                                ->select('lng_id')
                                ->where('lng_name', 'PL')
                                ->first()->lng_id;

        $kind_id = DB::table('kind')
                                ->select('knd_id')
                                ->where('knd_name', 'literatura obyczajowa')
                                ->first()->knd_id;

        Book::create(
            array(
                'bok_isbn' => '9788315057136',
                'bok_title' => 'Dobry ojciec',
                'bok_lng_id' => $language_id,
                'bok_knd_id' => $kind_id,
                'bok_edition_date' => new DateTime('2014-01-01'),
                'bok_edition_number' => 1,
                'bok_image_link' => 'http://ecsmedia.pl/c/dobry-ojciec-b-iext25469159.jpg'
            ));

        $language_id = DB::table('language')
                                ->select('lng_id')
                                ->where('lng_name', 'PL')
                                ->first()->lng_id;

        $kind_id = DB::table('kind')
                                ->select('knd_id')
                                ->where('knd_name', 'literatura obyczajowa')
                                ->first()->knd_id;

        Book::create(
            array(
                'bok_isbn' => '9788313535988',
                'bok_title' => 'Dziś jak kiedyś',
                'bok_lng_id' => $language_id,
                'bok_knd_id' => $kind_id,
                'bok_edition_date' => new DateTime('2013-01-01'),
                'bok_edition_number' => 1,
                'bok_image_link' => 'http://ecsmedia.pl/c/dzis-jak-kiedys-b-iext23108982.jpg'
            ));

        $language_id = DB::table('language')
                                ->select('lng_id')
                                ->where('lng_name', 'PL')
                                ->first()->lng_id;

        $kind_id = DB::table('kind')
                                ->select('knd_id')
                                ->where('knd_name', 'literatura obyczajowa')
                                ->first()->knd_id;

        Book::create(
            array(
                'bok_isbn' => '9788326463025',
                'bok_title' => 'Specyfik',
                'bok_lng_id' => $language_id,
                'bok_knd_id' => $kind_id,
                'bok_edition_date' => new DateTime('2013-01-01'),
                'bok_edition_number' => 1,
                'bok_image_link' => 'http://ecsmedia.pl/c/specyfik-b-iext21008284.jpg'
            ));

        $language_id = DB::table('language')
                                ->select('lng_id')
                                ->where('lng_name', 'PL')
                                ->first()->lng_id;

        $kind_id = DB::table('kind')
                                ->select('knd_id')
                                ->where('knd_name', 'thriller')
                                ->first()->knd_id;

        Book::create(
            array(
                'bok_isbn' => '9788312358892',
                'bok_title' => 'Bez litości',
                'bok_lng_id' => $language_id,
                'bok_knd_id' => $kind_id,
                'bok_edition_date' => new DateTime('2012-01-01'),
                'bok_edition_number' => 1,
                'bok_image_link' => 'http://ecsmedia.pl/c/bez-litosci-b-iext20436204.jpg'
            ));

        $language_id = DB::table('language')
                                ->select('lng_id')
                                ->where('lng_name', 'PL')
                                ->first()->lng_id;

        $kind_id = DB::table('kind')
                                ->select('knd_id')
                                ->where('knd_name', 'horror i literatura grozy')
                                ->first()->knd_id;

        Book::create(
            array(
                'bok_isbn' => '9788369286018',
                'bok_title' => 'Zew Cthulhu',
                'bok_lng_id' => $language_id,
                'bok_knd_id' => $kind_id,
                'bok_edition_date' => new DateTime('2005-01-01'),
                'bok_edition_number' => 1,
                'bok_image_link' => 'http://ecsmedia.pl/c/zew-cthulhu-b-iext6295722.jpg'
            ));

        $language_id = DB::table('language')
                                ->select('lng_id')
                                ->where('lng_name', 'PL')
                                ->first()->lng_id;

        $kind_id = DB::table('kind')
                                ->select('knd_id')
                                ->where('knd_name', 'thriller')
                                ->first()->knd_id;

        Book::create(
            array(
                'bok_isbn' => '9788365162699',
                'bok_title' => 'Rozdarte serca',
                'bok_lng_id' => $language_id,
                'bok_knd_id' => $kind_id,
                'bok_edition_date' => new DateTime('2010-01-01'),
                'bok_edition_number' => 1,
                'bok_image_link' => 'http://ecsmedia.pl/c/rozdarte-serca-b-iext10077592.jpg'
            ));

        $language_id = DB::table('language')
                                ->select('lng_id')
                                ->where('lng_name', 'PL')
                                ->first()->lng_id;

        $kind_id = DB::table('kind')
                                ->select('knd_id')
                                ->where('knd_name', 'horror i literatura grozy')
                                ->first()->knd_id;

        Book::create(
            array(
                'bok_isbn' => '9788369515644',
                'bok_title' => 'Nekroskop 12. Piętno',
                'bok_lng_id' => $language_id,
                'bok_knd_id' => $kind_id,
                'bok_edition_date' => new DateTime('2006-01-01'),
                'bok_edition_number' => 1,
                'bok_image_link' => 'http://ecsmedia.pl/c/nekroskop-12-pietno-b-iext10106608.jpg'
            ));

        $language_id = DB::table('language')
                                ->select('lng_id')
                                ->where('lng_name', 'PL')
                                ->first()->lng_id;

        $kind_id = DB::table('kind')
                                ->select('knd_id')
                                ->where('knd_name', 'kryminał')
                                ->first()->knd_id;

        Book::create(
            array(
                'bok_isbn' => '9788310018053',
                'bok_title' => 'Żona na pokuszenie',
                'bok_lng_id' => $language_id,
                'bok_knd_id' => $kind_id,
                'bok_edition_date' => new DateTime('2011-01-01'),
                'bok_edition_number' => 1,
                'bok_image_link' => 'http://ecsmedia.pl/c/zona-na-pokuszenie-b-iext6277649.jpg'
            ));

        $language_id = DB::table('language')
                                ->select('lng_id')
                                ->where('lng_name', 'PL')
                                ->first()->lng_id;

        $kind_id = DB::table('kind')
                                ->select('knd_id')
                                ->where('knd_name', 'sensacja')
                                ->first()->knd_id;

        Book::create(
            array(
                'bok_isbn' => '9788365043707',
                'bok_title' => 'Uznany za niewinnego',
                'bok_lng_id' => $language_id,
                'bok_knd_id' => $kind_id,
                'bok_edition_date' => new DateTime('2010-01-01'),
                'bok_edition_number' => 1,
                'bok_image_link' => 'http://ecsmedia.pl/c/uznany-za-niewinnego-b-iext3186580.jpg'
            ));

        $language_id = DB::table('language')
                                ->select('lng_id')
                                ->where('lng_name', 'PL')
                                ->first()->lng_id;

        $kind_id = DB::table('kind')
                                ->select('knd_id')
                                ->where('knd_name', 'sensacja')
                                ->first()->knd_id;

        Book::create(
            array(
                'bok_isbn' => '9788369734311',
                'bok_title' => 'Posłaniec',
                'bok_lng_id' => $language_id,
                'bok_knd_id' => $kind_id,
                'bok_edition_date' => new DateTime('2013-01-01'),
                'bok_edition_number' => 2,
                'bok_image_link' => 'http://ecsmedia.pl/c/poslaniec-b-iext20808601.jpg'
            ));

    }

}