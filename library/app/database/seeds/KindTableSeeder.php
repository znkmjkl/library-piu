<?php

class KindTableSeeder extends Seeder {

    public function run()
    {
        DB::table('kind')->delete();

        Kind::create(array('knd_name' => 'fantastyka'));

        Kind::create(array('knd_name' => 'literatura piękna'));

        Kind::create(array('knd_name' => 'powieść społeczno-obyczajowa'));

        Kind::create(array('knd_name' => 'film'));

        Kind::create(array('knd_name' => 'reportaż'));

        Kind::create(array('knd_name' => 'romans'));

        Kind::create(array('knd_name' => 'literatura współczesna'));

        Kind::create(array('knd_name' => 'poradniki'));

        Kind::create(array('knd_name' => 'rozrywka'));

        Kind::create(array('knd_name' => 'Literatura faktu'));

        Kind::create(array('knd_name' => 'Literatura obyczajowa'));

        Kind::create(array('knd_name' => 'Thriller'));

        Kind::create(array('knd_name' => 'Horror i literatura grozy'));

        Kind::create(array('knd_name' => 'Kryminał'));

        Kind::create(array('knd_name' => 'Sensacja'));
        
    }

}