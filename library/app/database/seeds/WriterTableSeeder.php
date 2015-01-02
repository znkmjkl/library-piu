<?php

class WriterTableSeeder extends Seeder {

    public function run()
    {
        DB::table('writer')->delete();

        Writer::create(
        	array(
        		'wtr_name' => 'Jakub',
        		'wtr_surname' => 'Ćwiek',
                'wtr_birth_date' => new DateTime('1982-06-24')
        	));

        Writer::create(
        	array(
        		'wtr_name' => 'John Ronald Reuel',
        		'wtr_surname' => 'Tolkien',
                'wtr_birth_date' => new DateTime('1892-01-03')
        	));

        Writer::create(
        	array(
        		'wtr_name' => 'David',
        		'wtr_surname' => 'Safier',
                'wtr_birth_date' => new DateTime('1966-12-13')
        	));

        Writer::create(
        	array(
        		'wtr_name' => 'Vikas',
        		'wtr_surname' => 'Swarup',
                'wtr_birth_date' => new DateTime('1963-01-01')
        	));

        Writer::create(
        	array(
        		'wtr_name' => 'Suzanne',
        		'wtr_surname' => 'Collins',
                'wtr_birth_date' => new DateTime('1962-08-10')
        	));

        Writer::create(
        	array(
        		'wtr_name' => 'Anita',
        		'wtr_surname' => 'Nawrocka',
                'wtr_birth_date' => new DateTime('2000-01-01') //data do uzupelnienia
        	));

        Writer::create(
         array(
             'wtr_name' => 'Paweł',
             'wtr_surname' => 'Trześniowski',
                'wtr_birth_date' => new DateTime('2000-01-01') //data do uzupelnienia
         ));

        Writer::create(
        	array(
        		'wtr_name' => 'Joanne',
        		'wtr_surname' => 'Rowling',
                'wtr_birth_date' => new DateTime('1965-07-31')
        	));

        Writer::create(
        	array(
        		'wtr_name' => 'Katarzyna',
        		'wtr_surname' => 'Grochola',
                'wtr_birth_date' => new DateTime('1957-07-18')
        	));

        Writer::create(
        	array(
        		'wtr_name' => 'Lauren',
        		'wtr_surname' => 'Weisberger',
                'wtr_birth_date' => new DateTime('1977-03-28')
        	));

        Writer::create(
        	array(
        		'wtr_name' => 'Rhonda',
        		'wtr_surname' => 'Byrne',
                'wtr_birth_date' => new DateTime('1951-03-12')
        	));

        Writer::create(
        	array(
        		'wtr_name' => 'Wojciech',
        		'wtr_surname' => 'Mann',
                'wtr_birth_date' => new DateTime('1948-01-25')
        	));
    }

}