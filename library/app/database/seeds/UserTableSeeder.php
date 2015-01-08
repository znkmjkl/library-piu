<?php

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('user')->delete();

        $address_id = DB::table('address')
                                ->select('adr_id')
                                ->where('adr_city', 'Adminowo')
                                ->where('adr_street', 'Admina')
                                ->where('adr_house_number', '12/34')
                                ->where('adr_postal_code', '11-111')
                                ->first()->adr_id;

        User::create(
        	array(
        		'usr_name' => 'Admin',
        		'usr_surname' => 'Administrator',
        		'usr_adr_id' => $address_id, 
        		'usr_phone' => '123456789',
        		'usr_number' => '123456789012',
        		'usr_pesel' => '12345678900',
        		'usr_active' => true,
        		'usr_verified' => true,
        		'email' => 'admin@admin.com',
        		'password' => Hash::make('admin12345'),
        		//'remember_token' => ''
        	));

        $address_id = DB::table('address')
                                ->select('adr_id')
                                ->where('adr_city', 'Kraków')
                                ->where('adr_street', 'Nowosądecka')
                                ->where('adr_house_number', '5')
                                ->where('adr_postal_code', '26-728')
                                ->first()->adr_id;

        User::create(
        	array(
        		'usr_name' => 'Witek',
        		'usr_surname' => 'Janielczyk',
        		'usr_adr_id' => $address_id, 
        		'usr_phone' => '504825975',
        		// 'usr_number' => '',
        		'usr_pesel' => '91111408868',
        		'usr_active' => true,
        		'usr_verified' => false,
        		'email' => 'witek.j@op.pl',
        		'password' => Hash::make('witoslaw123'),
        		//'remember_token' => ''
        	));

        $address_id = DB::table('address')
                                ->select('adr_id')
                                ->where('adr_city', 'Wrocław')
                                ->where('adr_street', 'Armii Krajowej')
                                ->where('adr_house_number', '15')
                                ->where('adr_postal_code', '22-589')
                                ->first()->adr_id;

        User::create(
        	array(
        		'usr_name' => 'Justus',
        		'usr_surname' => 'Krawczyk',
        		'usr_adr_id' => $address_id, 
        		'usr_phone' => '778586924',
        		// 'usr_number' => '',
        		'usr_pesel' => '94023025846',
        		'usr_active' => true,
        		'usr_verified' => false,
        		'email' => 'justusvelKrawczyk@op.pl',
        		'password' => Hash::make('123happy654'),
        		//'remember_token' => ''
        	));

        $address_id = DB::table('address')
                                ->select('adr_id')
                                ->where('adr_city', 'Rudnik')
                                ->where('adr_street', 'Rozrywka')
                                ->where('adr_house_number', '29')
                                ->where('adr_postal_code', '36-589')
                                ->first()->adr_id;

        User::create(
        	array(
        		'usr_name' => 'Witek',
        		'usr_surname' => 'Sterek',
        		'usr_adr_id' => $address_id, 
        		'usr_phone' => '791458697',
        		// 'usr_number' => '',
        		'usr_pesel' => '70052823684',
        		'usr_active' => true,
        		'usr_verified' => false,
        		'email' => 'sterek.witek@gmail.com',
        		'password' => Hash::make('sternaburte0987'),
        		//'remember_token' => ''
        	));

        $address_id = DB::table('address')
                                ->select('adr_id')
                                ->where('adr_city', 'Chełm')
                                ->where('adr_street', 'Makowiecka')
                                ->where('adr_house_number', '10')
                                ->where('adr_postal_code', '32-721')
                                ->first()->adr_id;

        User::create(
        	array(
        		'usr_name' => 'Sylwia',
        		'usr_surname' => 'Dratwa',
        		'usr_adr_id' => $address_id, 
        		'usr_phone' => '883589642',
        		// 'usr_number' => '',
        		'usr_pesel' => '95123158963',
        		'usr_active' => true,
        		'usr_verified' => false,
        		'email' => 'dratewka@gmail.com',
        		'password' => Hash::make('nanabla123456'),
        		//'remember_token' => ''
        	));

        $address_id = DB::table('address')
                                ->select('adr_id')
                                ->where('adr_city', 'Warszawa')
                                ->where('adr_street', 'Mazowiecka')
                                ->where('adr_house_number', '38')
                                ->where('adr_postal_code', '25-321')
                                ->first()->adr_id;

        User::create(
        	array(
        		'usr_name' => 'Klaudia',
        		'usr_surname' => 'Sowa',
        		'usr_adr_id' => $address_id, 
        		'usr_phone' => '507892513',
        		// 'usr_number' => '',
        		'usr_pesel' => '78092568597',
        		'usr_active' => true,
        		'usr_verified' => false,
        		'email' => 'sowa.klaudia@inteira.pl',
        		'password' => Hash::make('takiehaslo98'),
        		//'remember_token' => ''
        	));

        $address_id = DB::table('address')
                                ->select('adr_id')
                                ->where('adr_city', 'Nowy Targ')
                                ->where('adr_street', 'al. Słowackiego')
                                ->where('adr_house_number', '58')
                                ->where('adr_postal_code', '34-289')
                                ->first()->adr_id;

        User::create(
        	array(
        		'usr_name' => 'Weronika',
        		'usr_surname' => 'Konieczna',
        		'usr_adr_id' => $address_id, 
        		'usr_phone' => '502028456',
        		// 'usr_number' => '',
        		'usr_pesel' => '65031958943',
        		'usr_active' => true,
        		'usr_verified' => false,
        		'email' => 'konieczna.weronika@gmail.com',
        		'password' => Hash::make('endonareda05'),
        		//'remember_token' => ''
        	));

        $address_id = DB::table('address')
                                ->select('adr_id')
                                ->where('adr_city', 'Poznań')
                                ->where('adr_street', 'al. Mickiewicza')
                                ->where('adr_house_number', '59')
                                ->where('adr_postal_code', '27-658')
                                ->first()->adr_id;

        User::create(
        	array(
        		'usr_name' => 'Tytus',
        		'usr_surname' => 'Landan',
        		'usr_adr_id' => $address_id, 
        		'usr_phone' => '688259745',
        		// 'usr_number' => '',
        		'usr_pesel' => '89040628592',
        		'usr_active' => true,
        		'usr_verified' => false,
        		'email' => 'landaczenda58@op.pl',
        		'password' => Hash::make('landaczek382'),
        		//'remember_token' => ''
        	));

        $address_id = DB::table('address')
                                ->select('adr_id')
                                ->where('adr_city', 'Nisko')
                                ->where('adr_street', 'Wielicka')
                                ->where('adr_house_number', '22/34')
                                ->where('adr_postal_code', '33-222')
                                ->first()->adr_id;

        User::create(
        	array(
        		'usr_name' => 'Adam',
        		'usr_surname' => 'Lisicki',
        		'usr_adr_id' => $address_id, 
        		'usr_phone' => '184721465',
        		// 'usr_number' => '',
        		'usr_pesel' => '23984237491',
        		'usr_active' => true,
        		'usr_verified' => false,
        		'email' => 'lisicki1111@o2.pl',
        		'password' => Hash::make('lisicki322@'),
        		//'remember_token' => ''
        	));

        $address_id = DB::table('address')
                                ->select('adr_id')
                                ->where('adr_city', 'Racławice')
                                ->where('adr_street', 'Krowoderskich Zuchów')
                                ->where('adr_house_number', '1A')
                                ->where('adr_postal_code', '23-344')
                                ->first()->adr_id;

        User::create(
        	array(
        		'usr_name' => 'Tomasz',
        		'usr_surname' => 'Kowal',
        		'usr_adr_id' => $address_id, 
        		'usr_phone' => '123487364',
        		// 'usr_number' => '',
        		'usr_pesel' => '12340823412',
        		'usr_active' => true,
        		'usr_verified' => false,
        		'email' => 'kowalek33@tlen.pl',
        		'password' => Hash::make('kowal21kk'),
        		//'remember_token' => ''
        	));

        $address_id = DB::table('address')
                                ->select('adr_id')
                                ->where('adr_city', 'Rzeszów')
                                ->where('adr_street', 'Makowskiego')
                                ->where('adr_house_number', '44/22')
                                ->where('adr_postal_code', '43-214')
                                ->first()->adr_id;

        User::create(
        	array(
        		'usr_name' => 'Edward',
        		'usr_surname' => 'Wojtak',
        		'usr_adr_id' => $address_id, 
        		'usr_phone' => '342923843',
        		'usr_number' => '100000001',
        		'usr_pesel' => '39849374983',
        		'usr_active' => true,
        		'usr_verified' => false,
        		'email' => 'wojtak_edward@gmail.com',
        		'password' => Hash::make('wojtak12323'),
        		//'remember_token' => ''
        	));
    }

}