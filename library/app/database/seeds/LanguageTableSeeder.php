<?php

class LanguageTableSeeder extends Seeder {

    public function run()
    {
        DB::table('language')->delete();

        Language::create(array('lng_name' => 'PL'));
        
        Language::create(array('lng_name' => 'ANG'));
    }

}