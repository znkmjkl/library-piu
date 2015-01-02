<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('AddressTableSeeder');
		$this->command->info('Address table seeded!');

		$this->call('KindTableSeeder');
		$this->command->info('Kind table seeded!');

		$this->call('WriterTableSeeder');
		$this->command->info('Writer table seeded!');

		$this->call('LanguageTableSeeder');
		$this->command->info('Language table seeded!');

		$this->call('UserTableSeeder');
		$this->command->info('User table seeded!');

		$this->call('LibrarianTableSeeder');
		$this->command->info('Librarian table seeded!');

		$this->call('BookTableSeeder');
		$this->command->info('Book table seeded!');

		$this->call('AuthorTableSeeder');
		$this->command->info('Author table seeded!');

		$this->call('RentalTableSeeder');
		$this->command->info('Rental table seeded!');

		$this->call('FineTableSeeder');
		$this->command->info('Fine table seeded!');

		$this->call('ReservationTableSeeder');
		$this->command->info('Reservation table seeded!');
	}

}
