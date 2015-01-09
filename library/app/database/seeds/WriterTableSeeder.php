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

        Writer::create(
            array(
                'wtr_name' => 'Marek',
                'wtr_surname' => 'Wałkuski',
                'wtr_birth_date' => new DateTime('1990-01-01')
            ));

        Writer::create(
            array(
                'wtr_name' => 'Alexander',
                'wtr_surname' => 'Eben',
                'wtr_birth_date' => new DateTime('1990-01-01')
            ));

        Writer::create(
            array(
                'wtr_name' => 'Ptolemy',
                'wtr_surname' => 'Tompkins',
                'wtr_birth_date' => new DateTime('1990-01-01')
            ));

        Writer::create(
            array(
                'wtr_name' => 'Karol',
                'wtr_surname' => 'Lewandowski',
                'wtr_birth_date' => new DateTime('1990-01-01')
            ));

        Writer::create(
            array(
                'wtr_name' => 'Elke',
                'wtr_surname' => 'Ahlswede',
                'wtr_birth_date' => new DateTime('1990-01-01')
            ));

        Writer::create(
            array(
                'wtr_name' => 'Diane',
                'wtr_surname' => 'Chamberlain',
                'wtr_birth_date' => new DateTime('1990-01-01')
            ));

        Writer::create(
            array(
                'wtr_name' => 'Izabella',
                'wtr_surname' => 'Fręczyk',
                'wtr_birth_date' => new DateTime('1990-01-01')
            ));

        Writer::create(
            array(
                'wtr_name' => 'Aleksander',
                'wtr_surname' => 'Janowski',
                'wtr_birth_date' => new DateTime('1990-01-01')
            ));

        Writer::create(
            array(
                'wtr_name' => 'Douglas',
                'wtr_surname' => 'Preston',
                'wtr_birth_date' => new DateTime('1990-01-01')
            ));

        Writer::create(
            array(
                'wtr_name' => 'Lincoln',
                'wtr_surname' => 'Child',
                'wtr_birth_date' => new DateTime('1990-01-01')
            ));

        Writer::create(
            array(
                'wtr_name' => 'Horward P.',
                'wtr_surname' => 'Lovercraft',
                'wtr_birth_date' => new DateTime('1990-01-01')
            ));

        Writer::create(
            array(
                'wtr_name' => 'Ian',
                'wtr_surname' => 'Rankin',
                'wtr_birth_date' => new DateTime('1990-01-01')
            ));

        Writer::create(
            array(
                'wtr_name' => 'Brian',
                'wtr_surname' => 'Lumley',
                'wtr_birth_date' => new DateTime('1990-01-01')
            ));

        Writer::create(
            array(
                'wtr_name' => 'Russel',
                'wtr_surname' => 'Hill',
                'wtr_birth_date' => new DateTime('1990-01-01')
            ));

        Writer::create(
            array(
                'wtr_name' => 'Scott',
                'wtr_surname' => 'Turow',
                'wtr_birth_date' => new DateTime('1990-01-01')
            ));

        Writer::create(
            array(
                'wtr_name' => 'Daniel',
                'wtr_surname' => 'Silva',
                'wtr_birth_date' => new DateTime('1990-01-01')
            ));
    }

}