<?php

class AddressTableSeeder extends Seeder {

    public function run()
    {
        DB::table('address')->delete();

        Address::create(
        	array(
        		'adr_city' => 'Adminowo',
        		'adr_street' => 'Admina',
        		'adr_house_number' => '12/34',
        		'adr_postal_code' => '11-111'
        	));

        Address::create(
        	array(
        		'adr_city' => 'Kraków',
        		'adr_street' => 'Nowosądecka',
        		'adr_house_number' => '5',
        		'adr_postal_code' => '26-728'
        	));

        Address::create(
        	array(
        		'adr_city' => 'Wrocław',
        		'adr_street' => 'Armii Krajowej',
        		'adr_house_number' => '15',
        		'adr_postal_code' => '22-589'
        	));

        Address::create(
        	array(
        		'adr_city' => 'Rudnik',
        		'adr_street' => 'Rozrywka',
        		'adr_house_number' => '29',
        		'adr_postal_code' => '36-589'
        	));

        Address::create(
        	array(
        		'adr_city' => 'Chełm',
        		'adr_street' => 'Makowiecka',
        		'adr_house_number' => '10',
        		'adr_postal_code' => '32-721'
        	));

        Address::create(
        	array(
        		'adr_city' => 'Warszawa',
        		'adr_street' => 'Mazowiecka',
        		'adr_house_number' => '38',
        		'adr_postal_code' => '25-321'
        	));

        Address::create(
        	array(
        		'adr_city' => 'Nowy Targ',
        		'adr_street' => 'al. Słowackiego',
        		'adr_house_number' => '58',
        		'adr_postal_code' => '34-289'
        	));

        Address::create(
        	array(
        		'adr_city' => 'Poznań',
        		'adr_street' => 'al. Mickiewicza',
        		'adr_house_number' => '59',
        		'adr_postal_code' => '27-658'
        	));

        Address::create(
        	array(
        		'adr_city' => 'Nisko',
        		'adr_street' => 'Wielicka',
        		'adr_house_number' => '22/34',
        		'adr_postal_code' => '33-222'
        	));

        Address::create(
        	array(
        		'adr_city' => 'Racławice',
        		'adr_street' => 'Krowoderskich Zuchów',
        		'adr_house_number' => '1A',
        		'adr_postal_code' => '23-344'
        	));

        Address::create(
        	array(
        		'adr_city' => 'Rzeszów',
        		'adr_street' => 'Makowskiego',
        		'adr_house_number' => '44/22',
        		'adr_postal_code' => '43-214'
        	));
    }

}