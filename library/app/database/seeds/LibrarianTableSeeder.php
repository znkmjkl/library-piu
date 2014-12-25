<?php

class LibrarianTableSeeder extends Seeder {

    public function run()
    {
        DB::table('librarian')->delete();

        $admin_id = DB::table('user')
                                ->select('id')
                                ->where('usr_name', 'Admin')
                                ->where('usr_surname', 'Administrator')
                                ->where('usr_phone', '123456789')
                                ->where('usr_pesel', '12345678900')
                                ->where('email', 'admin@admin.com')
                                ->first()->id;

        Librarian::create(array('lbn_usr_id' => $admin_id));
    }

}