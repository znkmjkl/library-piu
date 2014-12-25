<?php

class FineTableSeeder extends Seeder {

    public function run()
    {
        DB::table('fine')->delete();

        $rtl_id = DB::table('rental')
                                ->select('rtl_id')
                                ->where('rtl_bok_id', 1)
                                ->where('rtl_usr_id', 2)
                                ->first()->rtl_id;

        Fine::create(
        	array(
        		'fne_rtl_id' => $rtl_id,
        		'fne_amount' => 5,
        		'fne_status' => true
        	));
    }

}