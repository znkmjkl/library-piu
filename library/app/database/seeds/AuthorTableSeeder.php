<?php

class AuthorTableSeeder extends Seeder {

    public function run()
    {
        DB::table('author')->delete();

        Author::create(
        	array(
        		'atr_name' => 'Jakub',
        		'atr_surname' => 'Ćwiek',
                'atr_birth_date' => new DateTime('1982-06-24')
        	));

        Author::create(
        	array(
        		'atr_name' => 'John Ronald Reuel',
        		'atr_surname' => 'Tolkien',
                'atr_birth_date' => new DateTime('1892-01-03')
        	));

        Author::create(
        	array(
        		'atr_name' => 'David',
        		'atr_surname' => 'Safier',
                'atr_birth_date' => new DateTime('1966-12-13')
        	));

        Author::create(
        	array(
        		'atr_name' => 'Vikas',
        		'atr_surname' => 'Swarup',
                'atr_birth_date' => new DateTime('1963-01-01')
        	));

        Author::create(
        	array(
        		'atr_name' => 'Suzanne',
        		'atr_surname' => 'Collins',
                'atr_birth_date' => new DateTime('1962-08-10')
        	));

        // Author::create(
        // 	array(
        // 		'atr_name' => 'Anita',
        // 		'atr_surname' => 'Nawrocka',
        //         'atr_birth_date' => new DateTime('2000-01-01') //data do uzupelnienia
        // 	));

        // Author::create(
        //  array(
        //      'atr_name' => 'Paweł',
        //      'atr_surname' => 'Trześniowski',
        //         'atr_birth_date' => new DateTime('2000-01-01') //data do uzupelnienia
        //  ));

        Author::create(
        	array(
        		'atr_name' => 'Joanne',
        		'atr_surname' => 'Rowling',
                'atr_birth_date' => new DateTime('1965-07-31')
        	));

        Author::create(
        	array(
        		'atr_name' => 'Katarzyna',
        		'atr_surname' => 'Grochola',
                'atr_birth_date' => new DateTime('1957-07-18')
        	));

        Author::create(
        	array(
        		'atr_name' => 'Lauren',
        		'atr_surname' => 'Weisberger',
                'atr_birth_date' => new DateTime('1977-03-28')
        	));

        Author::create(
        	array(
        		'atr_name' => 'Rhonda',
        		'atr_surname' => 'Byrne',
                'atr_birth_date' => new DateTime('1951-03-12')
        	));

        Author::create(
        	array(
        		'atr_name' => 'Wojciech',
        		'atr_surname' => 'Mann',
                'atr_birth_date' => new DateTime('1948-01-25')
        	));
    }

}