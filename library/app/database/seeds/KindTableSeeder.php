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

        Kind::create(array('knd_name' => 'literatura faktu'));

        Kind::create(array('knd_name' => 'literatura obyczajowa'));

        Kind::create(array('knd_name' => 'thriller'));

        Kind::create(array('knd_name' => 'horror i literatura grozy'));

        Kind::create(array('knd_name' => 'kryminał'));

        Kind::create(array('knd_name' => 'sensacja'));

        Kind::create(array('knd_name' => 'przyrodnicze'));

        Kind::create(array('knd_name' => 'historyczne'));

        Kind::create(array('knd_name' => 'horror'));

        Kind::create(array('knd_name' => 'klasyka'));

        Kind::create(array('knd_name' => 'przygodowa '));

        Kind::create(array('knd_name' => 'dokumentalne'));

        Kind::create(array('knd_name' => 'dramat'));

        Kind::create(array('knd_name' => 'komedia'));

        Kind::create(array('knd_name' => 'naukowe'));

        Kind::create(array('knd_name' => 'hobbistyczne '));

        Kind::create(array('knd_name' => 'science-fiction'));

        Kind::create(array('knd_name' => 'biografia'));

        Kind::create(array('knd_name' => 'autobiografia'));

        Kind::create(array('knd_name' => 'poezja'));

        Kind::create(array('knd_name' => 'mlodzieżowe'));

        Kind::create(array('knd_name' => 'na faktach'));

        Kind::create(array('knd_name' => 'psychologiczne'));

        Kind::create(array('knd_name' => 'pamiętnik'));

        Kind::create(array('knd_name' => 'dziecięce'));

        Kind::create(array('knd_name' => 'detektywistyczne'));

        Kind::create(array('knd_name' => 'dzienniki'));

        Kind::create(array('knd_name' => 'literatura popularnonaukowa'));
        
    }

}